<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
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

        .welcome-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* เพิ่มเติมเพื่อปรับแต่งสี */
        .welcome-container p {
            color: #555;
        }

        .welcome-container a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        .welcome-container a:hover {
            color: #217dbb;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
    <form action="{{ route('data.storeBook') }}" method="post">
        <h2>Add Book</h2>
        <label for="book_ID">Book ID:</label>
        <input type="text" name="id" id="book_id" required>
        <label for="book_title">Book Title:</label>
        <input type="text" name="title" id="book_title" required>
        <br>
        <label for="book_author">Author:</label>
        <input type="text" name="author" id="book_author" required>
        <br>
        <button type="submit">Add Book</button>
    </form>

    <hr> <!-- เพิ่มเส้นแบ่ง -->

    <!-- ฟอร์มเพื่อเพิ่มผู้ใช้ -->
    <form action="{{ route('data.storeUser') }}" method="post">
        <h2>Add User</h2>
        <label for="user_name">User Name:</label>
        <input type="text" name="name" id="user_name" required>
        <br>
        <label for="user_email">Email:</label>
        <input type="email" name="email" id="user_email" required>
        <br>
        <button type="submit">Add User</button>
    </form>
    </div>
</body>
</html>
