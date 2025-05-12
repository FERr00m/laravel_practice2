<x-layout>
    <x-breadcrumbs :links='["Works" => route("works.index"), $work->title => "#"]' />
    <x-job-card :$work>
        <p class="mb-4 text-sm text-slate-500">{!! nl2br(e($work->description)) !!}</p>
    </x-job-card>
</x-layout>
