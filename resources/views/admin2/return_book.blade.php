<x-app-layout>
    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-semibold mb-4">Borrowed Books</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($borrowedBooks as $borrowedBook)
                @php
                    $book = $books->find($borrowedBook->book_id); // หาข้อมูลหนังสือที่เกี่ยวข้อง
                @endphp
                <div class="book-card bg-white p-4 rounded-lg shadow-md">
                    <img src="{{ $book->image_path }}" alt="{{ $book->book_title }}" class="w-full h-48 object-cover mb-4 rounded-md">
                    <p class="text-lg font-semibold">{{ $book->book_title }}</p>
                    <p class="text-gray-600">Borrowed by {{ $borrowedBook->user->name }}</p>
                    <form id="returnBookForm" action="{{ route('return.book', ['borrow_id' => $borrowedBook->borrow_id]) }}" method="post">
            @csrf
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Confirm Return</button>
        </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>