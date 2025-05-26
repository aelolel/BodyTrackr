document.addEventListener("DOMContentLoaded", function() {
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const loginBtn = document.getElementById("login-btn");
    const loginForm = document.getElementById("login-form");
    const signupBtn = document.querySelector(".signup-btn");

    // Set tombol Login menjadi disabled saat pertama kali halaman dimuat
    loginBtn.setAttribute("disabled", "true");
    loginBtn.classList.add("disabled");

    // Fungsi validasi input form
    function validateInputs() {
        const emailValue = emailInput.value.trim();
        const passwordValue = passwordInput.value.trim();

        // Regex untuk validasi format email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        
        if (emailValue !== "" && emailRegex.test(emailValue) && passwordValue !== "") {
            loginBtn.removeAttribute("disabled");
            loginBtn.classList.remove("disabled");
        } else {
            loginBtn.setAttribute("disabled", "true");
            loginBtn.classList.add("disabled");
        }
    }

    // Tambahkan event listener untuk mendeteksi perubahan input
    emailInput.addEventListener("input", validateInputs);
    passwordInput.addEventListener("input", validateInputs);

    loginForm.addEventListener("submit", function(event) {
        event.preventDefault(); // Mencegah form submit default agar bisa mengontrol prosesnya

        // Pastikan tombol tidak bisa ditekan jika masih dalam keadaan disabled
        if (!loginBtn.hasAttribute("disabled")) {
            loginForm.submit(); // Kirim form ke server untuk diproses oleh backend Laravel
        }
    });

    signupBtn.addEventListener("click", function() {
        window.location.href = "signup.html"; 
    });
});

// Fungsi untuk menampilkan atau menyembunyikan password
function togglePassword(inputId, iconElement) {
    const passwordInput = document.getElementById(inputId);

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        iconElement.innerHTML = "🙈"; // Ubah ikon ke mata tertutup
    } else {
        passwordInput.type = "password";
        iconElement.innerHTML = "👁️"; // Ubah ikon ke mata terbuka
    }
}
