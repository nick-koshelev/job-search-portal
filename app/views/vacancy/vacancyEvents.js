document.addEventListener('DOMContentLoaded', function () {
    var input = document.getElementById('location');
    var placesAutocomplete = places({
        container: input,
    });

    placesAutocomplete.on('change', function (e) {
        fetch(`https://api.opencagedata.com/geocode/v1/json?q=${encodeURIComponent(e.suggestion.value)}&key=5684a33cac6042e08ba3835c65cb2ce6`)
            .then(response => response.json())
            .then(data => {
                if (data.results && data.results.length > 0) {
                    // Извлекаем компоненты адреса из данных
                    var components = data.results[0].components;

                    // Проверяем наличие города и области
                    var city = components.city || components.county || components.state;

                    // Выводим город в консоль (или используйте его по своему усмотрению)
                    console.log('City:', city);

                    // Обновляем поле ввода локации с городом
                    input.value = city;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});
document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('createVacancyForm');

    form.addEventListener('submit', function (event) {
        event.preventDefault(); // Предотвратить отправку формы

        // Выполнить асинхронный запрос для сохранения данных
        fetch('/app/views/vacancy/saveVacancy.php', {
            method: form.method,
            body: new FormData(form),
        })
            .then(response => response.json()) // Предполагается, что сервер возвращает JSON
            .then(data => {
                console.log(data);

                // Проверка статуса и вывод сообщения об ошибке
                if (data.status === 'error') {
                    alert(data.message);
                } else {
                    // Перенаправить пользователя на страницу jobPage.php
                    window.location.href = '/app/views/jobs/jobPage.php';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});