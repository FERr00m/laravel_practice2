<div>
    <button
        type="{{ $type }}"
        {{ $attributes->class(['rounded-md cursor-pointer w-full border border-slate-300 bg-white px-2 py-1 text-center hover:bg-slate-100']) }}
    >{{ $slot }}</button>
</div>
