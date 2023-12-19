<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - Job Portal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background: linear-gradient(to right, #007bff, #343a40);
            color: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            flex: 1;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-body {
            padding: 20px;
            display: none;
        }

        h2 {
            color: #007bff;
        }

        p {
            line-height: 1.6;
            color: black;
            margin-bottom: 15px;
        }

        .read-more-btn {
            cursor: pointer;
            color: #007bff;
            text-decoration: underline;
        }

        .toggle-icon {
            font-size: 18px;
            margin-left: 5px;
        }

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
    <h1>Privacy Policy</h1>
</header>

<div class="container">
    <div class="card">
        <div class="card-header" onclick="toggleContent('content1')">
            Our Commitment to Privacy
            <span class="toggle-icon">&#9660;</span>
        </div>
        <div id="content1" class="card-body">
            <h2>Information We Collect</h2>
            <p>
                We collect information from you when you register on our site, place an order, subscribe to our
                newsletter, respond to a survey, or fill out a form.
            </p>
            <h2>Why We Collect Information</h2>
            <p>
                We collect information to improve our services, personalize your experience, and communicate with you.
            </p>
        </div>
    </div>

    <div class="card">
        <div class="card-header" onclick="toggleContent('content2')">
            How We Use Your Information
            <span class="toggle-icon">&#9660;</span>
        </div>
        <div id="content2" class="card-body">
            <h2>Personalization</h2>
            <p>
                We may use the information we collect from you to personalize your experience and provide relevant content.
            </p>
            <h2>Communication</h2>
            <p>
                We may use your information to send you emails, newsletters, and updates about our services.
            </p>
        </div>
    </div>


</div>

<!-- Footer -->
<footer>
    <p>&copy; 2023 Job Portal. All rights reserved.</p>
</footer>

<!-- Bootstrap JS and Font Awesome (for the icons) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/your-font-awesome-kit-id.js" crossorigin="anonymous"></script>

<script>
    function toggleContent(contentId) {
        var content = document.getElementById(contentId);
        var icon = document.querySelector(`#${contentId} .toggle-icon`);
        if (content.style.display === 'none') {
            content.style.display = 'block';
            icon.innerHTML = '&#9650;';
        } else {
            content.style.display = 'none';
            icon.innerHTML = '&#9660;';
        }
    }
</script>

</body>
</html>
