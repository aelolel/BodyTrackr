<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>BodyTrackr</title>
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

    /* Custom Sport Form */
    .custom-sport-form {
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

    .custom-sport-form input {
        width: 80%;
        padding: 8px;
        margin: 5px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 14px;
    }

    .custom-sport-form input[type="file"] {
        font-size: 12px;
    }

    .custom-sport-form input:focus {
        outline: none;
        border-color: #2c5945;
    }

    .custom-sport-form button {
        background-color: #2c5945;
        color: white;
        padding: 8px 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        transition: background-color 0.3s ease;
    }

    .custom-sport-form button:hover {
        background-color: #1e3a2e;
    }

    /* Footer */
    footer {
        margin-top: auto;
        width: 100%;
        color: white;
        text-align: center;
        padding: 20px 0;
        bottom: 0;
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
            <img src="img/bodytrackr.png" alt="BodyTrackr Logo">
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="home">Home</a></li>
                <li><a href="food">Food</a></li>
                <li><a href="sports" class="active">Sports</a></li>
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
            <h1>Sports Recommendations</h1>
        </div>
        <div class="search-container">
            <input type="text" id="sports-search" class="search-bar" placeholder="Search for sport..." oninput="searchSport()">
        </div>
        <div class="features">
            <div class="custom-sport-form">
                <h3>Add Custom Sport</h3>
                <input type="text" id="custom-sport-name" placeholder="Sport Name" required>
                <input type="number" id="custom-sport-calories" placeholder="Calories" required min="0">
                <input type="file" id="custom-sport-image" accept="image/*">
                <button onclick="addCustomSport()">Add Sport</button>
            </div>
            <div class="feature-box">
                <img src="img/soccer.png" alt="Soccer" style="width:100%; height:auto; border-radius: 10px;">
                <h3>⚽ Soccer</h3>
                <p>Calories: 500</p>
                <button class="plus-button">+</button>
            </div>
            <div class="feature-box">
                <img src="img/basketball.png" alt="Basketball" style="width:100%; height:auto; border-radius: 10px;">
                <h3>🏀 Basketball</h3>
                <p>Calories: 450</p>
                <button class="plus-button">+</button>
            </div>
            <div class="feature-box">
                <img src="img/tennis.png" alt="Tennis" style="width:100%; height:auto; border-radius: 10px;">
                <h3>🎾 Tennis</h3>
                <p>Calories: 350</p>
                <button class="plus-button">+</button>
            </div>
            <div class="feature-box">
                <img src="img/swimming.png" alt="Swimming" style="width:100%; height:auto; border-radius: 10px;">
                <h3>🏊 Swimming</h3>
                <p>Calories: 400</p>
                <button class="plus-button">+</button>
            </div>
            <div class="feature-box">
                <img src="img/running.png" alt="Running" style="width:100%; height:auto; border-radius: 10px;">
                <h3>🏃 Running</h3>
                <p>Calories: 300</p>
                <button class="plus-button">+</button>
            </div>
            <div class="feature-box">
                <img src="img/cycling.png" alt="Cycling" style="width:100%; height:auto; border-radius: 10px;">
                <h3>🚴 Cycling</h3>
                <p>Calories: 350</p>
                <button class="plus-button">+</button>
            </div>
            <div class="feature-box">
                <img src="img/boxing.png" alt="Boxing" style="width:100%; height:auto; border-radius: 10px;">
                <h3>🥊 Boxing</h3>
                <p>Calories: 600</p>
                <button class="plus-button">+</button>
            </div>
            <div class="feature-box">
                <img src="img/golf.png" alt="Golf" style="width:100%; height:auto; border-radius: 10px;">
                <h3>⛳ Golf</h3>
                <p>Calories: 250</p>
                <button class="plus-button">+</button>
            </div>
        </div>
    </section>

    <footer>
        @include('component.footer')
    </footer>

    <script>
        // Load custom sports from localStorage on page load
        document.addEventListener('DOMContentLoaded', () => {
            const customSports = JSON.parse(localStorage.getItem('customSports')) || [];
            customSports.forEach(sport => addCustomSportToDOM(sport.name, sport.calories, sport.image, sport.id));
        });

        function addCustomSport() {
            const sportNameInput = document.getElementById('custom-sport-name');
            const caloriesInput = document.getElementById('custom-sport-calories');
            const imageInput = document.getElementById('custom-sport-image');
            const sportName = sportNameInput.value.trim();
            const calories = parseInt(caloriesInput.value);
            const imageFile = imageInput.files[0];

            if (sportName && calories >= 0) {
                const id = Date.now().toString(); // Unique ID for each sport item
                let imageUrl = 'img/custom-sport.png'; // Default image

                if (imageFile) {
                    imageUrl = URL.createObjectURL(imageFile);
                }

                // Add to DOM
                addCustomSportToDOM(sportName, calories, imageUrl, id);

                // Save to localStorage
                const customSports = JSON.parse(localStorage.getItem('customSports')) || [];
                customSports.push({ id, name: sportName, calories, image: imageUrl });
                localStorage.setItem('customSports', JSON.stringify(customSports));

                // Clear inputs
                sportNameInput.value = '';
                caloriesInput.value = '';
                imageInput.value = '';
            } else {
                alert('Please enter a valid sport name and calories value.');
            }
        }

        function addCustomSportToDOM(sportName, calories, imageUrl, id) {
            const featureContainer = document.querySelector('.features');
            const customSportBox = document.createElement('div');
            customSportBox.classList.add('feature-box');
            customSportBox.setAttribute('data-id', id);
            customSportBox.innerHTML = `
                <img src="${imageUrl}" alt="${sportName}" style="width:100%; height:auto; border-radius: 10px;">
                <h3>${sportName}</h3>
                <p>Calories: ${calories}</p>
                <button class="plus-button">+</button>
                <button class="edit-button" onclick="editCustomSport('${id}')">✎</button>
                <button class="delete-button" onclick="deleteCustomSport('${id}')">✕</button>
            `;
            // Insert after the custom sport form
            featureContainer.insertBefore(customSportBox, featureContainer.children[1]);
        }

        function deleteCustomSport(id) {
            // Remove from DOM
            const sportBox = document.querySelector(`.feature-box[data-id="${id}"]`);
            if (sportBox) {
                sportBox.remove();
            }

            // Remove from localStorage
            let customSports = JSON.parse(localStorage.getItem('customSports')) || [];
            customSports = customSports.filter(sport => sport.id !== id);
            localStorage.setItem('customSports', JSON.stringify(customSports));
        }

        function editCustomSport(id) {
            const customSports = JSON.parse(localStorage.getItem('customSports')) || [];
            const sport = customSports.find(s => s.id === id);
            if (!sport) return;

            // Populate form with existing data
            const sportNameInput = document.getElementById('custom-sport-name');
            const caloriesInput = document.getElementById('custom-sport-calories');
            sportNameInput.value = sport.name;
            caloriesInput.value = sport.calories;

            // Remove old sport item
            deleteCustomSport(id);

            // Optional: Scroll to form for better UX
            document.querySelector('.custom-sport-form').scrollIntoView({ behavior: 'smooth' });
        }

        function searchSport() {
            const query = document.getElementById("sports-search").value.toLowerCase();
            const sportItems = document.querySelectorAll('.feature-box');
            const customForm = document.querySelector('.custom-sport-form');
            
            let matchedItems = [];
            let hiddenItems = [];

            sportItems.forEach(item => {
                const sportName = item.querySelector('h3').textContent.toLowerCase();
                
                if (sportName.includes(query)) {
                    matchedItems.push(item);
                } else {
                    hiddenItems.push(item);
                }
            });

            // Clear container and add custom form first
            const featureContainer = document.querySelector('.features');
            featureContainer.innerHTML = '';
            featureContainer.appendChild(customForm);

            // Add matched items
            matchedItems.forEach(item => featureContainer.appendChild(item));
            // Add hidden items
            hiddenItems.forEach(item => featureContainer.appendChild(item));
        }
    </script>
</body>
</html>