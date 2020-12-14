@extends('layouts.front')
@section('content')

    {{ $techpoint->title }}
    {{ $techpoint->coordinates }}

    <div class="main-map">
        <div id="map"></div>
    </div>

@endsection

@section('scripts')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=92375077-b48b-4559-ba81-1a740de008fc" type="text/javascript"></script>

    <script>
        ymaps.ready(function () {
            var myMap = new ymaps.Map('map', {
                    center: [54.708235,55.998587],
                    zoom: 16
                }, {
                    searchControlProvider: 'yandex#search'
                }),

                // Создаём макет содержимого.
                MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                    '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
                ),

                myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                    hintContent: 'Стоматология доктора Томилиной',
                    balloonContent: 'Стоматология доктора Томилиной'
                }, {
                    // Опции.
                    // Необходимо указать данный тип макета.
                    iconLayout: 'default#image',
                    // Своё изображение иконки метки.
                    iconImageHref: '/img/repairing-service.png',
                    // Размеры метки.
                    iconImageSize: [69, 68],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                    iconImageOffset: [-45, -38]
                })

            myMap.geoObjects
                .add(myPlacemark)

            myMap.behaviors.disable('scrollZoom');
        });
    </script>
@endsection