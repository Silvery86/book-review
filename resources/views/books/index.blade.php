@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-10 text-2xl">Books</h1>
                <form action="{{ route('books.index') }}" method="GET"
                    class="mb-4 flex space-x-2 rounded-md bg-slate-100 p-2">
                    <input type="text" name="title" class="input" placeholder="Search book title"
                        value="{{ request('title') }}" />
                    <input type='hidden' name="filter" value="{{ request('filter') }}" />
                    <button type="submit" class="btn">Search</button>
                    <a href="{{ route('books.index') }}" class="btn">Clear</a>
                </form>
                <div class="filter-container mb-4 flex">
                    @php
                        $filters = [
                            '' => 'Lastest',
                            'popular_last_month' => 'Popular last month',
                            'popular_last_6months' => 'Popular last 6 months',
                            'highest_rated_last_month' => 'Highest rated last month',
                            'highest_rated_last_6months' => 'Highest rated last 6 months',
                        ];
                    @endphp
                    @foreach ($filters as $key => $value)
                        <a href="{{ route('books.index', [...request()->query() ,'filter' => $key , 'page' => 1]) }}"
                            class="{{ request('filter') === $key || (request('filter') === null && $key === '') ? 'filter-item-active' : 'filter-item' }}">{{ $value }}</a>
                    @endforeach
                </div>

                <ul>
                    @forelse($books as $book)
                        <li class="mb-4">
                            <div class="book-item">
                                <div class="flex flex-wrap items-center justify-between">
                                    <div class="w-full flex-grow sm:w-auto">
                                        <a href="{{ route('books.show', $book) }}"
                                            class="book-title">{{ $book->title }}</a>
                                        <span class="book-author">by {{ $book->author }}</span>
                                    </div>
                                    <div>
                                        <div class="book-rating">
                                            {{ number_format($book->reviews_avg_rating, 1) }}
                                            <x-star-rating :rating="$book->reviews_avg_rating" />
                                        </div>
                                        <div class="book-review-count">
                                            out of {{ $book->reviews_count }}
                                            {{ Str::plural('review', $book->reviews_count) }}
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
                <div class="mt-4">
                    <x-pagination-links :paginator="$books" />
                </div>
            </div>
        </div>
    </div>
@endsection
