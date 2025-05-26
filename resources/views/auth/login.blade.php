<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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

.login-container {
    background: #2C5945;
    padding: 30px;
    border-radius: 30px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
    text-align: center;
    width: 320px;
    height: 410px;
}

.logo {
    width: 100px;
    margin-bottom: 10px;
}

.welcome-text {
    font-family: 'Raleway', sans-serif;
    color: white;
    font-size: 24px;
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 15px;
    position: relative;
    display: flex;
    align-items: center;
    width: 100%;
}

.input-group input {
    width: 100%;
    padding: 10px;
    padding-right: 40px;
    border: none;
    border-radius: 30px;
    background-color: #fcfcfc;
    font-size: 14px;
    align-items: center;
    margin-right: 2px;
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

.forgot-password {
    display: block;
    font-size: 10px;
    color: #414141;
    margin-bottom: 20px;
    text-decoration: none;
    opacity: 0.4;
    text-align: right;
}

.forgot-password:hover {
    color: #000;
    text-decoration:underline;
}

.login-btn, .signup-btn {
    width: 70%;
    padding: 15px;
    border: none;
    border-radius: 30px;
    font-size: 12px;
    cursor: pointer;
}

.login-btn {
    background-color: #2C5945;
    color: white;
    margin-bottom: 10px;
    transition: background-color 0.3s ease, color 0.3s ease;
    outline: 2px solid white;
}

.login-btn:hover {
    background-color: white;
    color: black;
}

.signup-btn {
    background: white;
    color: black;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.signup-btn:hover {
    background-color: #2C5945;
    color: white;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
}

</style>

<body>

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="login-container">
        <img src="img/logo.png" alt="Logo" class="logo">
        <h2 class="welcome-text">Welcome!</h2>
        <form id="login-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group">
                <input type="email" id="email" name="email" placeholder="Email" required value="{{ old('email') }}">
            </div>
            <div class="input-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <span class="toggle-password" onclick="togglePassword('password', this)">👁️</span>
            </div>
            <a href="{{ 'forgot-password' }}" class="forgot-password">Forgot Password?</a>
            <button type="submit" id="login-btn" class="login-btn">Log in</button>
            <a href="{{ url('register') }}">
                <button type="button" class="signup-btn">Sign Up</button> 
            </a>
        </form>
    </div>
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
