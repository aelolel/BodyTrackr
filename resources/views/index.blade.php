<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BodyTrackr</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="icon" href="/img/favicon.svg" type="image/svg+xml">
</head>

<style> 
    /* ===== Mobile Responsive ===== */
@media (max-width: 768px) {
    .navbar {
        padding: 15px 20px;
    }
}

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
    position: relative;
    overflow-x: hidden;
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
    width:80px;
    margin-left: 50px;
    filter: drop-shadow(0px 4px 6px rgba(0, 0, 0, 0.3));
}

.hero {
    font-family: 'Raleway';
    width: 100%;
    height: 80vh;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    margin-bottom: -60px;
}


.icons {
    display: flex;
    align-items: center;
    gap: 15px;
    margin-right: 60px;
    right: 20px; /* Pastikan posisi di kanan */
    margin-top: 20px;
}

.hero h1 {
    margin-top: 10px;
    font-size: 48px;
    font-weight: 800;
    color: #2c5945;
    max-width: 600px;
    line-height: 1.2;
    text-decoration: underline;
}

.hero p {
    font-size: 18px;
    color: #555;
    max-width: 500px;
    margin-top: 10px;
}

.cta {
    display: flex;
    margin-top: 20px;
}

.cta a {
    background-color: #2c5945;
    color: white !important;
    padding: 12px 20px;
    font-size: 16px;
    border: none;
    border-radius:30px;
    cursor: pointer;
}


.image-container {
    max-width: 500px;
    border-radius: 10px;
    overflow: hidden; /* Agar sudut video ikut melengkung */
    filter: drop-shadow(0px 4px 6px rgba(0, 0, 0, 0.4));

}

.image-container img {
    width: 100%;
    height: auto;
    display: block;
}

.floating-elements {
    position: absolute;
    width: 90px;
    height: 90px;
    background: #2c5945  ;
    border-radius: 50%;
    animation: floatAnimation 6s infinite alternate ease-in-out;
    z-index: 2;
    opacity: 0.6;
}

.floating-elements:nth-child(2) {
    width: 40px;
    height: 40px;
    background: #2c5945  ;
    animation-duration: 8s;
}

.floating-elements:nth-child(3) {
    width: 60px;
    height: 60px;
    background: #2c5945  ;
    animation-duration: 8s;
}

/* Animasi Gerakan Floating */
@keyframes floatAnimation {
    0% {
        transform: translateY(0px) translateX(0px);
    }
    100% {
        transform: translateY(-20px) translateX(10px);
    }
}

</style>

<body>
    <header class="navbar">
        <div class="logo">
            <img src="img/bodytrackr.png" alt="BodyTrackr Logo">
        </div>
    </header>

    <div class="floating-elements" style="top: 15%; left: 10%;"></div>
    <div class="floating-elements" style="top: 60%; left: 90%;"></div>
    <div class="floating-elements" style="top: 70%; left: 70%;"></div>
    
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>Hidup Lebih Sehat Dengan BodyTrackr!</h1>
            <p>Pantau asupan makanan, kalori yang terbakar, dan perjalanan kesehatanmu dengan mudah. Ciptakan gaya hidup sehat yang terkontrol dan terukur.</p>
            <div class="cta">
                <a href="login">Coba Sekarang</a>
            </div>
        </div>
        <div class="image-container">
            <img src="img/screen.png" alt="Bodytrackr Web" />
        </div>
        
    </section>

    @include('component.footer')
</body>
</html>