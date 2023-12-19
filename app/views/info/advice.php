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
            background-image: url('/images/fone.png');
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
            'description' => '<div style="font-family: Arial, sans-serif; font-size: 18px; line-height: 1.6; color: #555555;">
                <p style="font-size: 20px; font-weight: bold; margin-bottom: 10px;">Die Wahl des richtigen Karrierewegs ist ein wichtiger Schritt in der beruflichen Entwicklung. Hier sind einige Tipps, die bei der Entscheidung helfen können:</p>

                <ol style="list-style-type: decimal; padding-left: 20px; margin-bottom: 20px;">
                    <li><strong>Selbsterkenntnis:</strong> Analysiere deine Interessen, Stärken, Schwächen und Werte. Was macht dir Freude? Welche Fähigkeiten möchtest du in deinem Job einsetzen? Eine klare Selbsterkenntnis ist der erste Schritt zur Auswahl des passenden Karrierewegs.</li>

                    <li><strong>Berufsrecherche:</strong> Informiere dich gründlich über verschiedene Berufsfelder, Industrien und Unternehmen. Welche Karrieremöglichkeiten bieten sie? Welche Qualifikationen sind erforderlich? Dies kann durch Gespräche mit Fachleuten, Recherche im Internet und Teilnahme an Branchenveranstaltungen erreicht werden.</li>

                    <li><strong>Berufliche Ziele setzen:</strong> Definiere klare berufliche Ziele für dich selbst. Überlege, wo du in den nächsten Jahren stehen möchtest und welchen Beitrag du in deinem gewählten Bereich leisten möchtest. Dies hilft bei der Auswahl eines Karrierewegs, der zu deinen langfristigen Zielen passt.</li>

                    <li><strong>Feedback einholen:</strong> Suche nach Feedback von Mentoren, Vorgesetzten oder erfahrenen Fachleuten. Externes Feedback kann dir helfen, deine Stärken und Bereiche zur Verbesserung zu identifizieren.</li>
                </ol>

                <p style="margin-bottom: 20px;">Die Wahl des richtigen Karrierewegs erfordert Zeit und Reflexion. Es ist wichtig, diesen Prozess mit Bedacht anzugehen und die verschiedenen Aspekte deiner Persönlichkeit und beruflichen Ziele zu berücksichtigen.</p>
            </div>'
        ],
        [
            'title' => 'Effektive Jobsuche-Strategien',
            'description' => '<div style="font-family: Arial, sans-serif; font-size: 18px; line-height: 1.6; color: #555555;">
        <p style="font-size: 20px; font-weight: bold; margin-bottom: 10px;">Erfahren Sie, wie Sie Ihre Jobsuche optimieren, einen beeindruckenden Lebenslauf erstellen und bei Arbeitgebern auffallen können.</p>

        <ul style="list-style-type: disc; padding-left: 20px; margin-bottom: 20px;">
            <li><strong>Optimieren Sie Ihre Jobsuche:</strong> Nutzen Sie effektive Strategien, um gezielt nach passenden Stellenangeboten zu suchen.</li>

            <li><strong>Lebenslauf erstellen:</strong> Erfahren Sie, wie Sie einen Lebenslauf verfassen, der Ihre Fähigkeiten und Erfahrungen hervorhebt.</li>

            <li><strong>Auffallen bei Arbeitgebern:</strong> Entdecken Sie Techniken, um sich positiv von anderen Bewerbern abzuheben.</li>

        </ul>
    </div>',
        ],
        [
            'title' => 'Aufbau eines Starken Berufsnetzwerks',
            'description' => '<div style="font-family: Arial, sans-serif; font-size: 18px; line-height: 1.6; color: #555555;">
        <p style="font-size: 20px; font-weight: bold; margin-bottom: 10px;">Entdecken Sie die Bedeutung von Networking und wie Sie sinnvolle Verbindungen in Ihrer Branche aufbauen können.</p>

        <p><strong>Warum ist ein starkes Berufsnetzwerk wichtig?</strong></p>
        <p>Ihr berufliches Netzwerk kann entscheidend für den Erfolg Ihrer Karriere sein. Erfahren Sie, wie Sie es strategisch aufbauen und pflegen können.</p>

        <ul style="list-style-type: disc; padding-left: 20px; margin-bottom: 20px;">
            <li><strong>Networking verstehen:</strong> Lernen Sie, was Networking wirklich bedeutet und wie es Ihnen beruflich nützen kann.</li>

            <li><strong>Strategisch Kontakte knüpfen:</strong> Erfahren Sie, wie Sie gezielt Kontakte in Ihrer Branche aufbauen und pflegen können.</li>

            <li><strong>Online-Plattformen nutzen:</strong> Entdecken Sie die Vorteile von Online-Netzwerken und wie Sie diese effektiv einsetzen können.</li>

        </ul>
    </div>',
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
                'image' => '/images/lebenslauf/lebenslauf_muster_1.jpg',
                'file' => '/pdf/lebenslauf.pdf',
            ],
            [
                'title' => 'Lebenslauf Muster 2',
                'description' => 'Dies kann von Ihnen benutzt werden.',
                'image' => '/images/lebenslauf/lebenslauf_muster_2.jpg',
                'file' => '/pdf/lebenslauf (1).pdf',
            ],
            [
                'title' => 'Lebenslauf Muster 3',
                'description' => 'Dies kann von Ihnen benutzt werden.',
                'image' => '/images/lebenslauf/lebenslauf_muster_3.jpg',
                'file' => '/pdf/lebenslauf (2).pdf',
            ],
            [
                'title' => 'Lebenslauf Muster 4',
                'description' => 'Dies kann von Ihnen benutzt werden.',
                'image' => '/images/lebenslauf/lebenslauf_muster_4.jpg',
                'file' => '/pdf/lebenslauf (3).pdf',
            ],
            [
                'title' => 'Lebenslauf Muster 5',
                'description' => 'Dies kann von Ihnen benutzt werden.',
                'image' => '/images/lebenslauf/lebenslauf_muster_5.jpg',
                'file' => '/pdf/lebenslauf (4).pdf',
            ],
            [
                'title' => 'Lebenslauf Muster 6',
                'description' => 'Dies kann von Ihnen benutzt werden.',
                'image' => '/images/lebenslauf/lebenslauf_muster_6.jpg',
                'file' => '/pdf/lebenslauf (5).pdf',
            ],
        ];

        foreach ($pdfTemplates as $index => $template) {
            echo '<div class="pdf-card">';
            echo '<img src="' . $template['image'] . '" alt="' . $template['title'] . '">';
            echo '<div class="card-body">';
            echo '<h5 class="card-title">' . $template['title'] . '</h5>';
            if ($index >= 2 && $index <= 4) {
                echo '<p class="card-text" style="margin-top: 31px;">' . $template['description'] . '</p>';
            } else {
                echo '<p class="card-text">' . $template['description'] . '</p>';
            }
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
