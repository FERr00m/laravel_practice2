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

        <form enctype="multipart/form-data" action="{{ route('works.application.store', $work) }}" method="POST">
            @csrf
            <div class="mb-4">
                <x-label for="expected_salary" :required="true">
                    Expected salary
                </x-label>

                <x-text-input type="number" name="expected_salary" />
            </div>

            <div class="mb-4">
                <x-label for="cv" :required="true">
                    Upload CV
                </x-label>

                <x-text-input type="file" name="cv" />
            </div>

            <x-button type="submit" class="w-full">Apply</x-button>
        </form>
    </x-card>
</x-layout>
