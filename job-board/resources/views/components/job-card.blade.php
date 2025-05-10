<x-card class="mb-4">
    <div class="flex justify-between mb-4">
        <h2 class="text-lg font-medium">{{ $work->title }}</h2>
        <div class="text-slate-500">${{ number_format($work->salary) }}</div>
    </div>

    <div class="mb-4 flex justify-between text-sm text-slate-500 items-center">
        <div class="flex space-x-4">
            <div>Company name</div>
            <div>{{ $work->location }}</div>
        </div>
        <div class="flex space-x-1 text-xs">
            <x-tag>{{ Str::ucfirst($work->experience) }}</x-tag>
            <x-tag>{{ $work->category }}</x-tag>
        </div>
    </div>

    <p class="mb-4 text-sm text-slate-500">{!! nl2br(e($work->description)) !!}</p>

    {{ $slot }}
</x-card>
