<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Registration</title>
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

        .header-links {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin: 10px 0;
        }

        .header-links a {
            color: #f2f2f2;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .header-links a:hover {
            background-color: #004d00;
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

        .footer {
            background-color: #006400;
            color: #f2f2f2;
            padding: 20px;
            text-align: center;
        }

        .container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .registration-form {
            width: 100%;
            max-width: 600px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .registration-form h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .registration-form input[type="text"],
        .registration-form input[type="email"],
        .registration-form input[type="tel"],
        .registration-form input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .registration-form button {
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

        .registration-form button:hover {
            background-color: #004d00;
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
    <a href="vendor_login.php" class="header-link">Back</a>
</header>
<div class="container">
    <div class="registration-form">
        <h2>Vendor Registration</h2>
        <form name="registrationForm" action="vendor_registration_data.php" method="post" onsubmit="return validateForm()">
            <input type="text" name="vendor_name" placeholder="Vendor Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="mobile" placeholder="Mobile Number" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <input type="text" name="house_name" placeholder="House Name" required>
            <input type="text" name="area" placeholder="Area" required>
            <input type="text" name="village" placeholder="Village" required>
            <input type="text" name="taluka" placeholder="Taluka" required>
            <input type="text" name="pincode" placeholder="Pincode" required>
            <input type="text" name="district" placeholder="District" required>
            <input type="text" name="state" placeholder="State" required>
            <button type="submit" name="registerBtn">Register</button>
        </form>
    </div>
</div>
<footer class="footer">
    &copy; 2024 Agrolease. All Rights Reserved.
</footer>
<script>
    function validateForm() {
        var vendorName = document.forms["registrationForm"]["vendor_name"].value;
        var email = document.forms["registrationForm"]["email"].value;
        var mobile = document.forms["registrationForm"]["mobile"].value;
        var password = document.forms["registrationForm"]["password"].value;
        var confirm_password = document.forms["registrationForm"]["confirm_password"].value;
        var house_name = document.forms["registrationForm"]["house_name"].value;
        var area = document.forms["registrationForm"]["area"].value;
        var village = document.forms["registrationForm"]["village"].value;
        var pincode = document.forms["registrationForm"]["pincode"].value;
        var taluka = document.forms["registrationForm"]["taluka"].value;
        var district = document.forms["registrationForm"]["district"].value;
        var state = document.forms["registrationForm"]["state"].value;

        // Check if any field is empty
        if (vendorName == "" || email == "" || mobile == "" || password == "" || confirm_password == "" ||
            house_name == "" || area == "" || village == "" || pincode == "" || taluka == "" || district == "" || state == "") {
            alert("All fields are mandatory");
            return false;
        }

        // Check if email format is valid
        var emailFormat = /^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/;
        if (!email.match(emailFormat)) {
            alert("Invalid email format");
            return false;
        }

        // Check if mobile number format is valid
        var mobileFormat = /^\d{10}$/;
        if (!mobile.match(mobileFormat)) {
            alert("Invalid mobile number format");
            return false;
        }

        // Check if passwords match
        if (password !== confirm_password) {
            alert("Passwords do not match");
            return false;
        }

        // Add more validations for other fields as needed (e.g., pincode, etc.)

        return true;
    }
</script>
</body>
</html>
