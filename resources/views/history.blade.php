<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <title>BodyTrackr - History</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="icon" href="/img/favicon.svg" type="image/svg+xml" />
    <style>
        /* ===== Mobile Responsive ===== */
        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
            }
            .nav-links {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 60px;
                left: 0;
                width: 100%;
                background: white;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            }
            .nav-links.show {
                display: flex;
            }
        }

        html, body {
            height: 100%; /* Ensure full height for flex */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            font-family: Raleway, sans-serif;
            background-color: #f5f5f5;
            overflow-x: hidden;
        }

        body {
            flex: 1 0 auto;
            position: relative;
        }

        .header {
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px 0;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.8); /* Transparent */
            backdrop-filter: blur(10px); /* Blur effect */
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 100;
            padding: 15px;
        }

        nav a.active {
            font-weight: 500;
            text-decoration: underline;
            color: black;
        }

        /* Logo */
        .logo img {
            width: 80px;
            margin-left: 50px;
            filter: drop-shadow(0px 4px 6px rgba(0,0,0,0.3));
        }

        .hero {
            font-family: 'Raleway';
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            margin-bottom: -60px;
        }

        .nav-links {
            list-style: none;
            display: flex;
            gap: 30px;
            margin: 0;
            padding: 0;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            align-items: center;
        }

        .nav-links li {
            display: inline;
        }

        nav a {
            font-family: 'Raleway';
            font-weight: 300;
            text-decoration: none;
            color: black;
            display: inline-block;
            transition: color 0.3s ease-in-out, transform 0.3s ease-in-out, text-shadow 0.3s ease-in-out;
        }

        nav a:hover {
            font-weight: 500;
            text-decoration: underline;
            transform: scale(1.05);
            text-shadow: 1px 1px 5px rgba(0,0,0,0.2);
            color: black !important;
        }

        /* Profile */
        .profile-container {
            position: absolute;
            top: 30px;
            right: 70px;
            display: flex;
            align-items: center;
            cursor: pointer;
            font-weight: 500;
            color: #2c5945;
        }

        .profile-container .profile {
            display: flex;
            align-items: center;
            font-size: 18px;
        }

        .profile-container #username {
            margin-right: 10px;
            font-size: 16px;
        }

        .profile-dropdown {
            position: absolute;
            top: 40px;
            right: 0;
            background-color: white;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            border-radius: 10px;
            width: 220px;
            z-index: 10;
            padding: 10px 0;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s ease, visibility 0s linear 0.3s;
        }
        .profile-container [x-show="open"] {
            display: block;
            opacity: 1;
            visibility: visible;
            transition: opacity 0.3s ease;
        }
        .profile-dropdown ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .profile-dropdown li {
            padding: 12px 20px;
            font-size: 14px;
            text-align: left;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .profile-dropdown li:hover {
            background-color: #2c5945;
            color: white;
            transform: translateX(5px);
        }
        .profile-dropdown li a {
            color: inherit;
            text-decoration: none;
            display: block;
            font-size: 14px;
            transition: color 0.3s ease;
        }
        .profile-dropdown li a:hover {
            color: #fff;
        }
        .profile-dropdown li button {
            background: none;
            border: none;
            color: #2c5945;
            cursor: pointer;
            font-size: 14px;
            padding: 8px 20px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .profile-dropdown li button:hover {
            background-color: #2c5945;
            color: white;
        }
        .profile-dropdown li:hover a {
            color: #fff;
        }

        @media (max-width: 768px) {
            .profile-container {
                top: 10px;
                right: 15px;
            }
            .profile-container .profile {
                font-size: 14px;
            }
        }

        .hero {
            position: relative;
            width: 70%;
            height: 100px;
            margin: 100px auto 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #2c5945;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }

        .hero-content {
            text-align: center;
            color: white;
        }

        .hero-content h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        /* History Table Styles */
        .history-table {
            margin: 50px auto;
            width: 90%;
            max-width: 1200px;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .history-table th, .history-table td {
            padding: 12px 20px;
            text-align: left;
        }

        .history-table th {
            background-color: #4CAF50;
            color: white;
        }

        .history-table td {
            border-top: 1px solid #ddd;
        }

        .history-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .history-table tr:hover {
            background-color: #f1f1f1;
        }

        /* Footer */
        footer {
            margin-top: auto;
            width: 100%;
            color: white;
            text-align: center;
            padding: 20px 0;
            background-color: #2c5945;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <img src="img/bodytrackr.png" alt="Fastourney Logo" />
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="home">Home</a></li>
                <li><a href="food">Food</a></li>
                <li><a href="sports">Sports</a></li>
                <li><a href="history" class="active">History</a></li>
            </ul>
        </nav>
        <div x-data="{ open: false }" class="profile-container">
            <div class="profile" @click="open = !open">
                <span id="username">Hello, {{ Auth::user()->name }}</span>
            </div>
            <div x-show="open" class="profile-dropdown">
                <ul>
                    <li><a href="/profile-settings">Profile Settings</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">@csrf<button type="submit">Logout</button></form>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <section class="hero">
        <div class="hero-content">
            <h1>Your Activity History</h1>
        </div>
    </section>
    <div class="history-table-container">
        <table class="history-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Food Intake</th>
                    <th>Calories Consumed</th>
                    <th>Exercise</th>
                    <th>Calories Burned</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($history as $item)
                    <tr>
                        <td>{{ $item['date'] ?? ($item->created_at ?? 'N/A') }}</td>
                        <td>{{ $item['food_intake'] ?? 'N/A' }}</td>
                        <td>{{ is_numeric($item['calories_consumed']) ? $item['calories_consumed'].' kcal' : 'N/A' }}</td>
                        <td>{{ $item['exercise'] ?? 'N/A' }}</td>
                        <td>{{ is_numeric($item['calories_burned']) ? $item['calories_burned'].' kcal' : 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <footer>
        @include('component.footer')
    </footer>
</body>
</html>

