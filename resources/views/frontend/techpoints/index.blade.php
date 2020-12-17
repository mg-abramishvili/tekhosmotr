@extends('layouts.front')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-3">
                <div class="main-techpoints-list">
                    @foreach($techpoints as $techpoint)
                    <div class="main-techpoints-list-item">
                        <p class="title">{{ $techpoint->title }}</p>
                        <span class="tel"></span>
                        <span class="address"></span>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <div class="main-map">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;apikey=92375077-b48b-4559-ba81-1a740de008fc" type="text/javascript"></script>

    <script>
        ymaps.ready(function () {
            var myMap = new ymaps.Map('map', {
                center: [54.741825755940866,55.95225576587478],
                zoom: 16
            }, {
                searchControlProvider: 'yandex#search'
            }),

            // Создаём макет содержимого.
            MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
            ),

            @foreach($techpoints as $techpoint)
            placemark{{ $techpoint->id }} = new ymaps.Placemark([{{$techpoint->coordinates}}], {
                hintContent: '{{$techpoint->title}}',
                balloonContent: '<a href="#{{ $techpoint->id }}">Записаться</a>'
            },                
            {
                iconLayout: 'default#image',
                iconImageHref: '/img/repairing-service.png',
                iconImageSize: [40, 40],
                iconImageOffset: [-20, -20]
            });
            @endforeach

            myMap.geoObjects
                @foreach($techpoints as $techpoint)
                    .add(placemark{{$techpoint->id}})
                @endforeach

            myMap.behaviors.disable('scrollZoom');
            myMap.controls.remove('searchControl');
            myMap.controls.remove('trafficControl');
        });
    </script>
@endsection