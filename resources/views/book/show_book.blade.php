<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>I Loan</title>
    </head>
    <body>
        <div class="grid grid-cols-3 gap-8 bg-gray-100 p-8">
            @foreach($books as $book)
                <div class="product-item bg-white p-6 rounded shadow-md transition-transform duration-300 hover:shadow-lg transform hover:scale-105 mb-8">
                    <div class="flex flex-col items-center">
                        <div class="text-gray-700 mb-2"><span class="content">Book ID:</span> {{ $book->book_id }}</div>
                        <div class="text-green-500 mb-2"><span class="content">Title:</span> {{ $book->book_title }}</div>
                        <div class="text-blue-500 mb-2"><span class="content">Genre:</span> {{ $book->genre }}</div>
                        <div class="text-gray-700 mb-2">
                            <img src="{{ $book->image_path }}" alt="Book Image" style="max-width: 150px;">
                        </div>
                        
                        <!-- เพิ่มปุ่มยืม -->
                       <!-- <form action="{{ route('loan.borrow', ['book_id' => $book->book_id]) }}" method="post">
                             @csrf
                             <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Borrow</button>
                        </form>-->
                        <div class="flex justify-around mt-4">
                    <form action="{{ route('book.show', ['book' => $book->book_id]) }}" method="get">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">View Details</button>
                    </form>

                    <form action="{{ route('cart.addToCart', ['book_id' => $book->book_id]) }}" method="post">
                        @csrf
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-blue-700">เพิ่มลงตะกร้า</button>
                    </form>
                </div>
                    </div>
                </div>
            @endforeach
        </div>
    </body>
    </html>
</x-app-layout>
