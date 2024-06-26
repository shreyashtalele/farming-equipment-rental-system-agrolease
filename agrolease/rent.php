<?php
// Start session
session_start();

// Include database connection file
include 'db.php';

// Check if equipment_id is provided in the URL
if (!isset($_GET['equipment_id'])) {
    // Redirect to an error page or display an error message
    echo "Equipment ID is missing.";
    exit;
}

// Retrieve equipment_id from URL
$equipmentId = $_GET['equipment_id'];

// Store equipment ID in session
$_SESSION['equipment_id'] = $equipmentId;

// Retrieve user details from session
$userDetails = $_SESSION['user'];

// Retrieve equipment details from database
$query = "SELECT * FROM equipment WHERE equipment_id = '$equipmentId'";
$result = mysqli_query($conn, $query);

if (!$result) {
    // Handle error if query fails
    echo "Error: " . mysqli_error($conn);
    exit;
}

$row = mysqli_fetch_assoc($result);

// Calculate rental duration
$rentalStartDate = date('Y-m-d');
$rentalEndDate = date('Y-m-d', strtotime('+1 day')); // Default to one day rental
$rentalDuration = 1; // Default duration in days
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent Equipment</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
        }
        header {
            background-color: #006400;
            color: #ffffff;
            padding: 20px;
            display: flex;
            align-items: center;
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
        .centered-form {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .submit-button {
            width: 100%;
            padding: 10px;
            background-color: #006400;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .footer {
            background-color: #006400;
            color: #ffffff;
            padding: 20px;
            text-align: center;
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
    </style>
    <script>
        // JavaScript code to calculate total amount
        function updateTotalAmount() {
            var rentPerDay = <?php echo $row['rent_per_day']; ?>; // Get rent per day from PHP
            var quantity = parseInt(document.getElementById('quantity').value);
            var totalAmount = rentPerDay * quantity;
            document.getElementById('total_amount').value = totalAmount.toFixed(2); // Display total amount with 2 decimal places
        }
    </script>
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
    <a href="userequipment.php"class="header-link">Back</a>
</header>

<div class="centered-form">
    <form action="orderprocess.php" method="post" oninput="updateTotalAmount()">
        <h2>User Details</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $userDetails['name']; ?>" readonly><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $userDetails['email']; ?>" readonly><br><br>

        <label for="mobile">Mobile:</label>
        <input type="text" id="mobile" name="mobile" value="<?php echo $userDetails['mobile']; ?>" readonly><br><br>

        <h2>Equipment Details</h2>
        <label for="equipment_name">Equipment Name:</label>
        <input type="text" id="equipment_name" name="equipment_name" value="<?php echo $row['equipment_name']; ?>" readonly><br><br>

        <label for="rent_per_day">Rent per Day:</label>
        <input type="text" id="rent_per_day" name="rent_per_day" value="<?php echo $row['rent_per_day']; ?>" readonly><br><br>

        <label for="quantity">Quantity:</label>
        <select id="quantity" name="quantity">
            <?php for ($i = 1; $i <= $row['total_stock']; $i++) { ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?>
        </select><br><br>

        <h2>Rental Duration</h2>
        <label for="rental_start_date">Start Date:</label>
        <input type="date" id="rental_start_date" name="rental_start_date" value="<?php echo $rentalStartDate; ?>"><br><br>

        <label for="rental_end_date">End Date:</label>
        <input type="date" id="rental_end_date" name="rental_end_date" value="<?php echo $rentalEndDate; ?>"><br><br>

        <label for="rental_duration">Rental Duration:</label>
        <input type="text" id="rental_duration" name="rental_duration" value="<?php echo $rentalDuration; ?>" readonly><br><br>

        <h2>Total Amount to be Paid</h2>
        <label for="total_amount">Total Amount:</label>
        <input type="text" id="total_amount" name="total_amount" value="<?php echo $row['rent_per_day']; ?>" readonly><br><br>

        <input type="hidden" name="equipment_id" value="<?php echo $equipmentId; ?>">

        <input type="submit" value="Confirm Rent" class="submit-button">
    </form>
</div>

<footer class="footer">
    <div class="contact-us">Contact Us</div>
</footer>
</body>
</html>