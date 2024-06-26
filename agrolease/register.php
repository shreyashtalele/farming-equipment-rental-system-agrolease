<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color:  #006400;
            color: white;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .header-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .website-name {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }

        .tagline {
            margin: 0;
            font-size: 16px;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .registration-form {
            margin-top: 20px;
        }

        .registration-form h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .registration-form input[type="text"],
        .registration-form input[type="email"],
        .registration-form input[type="tel"],
        .registration-form input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .registration-form button {
            width: 100%;
            padding: 12px;
            background-color:  #006400;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .registration-form button:hover {
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
            <div class="header-content">
                <h1 class="website-name">Agrolease</h1>
                <p class="tagline">Harvest Success with Our Innovative Farming Solutions</p>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="registration-form">
            <h2>User Registration</h2>
            <form name="registrationForm" action="register_valid.php" method="post" onsubmit="return validateForm()">
                <input type="text" name="full_name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="tel" name="mobile" placeholder="Mobile Number" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <!-- Address fields -->
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
    <footer>
        <p>&copy; 2024 Agrolease. All rights reserved.</p>
    </footer>
    <script>
        function validateForm() {
            var fullname = document.forms["registrationForm"]["full_name"].value;
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
            if (fullname == "" || email == "" || mobile == "" || password == "" || confirm_password == "" ||
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
