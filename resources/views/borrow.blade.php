{{-- resources/views/borrow.blade.php --}}
<x-app-layout>
    <html lang="en">
    <head>
        <!-- ... -->
    </head>
    <body>
        <div class="grid grid-cols-3 gap-8 bg-gray-100 p-8">
            @if($borrowedBooks->isNotEmpty())
                {{-- Show borrowed books --}}
                @foreach($borrowedBooks as $borrowedBook)
                    <div class="product-item bg-white p-6 rounded shadow-md transition-transform duration-300 hover:shadow-lg transform hover:scale-105 mb-8">
                        <div class="flex flex-col items-center">
                            <div class="text-gray-700 mb-2"><span class="content">Book ID:</span> {{ $borrowedBook->book->book_id }}</div>
                            <div class="text-green-500 mb-2"><span class="content">Title:</span> {{ $borrowedBook->book->book_title }}</div>
                            <div class="text-blue-500 mb-2"><span class="content">Genre:</span> {{ $borrowedBook->book->genre }}</div>
                            <div class="text-gray-700 mb-2"><span class="content">Borrowed At:</span> {{ $borrowedBook->borrowed_at }}</div>
                            <div class="text-gray-700 mb-2"><span class="content">Returned At:</span> {{ $borrowedBook->due_at }}</div>
                        </div>
                    </div>
                @endforeach
            @else
                {{-- Show empty borrow page --}}
                <p>No books have been borrowed.</p>
            @endif
        </div>
    </body>
    </html>
</x-app-layout>
