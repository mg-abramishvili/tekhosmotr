@extends('layouts.front')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 techpoint-detail-left">
                <div class="techpoint-detail">
                    <h6>{{ $techpoint->number }}</h6>
                    <h1>{{ $techpoint->title }}</h1>
                    <div class="row">

                        <div class="col-12 col-md-5">
                            <div class="techpoint-detail-item">
                                <div class="techpoint-detail-item-label">
                                    ИНН
                                </div>
                                <div class="techpoint-detail-item-value">
                                    {{ $techpoint->inn }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-7">
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

                    <a href="#" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#lead">Записаться</a>

                </div>
            </div>
            <div class="col-12 col-lg-6 techpoint-detail-right">
                <div class="page-map">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="lead">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form action="/email" method="post" enctype="multipart/form-data">@csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="station" placeholder="station">
                            @if ($errors->has('station'))
                                <div class="alert alert-danger">
                                    <!--{{ $errors->first('station') }}-->
                                    Укажите station
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="date" placeholder="date">
                            @if ($errors->has('date'))
                                <div class="alert alert-danger">
                                    <!--{{ $errors->first('date') }}-->
                                    Укажите date
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="time" placeholder="time">
                            @if ($errors->has('time'))
                                <div class="alert alert-danger">
                                    <!--{{ $errors->first('time') }}-->
                                    Укажите time
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="name">
                            @if ($errors->has('name'))
                                <div class="alert alert-danger">
                                    <!--{{ $errors->first('name') }}-->
                                    Укажите name
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" placeholder="phone">
                            @if ($errors->has('phone'))
                                <div class="alert alert-danger">
                                    <!--{{ $errors->first('phone') }}-->
                                    Укажите phone
                                </div>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
                    </form>
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