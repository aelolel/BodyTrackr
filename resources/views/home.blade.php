<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>BodyTrackr - Home</title>
    <link rel="icon" href="/img/favicon.svg" type="image/svg+xml">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

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

    body {
        font-family: Raleway, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
        position: relative;
        overflow-x: hidden;
    }

        /* Navbar */
        .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        background: rgba(255, 255, 255, 0.8); /* Transparan */
        backdrop-filter: blur(10px); /* Efek blur */
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
        width: 150px;
        margin-left: 50px;
        filter: drop-shadow(0px 4px 6px rgba(0, 0, 0, 0.3));
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
        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
        color: black !important;
    }

/* Profil Pengguna */
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

/* Dropdown Profil */
.profile-dropdown {
    position: absolute;
    top: 40px;  /* Perubahan untuk memberikan jarak dari profil */
    right: 0;
    background-color: white;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Efek bayangan lebih halus */
    border-radius: 10px;
    width: 220px;
    z-index: 10;
    padding: 10px 0;
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.3s ease, visibility 0s linear 0.3s;
}

/* Menampilkan dropdown dengan transisi */
.profile-container [x-show="open"] {
    display: block;
    opacity: 1;
    visibility: visible;
    transition: opacity 0.3s ease;
}

/* Styling untuk list menu */
.profile-container .profile-dropdown ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

