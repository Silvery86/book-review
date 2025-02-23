@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-10 text-2xl">Books: {{ $book->title }}</h1>
                <h3>Author: {{ $book->author }}</h3>
            </div>
            <div class="col-md-12">
                <form method="POST" action="{{ route('books.reviews.store', $book) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="rating" class="block text-sm font-medium text-gray-700">Rating</label>
                        <select id="rating" name="rating" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                        @error('rating') border-red-500 @enderror">
                            <option value="">Select a rating</option>
                            @for($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}" @if(old('rating') == $i) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                        @error('rating')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="review" class="block text-sm font-medium text-gray-700">Review</label>
                        <textarea id="review" name="review" rows="3" class="mt-1 block
                        w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm
                        @error('review') border-red-500 @enderror">{{ old('review') }}</textarea>
                        @error('review')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
