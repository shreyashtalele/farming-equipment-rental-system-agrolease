<?php
// Start session
session_start();

// Include database connection file
include 'db.php';

// Retrieve user's address details from session
$userArea = $_SESSION['user']['area'];
$userVillage = $_SESSION['user']['village'];
$userTaluka = $_SESSION['user']['taluka'];
$userPincode = $_SESSION['user']['pincode'];

// Retrieve equipment data based on user's address and vendor's address
$query = "SELECT e.*, v.vendor_name, c.categoryname FROM equipment e 
          INNER JOIN vendor v ON e.vendor_id = v.vendorid 
          INNER JOIN category c ON e.category_id = c.categoryid
          WHERE v.area = '$userArea' AND v.village = '$userVillage' AND v.taluka = '$userTaluka' AND v.pincode = '$userPincode'";

// Check if specific categories are selected
if (isset($_GET['categories']) && !empty($_GET['categories'])) {
    $categories = implode(",", $_GET['categories']); // Convert selected categories into a comma-separated string
    $query .= " AND e.category_id IN ($categories)";
}

$result = mysqli_query($conn, $query);

// Check for errors in the query
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment List</title>
    <style>
 body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
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
    margin-left: 20px;
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

.equipment-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin-top: 20px;
}

.equipment-item {
    width: 300px;
    margin: 20px;
    padding: 15px;
    border: 1px solid #ccc;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease;
}

.equipment-item:hover {
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
}

.equipment-item img {
    width: 100%;
    height: auto;
    max-width: 100%;
    max-height: 200px;
    border-radius: 10px;
}

.equipment-item h2 {
    font-size: 18px;
    margin: 10px 0;
}

.equipment-item p {
    font-size: 16px;
    margin: 5px 0;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #45a049;
}

form {
    margin: 20px 0;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

fieldset {
    border: none;
    padding: 0;
    margin: 0;
}

legend {
    font-size: 18px;
    margin-bottom: 10px;
}

label {
    display: block;
    margin-bottom: 10px;
    font-size: 16px;
}

.footer {
    background-color: #006400;
    color: #f2f2f2;
    padding: 20px;
    text-align: center;
    position: relative;
    bottom: 0;
    width: 100%;
}

.contact-us {
    font-size: 16px;
    margin-top: 20px;
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

    <!-- Filter section with checkboxes -->
    <form method="GET">
        <fieldset>
            <legend>Filter by Category:</legend>
            <?php
            // Fetch categories from database
            $categoryQuery = "SELECT * FROM category";
            $categoryResult = mysqli_query($conn, $categoryQuery);

            if ($categoryResult && mysqli_num_rows($categoryResult) > 0) {
                while ($category = mysqli_fetch_assoc($categoryResult)) {
                    echo "<label><input type='checkbox' name='categories[]' value='" . $category['categoryid'] . "'>" . $category['categoryname'] . "</label><br>";
                }
            }
            ?>
            <button type="submit">Apply Filters</button>
        </fieldset>
    </form>

    <?php if (mysqli_num_rows($result) > 0) { ?>
        <div class="equipment-list">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="equipment-item">
                    <?php
                    $imageData = base64_encode($row['image_data']);
                    echo "<img src='data:image/jpeg;base64," . $imageData . "' alt='" . $row['equipment_name'] . "' />";
                    ?>
                    <h2><?php echo $row['equipment_name']; ?></h2>
                    <p>Price: Rs.<?php echo $row['rent_per_day']; ?> per day</p>
                    <p>Stock: <?php echo $row['total_stock']; ?></p>
                    <a href="rent.php?equipment_id=<?php echo $row['equipment_id']; ?>"><button>Rent Now</button></a>

                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <p>No equipment available for your area.</p>
    <?php } ?>
    <footer class="footer">
        <div class="contact-us">Contact Us</div>
    </footer>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>