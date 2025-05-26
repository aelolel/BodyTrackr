document.addEventListener("DOMContentLoaded", function() {
    const emailInput = document.getElementById("email");
    const sendCodeBtn = document.getElementById("forgot-password-btn");

    // Tombol disabled saat pertama kali halaman dimuat
    sendCodeBtn.setAttribute("disabled", "true");

    function validateEmail() {
        const emailValue = emailInput.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (emailRegex.test(emailValue)) {
            sendCodeBtn.removeAttribute("disabled");
        } else {
            sendCodeBtn.setAttribute("disabled", "true");
        }
    }

    emailInput.addEventListener("input", validateEmail);
});
