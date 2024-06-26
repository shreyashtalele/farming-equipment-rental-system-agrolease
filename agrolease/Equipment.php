<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment Rental Form</title>
    <style>
 /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.form-container {
    max-width: 400px; /* Adjust the width as needed */
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="number"],
select,
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box; /* Ensure padding and border are included in the width */
}

button[type="submit"] {
    width: 100%;
    background-color: #006400;
    color: #fff;
    border: none;
    padding: 12px 0; /* Adjusted padding */
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #004d00;
}

/* Header Styles */
header {
    background-color: #006400;
    color: #f2f2f2;
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

.logo-container {
    width: 80px; /* Adjust the size of the circular container */
    height: 80px; /* Adjust the size of the circular container */
    border-radius: 50%; /* Make the container circular */
    overflow: hidden; /* Hide overflow content (in case the image exceeds the circular container) */
}

.logo {
    width: 100%; /* Make the image fill the circular container */
    height: auto; /* Maintain aspect ratio of the image */
    display: block; /* Ensure the image is displayed as a block element */
}
.footer {
            background-color: #006400;
            color: #f2f2f2;
            padding: 20px;
            text-align: center;
            position: fixed;
            bottom: 0;
            height:1%;
            width: 100%;
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
        <a href="vendor_dashboard.php" class="header-link">Back</a>
    </header>
    <div class="container">
        <form action="insert_equipment.php" method="post" class="form-container" enctype="multipart/form-data">
            <h2>Equipment Rental Form</h2>
            <div class="form-group">
                <label for="equipment_name">Equipment Name:</label>
                <input type="text" id="equipment_name" name="equipment_name" required>
            </div>
            <div class="form-group">
    <label for="rent_per_day">Rent Per Day:</label>
    <input type="number" id="rent_per_day" name="rent_per_day" required min="0">
</div>
<div class="form-group">
    <label for="total_stock">Total Stock:</label>
    <input type="number" id="total_stock" name="total_stock" required min="0">
</div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="">Select Category</option>
                    <option value="Tillage Equipment">Tillage Equipment</option>
                    <option value="Planting Equipment">Planting Equipment</option>
                    <option value="Harvesting Equipment">Harvesting Equipment</option>
                    <option value="Irrigation Equipment">Irrigation Equipment</option>
                    <option value="Crop Protection Equipment">Crop Protection Equipment</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" cols="50" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit">Submit</button>
        </form>
        <footer class="footer">
    <p>&copy; 2024 Agrolease. All rights reserved.</p>
</footer>
    </div>
   
</body>
</html>