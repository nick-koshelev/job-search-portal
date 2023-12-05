<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/createvacancy.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />
    <title>Create New Company</title>
</head>
<body>

<div class="form-container">
    <h2>Create New Company</h2>
    <form id="createCompanyForm" action="/app/views/companies/saveCompany.php" method="post">
        <div align="center" class="form">
            <label for="name">Company Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div align="center" class="form">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
        </div>
        <div align="center" class="form">
            <label for="industry">Industry:</label>
            <input type="text" id="industry" name="industry" required>
        </div>
        <div align="center" class="form">
            <label for="location">Location:</label>
            <div class="location-container">
                <input type="search" id="location" name="location" placeholder="Location" required>
                <i class="fas fa-map-marker-alt" id="locationIcon"></i>
            </div>
        </div>

        <div id="mapContainer" style="display: none;">
            <div id="map" style="height: 400px;"></div>
        </div>
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&libraries=places&" async></script>

        <div align="center" class="form">
            <label for="website">Website:</label>
            <input type="text" id="website" name="website" required>
        </div>
        <div align="center" class="form">
            <label for="contact_email">Contact Email:</label>
            <input type="email" id="contact_email" name="contact_email" required>
        </div>
        <div align="center" class="form">
            <label for="contact_phone">Contact Phone:</label>
            <input type="tel" id="contact_phone" name="contact_phone" required>
        </div>
        <div align="center" class="form">
            <input type="submit" value="Create Company">
        </div>
        <div id="companyCard"></div>
    </form>
</div>

<script src="/app/views/companies/companyEvents.js" defer></script>
<script src="/app/views/companies/createCompany.js" defer></script>
</body>
