<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
    <link rel="icon" href="/img/favicon.svg" type="image/svg+xml">
</head>

<style>
    body {
        background-color: #2C5945;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .signup-container {
        background: #2C5945;
        padding: 30px;
        border-radius: 30px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        text-align: center;
        width: 320px;
        height: 400px;
    }

    .signup-text {
        font-family: 'Raleway', sans-serif;
        font-size: 24px;
        margin-bottom: 20px;
        color: white;
    }

    .email-error{
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        color: red;
    }

    .name-error{
        font-family: 'Raleway', sans-serif;
        font-size: 12px;
        color: red;
    }

    .input-group {
        position: relative;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
    }

    .input-group input {
        width: 100%;
        padding: 10px;
        padding-right: 40px;
        /* Ruang untuk ikon mata */
        border: none;
        border-radius: 30px;
        background-color: white;
        font-size: 14px;
    }

    .input-group input:focus {
        outline: none;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .toggle-password {
        position: absolute;
        right: 15px;
        cursor: pointer;
        font-size: 18px;
        user-select: none;
    }

    .signin {
        display: block;
        font-size: 10px;
        color: black;
        margin-top: 20px;
        text-decoration: none;
        opacity: 0.4;
    }

    .signin:hover {
        color: #000;
        text-decoration: underline;
    }

    .create-btn {
        width: 70%;
        padding: 15px;
        border: none;
        border-radius: 30px;
        font-size: 12px;
        cursor: pointer;
        background: white;
        border: 2px solid black;
        color: black;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .create-btn:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .create-btn:hover:not(:disabled) {
        background-color: black;
        color: white;
    }
</style>

<body>
    <div class="signup-container">
        <h2 class="signup-text">Sign Up</h2>
        <form id="signup-form" method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-group">
                <input type="text" id="username" name="name" placeholder="Username" required>
                @error('name')
                <div class="name-error">{{ $message }}</div>
            @enderror
            </div>
            <div class="input-group">
                <input type="email" id="email" name="email" placeholder="Email" required>
                @error('email')
                    <div class="email-error">{{ $message }}</div>
                @enderror
            </div>
            <div class="input-group">
                <input type="password" id="new-password" name="password" placeholder="New Password" required>
                <span class="toggle-password" onclick="togglePassword('new-password', this)">👁️</span>
            </div>
            <div class="input-group">
                <input type="password" id="confirm-password" name="password_confirmation" placeholder="Confirm Password"
                    required>
                <span class="toggle-password" onclick="togglePassword('confirm-password', this)">👁️</span>
            </div>
            <button type="submit" id="create-btn" class="create-btn" disabled>Create Account</button>
            <a href="{{ url('login') }}" class="signin">Already have an account? Sign in</a>
        </form>

    </div>
    <script src="{{ asset('js/signup.js') }}"></script>
</body>

</html>
