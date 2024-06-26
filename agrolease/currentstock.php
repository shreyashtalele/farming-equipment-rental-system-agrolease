<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Stock</title>
    <style>
 body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.equipment-card {
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 20px;
    margin: 20px;
    width: calc(33.33% - 40px); /* Adjust based on your layout */
    float: left;
    box-sizing: border-box;
    background-color: #fff;
    transition: box-shadow 0.3s ease;
}

.equipment-card:hover {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.equipment-card img {
    max-width: 100%;
    height: 200px; /* Set the fixed height for all images */
    border-radius: 10px;
    object-fit: cover;
}

header {
    background-color: #006400;
    color: #fff;
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

.header-links {
    margin-left: auto;
}

.header-link {
    color: #fff;
    text-decoration: none;
    padding: 10px 20px;
    border-radius: 5px;
    background-color: #004d00;
    transition: background-color 0.3s ease;
}

.header-link:hover {
    background-color: #003300;
}
.page-title {
            text-align: center;
            font-size: 2.5em;
            margin: 20px 0;
            color: #333;
            text-shadow: 1px 1px 2px #ccc;
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
    <a href="vendor_dashboard.php" class="header-link">Back</a>
</header>
<h1 class="page-title">Equipment Stock</h1>

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

    // Fetch vendor ID from session
    $vendorID = $_SESSION['vendorid'];

    // Query to fetch equipment stock
    $query = "SELECT * FROM equipment WHERE vendor_id = '$vendorID'";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        // Handle error if query fails
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    // Display equipment stock as cards
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="equipment-card">
                <?php
                // Convert binary image data to base64
                $imageData = base64_encode($row['image_data']);
                $imageSrc = 'data:image/jpeg;base64,' . $imageData;
                ?>
                <img src="<?php echo $imageSrc; ?>" alt="<?php echo $row['equipment_name']; ?>">
                <h2><?php echo $row['equipment_name']; ?></h2>
                <p>Current Stock: <?php echo $row['total_stock']; ?></p>
                <p>Current Rent: <?php echo $row['rent_per_day']; ?></p>
            </div>
            <?php
        }
    } else {
        echo "<p>No equipment available.</p>";
    }
    ?>
</div>

</body>
</html>