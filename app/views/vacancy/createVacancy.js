document.addEventListener('DOMContentLoaded', function () {
    var vacancyContainer = document.getElementById('vacancyContainer');

    // Отправляем запрос на сервер для получения данных о вакансиях
    fetch('/app/views/vacancy/getVacancy.php')
        .then(response => response.json())
        .then(vacanciesData => {
            // Отобразить вакансии при загрузке страницы
            vacanciesData.forEach(function (data) {
                createVacancyCard(data);
            });
        })
        .catch(error => {
            console.error('Error fetching vacancies:', error);
            alert('An error occurred while fetching vacancies. Please try again.');
        });

    function createVacancyCard(data) {
        var card = document.createElement('div');
        card.classList.add('card');

        var cardHTML = `
        <div class="job-title"><i class="fas fa-briefcase"></i> ${data.job_title || 'N/A'}</div>
        <table class="job-details">
            <tr>
                <td><i class="fas fa-building"></i></td>
                <td><strong>Company:</strong></td>
                <td>${data.company || 'N/A'}</td>
            </tr>
            <tr>
                <td><i class="fas fa-map-marker-alt"></i></td>
                <td><strong>Location:</strong></td>
                <td>${data.location || 'N/A'}</td>
            </tr>
            <tr>
                <td><i class="fas fa-align-left"></i></td>
                <td><strong>Description:</strong></td>
                <td>${data.description || 'N/A'}</td>
            </tr>
            <tr>
                <td><i class="fas fa-clock"></i></td>
                <td><strong>Job Type:</strong></td>
                <td>${data.job_type || 'N/A'}</td>
            </tr>
            <tr>
                <td><i class="fas fa-money-bill"></i></td>
                <td><strong>Salary:</strong></td>
                <td>${data.salary || 'N/A'}</td>
            </tr>
        </table>
    `;

        card.innerHTML = cardHTML;
        vacancyContainer.appendChild(card);
    }
});