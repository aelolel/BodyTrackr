<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding-top: 30px;
        }

        h1 {
            font-size: 28px;
            color: #333;
        }

        h2 {
            font-size: 24px;
            color: #333;
            margin-top: 20px;
        }

        p {
            font-size: 18px;
            color: #555;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        li {
            background-color: #fff;
            margin: 10px 0;
            padding: 10px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        form {
            display: inline-block;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 5px;
            width: 250px;
        }

        button {
            padding: 10px 15px;
            border: none;
            background-color: #007BFF;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .form-container {
            margin-top: 30px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h3 {
            margin-bottom: 20px;
            font-size: 22px;
        }

        .logout-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat datang, Admin {{ Auth::user()->name }}!</h1>
        <p>Ini adalah dashboard untuk admin.</p>

        <div class="form-container">
            <h2>Daftar Turnamen:</h2>
            <ul>
                @foreach (session('tournaments', []) as $index => $tournament)
                    <li>
                        <span>{{ $tournament['name'] }}</span>
                        <div>
                            <!-- Update Tournament -->
                            <form action="{{ route('update-tournament', $index) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <input type="text" name="name" value="{{ $tournament['name'] }}" required>
                                <button type="submit">Update</button>
                            </form>
                            <!-- Delete Tournament -->
                            <form action="{{ route('delete-tournament', $index) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Add New Tournament Form -->
        <div class="form-container">
            <h3>Tambah Turnamen Baru</h3>
            <form action="{{ route('create-tournament') }}" method="POST">
                @csrf
                <input type="text" name="name" placeholder="Nama Turnamen" required>
                <button type="submit">Tambah Turnamen</button>
            </form>
        </div>

        <!-- Logout Form -->
        <form action="{{ route('logout') }}" method="POST" style="margin-top: 30px;">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</body>
</html>
