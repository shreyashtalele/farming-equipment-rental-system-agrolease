<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Orders</title>
    <style>
        /* Add your CSS styles here */
        .order-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }
        header {
            background-color: #006400;
            color: #f2f2f2;
            padding: 20px;
            display: flex;
            align-items: center;
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
        }

        .website-name {
            margin: 0;
            font-size: 24px;
        }

        .tagline {
            margin: 5px 0 0;
            font-size: 14px;
        }

        .pay-now-btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
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
    <a href="dashboard.php" class="header-link">Back</a>


</header>

<?php
// Start session
session_start();

// Include database connection file
include 'db.php';

// Check if userid is set in the session
if (!isset($_SESSION['user']['userid'])) {
    // Redirect to an error page or display an error message
    echo "User ID is missing.";
    exit;
}

// Fetch user ID from session
$userID = $_SESSION['user']['userid'];

$query = "SELECT o.*, e.equipment_name, e.rent_per_day
          FROM orders o
          INNER JOIN equipment e ON o.equipment_id = e.equipment_id
          WHERE o.user_id = '$userID' AND o.status = 'confirmed' AND o.payment_status = 'pending'";
$result = mysqli_query($conn, $query);

if (!$result) {
    // Handle error if query fails
    echo "Error: " . mysqli_error($conn);
    exit;
}

// Display orders as cards
while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <div class="order-card">
        <h2>Order ID: <?php echo $row['order_id']; ?></h2>
        <p>Equipment: <?php echo $row['equipment_name']; ?></p>
        <p>Rental Start Date: <?php echo $row['rental_start_date']; ?></p>
        <p>Rental End Date: <?php echo $row['rental_end_date']; ?></p>
        <p>Price per day: <?php echo $row['rent_per_day']; ?></p>
        <p>Total Price: <?php echo $row['price']; ?></p>
        <button class="pay-now-btn" onclick="window.location.href = 'confirmpayment.php?order_id=<?php echo $row['order_id']; ?>'">Pay Now</button>
    </div>
    <?php
}
?>


</body>
</html>
