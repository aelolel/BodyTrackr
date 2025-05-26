document.addEventListener("DOMContentLoaded", function() {
    const usernameInput = document.getElementById("username");
    const emailInput = document.getElementById("email");
    const newPasswordInput = document.getElementById("new-password");
    const confirmPasswordInput = document.getElementById("confirm-password");
    const createAccountBtn = document.getElementById("create-btn");
    const signupForm = document.getElementById("signup-form");

    // Memastikan tombol disabled saat pertama kali halaman dimuat
    createAccountBtn.setAttribute("disabled", "true");

    function validateInputs() {
        const emailValue = emailInput.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        // Memastikan semua input valid sebelum enable tombol
        if (
            usernameInput.value.trim() !== "" &&
            emailInput.value.trim() !== "" &&
            newPasswordInput.value.trim() !== "" &&
            confirmPasswordInput.value.trim() !== "" &&
            emailRegex.test(emailValue) && // Validasi format email
            newPasswordInput.value === confirmPasswordInput.value // Validasi password dan konfirmasi password
        ) {
            createAccountBtn.removeAttribute("disabled"); // Enable tombol jika semua valid
        } else {
            createAccountBtn.setAttribute("disabled", "true"); // Disable tombol jika ada yang kosong
        }
    }

    // Memantau perubahan di setiap input
    [usernameInput, emailInput, newPasswordInput, confirmPasswordInput].forEach(input => {
        input.addEventListener("input", validateInputs); // Memvalidasi input saat ada perubahan
    });

    signupForm.addEventListener("submit", function(event) {
        // Mencegah submit form default hanya jika validasi JavaScript gagal
        event.preventDefault();

        // Validasi apakah semua input telah terisi
        if (
            usernameInput.value.trim() === "" ||
            emailInput.value.trim() === "" ||
            newPasswordInput.value.trim() === "" ||
            confirmPasswordInput.value.trim() === ""
        ) {
            alert("Harap isi semua data sebelum membuat akun!");
            return;
        }

        // Validasi apakah password dan konfirmasi password sama
        if (newPasswordInput.value !== confirmPasswordInput.value) {
            alert("Password dan Konfirmasi Password tidak cocok!");
            return;
        }

        // Jika validasi berhasil, kirim form ke server (submit)
        signupForm.submit(); // Form akan dikirim ke server untuk diproses di Laravel
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
