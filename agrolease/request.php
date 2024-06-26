<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
   <style>

/* CSS for logo container */
/* CSS for logo container */
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

/* General body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

/* Header styles */
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
            padding-left: 20px;
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
/* Container styles */
.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Vendor request styles */
.vendor-request {
    border: 1px solid #ddd;
    padding: 20px;
    margin-bottom: 20px;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add box shadow for depth */
}

.vendor-request p {
    margin: 0;
    padding: 5px 0;
}

.vendor-request label {
    margin-right: 20px;
    font-weight: bold; /* Make labels bold */
}

.vendor-request button {
    background-color: #4caf50;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease; /* Add transition for smoother hover effect */
}

.vendor-request button:hover {
    background-color: #45a049;
}

/* Footer styles */
.footer {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    text-align: center;
    padding: 10px 0;
    background-color: #006400;
    color: #fff;
}

button[type="submit"] {
    background-color:#006400;
    color: #fff;
    border: none;
    padding: 12px 24px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #45a049;
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
        <a href="logout.php" class="header-link">Logout</a>
    </header>
    <div class="container">
        <h2>Pending Vendor Requests</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div id="vendor-requests">
                <?php
                // Include the database connection file
                include 'db.php';

                // Query to fetch pending vendor requests
                $sql = "SELECT * FROM vendor WHERE status = 'pending'";
                $result = $conn->query($sql);

                // Check if there are pending requests
                if ($result->num_rows > 0) {
                    // Output each pending request as HTML elements
                    while ($row = $result->fetch_assoc()) {
                        // Extract vendor details
                        $vendorId = $row['vendorid'];
                        $vendorName = $row['vendor_name'];
                        $email = $row['email'];
                        $village = $row['village']; // Add village field
                        $taluka = $row['taluka']; // Add taluka field
                        // Add more fields as needed

                        // Output HTML for the vendor request with form elements for admin actions
                        echo '<div class="vendor-request">';
                        echo '<input type="hidden" name="vendor_id[]" value="' . $vendorId . '">';
                        echo '<p>Name: ' . $vendorName . '</p>';
                        echo '<p>Email: ' . $email . '</p>';
                        echo '<p>Village: ' . $village . '</p>'; // Display village
                        echo '<p>Taluka: ' . $taluka . '</p>'; // Display taluka
                        // Add more fields as needed
                        echo '<label><input type="radio" name="action[' . $vendorId . ']" value="approved"> Approve</label>';
                        echo '<label><input type="radio" name="action[' . $vendorId . ']" value="rejected"> Reject</label>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No pending vendor requests found.</p>';
                }

                // Check if the form is submitted
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Check if action is set
                    if (isset($_POST['action'])) {
                        // Loop through each vendor action
                        foreach ($_POST['action'] as $vendorId => $action) {
                            // Check if the action is approved
                            if ($action == 'approved') {
                                // Query to update vendor status to approved
                                $updateSql = "UPDATE vendor SET status = 'approved' WHERE vendorid = $vendorId";
                                $conn->query($updateSql);
                            }
                        }
                    }
                }

                // Close the database connection
                $conn->close();
                ?>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
    <footer class="footer">
    <p>&copy; 2024 Agrolease. All rights reserved.</p>
    </footer>
    <script src="js/admin_dashboard.js"></script>
</body>
</html>