@extends('layout.app')

@section('title')
    Edit Book : {{ $book->title }}
@endsection

@section('content')
    <section class="p-4 flex flex-col gap-4">
        <h1 class="text-4xl font-bold text-blue-800">Edit Book</h1>

        @if ($errors->any())
            <div class="space-y-2">
                @foreach ($errors->all() as $error)
                    <div class="p-4 bg-red-500 text-white rounded-md font-medium">
                        {{ $error }}
                    </div>
                @endforeach
            </div>
        @endif

        <form action={{ route('book.update', $book->slug) }} method="POST" class="flex flex-col gap-4"
            enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col gap-2">
                <label for="title" class="font-bold">Title</label>
                <input type="text" name="title" id="title" class="border border-black p-2"
                    value="{{ $book->title }}" />
            </div>
            <div class="flex flex-col gap-2">
                <label for="description" class="font-bold">Description</label>
                <textarea type="text" name="description" id="description" class="border border-black p-2">
                {{ $book->description }}
            </textarea>
            </div>
            <div class="flex flex-col gap-2">
                <label for="page_count" class="font-bold">Pages</label>
                <input type="number" name="page_count" id="page_count" class="border border-black p-2"
                    value="{{ $book->page_count }}" />
            </div>
            <div class="flex flex-col gap-2">
                <label for="author" class="font-bold">Author</label>
                <input type="text" name="author" id="author" class="border border-black p-2"
                    value="{{ $book->author }}" />
            </div>
            <div class="flex flex-col gap-2">
                <label for="published_year" class="font-bold">Year</label>
                <input type="number" name="published_year" id="published_year" class="border border-black p-2"
                    value="{{ $book->published_year }}" />
            </div>
            <div class="flex flex-col gap-2">
                <label for="image" class="font-bold">Image</label>
                @if ($book->image)
                    <img src={{ asset('storage/book-images/' . $book->image) }} alt="{{ $book->title }}"
                        class="w-36 object-contain bg-gray-400" />
                @else
                    <p>No image</p>
                @endif
                <input type="file" accept="image/*" name="image" id="image" class="border border-black p-2" />
            </div>
            <button type="submit" class="p-4 bg-blue-800 text-white rounded-md font-semibold">Update</button>
        </form>
    </section>
@endsection