/* Setiap item menu */
.profile-container .profile-dropdown li {
    padding: 12px 20px;
    text-align: left;
    font-size: 14px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

/* Hover effect untuk setiap item */
.profile-container .profile-dropdown li:hover {
    background-color: #2c5945; /* Warna hijau */
    color: white; /* Teks menjadi putih */
    transform: translateX(5px); /* Efek geser ke kanan */
}

/* Tautan di dalam dropdown */
.profile-container .profile-dropdown li a {
    color: inherit;
    text-decoration: none;
    display: block;
    font-size: 14px;
    transition: color 0.3s ease;
}

/* Efek hover pada tautan */
.profile-container .profile-dropdown li a:hover {
    color: #fff;
}

/* Tombol Logout */
.profile-container .profile-dropdown li button {
    background: none;
    border: none;
    color: #2c5945;
    cursor: pointer;
    font-size: 14px;
    padding: 8px 20px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* Efek hover tombol logout */
.profile-container .profile-dropdown li button:hover {
    background-color: #2c5945;
    color: white;
}

/* Efek Hover untuk Dropdown */
.profile-container .profile-dropdown li:hover a {
    color: #fff; /* Mengubah warna teks menjadi putih pada hover */
}

/* Responsivitas: Navbar lebih kompak di mobile */
@media (max-width: 768px) {
    .profile-container {
        top: 10px; /* Memberikan sedikit ruang untuk mobile */
        right: 15px;
    }

    .profile-container .profile {
        font-size: 14px;
    }
}

    /* Logo */
    .logo img {
        width: 80px;
        margin-left: 50px;
        filter: drop-shadow(0px 4px 6px rgba(0, 0, 0, 0.3));
    }

    /* Hero Section */
    .hero {
        font-family: 'Raleway';
        width: 100%;
        height: 80vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 80px;
        background-color: #2c5945;
        color: white;
        padding: 20px;
        text-align: center;
    }

    .hero h1 {
        font-size: 3rem;
        font-weight: bold;
    }

    .hero p {
        font-size: 1.2rem;
        margin-top: 20px;
    }

    /* Stats Section */
    .stats {
        display: flex;
        justify-content: center;
        gap: 30px;
        margin-top: 50px;
    }

    .stat-box {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 200px;
        text-align: center;
    }

    .stat-box h3 {
        font-size: 2rem;
        color: #2c5945;
        margin-bottom: 10px;
    }

    .stat-box p {
        font-size: 1rem;
        color: #555;
    }

    .stat-box input {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        font-size: 1.2rem;
        border-radius: 5px;
        border: 1px solid #ccc;
        display: none; /* Hide input by default */
    }

    .stat-box button {
        margin-top: 10px;
        padding: 10px;
        font-size: 1rem;
        color: white;
        background-color: #2c5945;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .stat-box button:hover {
        background-color: #3b1f59;
    }

    /* Food and Sports Section */
    .features {
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
        margin-top: 50px;
    }

    .feature-box {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 250px;
        text-align: center;
        position: relative;
    }

    .feature-box img {
        width: 100%;
        height: 150px;
        border-radius: 10px;
        object-fit: cover;
    }

    .feature-box h3 {
        font-size: 1.2rem;
        font-weight: bold;
        margin-top: 10px;
    }

    .feature-box p {
        font-size: 1rem;
        color: #555;
    }

    .feature-box .plus-button {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background-color: white;
        color: black;
        font-size: 1.5rem;
        padding: 10px;
        border-radius: 50%;
        cursor: pointer;
        border: none;
    }

    /* Footer */
    footer {
        background-color: #2c5945;
        color: white;
        padding: 20px;
        text-align: center;
        margin-top: 50px;
    }

</style>

<body>
    <header class="navbar">
        <div class="logo">
            <img src="img/bodytrackr.png" alt="Fastourney Logo">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="home"class="active" >Home</a></li>
                <li><a href="food" >Food</a></li>
                <li><a href="sports">Sports</a></li>
                <li><a href="history">History</a></li>
            </ul>
        </nav>
        
        <!-- Profil Pengguna -->
        <div x-data="{ open: false }" class="profile-container">
            <div class="profile" @click="open = !open">
                <span id="username">Hello, {{ Auth::user()->name }}</span>
            </div>
        
            <div x-show="open" class="profile-dropdown">
                <ul>
                    <li><a href="/profile-settings">Profile Settings</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        </header>

    <!-- Hero Section -->
    <section class="hero">
        <div>
            <h1>Track Your Fitness Journey</h1>
            <p>Monitor calories burned, protein intake, and steps taken with ease!</p>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="stat-box">
            <h3>Calories Burned</h3>
            <p id="caloriesOutput">200 kcal</p>
            <button onclick="toggleInput('calories')">Update</button>
            <input type="number" id="calories" placeholder="Enter calories burned">
        </div>
        <div class="stat-box">
            <h3>Steps Taken</h3>
            <p id="stepsOutput">2,500 Steps</p>
            <button onclick="toggleInput('steps')">Update</button>
            <input type="number" id="steps" placeholder="Enter steps taken">
        </div>
        <div class="stat-box">
            <h3>Protein Intake</h3>
            <p id="proteinOutput">50g</p>
            <button onclick="toggleInput('protein')">Update</button>
            <input type="number" id="protein" placeholder="Enter protein intake">
        </div>
    </section>

    <!-- Food and Sports Recommendations -->
    <section class="features">
        <div class="feature-box">
            <img src="img/pizza.png" alt="Pizza">
            <h3>🍕 Pizza</h3>
            <p>Calories: 500</p>
            <button class="plus-button">+</button>
        </div>
        <div class="feature-box">
            <img src="img/soccer.png" alt="Soccer">
            <h3>⚽ Soccer</h3>
            <p>Calories: 500</p>
            <button class="plus-button">+</button>
        </div>
        <div class="feature-box">
            <img src="img/burger.png" alt="Burger">
            <h3>🍔 Burger</h3>
            <p>Calories: 450</p>
            <button class="plus-button">+</button>
        </div>
        <div class="feature-box">
            <img src="img/basketball.png" alt="Basketball">
            <h3>🏀 Basketball</h3>
            <p>Calories: 400</p>
            <button class="plus-button">+</button>
        </div>
    </section>

    @include("component.footer")

    <script>
        function toggleInput(type) {
            const inputElement = document.getElementById(type);
            const outputElement = document.getElementById(type + 'Output');

            if (inputElement.style.display === 'none' || inputElement.style.display === '') {
                inputElement.style.display = 'block'; // Show input
                outputElement.style.display = 'none'; // Hide output
            } else {
                inputElement.style.display = 'none'; // Hide input
                outputElement.style.display = 'block'; // Show output
                updateValue(type);
            }
        }

        function updateValue(type) {
            const inputElement = document.getElementById(type);
            const outputElement = document.getElementById(type + 'Output');

            if (type === 'calories') {
                outputElement.innerText = `${inputElement.value} kcal`;
            } else if (type === 'steps') {
                outputElement.innerText = `${inputElement.value} Steps`;
            } else if (type === 'protein') {
                outputElement.innerText = `${inputElement.value}g`;
            }
        }
    </script>
</body>
</html>
