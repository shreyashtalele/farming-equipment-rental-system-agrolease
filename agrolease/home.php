<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrolease</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
            color: #333;
        }

        header {
            background-color: #006400;
            color: #f2f2f2;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logo-container {
            flex: 0 0 auto;
            width: 100px;
            height: 100px;
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
            margin: 0 20px;
        }

        .website-name {
            margin: 0;
            font-size: 36px;
            font-weight: bold;
        }

        .tagline {
            margin: 5px 0 0;
            font-size: 18px;
            font-style: italic;
        }

        .header-links {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            margin: 10px 0;
        }

        .header-links a {
            color: #f2f2f2;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .header-links a:hover {
            background-color: #004d00;
        }

        .slider {
            position: relative;
            width: 100%;
            height: 70%;
            overflow: hidden;
        }

        .slides {
            display: flex;
            width: 300%;
            height: 100%;
            transition: transform 0.5s ease;
        }

        .slides img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .navigation {
            position: absolute;
            width: 100%;
            top: 50%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .navigation button {
            background: rgba(0, 0, 0, 0.5);
            border: none;
            color: #fff;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
        }

        .about-us {
            background-color: #fff;
            padding: 40px;
            margin: 20px 0;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .about-us h2 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #006400;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .about-us p {
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 0;
            text-align: justify;
        }

        .about-us p:first-letter {
            font-size: 22px;
            font-weight: bold;
            color: #006400;
            float: left;
            margin-right: 5px;
            line-height: 1;
        }

        footer {
            background-color: #006400;
            color: #f2f2f2;
            padding: 20px;
            text-align: center;
        }

        footer p {
            margin: 5px 0;
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                text-align: center;
            }

            .header-content {
                margin: 10px 0;
            }

            .header-links {
                flex-direction: column;
                gap: 10px;
            }

            .slider {
                height: 40vh;
            }

            .about-us {
                padding: 20px 10px;
            }
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
        <nav class="header-links">
            <a href="#contact-us">Contact Us</a>
            <a href="#about-us">About Us</a>
            <a href="login.php">User Login</a>
            <a href="vendor_login.php">Vendor Login</a>
            <a href="admin_login.php">Admin Login</a>
        </nav>
    </header>

    <div class="slider">
        <div class="slides">
            <img src="img/img1.jpeg" alt="Slide 1">
            <img src="img/img2.jpeg" alt="Slide 2">
            <img src="img/img3.jpeg" alt="Slide 3">
        </div>
        <div class="navigation">
            <button id="prev">&#10094;</button>
            <button id="next">&#10095;</button>
        </div>
    </div>

    <div id="about-us" class="about-us">
        <h2>About Us</h2>
        <p>Welcome to Farming Equipment Rental System! At Farming Equipment Rental System, we are dedicated to revolutionizing the agricultural industry by providing convenient and cost-effective solutions for farmers and agricultural businesses. Our platform offers a comprehensive range of high-quality farming equipment available for rent, tailored to meet the diverse needs of modern agriculture. With years of experience and a deep understanding of the challenges faced by farmers, we aim to empower agricultural communities by eliminating the barriers to accessing advanced machinery. Our user-friendly online platform allows farmers to browse, select, and rent the equipment they need with ease, saving both time and resources. What sets us apart is our commitment to customer satisfaction and our passion for supporting sustainable farming practices. We strive to foster long-term relationships with our clients, offering personalized assistance and guidance throughout the rental process. Whether you're a small-scale farmer, a large agricultural operation, or an agribusiness, we're here to help you optimize your operations and achieve your goals. Join us in our mission to transform agriculture through innovation and accessibility. Experience the convenience of renting top-of-the-line farming equipment with Farming Equipment Rental System today!</p>
    </div>

    <footer class="footer">
        <div id="contact-us" class="contact-us">
            <h2>Contact Us</h2>
            <p>We'd love to hear from you! Reach out to us through any of the following ways:</p>
            <ul>
                <li>Email: info@agrolease.com</li>
                <li>Phone: +91 8379052688</li>
                <li>Kate Wasti , Punawale ,Pune</li>
            </ul>
        </div>
    </footer>

    <script>
        let slideIndex = 0;
        const slides = document.querySelector('.slides');
        const totalSlides = slides.children.length;

        document.getElementById('next').addEventListener('click', () => {
            slideIndex = (slideIndex + 1) % totalSlides;
            updateSlidePosition();
        });

        document.getElementById('prev').addEventListener('click', () => {
            slideIndex = (slideIndex - 1 + totalSlides) % totalSlides;
            updateSlidePosition();
        });

        function updateSlidePosition() {
            const slideWidth = slides.children[0].clientWidth;
            slides.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
        }

        setInterval(() => {
            slideIndex = (slideIndex + 1) % totalSlides;
            updateSlidePosition();
        }, 3000); // Change slide every 3 seconds
    </script>
</body>
</html>
