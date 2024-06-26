<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <style>
        /* Add your CSS styles here */
        body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}


.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.order-card {
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    background-color: #fff;
    transition: box-shadow 0.3s ease;
}

.order-card:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
form {
    margin-bottom: 20px;
}

form label {
    margin-right: 10px;
}

form select, form input[type="submit"] {
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

form input[type="submit"] {
    background-color: #006400;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form input[type="submit"]:hover {
    background-color: #004d00;
}

.order-card h2 {
    margin-top: 0;
    font-size: 20px;
    color: #333;
}

.order-card p {
    margin: 5px 0;
    font-size: 16px;
    color: #666;
}

.order-card .order-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.order-card .order-info .info-label {
    font-weight: bold;
}

.order-card .order-info .info-value {
    flex-grow: 1;
    text-align: right;
}

.order-card .order-actions {
    display: flex;
    justify-content: flex-end;
    margin-top: 10px;
}

.order-card .order-actions button {
    padding: 8px 15px;
    border-radius: 5px;
    border: none;
    background-color: #006400;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.order-card .order-actions button:hover {
    background-color: #004d00;
}


    </style>
</head>
<body>

<div>
<header>
        <div class="logo-container">
            <img src="img/logo.jpeg" alt="Logo" class="logo">
        </div>
        <div class="header-content">
            <h1 class="website-name">Agrolease</h1>
            <p class="tagline">Harvest Success with Our Innovative Farming Solutions</p>
        </div>
        
    </header>
    <h1>Order History</h1>

    <form method="GET">
        <label for="filter">Filter:</label>
        <select name="filter" id="filter">
            <option value="all">All Orders</option>
            <option value="last_15_days">Last 15 Days</option>
            <option value="last_month">Last Month</option>
            <option value="last_3_months">Last 3 Months</option>
        </select>
        <label for="sort">Sort By:</label>
        <select name="sort" id="sort">
            <option value="order_id">Order ID</option>
            <option value="created_at">Order Date</option>
            <option value="rent_per_day">Price</option>
        </select>
        <input type="submit" value="Apply">
    </form>

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

    // Query to fetch order history
    $filter = $_GET['filter'] ?? 'all';

    $dateFilter = '';
    switch ($filter) {
        case 'last_15_days':
            $dateFilter = "AND o.created_at >= DATE_SUB(NOW(), INTERVAL 15 DAY)";
            break;
        case 'last_month':
            $dateFilter = "AND o.created_at >= DATE_SUB(NOW(), INTERVAL 1 MONTH)";
            break;
        case 'last_3_months':
            $dateFilter = "AND o.created_at >= DATE_SUB(NOW(), INTERVAL 3 MONTH)";
            break;
        default:
            // no additional filter
            break;
    }

    $sort = $_GET['sort'] ?? 'order_id';
    $sortClause = "ORDER BY $sort";

    $query = "SELECT o.*, e.equipment_name, e.rent_per_day, o.created_at
              FROM orders o
              INNER JOIN equipment e ON o.equipment_id = e.equipment_id
              WHERE o.user_id = '$userID' $dateFilter $sortClause";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        // Handle error if query fails
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    // Display order history as cards
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="order-card">
                <h2>Order ID: <?php echo $row['order_id']; ?></h2>
                <p>Order Date: <?php echo $row['created_at']; ?></p>
                <p>Equipment: <?php echo $row['equipment_name']; ?></p>
                <p>Price: <?php echo $row['rent_per_day']; ?></p>
            </div>
            <?php
        }
    } else {
        echo "<p>No orders yet.</p>";
    }
    ?>
</div>

</body>
</html>