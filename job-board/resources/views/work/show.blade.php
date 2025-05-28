<x-layout>
    <x-breadcrumbs :links='["Works" => route("works.index"), $work->title => "#"]' />
    <x-job-card :$work>
        <p class="mb-4 text-sm text-slate-500">{!! nl2br(e($work->description)) !!}</p>

        @auth
            @can('apply', $work)
                <x-link-button :href="route('works.application.create', $work)">Apply</x-link-button>
            @else
                <div class="text-center text-sm font-medium text-slate-500">You already applied to this work</div>
            @endcan
        @endauth

    </x-job-card>

    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">
            More {{ $work->employer->company_name }} Jobs
        </h2>

        <div class="text-sm text-slate-500">
            @foreach($work->employer->works as $otherWork)
                <div class="flex mb-4 justify-between">
                    <div>
                        <div class="text-slate-700">
                            <a href="{{ route('works.show', $otherWork) }}">
                                {{ $otherWork->title }}
                            </a>
                            <div class="text-xs">
                                {{ $otherWork->created_at->diffForHumans() }}
                            </div>

                        </div>
                        <div></div>
                    </div>
                    <div class="text-xs">
                        ${{ number_format($otherWork->salary) }}
                    </div>
                </div>
            @endforeach
        </div>
    </x-card>
</x-layout>
