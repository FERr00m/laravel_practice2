<x-layout>
    <x-breadcrumbs :links='[
	"My Works" => route("my-works.index"),
	"Edit" => "#"
	]' />

    <x-card class="mb-8">
        <form action="{{ route('my-works.update', $work) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Work Title</x-label>
                    <x-text-input :value="$work->title" name="title" />
                </div>

                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input :value="$work->location" name="location" />
                </div>

                <div class="col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input :value="$work->salary" name="salary" type="number" />
                </div>

                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input :value="$work->description" name="description" type="textarea" />
                </div>

                <div>
                    <x-label for="experience" :required="true">Experience</x-label>
                    <x-radio-group :all-option="false" :value="$work->experience" name="experience" :options="\App\Models\Work::$experience" />
                </div>

                <div>
                    <x-label for="category" :required="true">Category</x-label>
                    <x-radio-group :all-option="false" :value="$work->category" name="category" :options="\App\Models\Work::$category" />
                </div>


            </div>
            <x-button type="submit">Edit Work</x-button>
        </form>
    </x-card>
</x-layout>
