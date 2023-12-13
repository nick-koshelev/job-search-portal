document.addEventListener('DOMContentLoaded', function () {
    let map = null;
    const locationIcon = document.getElementById('locationIcon');
    const locationInput = document.getElementById('location');

    locationIcon.addEventListener('click', function () {
        // Если карта еще не создана, создаем ее
        if (!map) {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 51.505, lng: -0.09},
                zoom: 12
            });

            // Используем Places API для добавления поискового поля
            const input = document.getElementById('location');
            const searchBox = new google.maps.places.SearchBox(input);

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
        const mapContainer = document.getElementById('mapContainer');
        mapContainer.style.display = (mapContainer.style.display === 'none') ? 'block' : 'none';
    });
});