<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Job Portal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: linear-gradient(to right, #007bff, #343a40); /* градиентный фон */
            color: #fff; /* цвет текста на фоне */
        }

        .container {
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
        }

        .contact-info {
            list-style-type: none;
            padding: 0;
            margin-bottom: 20px;
        }

        .contact-info li {
            margin-bottom: 10px;
            color: #000; /* черный цвет текста */
        }

        .contact-info i {
            margin-right: 10px;
            color: #000; /* черный цвет значков */
        }

        #map {
            height: 300px;
        }

        .social-icons {
            list-style-type: none;
            padding: 0;
            margin-top: 20px;
        }

        .social-icons li {
            display: inline-block;
            margin-right: 15px;
        }

        .social-icons a {
            text-decoration: none;
            color: #007bff;
            font-size: 24px;
        }

        /* Header Styles */
        header {
            background-color: #343a40;
            padding: 10px 0;
            color: white;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 28px;
        }

        /* Footer Styles */
        footer {
            background-color: #343a40;
            padding: 20px 0;
            color: white;
            text-align: center;
        }

        footer p {
            margin: 0;
            font-size: 14px;
        }
    </style>
</head>
<body>

<!-- Header -->
<header>
    <h1>Contact Us</h1>
</header>

<div class="container">
    <div class="card">
        <div class="card-header">
            Contact Information
        </div>
        <div class="card-body">
            <ul class="contact-info">
                <li><i class="fas fa-map-marker-alt"></i> Berlin, Germany</li>
                <li><i class="fas fa-phone"></i>(555) 123-4567</li>
                <li><i class="fas fa-envelope"></i> info@example.com</li>
                <li><i class="fas fa-clock"></i> Monday-Friday: 9am-6pm</li>
            </ul>

            <div id="map"></div>

            <ul class="social-icons">
                <li><a href="https://www.facebook.com/" ><i class="fab fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/" ><i class="fab fa-twitter"></i></a></li>
                <li><a href="https://www.instagram.com/"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="https://t.me/"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2023 Job Portal. All rights reserved.</p>
</footer>

<script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_xEvldVOqjGVS7oiMctpEFQjJBJ9cx9E&callback=initMap" async defer></script>

<script>
    function initMap() {
        var berlinLatLng = {lat: 52.5200, lng: 13.4050}; // Coordinates for Berlin

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 12,
            center: berlinLatLng
        });

        var marker = new google.maps.Marker({
            position: berlinLatLng,
            map: map,
            title: 'Our Location, Berlin'
        });
    }
</script>

</body>
</html>
