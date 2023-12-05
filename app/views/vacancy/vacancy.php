<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/createvacancy.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />
    <title>Create New Vacancy</title>
</head>
<body>

<div class="form-container">
    <h2>Create New Vacancy</h2>
    <form id="createVacancyForm" action="/app/views/vacancy/saveVacancy.php" method="post">
        <div align="center" class="form">
            <label for="job_title">Job Title:</label>
            <input type="text" id="job_title" name="job_title" required>
        </div>
        <div align="center" class="form">
            <label for="company">Company:</label>
            <input type="text" id="company" name="company" required>
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
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_xEvldVOqjGVS7oiMctpEFQjJBJ9cx9E&libraries=places&callback=initMap" async></script>

        <div align="center" class="form">
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
        </div>
        <div align="center" class="time-container">
            <label for="job_type">Job Type:</label>
            <select id="job_type" name="job_type" required>
                <option value="Teilzeit">Teilzeit</option>
                <option value="Vollzeit">Vollzeit</option>
                <option value="Minijob">Minijob</option>
                <option value="Schichtarbeit">Schichtarbeit</option>
                <option value="Freiarbeit">Freiarbeit</option>
            </select>
        </div>
        <div align="center" class="form">
            <label for="salary">Salary:</label>
            <input type="number" id="salary" name="salary" required min="0" class="blue-border">
        </div>
        <div align="center" class="form">
            <input type="submit" value="Create Vacancy">
        </div>
        <div id="vacancyCard"></div>
    </form>
</div>



<script src="/app/views/vacancy/vacancyEvents.js" defer></script>
<script src="/app/views/vacancy/createVacancy.js" defer></script>
</body>
