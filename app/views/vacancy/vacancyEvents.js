document.addEventListener('DOMContentLoaded', function () {
    // const locationIconFilter = document.getElementById('location');
    const locationFilterInput = document.getElementById('location');
    locationIcon.addEventListener('click', function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(handleLocation, handleLocationError);
        } else {
            console.error('Geolocation is not supported by this browser.');
        }
    });

    function handleLocation(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;

        reverseGeocode(latitude, longitude);
    }

    function handleLocationError(error) {
        console.error('Error getting geolocation:', error.message);
    }

    function reverseGeocode(lat, lng) {
        const language = 'en';
        const apiUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=10&accept-language=${language}`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                if (data.display_name) {
                    const cityName = data.address.city || data.address.town || data.address.village;
                    console.log('City:', cityName);

                    // Обновление поля ввода с id "locationFilter"
                    locationFilterInput.value = cityName;
                    // locationIconFilter.value = cityName;
                } else {
                    console.error('Unable to reverse geocode coordinates.');
                }
            })
            .catch(error => {
                console.error('Error during reverse geocoding request:', error);
            });
    }

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

