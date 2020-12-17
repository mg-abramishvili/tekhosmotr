@extends('layouts.front')
@section('content')

    {{ $techpoint->title }}
    {{ $techpoint->coordinates }}

    <div class="page-map">
        <div id="map"></div>
    </div>

@endsection

@section('scripts')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=2493318c-8f60-438f-a8be-1cf6ef94a38d" type="text/javascript"></script>

    <script>
        ymaps.ready(function () {
            var myMap = new ymaps.Map('map', {
                    center: [{{ $techpoint->coordinates }}],
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
                    balloonContent: 'Стоматология <a href="#">link</a> доктора Томилиной'
                }, {
                    // Опции.
                    // Необходимо указать данный тип макета.
                    iconLayout: 'default#image',
                    // Своё изображение иконки метки.
                    iconImageHref: '/img/repairing-service.png',
                    // Размеры метки.
                    iconImageSize: [40, 40],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                    iconImageOffset: [-20, -20]
                })

            myMap.geoObjects
                .add(myPlacemark)

            myMap.behaviors.disable('scrollZoom');
            myMap.controls.remove('searchControl');
            myMap.controls.remove('trafficControl');
        });
    </script>
@endsection