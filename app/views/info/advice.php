<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beratung für Berufe</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 56px;
        }

        @media (min-width: 768px) {
            body {
                padding-top: 70px;
            }
        }

        .jumbotron {
            background-image: url('/images/advice_background.jpg');
            background-size: cover;
            color: #fff;
            text-align: center;
            padding: 100px 0;
            margin-bottom: 0;
        }

        .advice-card {
            margin: 20px 0;
        }

        .pdf-section {
            margin-top: 50px;
            overflow-x: auto;
        }

        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }

        .pdf-cards-container {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            margin-bottom: 20px;
        }

        .pdf-card {
            flex: 0 0 auto;
            margin-right: 20px;
            border: 2px solid #007bff;
            border-radius: 10px;
            width: 300px;
            overflow: hidden;
        }

        .pdf-card img {
            width: 100%;
            height: auto;
        }

        .pdf-card:hover {
            border-color: #0056b3;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">BeratungsHub</a>
</nav>

<div class="jumbotron">
    <h1 class="display-4">Expertenrat für Ihre Karriere</h1>
    <p class="lead">Erhalten Sie wertvolle Einblicke und Tipps von Branchenprofis, um Ihre Karriere zu fördern.</p>
</div>

<!-- Advice Cards -->
<div class="container">
    <?php
    $adviceItems = [
        [
            'title' => 'Den Richtigen Karriereweg Wählen',
            'description' => 'Erkunden Sie verschiedene Karrierewege und finden Sie den, der Ihren Interessen und Fähigkeiten entspricht.',
        ],
        [
            'title' => 'Effektive Jobsuche-Strategien',
            'description' => 'Erfahren Sie, wie Sie Ihre Jobsuche optimieren, einen beeindruckenden Lebenslauf erstellen und bei Arbeitgebern auffallen können.',
        ],
        [
            'title' => 'Aufbau eines Starken Berufsnetzwerks',
            'description' => 'Entdecken Sie die Bedeutung von Networking und wie Sie sinnvolle Verbindungen in Ihrer Branche aufbauen können.',
        ],
    ];

    echo '<div id="accordion">';

    foreach ($adviceItems as $index => $advice) {
        echo '<div class="card advice-card">';
        echo '<div class="card-header" id="heading' . $index . '">';
        echo '<h5 class="mb-0">';
        echo '<button class="btn btn-link" data-toggle="collapse" data-target="#collapse' . $index . '" aria-expanded="true" aria-controls="collapse' . $index . '">';
        echo $advice['title'];
        echo '</button>';
        echo '</h5>';
        echo '</div>';
        echo '<div id="collapse' . $index . '" class="collapse" aria-labelledby="heading' . $index . '" data-parent="#accordion">';
        echo '<div class="card-body">';
        echo '<p class="card-text">' . $advice['description'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    echo '</div>';
    ?>
</div>

<!-- PDF Templates Section -->
<div class="container pdf-section">
    <h2>Lebenslauf & Bewerbungsschreiben</h2>
    <p>Hier finden Sie Vorlagen für Lebensläufe und Bewerbungsschreiben im PDF-Format. Laden Sie sie einfach herunter und verwenden Sie sie als Referenz für Ihre eigenen Unterlagen.</p>

    <div class="pdf-cards-container">
        <?php
        $pdfTemplates = [
            [
                'title' => 'Lebenslauf Muster 1',
                'description' => 'Dies kann von Ihnen benutzt werden.',
                'image' => '/images/lebenslauf_muster_1.jpg',
                'file' => '/pdf/lebenslauf.pdf',
            ],
            [
                'title' => 'Lebenslauf Muster 2',
                'description' => 'Dies kann von Ihnen benutzt werden.',
                'image' => '/images/lebenslauf_muster_2.jpg',
                'file' => '/pdf/lebenslauf (1).pdf',
            ],
            [
                'title' => 'Lebenslauf Muster 3',
                'description' => 'Dies kann von Ihnen benutzt werden.',
                'image' => '/images/lebenslauf_muster_3.jpg',
                'file' => '/pdf/lebenslauf (2).pdf',
            ],
            [
                'title' => 'Lebenslauf Muster 4',
                'description' => 'Dies kann von Ihnen benutzt werden.',
                'image' => '/images/lebenslauf_muster_4.jpg',
                'file' => '/pdf/lebenslauf (3).pdf',
            ],
            [
                'title' => 'Lebenslauf Muster 5',
                'description' => 'Dies kann von Ihnen benutzt werden.',
                'image' => '/images/lebenslauf_muster_5.jpg',
                'file' => '/pdf/lebenslauf (4).pdf',
            ],
            [
                'title' => 'Lebenslauf Muster 6',
                'description' => 'Dies kann von Ihnen benutzt werden.',
                'image' => '/images/lebenslauf_muster_6.jpg',
                'file' => '/pdf/lebenslauf (5).pdf',
            ],
        ];

        foreach ($pdfTemplates as $index => $template) {
            echo '<div class="pdf-card">';
            echo '<img src="' . $template['image'] . '" alt="' . $template['title'] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $template['title'] . '</h5>';
            echo '<p class="card-text">' . $template['description'] . '</p>';
            echo '<a href="' . $template['file'] . '" class="btn btn-primary" download>Herunterladen</a>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<div class="footer text-center">
    <p>&copy; 2023 BeratungsHub. Alle Rechte vorbehalten.</p>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
