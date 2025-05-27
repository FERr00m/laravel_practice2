<x-layout>
    <x-breadcrumbs :links='["My Work Applications" => "#"]' />

    @forelse($applications as $application)
        <x-job-card :work="$application->work">
            <div class="text-xs flex items-center justify-between">
                <div>
                    <div>
                        Applied {{ $application->created_at->diffForHumans() }}
                    </div>
                    <div>
                        Others {{ Str::plural('applicant', $application->work->work_applications_count - 1) . ' ' . $application->work->work_applications_count - 1  }}
                    </div>
                    <div>
                        Your asking salary ${{ number_format($application->expected_salary) }}
                    </div>

                    <div>
                        Average asking Salary ${{ number_format($application->work->work_applications_avg_expected_salary) }}
                    </div>
                </div>

                <div>
                    <form method="POST" action="{{ route('my-work-application.destroy', $application) }}">
                        @csrf
                        @method('DELETE')
                        <x-button type="submit">Cancel</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8 bg-slate-100">
            <div class="text-center font-medium">
                You dont have applications yet
            </div>
        </div>

    @endforelse
</x-layout>
