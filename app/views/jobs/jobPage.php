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
<h2>Job Vacancies</h2>

<div class="search-container">
    <div class="search-box">
        <input type="text" id="search" name="search" placeholder="Suchen...">
        <span class="search-icon" onclick="performSearch()">&#128269;</span>
    </div>
    <div class="filters">
        <h2>Filter:</h2>
        <label>
            <input type="checkbox" name="filter_type" value="full_time"> Vollzeit
        </label>
        <label>
            <input type="checkbox" name="filter_type" value="part_time"> Teilzeit
        </label>
        <label>
            <input type="checkbox" name="filter_location" value="remote"> Minijob
        </label>
        <label>
            <input type="checkbox" name="filter_location" value="office"> Homeoffice
        </label>
        <button onclick="applyFilters()">Filter anwenden</button>
    </div>
    <div class="vacancy-container" id="vacancyContainer">
        <!-- Здесь будут отображаться все вакансии -->
    </div>
</div>

<img src="/images/fone.png" alt="Your Image" style="width: 100%; height: 17%; position: absolute; top: 0; left: 0; z-index: -1;">
<img src="/images/logo.png" alt="Your Image" style="width: 10%; height: 17%; position: absolute; top: 0; left: 1070px; z-index: -1;">

<script src="/app/views/vacancy/createVacancy.js" defer></script>
</body>

</html>