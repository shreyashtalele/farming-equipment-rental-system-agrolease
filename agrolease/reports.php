<?php
// Start session
session_start();

// Include database connection file
include 'db.php';

// Check if vendorid is set in the session
if (!isset($_SESSION['vendorid'])) {
    // Redirect to an error page or display an error message
    echo "Vendor ID is missing.";
    exit;
}

// Retrieve vendor ID from session
$vendorID = $_SESSION['vendorid'];

// Fetch vendor data based on vendor ID
$query_vendor = "SELECT * FROM vendor WHERE vendorid = '$vendorID'";
$result_vendor = mysqli_query($conn, $query_vendor);

if (!$result_vendor) {
    // Handle error if query fails
    echo "Error fetching vendor data: " . mysqli_error($conn);
    exit;
}

$row_vendor = mysqli_fetch_assoc($result_vendor);

// Initialize the $orders array
$orders = [];

// Fetch orders data for the vendor where order status is confirmed and payment status is pending or completed
$query_orders = "SELECT * FROM orders WHERE vendor_id = '$vendorID' AND status = 'confirmed' AND (payment_status = 'pending' OR payment_status = 'success')";
$result_orders = mysqli_query($conn, $query_orders);

if (!$result_orders) {
    // Handle error if query fails
    echo "Error fetching order data: " . mysqli_error($conn);
    exit;
}

// Calculate total revenue for the vendor
$total_revenue = 0;
while ($row = mysqli_fetch_assoc($result_orders)) {
    $total_revenue += $row['price'];
    $orders[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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
        .header-link {
            color: #f2f2f2;
            text-decoration: none;
            margin-left: 15px;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #004d00;
            transition: background-color 0.3s ease;
        }
        .header-link:hover {
            background-color: #003300;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h3 {
            margin-bottom: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #006400;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .total-revenue {
            margin-top: 20px;
            font-size: 18px;
            color: #006400;
        }
        footer {
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
    <a href="vendor_dashboard.php" class="header-link">Back</a>
</header>

<div class="container">
    <h3>Vendor Details:</h3>
    <p>Name: <?php echo $row_vendor['vendor_name']; ?></p>
    <p>Email: <?php echo $row_vendor['email']; ?></p>
    <p>Mobile: <?php echo $row_vendor['mobile']; ?></p>

    <h3>Total Revenue: Rs.<?php echo number_format($total_revenue, 2); ?></h3>

    <h3>Order Details:</h3>
    <table>
        <thead>
            <tr>
                <th>Bill No</th>
                <!--<th>User ID</th> 
                <th>Equipment ID</th>-->
                <th>Quantity</th>
                <th>Rental Start Date</th>
                <th>Rental End Date</th>
                <th>Rental Duration</th>
                <th>Price</th>
                <th>Status</th>
                <th>Payment Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($orders)) { ?>
                <?php foreach ($orders as $order) { ?>
                    <tr>
                        <td><?php echo $order['order_id']; ?></td>
                       <!-- <td><?php echo $order['user_id']; ?></td>
                        <td><?php echo $order['equipment_id']; ?></td>-->
                        <td><?php echo $order['quantity']; ?></td>
                        <td><?php echo $order['rental_start_date']; ?></td>
                        <td><?php echo $order['rental_end_date']; ?></td>
                        <td><?php echo $order['rental_duration']; ?></td>
                        <td><?php echo number_format($order['price'], 2); ?></td>
                        <td><?php echo $order['status']; ?></td>
                        <td><?php echo $order['payment_status']; ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="10">No orders found.</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<footer class="footer">
    <p>&copy; 2024 Agrolease. All rights reserved.</p>
</footer>
</body>
</html>
