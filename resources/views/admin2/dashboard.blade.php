<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f5f8; /* สีพื้นหลังสบายตา */
            color: #333;
            text-align: center;
            padding: 20px;
            margin: 0;
        }

        h1 {
            color: #3498db; /* สีข้อความหัวข้อ */
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left; /* จัดตำแหน่งข้อความทางซ้าย */
        }

        li p {
            color: #555;
            margin: 5px 0;
        }

        li a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        li a:hover {
            color: #217dbb;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left; /* จัดตำแหน่งข้อความทางซ้าย */
        }

        form label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        form input {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        form button {
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #217dbb;
        }

        div[style="color: green;"] {
            color: green;
        }

        .book-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 10px;
        }

        .book-card {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
            width: calc(20% - 12px);
        }

        .book-card p {
            color: #555;
            margin: 5px 0;
            font-size: 14px;
        }

        .book-card img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-top: 5px;
        }
    </style>
</head>
<body>

    <div>
        <h1>Welcome to Admin Dashboard</h1>

        <!-- แสดงข้อมูลที่มาจาก Borrow -->
        <h2>Borrowed Books:</h2>
        <form action="{{ route('admin.retrun') }}" method="get">
    @csrf
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-green-700">Go to Return Page</button>
</form>
        

        <!-- เพิ่มฟอร์มสำหรับเพิ่มข้อมูลหนังสือ -->
        <form action="{{ route('admin.addBook') }}" method="post">
            @csrf

            <!-- ฟิลด์ซ่อนสำหรับ book_id ไม่ต้องระบุค่าในฟอร์มเนื่องจากมีการกำหนดให้ AUTO_INCREMENT ในฐานข้อมูล -->
            <label for="book_id">ID:</label>
            <input type="int" name="book_id" id="book_title" required>

            <label for="book_title">Book Title:</label>
            <input type="text" name="book_title" id="book_title" required>

            <label for="author">Author:</label>
            <input type="text" name="author" id="author" required>

            <label for="genre">Genre:</label>
            <input type="text" name="genre" id="genre">

            <label for="image_path">Book Image URL:</label>
            <input type="text" name="image_path" id="book_image" required>

            <button type="submit">Add Book</button>
        </form>

        <!-- แสดงข้อความสถานะ (ถ้ามี) -->
        @if(session('success'))
            <div style="color: green;">
                {{ session('success') }}
            </div>
        @endif

        <!-- แสดงข้อมูลหนังสือ -->
        <h2>All Books:</h2>
        <div class="book-container">
            @foreach($books as $book)
                <div class="book-card">
                    <p>{{ $book->book_title }} by {{ $book->author }} (Genre: {{ $book->genre }})</p>
                    <img src="{{ $book->image_path }}" alt="Book Image">
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>
