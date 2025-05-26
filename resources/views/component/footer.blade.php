<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    /* Footer */
.footer {
    background-color: #2c5945; /* Warna hijau */
    color: white;
    text-align: center;
    padding: 15px 0;
    width: 100%;
    filter: drop-shadow(0px 4px 6px rgba(0, 0, 0, 0.4));
    margin-top: auto; /* Memastikan footer berada di bawah */
}

.contact-container {
    font-family: 'Raleway';
    display: flex;
    justify-content: center;
    align-items: center;
}

.whatsapp-button {
    color: white;
    font-size: 18px;
    font-weight: bold;
    border-radius: 30px;
    display: flex;
    align-items: center;
    text-decoration: none;
    transition: 0.3s;
}

.whatsapp-button i {
    margin-right: 8px;
    font-size: 24px;
}

.whatsapp-button:hover {
    transform: scale(1.1);
}

.wave-container {
    position: relative;
    width: 100%;
    height: 180px; /* Tinggi kontainer diperbesar agar gambar wave tidak terpotong */
    overflow: hidden;
    background: transparent;
}

.wave {
    position: absolute;
    width: 110%;
    height: 250px;
    bottom: -120px; /* Menyesuaikan posisi wave agar terlihat lebih baik */
    left: -5%;
    background: url('../img/wave.svg') no-repeat center bottom/cover;
    animation: waveMove 6s infinite ease-in-out;
    z-index: +1;
}

@keyframes waveMove {
    0% {
        transform: translateX(0) translateY(0);
    }
    50% {
        transform: translateX(-10px) translateY(10px); /* Gerakan naik turun dengan sedikit pergeseran kiri-kanan */
    }
    100% {
        transform: translateX(0) translateY(0);
    }
}
</style>
<body>
    <div class="wave-container">
        <div class="wave"></div>
    </div>

    <footer class="footer">
        <div class="contact-container">
            <a href="https://wa.me/6283113555549" target="_blank" class="whatsapp-button">
                <i class="fab fa-whatsapp"></i> Contact Us!
            </a>
        </div>
    </footer>
</body>
</html>
