@extends('layouts.front')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="techpoint-detail">
                    <h6>{{ $techpoint->number }}</h6>
                    <h1>{{ $techpoint->title }}</h1>
                    <div class="row">

                        <div class="col-12 col-md-5 techpoint-detail-left">
                            <div class="techpoint-detail-item">
                                <div class="techpoint-detail-item-label">
                                    ИНН
                                </div>
                                <div class="techpoint-detail-item-value">
                                    {{ $techpoint->inn }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-7 techpoint-detail-right">
                            <div class="techpoint-detail-item">
                                <div class="techpoint-detail-item-label">
                                    ОГРН/ОГРНИП
                                </div>
                                <div class="techpoint-detail-item-value">
                                    {{ $techpoint->ogrn }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-5">
                            <div class="techpoint-detail-item">
                                <div class="techpoint-detail-item-label">
                                    Номер аттестата
                                </div>
                                <div class="techpoint-detail-item-value">
                                    {{ $techpoint->att_number }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-7">
                            <div class="techpoint-detail-item">
                                <div class="techpoint-detail-item-label">
                                    Аккредитованные категории ТС
                                </div>
                                <div class="techpoint-detail-item-value">
                                    <ul>
                                        @foreach($techpoint->cats as $cat)
                                            <li>{{ $cat->title }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-5">
                            <div class="techpoint-detail-item">
                                <div class="techpoint-detail-item-label">
                                    Город
                                </div>
                                <div class="techpoint-detail-item-value">
                                    @foreach($techpoint->cities as $city)
                                        {{ $city->city }}
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-7">
                            <div class="techpoint-detail-item">
                                <div class="techpoint-detail-item-label">
                                    Адрес
                                </div>
                                <div class="techpoint-detail-item-value">
                                    {{ $techpoint->address }}
                                </div>
                            </div>
                        </div>

                    </div>

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