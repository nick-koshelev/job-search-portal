<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/createvacancy.css">
    <script src="https://cdn.jsdelivr.net/npm/places.js"></script>
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
            <input type="search" id="location" name="location" placeholder="Location" required>
        </div>
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
            <input type="text" id="salary" name="salary" required>
        </div>
        <div align="center" class="form">
            <input type="submit" value="Create Vacancy">
        </div>
        <div id="vacancyCard"></div>
    </form>
    <div id="vacancyCard"></div>
</div>

<div id="map"></div>

<script src="/app/views/vacancy/vacancyEvents.js" defer></script>
<script src="/app/views/vacancy/createVacancy.js" defer></script>
</body>