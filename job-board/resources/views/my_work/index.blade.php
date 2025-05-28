<x-layout>
    <x-breadcrumbs :links='[
	"My Works" =>  "#"
	]' />

    <div class="mb-8 text-right">
        <x-link-button href="{{ route('my-works.create') }}">Add New</x-link-button>
    </div>

    @forelse ($works as $work)
        <x-job-card
            class="mb-4"
            :$work
        >
            <div>
                <div class="text-xs">
                    @forelse($work->workApplications as $application)
                        <div class="mb-4 flex items-center justify-between">
                            <div>
                                <div>{{ $application->user->name }}</div>
                                <div>
                                    Applied {{ $application->created_at->diffForHumans() }}
                                </div>
                                <div>
                                    Download CV
                                </div>
                            </div>
                            <div>
                                ${{ number_format($application->expected_salary) }}
                            </div>
                        </div>
                    @empty
                        <div>No applications yet</div>
                    @endforelse

                    <div class="flex space-x-2">
                        <x-link-button href="{{ route('my-works.edit', $work) }}">Edit</x-link-button>
                    </div>
                </div>

            </div>
        </x-job-card>
    @empty
        <x-card>No works</x-card>

        <x-link-button href="{{ route('my-works.create') }}">Post your first work</x-link-button>
    @endforelse
</x-layout>
