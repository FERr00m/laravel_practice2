@extends('layouts.app')

@section('content')
    <h1 class="mb-10 text-2xl">Books</h1>

    <form class="mb-4 flex items-center gap-3" method="GET" action="{{ route('books.index') }}">
        <input class="input h-10" type="text" name="title" placeholder="Search by title" value="{{ request('title') }}">

        <input type="hidden" name="filter" value="{{ request('filter') }}">
        <button class="btn h-10" type="submit">Search</button>

        <a class="btn h-10" href="{{ route('books.index') }}">Clear</a>
    </form>

    <div class="filter-container mb-4 flex">
        @php
            $filter = [
			    '' => 'Latest',
			    'popular_last_month' => 'Popular last month',
			    'popular_last_6month' => 'Popular last 6 month',
			    'highest_rated_last_month' => 'Highest rated last month',
			    'highest_rated_last_6month' => 'Highest rated last 6 month',
            ];
        @endphp


        @foreach($filter as $key => $label)
            <a class="{{ request('filter') === $key || (request('filter') === null && $key === '') ? 'filter-item-active' : 'filter-item' }}"
               href="{{ route('books.index', [...request()->query, 'filter' => $key ]) }}">
                {{ $label }}
            </a>
        @endforeach

    </div>

    <ul>
        @forelse($books as $book)
            <li class="mb-4">
                <div class="book-item">
                    <div
                        class="flex flex-wrap items-center justify-between">
                        <div class="w-full flex-grow sm:w-auto">
                            <a href="{{ route('books.show', $book) }}" class="book-title">{{ $book->title }}</a>
                            <span class="book-author">by {{ $book->author }}</span>
                        </div>
                        <div>
                            <div class="book-rating">
                                {{ number_format($book->reviews_avg_rating, 1) }}
                                <x-star-rating :rating="$book->reviews_avg_rating" />
                            </div>
                            <div class="book-review-count">
                                out of {{ $book->reviews_count }} {{ Str::plural('review', $book->reviews_count) }}
                            </div>
                        </div>
                    </div>
                </div>
            </li>


        @empty
            <li class="mb-4">
                <div class="empty-book-item">
                    <p class="empty-text">No books found</p>
                    <a href="{{ route('books.index') }}" class="reset-link">Reset criteria</a>
                </div>
            </li>
        @endforelse
    </ul>

    @if($books->count())

        <nav class="mt-4">
            {{ $books->links() }}
        </nav>


    @endif
@endsection
