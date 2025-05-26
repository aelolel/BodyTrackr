<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Settings</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="/img/favicon.svg" type="image/svg+xml">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Raleway', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 400px;
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            position: relative;
        }

        h2 {
            font-size: 28px;
            color: #2c5945;
            text-align: center;
            margin-bottom: 30px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 30px;
            background-color: #f9f9f9;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #2c5945;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #2c5945;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #238e3b;
        }

        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 24px;
            color: #2c5945;
            cursor: pointer;
        }

        /* Notification Style */
        .notification {
            background-color: #4CAF50;
            color: white;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
            font-size: 14px;
            position: relative;
        }

        .notification-error {
            background-color: #f44336;
        }

        .notification-close {
            font-size: 18px;
            cursor: pointer;
            color: white;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .error-message {
            font-size: 12px;
            color: red;
            margin-top: 5px;
            text-align: left;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Close Button (Back to Home) -->
        <span class="back-button" onclick="window.location.href='{{ route('home') }}'">✖</span>

        <h2>Profile Settings</h2>

        <!-- Success Message -->
        @if (session('success'))
            <div class="notification">
                {{ session('success') }}
                <span class="notification-close" onclick="this.parentElement.style.display='none'">x</span>
            </div>
        @endif

        <!-- Error Message -->
        @if (session('error'))
            <div class="notification notification-error">
                {{ session('error') }}
                <span class="notification-close" onclick="this.parentElement.style.display='none'">x</span>
            </div>
        @endif

        <form id="profile-settings-form" method="POST" action="{{ route('update-profile') }}">
            @csrf

            <!-- Name -->
            <div class="input-group">
                <label for="name">Username</label>
                <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="Username" required>
                @error('name')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="Email" required>
                @error('email')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- New Password -->
            <div class="input-group">
                <label for="new-password">New Password (Leave blank to keep current password)</label>
                <input type="password" id="new-password" name="password" value="{{ old('password') }}" placeholder="New Password">
                @error('password')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="input-group">
                <label for="confirm-password">Confirm New Password</label>
                <input type="password" id="confirm-password" name="password_confirmation" placeholder="Confirm Password">
                @error('password_confirmation')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Save Changes</button>
        </form>
    </div>

    <script>
        // Functionality to toggle password visibility (if required in the future)
        function togglePassword(inputId, element) {
            var input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                element.textContent = "🙈";
            } else {
                input.type = "password";
                element.textContent = "👁️";
            }
        }
    </script>

</body>

</html>