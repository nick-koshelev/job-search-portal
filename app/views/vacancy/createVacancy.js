let searchValue = "";
let filterValue = "";

document.addEventListener('DOMContentLoaded', function () {
    console.log('Script is running.');

    let searchButton = document.getElementById('search-button');

    searchButton.addEventListener('click', function() {
        let searchBox = document.getElementById('search');

        searchValue = searchBox.value;

        getVacancies();
    });

    let filters = document.getElementsByClassName('filter');
    console.log(filters);
    Array.prototype.forEach.call(filters,function(filter) {
            filter.addEventListener('click', function() {
                if (!this.checked){
                    filterValue = "";
                } else {
                    filterValue = this.value;
                }
                getVacancies();
            });
        }
    );

    // Отправляем запрос на сервер для получения данных о вакансиях
    getVacancies()
});

function getVacancies(search = "", filter = "")
{
    // Получаем ссылку на vacancyContainer
    let vacancyContainer = document.getElementById('vacancyContainer');

    // Проверяем, найден ли vacancyContainer
    if (!vacancyContainer) {
        return;
    }

    console.log('Vacancy container found:', vacancyContainer);
    vacancyContainer.innerHTML = "";

    search = searchValue;
    filter = filterValue;

    fetch('/app/views/vacancy/getVacancy.php?search=' + search + '&filter=' + filter, { method: 'GET' })
        .then(response => response.json())
        .then(vacanciesData => {
            console.log('Vacancies data:', vacanciesData);

            // Отобразить вакансии при загрузке страницы
            vacanciesData.forEach(function (data) {
                createVacancyCard(data, vacancyContainer);
            });
        })
        .catch(error => {
            console.error('Error fetching vacancies:', error);
            alert('An error occurred while fetching vacancies. Please try again.\nCheck the console for more details.');
        });
}

function createVacancyCard(data, container) {

    console.log('Creating vacancy card:', data);

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
        <form action="/user/respond?vacancyId=${data.id}" method="post">
            <button type="submit">Respond</button>
        </form>
    `;

    card.innerHTML = cardHTML;

    // Проверка наличия контейнера перед добавлением
    if (container) {
        // Используем insertBefore, чтобы добавлять в начало
        container.insertBefore(card, container.firstChild);
    } else {
        console.error('Error: Vacancy container not found');
    }

}
