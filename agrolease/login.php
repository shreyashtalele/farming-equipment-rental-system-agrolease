<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
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
            justify-content: space-between;
        }

        .logo-container {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
        }

        .logo {
            width: 100%;
            height: auto;
            display: block;
        }

        .header-content {
            flex-grow: 1;
            padding-left: 20px;
        }

        .website-name {
            margin: 0;
            font-size: 24px;
        }

        .tagline {
            margin: 5px 0 0;
            font-size: 14px;
        }

        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-section {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 80%;
            max-width: 800px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .user-info {
            flex: 1;
            text-align: center;
            padding-right: 20px;
        }

        .user-info img {
            border-radius: 50%;
            width: 130px;
            height: 130px;
            margin-bottom: 10px;
        }

        .login-form {
            flex: 1;
            text-align: center;
            padding-left: 20px;
        }

        .login-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        .login-form input {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #006400;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .login-form button:hover {
            background-color: #004d00;
        }

        .login-form p {
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }

        .login-form a {
            color: #006400;
            text-decoration: none;
        }

        .login-form a:hover {
            text-decoration: underline;
        }

        footer {
            background-color: #006400;
            color: #f2f2f2;
            padding: 20px;
            text-align: center;
        }
        .header-links {
    display: flex;
    align-items: center;
}

.header-link {
    color: #fff;
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 5px;
    background-color: #004d00;
    margin-left: 10px;
    transition: background-color 0.3s ease;
}

.header-link:hover {
    background-color: #003300;
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
    <a href="home.php">Back</a>
</header>
<div class="container">
    <div class="login-section">
        <div class="user-info">
            <img src="img/farmer.jpeg" alt="Profile Image">
            <p>Welcome User!</p>
        </div>
        <div class="login-form">
            <h2>User Login</h2>
            <form action="login_valid.php" method="post" onsubmit="return validateForm()">
                <input type="email" name="email" id="email" placeholder="Email" required>
                <br>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <br>
                <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
</div>
<footer class="footer">
    <p>&copy; 2024 Agrolease. All rights reserved.</p>
</footer>
<script>
    function validateForm() {
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
    }
</script>
</body>
</html>
