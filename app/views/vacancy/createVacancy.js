document.addEventListener('DOMContentLoaded', function () {
    console.log('Script is running.');

    var vacancyContainer = document.getElementById('vacancyContainer');

    if (!vacancyContainer) {
        console.error('Error: Vacancy container not found');
        return;
    }

    console.log('Vacancy container found:', vacancyContainer);

    fetch('/app/views/vacancy/getVacancy.php')
        .then(response => response.json())
        .then(vacanciesData => {
            console.log('Vacancies data:', vacanciesData);

            // Отобразить вакансии при загрузке страницы
            vacanciesData.reverse().forEach(function (data) {
                createVacancyCard(data, vacancyContainer);
            });
        })
        .catch(error => {
            console.error('Error fetching vacancies:', error);
            alert('An error occurred while fetching vacancies. Please try again.\nCheck the console for more details.');
        });
});

function createVacancyCard(data, container) {
    var card = document.createElement('div');
    card.dataset.type = data.job_type || 'N/A';
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

    // Добавляем data-type к элементу карточки
    card.dataset.type = data.job_type.toLowerCase();

    if (container) {
        container.insertBefore(card, container.firstChild);
    } else {
        console.error('Error: Vacancy container not found');
    }
}
function applyFilters() {
    var selectedTypes = Array.from(document.querySelectorAll('input[name^="filter_type"]:checked')).map(input => input.value);

    console.log('Selected Types:', selectedTypes);

    var vacancyCards = document.querySelectorAll('.card');

    vacancyCards.forEach(function (card) {
        var cardType = card.dataset.type;

        console.log('Card Type:', cardType);

        var typeFilterMatch = selectedTypes.length === 0 || selectedTypes.includes(cardType);

        console.log('Type Filter Match:', typeFilterMatch);

        if (!typeFilterMatch) {
            card.style.display = 'none';
        } else {
            card.style.display = 'block';
        }
    });
}

