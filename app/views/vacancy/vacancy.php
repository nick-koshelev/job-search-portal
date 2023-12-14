<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .form-container {
            margin-top: 20px;
            padding: 20px;
            max-height: 70vh;
            overflow-y: auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-dark {
            width: 100%;
        }
    </style>
    <title>Create New Vacancy</title>
</head>

<body>

<div class="header">
    <h2>WorkVista</h2>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h2 class="text-center">Vacancy Details</h2>
                </div>
                <div class="card-body form-container">
                    <form id="createVacancyForm" action="/app/views/vacancy/saveVacancy.php" method="post">
                        <div class="form-group">
                            <label for="job_title">Job Title:</label>
                            <input type="text" id="job_title" name="job_title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="company">Company:</label>
                            <input type="text" id="company" name="company" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <div class="input-group">
                                <input type="search" id="location" class="form-control filter" name="location" placeholder="Enter location...">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-map-marker-alt" id="locationIcon"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" rows="4" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="job_type">Job Type:</label>
                            <select id="job_type" name="job_type" class="form-control" required>
                                <option value="Teilzeit">Teilzeit</option>
                                <option value="Vollzeit">Vollzeit</option>
                                <option value="Minijob">Minijob</option>
                                <option value="Schichtarbeit">Schichtarbeit</option>
                                <option value="Freiarbeit">Freiarbeit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary:</label>
                            <input type="number" id="salary" name="salary" class="form-control" required min="0">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" value="Create Vacancy" class="btn btn-dark">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <p>&copy; 2023 Your Company. All rights reserved.</p>
</div>

<script src="/app/views/vacancy/vacancyEvents.js" defer></script>
<script src="/app/views/vacancy/createVacancy.js" defer></script>
</body>

</html>