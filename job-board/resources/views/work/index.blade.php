<x-layout>
    <x-breadcrumbs :links='["Works" => route("works.index")]' />

    <x-card class="mb-4 text-sm" x-data="">
        <form x-ref="filters" id="filtering-form" action="{{ route('works.index') }}" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label for="search" class="mb-1 font-semibold">Search</label>
                    <x-text-input form-ref="filters" name="search" value="{{ request('search') }}" placeholder="Search for any text" />
                </div>

                <div>
                    <label for="salary" class="mb-1 font-semibold">Salary</label>
                    <div class="flex gap-2">
                        <x-text-input form-ref="filters" name="min_salary" value="{{ request('min_salary') }}" placeholder="From" />
                        <x-text-input form-ref="filters" name="max_salary" value="{{ request('max_salary') }}" placeholder="To" />
                    </div>
                </div>

                <div>
                    <div class="mb-1 font-semibold">Experience</div>
                    <x-radio-group name="experience" :options="\App\Models\Work::$experience" />
                </div>

                <div>
                    <div class="mb-1 font-semibold">Category</div>
                    <x-radio-group name="category" :options="\App\Models\Work::$category" />
                </div>
            </div>

            <div class="flex gap-3">
                <x-button type="submit">Filter</x-button>

                <x-link-button :href='route("works.index")'>Reset</x-link-button>
            </div>

        </form>

    </x-card>
    @foreach ($works as $work)
        <x-job-card
            class="mb-4"
            :$work
        >
            <div>
                <x-link-button :href='route("works.show", $work)'>
                    Show
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach

    @if($works->count())

        <nav class="mt-4 mb-8">
            {{ $works->links() }}
        </nav>


    @endif
</x-layout>
