@extends('layouts.front')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 techpoint-detail-left">
                <div class="techpoint-detail">
                    <h6>{{ $techpoint->number }}</h6>
                    <h1>{{ $techpoint->title }}</h1>
                    <div class="row">

                        <div class="col-12 col-md-6">
                            <div class="techpoint-detail-item">
                                <div class="techpoint-detail-item-label">
                                    ИНН
                                </div>
                                <div class="techpoint-detail-item-value">
                                    {{ $techpoint->inn }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="techpoint-detail-item">
                                <div class="techpoint-detail-item-label">
                                    ОГРН/ОГРНИП
                                </div>
                                <div class="techpoint-detail-item-value">
                                    {{ $techpoint->ogrn }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="techpoint-detail-item">
                                <div class="techpoint-detail-item-label">
                                    Номер аттестата
                                </div>
                                <div class="techpoint-detail-item-value">
                                    {{ $techpoint->att_number }}
                                    <a href="{{ $techpoint->docpic }}" target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file align-middle me-2"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
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

                        <div class="col-12 col-md-6">
                            <div class="techpoint-detail-item">
                                <div class="techpoint-detail-item-label">
                                    Адрес ПТО
                                </div>
                                <div class="techpoint-detail-item-value pr-2">
                                    @foreach($techpoint->cities as $city){{ $city->city }}@endforeach{{''}}, {{ $techpoint->address }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="techpoint-detail-item">
                                <div class="techpoint-detail-item-label">
                                    Юр.адрес
                                </div>
                                <div class="techpoint-detail-item-value">
                                    {{ $techpoint->legal_address }}
                                </div>
                            </div>
                        </div>

                        @isset($techpoint->dopus)
                        <div class="col-12">
                            <div class="techpoint-detail-item">
                                <div class="techpoint-detail-item-label">
                                    Доп. услуги
                                </div>
                                <div class="techpoint-detail-item-value">
                                    {!! $techpoint->dopus !!}
                                </div>
                            </div>
                        </div>
                        @endisset

                    </div>

                    @if($techpoint->status == 'enabled')
                        <a href="/appointment/{{$techpoint->id}}/@foreach($techpoint->cats as $ctg){{""}}@if($loop->first){{""}}{{$ctg->title}}{{""}}@endif{{""}}@endforeach/{{ \Carbon\Carbon::now()->locale('ru')->isoFormat('YYYY-MM-DD') }}" class="btn btn-lg btn-primary btn-lead">Записаться</a>
                    @else
                    @endif
                </div>
            </div>
            <div class="col-12 col-lg-6 techpoint-detail-right">
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
                    //balloonContent: '{{$techpoint->title}}<br><br><a class="btn btn-sm btn-primary" href="#">Записаться</a>'
                },
                {
                    iconLayout: 'default#image',
                    iconImageHref: '/img/repairing-service.svg',
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