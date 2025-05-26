<x-layout>
    <x-breadcrumbs :links='[
	    "Works" => route("works.index"),
	    $work->title => route("works.show", $work),
	    "Apply" => "#"
    ]' />

    <x-job-card :$work />

    <x-card>
        <h2 class="mb-4 text-lg font-medium">
            Your Work Applications
        </h2>

        <form action="{{ route('works.application.store', $work) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="mb-2 block text-sm font-medium text-slate-900" for="expected_salary">Expected salary</label>

                <x-text-input type="number" name="expected_salary" />
            </div>

            <x-button type="submit" class="w-full">Apply</x-button>
        </form>
    </x-card>
</x-layout>
