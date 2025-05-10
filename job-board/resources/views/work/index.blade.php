<x-layout>
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
</x-layout>
