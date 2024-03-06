<x-app-layout>
    <div class="container mx-auto mt-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Left Section: Book Image and Details -->
            <div class="md:col-span-2 bg-white p-8 rounded shadow-md">
                <h1 class="text-3xl font-semibold mb-4">{{ $book->book_title }}</h1>
                <p class="text-blue-500 mt-4 text-lg">Genre: {{ $book->genre }}</p>
                <p class="text-gray-700 text-lg">Author: {{ $book->author }}</p>
                <div class="mt-4">
                    <img src="{{ $book->image_path }}" alt="Book Image" style="width: 300px; height: auto;" class="mx-auto rounded-lg shadow-md">
                </div>
                <p class="text-green-700 mt-4 text-lg">Available Quantity: {{ $book->book_status }}</p>

                <!-- Add more details as needed -->

                <!-- Button to go back to the list -->
                <div class="flex justify-between mt-4">
                    <form action="{{ route('book.index') }}">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">กลับหน้าเลือกหนังสือ</button>
                    </form>

                    <form action="{{ route('cart.addToCart', ['book_id' => $book->book_id]) }}" method="post">
                        @csrf
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-blue-700">เพิ่มลงตะกร้า</button>
                    </form>
                </div>
            </div>


           <!-- Center Section: All Reviews -->
           

            <!-- Right Section: Review Book -->
            <div class="md:col-span-1 bg-white p-8 rounded shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Review Book</h2>
    <form action="{{ route('reviews.store', ['book_id' => $book->book_id]) }}" method="post">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->book_id }}">
        <div class="mb-4">
            <label for="review_text" class="block text-gray-700 text-sm font-bold mb-2">Review:</label>
            <textarea id="review_text" name="review_text" rows="4" class="w-full p-2 border rounded-md"></textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Submit</button>
    </form>
    
</div>
        </div>
    </div>
</x-app-layout>
