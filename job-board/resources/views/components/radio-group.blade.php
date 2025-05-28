<div>
    @if($allOption)
        <label class="flex gap-2 mb-1">
            <input type="radio" @checked(!request($name)) name="{{ $name }}" value="">
            All
        </label>
    @endif

    @foreach($optionsWithLabels as $label => $option)
        <label class="flex gap-2 mb-1">
            <input type="radio" @checked(($value ?? request($name)) === $option) name="{{ $name }}" value="{{ $option }}">
            {{ ucfirst($label) }}
        </label>
    @endforeach

    @error($name)
        <div class="mt-1 text-xs text-red-500">
            {{ $message }}
        </div>

    @enderror
</div>
