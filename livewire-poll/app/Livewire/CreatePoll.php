<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public string $title;
    public array $options = ['First'];

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|min:3|max:255',
    ];

    protected $messages = [
        'options.*' => 'Option cant be empty'
    ];

    public function updated($propName)
    {
        $this->validateOnly($propName);
    }

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        $this->options[] = '';
    }
    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function createPoll()
    {

        $this->validate();

        Poll::create([
            'title' => $this->title
        ])->options()->createMany(
            collect($this->options)
                ->map(fn($option) => ['name' => $option])
                ->all()
        );

//        foreach ($this->options as $optionName) {
//            $poll->options()->create(['name' => $optionName]);
//        }

        $this->reset(['title', 'options']);

        $this->dispatch('pollCreated');
    }

//    public function mount()
//    {
//
//    }
}
