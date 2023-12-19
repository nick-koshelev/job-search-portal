<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/jobs.css">
    <link rel="stylesheet" href="/styles/vacancyCard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

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
    </div>
    <div class="col-md-4">
        <div class="news-container">
            <h3>Neueste Nachrichten</h3>
            <ul class="news-list">
                <li>
                    <img class="news-image" src="/images/new1.png" alt="Bild" />
                    <h4>Zukunft Berufe</h4>
                    <a href="https://www.azubiyo.de/berufe/berufe-mit-zukunft/">Nach einem erfolgreichen Schulabschluss wünschen sich viele Schüler einen zukunftssicheren Job, der nach der Ausbildung zudem gute Gehaltsaussichten und Karriere bietet. Doch welche Berufe haben überhaupt Zukunft?</a>
                </li>
                <li>
                    <img class="news-image" src="/images/new2.png" alt="Bild" />
                    <h4>Arbeit im Ausland</h4>
                    <a href="https://www.arbeitsagentur.de/arbeitslos-arbeit-finden/arbeitslosengeld/arbeiten-im-ausland">Arbeiten im Ausland bietet Ihnen viele Vorteile. Gewinnen Sie sowohl in beruflicher als auch persönlicher Hinsicht.</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script src="/app/views/vacancy/createVacancy.js" defer></script>

<div class="pagination-container">
    <button id="prevPage" class="pagination-button" onclick="prevPage()">< Amfang</button>
    <div id="pageButtons"></div>
    <button id="nextPage" class="pagination-button" onclick="nextPage()">Ende ></button>
</div>


<!--<div class="container">-->
    <section style="height:80px;"></section>

    <footer class="footer-bs">
        <div class="row">
            <div class="col-md-3 footer-brand animated fadeInLeft">
                <h2>Workvista</h2>
                <p>Registrieren Sie sich noch heute und starten Sie Ihre Reise zu neuen beruflichen Horizonten. Workvista - Ihre erste Wahl für Karriereentwicklung und beruflichen Erfolg!</p>
                <p>© 2023, All rights reserved</p>
            </div>
            <div class="col-md-4 footer-nav animated fadeInUp">
                <h4>Menu —</h4>
                <div class="col-md-6">
                    <ul class="pages">
                        <li><a href="http://localhost:8000/#">Home</a></li>
                        <li><a href="http://localhost:8000/company">Companies</a></li>
                        <li><a href="http://localhost:8000/user">Profile</a></li>
                        <li><a href="http://localhost:8000/app/views/info/advice.php#">Advice</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list">
                        <li><a href="http://localhost:8000/app/views/info/contact.php#">Contacts</a></li>
                        <li><a href="http://localhost:8000/app/views/info/privacyPolicy.php#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 footer-social animated fadeInDown">
                <h4>Follow Us</h4>
                <ul id="social-links">
                    <li><a href="#" onclick="redirectToSocial('Facebook')">Facebook</a></li>
                    <li><a href="#" onclick="redirectToSocial('Twitter')">Twitter</a></li>
                    <li><a href="#" onclick="redirectToSocial('Instagram')">Instagram</a></li>
                    <li><a href="#" onclick="redirectToSocial('Telegram')">Telegram</a></li>
                </ul>

                <script>
                    function redirectToSocial(socialMedia) {

                        var redirectUrl = 'https://www.deine-soziale-netzwerk-url.de';
                        switch (socialMedia) {
                            case 'Facebook':
                                redirectUrl = 'https://www.facebook.com/';
                                break;
                            case 'Twitter':
                                redirectUrl = 'https://twitter.com/';
                                break;
                            case 'Instagram':
                                redirectUrl = 'https://www.instagram.com/';
                                break;
                            case 'Telegram':
                                redirectUrl = 'https://t.me/';
                                break;
                        }
                        window.location.href = redirectUrl;
                    }
                </script>
            </div>
            <div class="col-md-3 footer-ns animated fadeInRight">
                <h4>Newsletter</h4>
                <p>A rover wearing a fuzzy suit doesn’t alarm the real penguins</p>
                <p>

                </p>
            </div>
        </div>
    </footer>
    <section style="text-align:center; margin:10px auto;"><p>Designed by <a href="/">Bespalova Y, Koschelev M</a></p></section>

<img src="/images/fone.png" alt="Your Image" style="width: 100%; height: 17%; position: absolute; top: 0; left: 0; z-index: -1;">
<img src="/images/logo.png" alt="Your Image" style="width: 10%; height: 17%; position: absolute; top: 0; left: 1070px; z-index: -1;">
</body>

</html>