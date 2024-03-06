{{-- resources/views/cart.blade.php --}}
<x-app-layout>
    <html lang="en">
    <head>
        <!-- ... -->
    </head>
    <body>
        <div class="grid grid-cols-3 gap-8 bg-gray-100 p-8">
            @if($loanItems->isNotEmpty())
                {{-- Show loaned books --}}
                @foreach($loanItems as $loanItem)
                    <div class="product-item bg-white p-6 rounded shadow-md transition-transform duration-300 hover:shadow-lg transform hover:scale-105 mb-8">
                        <div class="flex flex-col items-center">
                            <div class="text-gray-700 mb-2"><span class="content">Book ID:</span> {{ $loanItem->book->book_id }}</div>
                            <div class="text-green-500 mb-2"><span class="content">Title:</span> {{ $loanItem->book->book_title }}</div>
                            <div class="text-blue-500 mb-2"><span class="content">Genre:</span> {{ $loanItem->book->genre }}</div>
                            <div class="text-gray-700 mb-2"><span class="content">Borrowed At:</span> {{ $loanItem->borrowed_at }}</div>
                            <div class="text-red-700 mb-2"><span class="content">*******คืนภายใน 7 วัน*******</span></div>

                            <!-- ปุ่มยืนยันการยืม -->
                            <form action="{{ route('cart.confirmBorrow', ['loan_id' => $loanItem->id]) }}" method="post">
    @csrf
    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">Confirm Borrow</button>
</form>

<!-- ปุ่มยกเลิก -->
<form action="{{ route('cart.cancelBorrow', ['loan_id' => $loanItem->id]) }}" method="post">
    @csrf
    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-700">Cancel</button>
</form>
                        </div>
                    </div>
                @endforeach
            @else
                {{-- Show empty cart page --}}
                <p>No books in the cart.</p>
            @endif
        </div>
    </body>
    </html>
</x-app-layout>
