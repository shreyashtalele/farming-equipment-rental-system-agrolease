<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Agrolease</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #006400;
            color: #f2f2f2;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-content {
            text-align: center;
        }

        .logo-container {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 20px;
        }

        .logo {
            width: 100%;
            height: auto;
            display: block;
        }

        .website-name {
            margin: 0;
            font-size: 24px;
        }

        .tagline {
            margin: 5px 0 0;
            font-size: 14px;
        }

        .center {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-form {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .login-form input {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box;
        }

        .login-form button {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px;
            background-color: #006400;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .login-form button:hover {
            background-color: #45a049;
        }
        footer {
            background-color:  #006400;
            color: #fff;
            text-align: center;
            padding: 15px;
            margin-top: auto;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="img/logo.jpeg" alt="Logo" class="logo">
        </div>
        <div class="header-content">
            <h1 class="website-name">Agrolease</h1>
            <p class="tagline">Harvest Success with Our Innovative Farming Solutions</p>
        </div>
    </header>
    <div class="center">
        <div class="login-form">
            <h2>Admin Login</h2>
            <form action="admin_valid.php" method="post" onsubmit="return validateForm()">
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Agrolease. All rights reserved.</p>
    </footer>
    <script>function validateForm() {
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        // Check if email is valid
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address');
            return false;
        }

        // Check if any field is empty
        if (email === '' || password === '') {
            alert('Please fill in all fields');
            return false;
        }

        return true; // Form submission allowed if all validations pass
    }</script>
</body>
</html>
