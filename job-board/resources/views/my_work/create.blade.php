<x-layout>
    <x-breadcrumbs :links='[
	"My Works" => route("my-works.index"),
	"Create" => "#"
	]' />

    <x-card class="mb-8">
        <form action="{{ route('my-works.store') }}" method="post">
            @csrf

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <x-label for="title" :required="true">Work Title</x-label>
                    <x-text-input :value="old('title')" name="title" />
                </div>

                <div>
                    <x-label for="location" :required="true">Location</x-label>
                    <x-text-input :value="old('location')" name="location" />
                </div>

                <div class="col-span-2">
                    <x-label for="salary" :required="true">Salary</x-label>
                    <x-text-input :value="old('salary')" name="salary" type="number" />
                </div>

                <div class="col-span-2">
                    <x-label for="description" :required="true">Description</x-label>
                    <x-text-input :value="old('description')" name="description" type="textarea" />
                </div>

                <div>
                    <x-label for="experience" :required="true">Experience</x-label>
                    <x-radio-group :all-option="false" :value="old('experience')" name="experience" :options="\App\Models\Work::$experience" />
                </div>

                <div>
                    <x-label for="category" :required="true">Category</x-label>
                    <x-radio-group :all-option="false" :value="old('category')" name="category" :options="\App\Models\Work::$category" />
                </div>


            </div>
            <x-button type="submit">Submit</x-button>
        </form>
    </x-card>
</x-layout>
