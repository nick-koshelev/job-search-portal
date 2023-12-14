let searchValue = "";
let filterValue = "";
let minSalaryValue = "";
let maxSalaryValue = "";
let locationValue = "";
document.addEventListener('DOMContentLoaded', function () {
    console.log('Script is running.');

    let searchButton = document.getElementById('search-button');
    let salaryButton = document.getElementById('applySalaryFilter');
    let locationButton = document.getElementById('applyLocationFilter');
    searchButton.addEventListener('click', function() {
        let searchBox = document.getElementById('search');
        searchValue = searchBox.value;
        getVacancies();
    });

    salaryButton.addEventListener('click', function() {
        let minBox = document.getElementById('minSalary');
        let maxBox = document.getElementById('maxSalary');

        minSalaryValue = parseFloat(minBox.value) || 0;
        maxSalaryValue = parseFloat(maxBox.value) || Number.POSITIVE_INFINITY;

        console.log('Min Salary:', minSalaryValue);
        console.log('Max Salary:', maxSalaryValue);

        getVacancies();
    });
    locationButton.addEventListener('click', function() {
        let locationBox = document.getElementById('location');
        locationValue = locationBox.value;
        getVacancies();
    });
    let filters = document.getElementsByClassName('filter');
    Array.prototype.forEach.call(filters, function(filter) {
        filter.addEventListener('click', function() {
            if (!this.checked){
                filterValue = "";
            } else {
                filterValue = this.value;
            }

            console.log('Filter:', filterValue);
            getVacancies();
        });
    });

    // Отправляем запрос на сервер для получения данных о вакансиях
    getVacancies();
});

function getVacancies() {
    // Получаем ссылку на vacancyContainer
    let vacancyContainer = document.getElementById('vacancyContainer');

    // Проверяем, найден ли vacancyContainer
    if (!vacancyContainer) {
        return;
    }

    console.log('Vacancy container found:', vacancyContainer);
    vacancyContainer.innerHTML = "";

    // Получаем значения фильтров
    let search = searchValue;
    let filter = filterValue;
    let location = locationValue;
    console.log('Search:', search);
    console.log('Filter:', filter);
    console.log('Location:', location);
    console.log('Min Salary:', minSalaryValue);
    console.log('Max Salary:', maxSalaryValue);

    // Формируем URL для запроса на сервер
    let url = `/app/views/vacancy/getVacancy.php?search=${search}&filter=${filter}&minSalary=${minSalaryValue}&maxSalary=${maxSalaryValue}&location=${location}`;

    // Отправляем запрос на сервер для получения данных о вакансиях
    fetch(url, { method: 'GET' })
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
        
            <button type="submit" class="respond-button">Mehr</button>
   
        <form action="/user/respond?vacancyId=${data.id}" method="post">
          <div class="favorite-icon" >
        <button type="submit" class="fas fa-heart" ></button>
          </div>
              </form>
    `;

    card.innerHTML = cardHTML;

    if (container) {
        container.insertBefore(card, container.firstChild);
    } else {
        console.error('Error: Vacancy container not found');
    }

}
