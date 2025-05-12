<div>
    <label class="flex gap-2 mb-1">
        <input type="radio" @checked(!request($name)) name="{{ $name }}" value="">
        All
    </label>
    @foreach($optionsWithLabels as $label => $option)
        <label class="flex gap-2 mb-1">
            <input type="radio" @checked(request($name) === $option) name="{{ $name }}" value="{{ $option }}">
            {{ ucfirst($label) }}
        </label>
    @endforeach
</div>
