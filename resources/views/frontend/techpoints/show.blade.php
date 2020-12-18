@extends('layouts.front')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="techpoint-detail">
                    <h1>{{ $techpoint->title }}</h1>
                    <p>Текст с описанием Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quibusdam ad, explicabo commodi voluptatibus, ipsum quam aut earum consequuntur maiores doloribus placeat reprehenderit? Aliquam, mollitia aut.</p>
                    <p>Адрес: <strong>{{ $techpoint->address }}</strong></p>
                    <p>Телефон: <strong>{{ $techpoint->tel }}</strong></p>
                    <button class="btn btn-lg btn-primary">Записаться</button>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="page-map">
                    <div id="map"></div>
                </div>
            </div>
        </div>
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
                    hintContent: '{{$techpoint->title}}',
                    balloonContent: '{{$techpoint->title}}<br><br><a class="btn btn-sm btn-primary" href="#">Записаться</a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: '/img/repairing-service.png',
                    iconImageSize: [40, 40],
                    iconImageOffset: [-20, -20]
                })

            myMap.geoObjects
                .add(myPlacemark)

            //myMap.behaviors.disable('scrollZoom');
            myMap.controls.remove('searchControl');
            myMap.controls.remove('trafficControl');
        });
    </script>
@endsection