<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/jobs.css">
    <link rel="stylesheet" href="/styles/vacancyCard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Job Vacancies</title>
</head>

<body>
<a href="/" style="text-decoration: none;"><h2>Job Vacancies</h2></a>

<div class="search-container">

    <div class="filters-container">
        <div class="search-box">
            <input type="text" id="search" name="search" placeholder="Suchen...">
            <span class="search-icon" id="search-button">&#128269;</span>
        </div>
    <div class="filters">
        <h2>Filter:</h2>
        <label>
            <input type="checkbox" class="filter"  name="filter_type" value="Vollzeit"> Vollzeit
        </label>
        <label>
            <input type="checkbox" class="filter" name="filter_type" value="Teilzeit"> Teilzeit
        </label>
        <label>
            <input type="checkbox" class="filter" name="filter_location" value="Minijob"> Minijob
        </label>
        <label>
            <input type="checkbox" class="filter" name="filter_location" value="Homeoffice"> Homeoffice
        </label>
    </div>
    <div class="salary-filter">
        <h2>Your salary:</h2>
        <label for="minSalary">Min. Gehalt (€/Monat):</label>
        <input type="number" id="minSalary" name="minSalary" required min="0" placeholder="1200$">

        <label for="maxSalary">Max. Gehalt (€/Monat):</label>
        <input type="number" id="maxSalary" name="maxSalary" placeholder="50000$">

        <button type="button" id="applySalaryFilter">Anwenden</button>
    </div>
    <div class="location-filter">
        <h2>Location:</h2>
        <div class="location-input-container">
            <input type="text" id="location" class="filter" name="location" placeholder="Enter location...">
            <span class="location-icon" id="locationIcon">&#127758;</span>
        </div>
        <script src="/app/views/vacancy/vacancyEvents.js" defer></script>
        <button type="button" id="applyLocationFilter">Anwenden</button>
    </div>
    </div>
    <div class="vacancy-container" id="vacancyContainer">
        <!-- Здесь будут отображаться все вакансии -->
    </div>

</div>
<script src="/app/views/vacancy/createVacancy.js" defer></script>

<div class="pagination-container">
    <button id="prevPage" class="pagination-button" onclick="prevPage()">< Prev</button>
    <div id="pageButtons"></div>
    <button id="nextPage" class="pagination-button" onclick="nextPage()">Next ></button>
</div>
<img src="/images/fone.png" alt="Your Image" style="width: 100%; height: 17%; position: absolute; top: 0; left: 0; z-index: -1;">
<img src="/images/logo.png" alt="Your Image" style="width: 10%; height: 17%; position: absolute; top: 0; left: 1070px; z-index: -1;">

</body>

</html>