<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Page</title>
        <style>
            /* General Styles */
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }
        
        /* Header Styles */
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
            text-align: center;
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
            margin-left: auto;
        }

        .header-link {
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #004d00;
        }

        .header-link:hover {
            background-color: #003300;
        }
        /* Card Styles */
        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .card {
            width: calc(33.33% - 20px);
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }
        .card a {
            display: block;
            text-align: center;
            padding: 15px 0;
            background-color: #006400;
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
        }
        .card a:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }
        
        /* Footer Styles */
        .footer {
            background-color: #006400;
            color: #f2f2f2;
            padding: 20px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
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
    <!--
    <div class="header-links">
        <a href="#" class="header-link">
            <img src="edit_profile_image_url" alt="Edit Profile" class="header-link-icon">
            Edit Profile
        </a>
        <a href="#" class="header-link">
            <img src="sign_out_image_url" alt="Sign Out" class="header-link-icon">
            Sign Out
        </a>-->
        <a href="logout.php"class="header-link">logout </a>
    </div>
</header>
    <div class="container">
        <h2>Welcome, Vendor!</h2>
        <div class="cards">
            <div class="card">
                <img src="img/tractor.jpeg" alt="Card Image 1">
                <a href="Equipment.php">Add Equipment</a>
            </div>
            <div class="card">
                <img src="img/request.jpeg" alt="Card Image 2">
                <a href="rentdashboard.php">Rent Requests</a>
            </div>
            <div class="card">
                <img src="img/stock.jpeg" alt="Card Image 3">
                <a href="currentstock.php">Current Stock </a>
            </div>
            <div class="card">
                <img src="img/report.jpeg" alt="Card Image 4">
                <a href="reports.php">View Reports </a>
            </div>
            <!--
            <div class="card">
                <img src="img/card_image5.jpg" alt="Card Image 5">
                <a href="#">View Reports</a>
            </div>
            
            <div class="card">
                <img src="img/card_image6.jpg" alt="Card Image 6">
                <a href="#">Edit Profile</a>
            </div>-->
        </div>
    </div>
    <footer>
        <!-- Footer content here -->
    </footer>
    <script src="js/vendor_page.js"></script>
</body>
</html>

</body>
</html>