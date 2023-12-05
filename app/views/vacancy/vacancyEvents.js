
document.addEventListener('DOMContentLoaded', function () {
    var map = null;
    var locationIcon = document.getElementById('locationIcon');
    var locationInput = document.getElementById('location');

    locationIcon.addEventListener('click', function () {
        // Если карта еще не создана, создаем ее
        if (!map) {
            map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 51.505, lng: -0.09 },
                zoom: 13
            });

            // Используем Places API для добавления поискового поля
            var input = document.getElementById('location');
            var searchBox = new google.maps.places.SearchBox(input);

            // Обработчик выбора места из поискового поля
            searchBox.addListener('places_changed', function () {
                var places = searchBox.getPlaces();
                if (places.length === 0) {
                    return;
                }

                // Получаем координаты выбранного места и обновляем значение текстового поля
                var location = places[0].geometry.location;
                input.value = location.lat() + ', ' + location.lng();

                // Скрываем карту после выбора места
                var mapContainer = document.getElementById('mapContainer');
                mapContainer.style.display = 'none';
            });
        }

        // Переключаем видимость карты
        var mapContainer = document.getElementById('mapContainer');
        mapContainer.style.display = (mapContainer.style.display === 'none') ? 'block' : 'none';

        // Скрываем значок локации при клике
        locationIcon.style.display = 'none';
    });

    // Добавляем обработчик события ввода для отслеживания ввода в поле локации
    locationInput.addEventListener('input', function () {
        // Если поле ввода не пустое, скрыть значок локации, иначе показать
        if (locationInput.value.trim() !== '') {
            locationIcon.style.display = 'none';
        } else {
            locationIcon.style.display = 'block';
        }
    });

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
