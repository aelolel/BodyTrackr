<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>BodyTrackr</title>
    <link rel="icon" href="/img/favicon.svg" type="image/svg+xml">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        function addToHistory(foodName, protein) {
            const date = new Date().toISOString().split('T')[0]; // Mendapatkan tanggal saat ini dalam format YYYY-MM-DD

            fetch('/api/history/add-food', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // Pastikan csrf token disertakan
                },
                body: JSON.stringify({
                    food_name: foodName,
                    protein_content: protein,
                    date: date // Kirim tanggal saat ini
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(`"${foodName}" telah ditambahkan ke history.`);
                } else {
                    alert('Gagal menambahkan ke history: ' + data.message);
                }
            })
            .catch(error => {
                alert('Error menambah history: ' + error.message);
            });
        }

        function addCustomFood() {
            const foodName = document.getElementById('custom-food-name').value;
            const proteinContent = document.getElementById('custom-food-protein').value;
            const foodImage = document.getElementById('custom-food-image').files[0];

            // Implementasi untuk menambahkan makanan kustom ke database
            // Anda bisa menambahkan logika untuk mengupload gambar jika diperlukan

            alert(`Custom food "${foodName}" with ${proteinContent}g protein added!`);
        }

        function searchFood() {
            const query = document.getElementById('food-search').value.toLowerCase();
            const featureBoxes = document.querySelectorAll('.feature-box');

            featureBoxes.forEach(box => {
                const foodName = box.querySelector('h3').innerText.toLowerCase();
                if (foodName.includes(query)) {
                    box.style.display = 'block';
                } else {
                    box.style.display = 'none';
                }
            });
        }
    </script>
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

    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: Raleway, sans-serif;
        background-color: #f5f5f5;
        position: relative;
        overflow-x: hidden;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .header {
        background: white;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 10px 0;
    }

    /* Search Bar Style */
    .search-container {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .search-bar {
        width: 70%;
        padding: 10px;
        font-size: 16px;
        border-radius: 20px;
        border: 1px solid #ccc;
        background-color: #fff;
        transition: all 0.3s ease;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .search-bar:focus {
        outline: none;
        border-color: #2c5945;
        box-shadow: 0 0 5px rgba(44, 89, 69, 0.6);
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
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
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
        filter: drop-shadow(0px 4px 6px rgba(0, 0, 0, 0.3));
    }

    .hero {
        font-family: 'Raleway';
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        margin-bottom: 50px;
        flex: 1;
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
        top: 40px;
        right: 0;
        background-color: white;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
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

    .profile-container .profile-dropdown ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .profile-container .profile-dropdown li {
        padding: 12px 20px;
        text-align: left;
        font-size: 14px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .profile-container .profile-dropdown li:hover {
        background-color: #2c5945;
        color: white;
        transform: translateX(5px);
    }

    .profile-container .profile-dropdown li a {
        color: inherit;
        text-decoration: none;
        display: block;
        font-size: 14px;
        transition: color 0.3s ease;
    }

    .profile-container .profile-dropdown li a:hover {
        color: #fff;
    }

    .profile-container .profile-dropdown li button {
        background: none;
        border: none;
        color: #2c5945;
        cursor: pointer;
        font-size: 14px;
        padding: 8px 20px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .profile-container .profile-dropdown li button:hover {
        background-color: #2c5945;
        color: white;
    }

    .profile-container .profile-dropdown li:hover a {
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

    /* Hero Section */
    .hero {
        position: relative;
        border-radius: 30px;
        margin: 100px auto 50px auto;
        width: 70%;
        display: flex;
        padding: 38px;
        justify-content: center;
        align-items: center;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
        gap: 20px;
        color: #fff;
        filter: drop-shadow(0px 4px 6px rgba(0, 0, 0, 0.3));
        overflow: visible;
    }

    /* Hero Content */
    .hero-content {
        flex: 1;
        max-width: 60%;
        color: #2c5945;
        z-index: 1;
    }

    .hero-content h1 {
        font-size: 2.5rem;
        font-weight: bold;
        margin-top: 0;
    }

    .features {
        color: black;
        display: flex;
        justify-content: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .feature-box {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
        width: 250px;
        height: 250px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-between;
        position: relative;
        visibility: visible;
    }

    .feature-box img {
        height: 50%;
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
        margin-top: 0px;
    }

    .feature-box:hover {
        transform: translateY(-5px);
    }

    /* Custom Food Form */
    .custom-food-form {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 250px;
        height: 250px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        position: relative;
    }

    .custom-food-form input {
        width: 80%;
        padding: 8px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    .custom-food-form input[type="file"] {
        font-size: 12px;
    }

    .custom-food-form input:focus {
        outline: none;
        border-color: #2c5945;
    }

    .custom-food-form button {
        background-color: #2c5945;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .custom-food-form button:hover {
        background-color: #1e3a2e;
    }

    /* Footer */
    footer {
        margin-top: auto;
        width: 100%;
        color: white;
        text-align: center;
        padding: 20px 0;
    }

    /* Button plus */
    .plus-button {
        position: absolute;
        bottom: 10px;
        right: 10px;
        background-color: white;
        color: black;
        font-size: 1.5rem;
        padding: 5px;
        border-radius: 50%;
        cursor: pointer;
        border: none;
    }

    /* Delete and Edit Buttons */
    .delete-button, .edit-button {
        position: absolute;
        bottom: 10px;
        background-color: white;
        color: black;
        font-size: 1rem;
        padding: 5px;
        border-radius: 50%;
        cursor: pointer;
        border: none;
        transition: background-color 0.3s ease;
    }

    .delete-button {
        right: 40px;
    }

    .edit-button {
        right: 70px;
    }

    .delete-button:hover {
        background-color: #ff4d4d;
        color: white;
    }

    .edit-button:hover {
        background-color: #2c5945;
        color: white;
    }
</style>

<body>
    <header class="navbar">
        <div class="logo">
            <img src="img/bodytrackr.png" alt="Fastourney Logo">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="home">Home</a></li>
                <li><a href="food" class="active">Food</a></li>
                <li><a href="sports">Sports</a></li>
                <li><a href="history">History</a></li>
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
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Food Recommendations</h1>  
        </div>
        <div class="search-container">
            <input type="text" id="food-search" class="search-bar" placeholder="Search for food..." oninput="searchFood()">
        </div>
        <div class="features">
            <div class="custom-food-form">
                <h3>Add Custom Food</h3>
                <input type="text" id="custom-food-name" placeholder="Food Name" required>
                <input type="number" id="custom-food-protein" placeholder="Protein (g)" required min="0">
                <input type="file" id="custom-food-image" accept="image/*">
                <button onclick="addCustomFood()">Add Food</button>
            </div>
            <div class="feature-box">
                <img src="img/pizza.png" alt="Pizza" style="width:100%; height:auto; border-radius: 10px;">
                <h3>🍕 Pizza</h3>
                <p>Protein: 25g</p> 
                <button class="plus-button" onclick="addToHistory('Pizza', 25)">+</button>
            </div>
            <div class="feature-box">
                <img src="img/burger.png" alt="Burger" style="width:100%; height:auto; border-radius: 10px;">
                <h3>🍔 Burger</h3>
                <p>Protein: 20g</p> 
                <button class="plus-button" onclick="addToHistory('Burger', 20)">+</button>
            </div>
            <div class="feature-box">
                <img src="img/sushi.png" alt="Sushi" style="width:100%; height:auto; border-radius: 10px;">
                <h3>🍣 Sushi</h3>
                <p>Protein: 30g</p> 
                <button class="plus-button" onclick="addToHistory('Sushi', 30)">+</button>
            </div>
            <div class="feature-box">
                <img src="img/pasta.png" alt="Pasta" style="width:100%; height:auto; border-radius: 10px;">
                <h3>🍝 Pasta</h3>
                <p>Protein: 15g</p> 
                <button class="plus-button" onclick="addToHistory('Pasta', 15)">+</button>
            </div>
            <div class="feature-box">
                <img src="img/steak.png" alt="Steak" style="width:100%; height:auto; border-radius: 10px;">
                <h3>Steak</h3>
                <p>Protein: 25g</p> 
                <button class="plus-button" onclick="addToHistory('Pasta', 25)">+</button>
            </div>
        </div>
    </section>
    <footer>
        @include('component.footer')
    </footer>
</body>
