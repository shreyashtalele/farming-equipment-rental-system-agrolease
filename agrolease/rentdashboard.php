<?php
// Start session
session_start();

// Include database connection file
include 'db.php';

// Check if vendor_id is set in the session
if (!isset($_SESSION['vendorid'])) {
    // Redirect to an error page or display an error message
    echo "Vendor ID is missing.";
    exit;
}

// Check if the form was submitted for order processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check which button was clicked
    if (isset($_POST['accept'])) {
        // Update status to confirmed
        $order_id = $_POST['order_id'];
        $update_query = "UPDATE orders SET status = 'confirmed' WHERE order_id = '$order_id'";
        if (mysqli_query($conn, $update_query)) {
            // Update stock
            $update_stock_query = "UPDATE equipment SET total_stock = total_stock - 1 WHERE equipment_id IN (SELECT equipment_id FROM orders WHERE order_id = '$order_id')";
            mysqli_query($conn, $update_stock_query);
        } else {
            // Handle error if update fails
            echo "Error updating order status: " . mysqli_error($conn);
            exit;
        }
    } elseif (isset($_POST['deny'])) {
        // Update status to cancelled
        $order_id = $_POST['order_id'];
        $update_query = "UPDATE orders SET status = 'cancelled' WHERE order_id = '$order_id'";
        if (!mysqli_query($conn, $update_query)) {
            // Handle error if update fails
            echo "Error updating order status: " . mysqli_error($conn);
            exit;
        }
    }

    // Redirect back to the dashboard page
    header("Location: rentdashboard.php");
    exit;
}

// Fetch orders with pending status for the vendor
$vendorId = $_SESSION['vendorid'];
$query = "SELECT o.*, u.full_name AS user_name, e.equipment_name
          FROM orders o
          INNER JOIN user u ON o.user_id = u.userid
          INNER JOIN equipment e ON o.equipment_id = e.equipment_id
          WHERE o.vendor_id = '$vendorId' AND o.status = 'pending'";
$result = mysqli_query($conn, $query);

if (!$result) {
    // Handle error if query fails
    echo "Error: " . mysqli_error($conn);
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Orders</title>
    <style>
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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

        /* Order Card Styles */
        .order-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .order-card h2 {
            margin-top: 0;
        }
        <a href="logout.php" class="header-link">Logout</a>

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
        .order-card p {
            margin: 5px 0;
        }

        .order-card form {
            display: flex;
            gap: 10px;
        }

        .order-card input[type="submit"] {
            background-color: #006400;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .order-card input[type="submit"]:hover {
            background-color: #004d00;
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
    <a href="vendor_dashboard.php" class="header-link">Back</a>
</header>

<div class="container">
    <?php
    // Display orders as cards
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="order-card">
            <h2>User: <?php echo $row['user_name']; ?></h2>
            <p>Equipment: <?php echo $row['equipment_name']; ?></p>
            <p>Rental Start Date: <?php echo $row['rental_start_date']; ?></p>
            <p>Rental End Date: <?php echo $row['rental_end_date']; ?></p>
            <p>Total Amount: <?php echo $row['price']; ?></p>
            <!-- Buttons to accept or deny the request -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                <input type="submit" name="accept" value="Accept">
                <input type="submit" name="deny" value="Deny">
            </form>
        </div>
        <?php
    }
    ?>
</div>

</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>
