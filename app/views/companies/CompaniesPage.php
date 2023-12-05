<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/styles/jobs.css">
    <link rel="stylesheet" href="/styles/vacancyCard.css">
    <link rel="stylesheet" href="/styles/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Job Vacancies</title>
</head>

<body>
<a href="/" style="text-decoration: none;"><h2>Companies</h2></a>

<div class="search-container">
    <div class="company-container" id="companyContainer">
        <!-- Здесь будут отображаться все вакансии -->
    </div>
</div>
<section class="container">
    <h1 class="perks_header">Perks & Benefits</h1>
    <p class="perks_subheader">This job comes with several perks and benefits</p>
    <div class="cards-wrapper">
        <div class="cards-row">
            <div class="perks-card">
                <img src="/images/cards/card1.svg" alt="perks">
                <h3 class="card-title">Full Healthcare</h3>
                <p class="card-text">We believe in thriving communities and that starts with our team being happy and healthy.</p>
            </div>
            <div class="perks-card">
                <img src="/images/cards/card2.svg" alt="perks">
                <h3 class="card-title">Unlimited Vacation</h3>
                <p class="card-text">We believe you should have a flexible schedule that makes space for family, wellness, and fun.</p>
            </div>
            <div class="perks-card">
                <img src="/images/cards/card3.svg" alt="perks">
                <h3 class="card-title">Skill Development</h3>
                <p class="card-text">We believe in always learning and leveling up our skills. Whether it's a conference or online course.</p>
            </div>
        </div>
        <div class="cards-row">
            <div class="perks-card">
                <img src="/images/cards/card4.svg" alt="perks">
                <h3 class="card-title">Team Summits</h3>
                <p class="card-text">Every 6 months we have a full team summit where we have fun, reflect, and plan for the upcoming quarter.</p>
            </div>
            <div class="perks-card">
                <img src="/images/cards/card5.svg" alt="perks">
                <h3 class="card-title">Remote Working</h3>
                <p class="card-text">You know how you perform your best. Work from home, coffee shop or anywhere when you feel like it.</p>
            </div>
            <div class="perks-card">
                <img src="/images/cards/card6.svg" alt="perks">
                <h3 class="card-title">Commuter Benefits</h3>
                <p class="card-text">We’re grateful for all the time and energy each team member puts into getting to work every day.</p>
            </div>
        </div>
    </div>
</section>
<img src="/images/fone.png" alt="Your Image" style="width: 100%; height: 17%; position: absolute; top: 0; left: 0; z-index: -1;">
<img src="/images/logo.png" alt="Your Image" style="width: 10%; height: 17%; position: absolute; top: 0; left: 1070px; z-index: -1;">
<script src="/app/views/companies/createCompany.js" defer></script>
</body>

</html>