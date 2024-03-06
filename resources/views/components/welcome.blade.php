<x-guest-layout>
    <x-slot name="slot">
        <div style="background-image: url('https://i.pinimg.com/originals/b2/52/28/b25228428fc9002e6eaf7d8a7941f282.jpg'); background-size: cover; background-position: center;" class="min-h-screen flex items-center justify-center">
            <div class="text-center">
                <h2 class="text-3xl font-semibold text-white leading-tight mb-4">
                    I Loan ยินดีต้อนรับ
                </h2>
                <a href="{{ route('book.index') }}" class="text-blue-500 hover:underline">เลือกดูหนังสือ</a>
            </div>
        </div>
    </x-slot>
</x-guest-layout>

<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .text-center {
        text-align: center;
        margin-top: 50px;
    }

    .text-blue-500 {
        color: #1a56db;
    }

    .text-blue-500:hover {
        text-decoration: underline;
    }
</style>
