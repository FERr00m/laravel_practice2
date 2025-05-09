<div>
    <form wire:submit.prevent="createPoll">
        <label>Poll title</label>

        <input type="text" wire:model.live.debounce.500ms="title">

        @error('title')
            <div class="text-red-500">{{ $message }}</div>
        @enderror

        <div class="my-4">
            <button class="btn" wire:click.prevent="addOption">Add Option</button>
            @error("options")
            <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            @foreach($options as $index => $option)
                <div class="mb-4">
                    <label >Option {{ $index + 1 }}</label>
                </div>


                <div class="flex gap-3">
                    <input type="text" wire:model.live.debounce.500ms="options.{{ $index }}">

                    <button class="btn" wire:click.prevent="removeOption({{ $index }})">Remove</button>
                </div>
                @error("options.{$index}")
                <div class="text-red-500">{{ $message }}</div>
                @enderror

            @endforeach

        </div>

        <button class="btn mt-4" type="submit">Create Poll</button>
    </form>
</div>
