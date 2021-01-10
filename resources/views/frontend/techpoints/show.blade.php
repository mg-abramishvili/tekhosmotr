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

                    <a href="#" class="btn btn-lg btn-primary btn-lead" data-toggle="modal" data-target="#lead">Записаться</a>

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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center mb-4">Запись на техосмотр в <br>{{ $techpoint->title }}</h4>
                    <form action="/email" method="post" enctype="multipart/form-data">@csrf
                        <div class="form-group">
                            <input type="hidden" name="station" value="{{ $techpoint->title }}">
                            @if ($errors->has('station'))
                                <div class="alert alert-danger">
                                    Укажите station
                                </div>
                            @endif
                        </div>

                        <div class="form-group">

                            <div class="date-pick-slider">
                                <div class="date-pick-item">
                                    <input type="radio" id="d1" name="date" value="{{ \Carbon\Carbon::now()->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d1">{{ \Carbon\Carbon::now()->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d2" name="date" value="{{ \Carbon\Carbon::now()->addDay(1)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d2">{{ \Carbon\Carbon::now()->addDay(1)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d3" name="date" value="{{ \Carbon\Carbon::now()->addDay(2)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d3">{{ \Carbon\Carbon::now()->addDay(2)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d4" name="date" value="{{ \Carbon\Carbon::now()->addDay(3)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d4">{{ \Carbon\Carbon::now()->addDay(3)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d5" name="date" value="{{ \Carbon\Carbon::now()->addDay(4)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d5">{{ \Carbon\Carbon::now()->addDay(4)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d6" name="date" value="{{ \Carbon\Carbon::now()->addDay(5)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d6">{{ \Carbon\Carbon::now()->addDay(5)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d7" name="date" value="{{ \Carbon\Carbon::now()->addDay(6)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d7">{{ \Carbon\Carbon::now()->addDay(6)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d8" name="date" value="{{ \Carbon\Carbon::now()->addDay(7)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d8">{{ \Carbon\Carbon::now()->addDay(7)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d9" name="date" value="{{ \Carbon\Carbon::now()->addDay(8)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d9">{{ \Carbon\Carbon::now()->addDay(8)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d10" name="date" value="{{ \Carbon\Carbon::now()->addDay(9)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d10">{{ \Carbon\Carbon::now()->addDay(9)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d11" name="date" value="{{ \Carbon\Carbon::now()->addDay(10)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d11">{{ \Carbon\Carbon::now()->addDay(10)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d12" name="date" value="{{ \Carbon\Carbon::now()->addDay(11)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d12">{{ \Carbon\Carbon::now()->addDay(11)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d13" name="date" value="{{ \Carbon\Carbon::now()->addDay(12)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d13">{{ \Carbon\Carbon::now()->addDay(12)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d14" name="date" value="{{ \Carbon\Carbon::now()->addDay(13)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d14">{{ \Carbon\Carbon::now()->addDay(13)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d15" name="date" value="{{ \Carbon\Carbon::now()->addDay(14)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d15">{{ \Carbon\Carbon::now()->addDay(14)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d16" name="date" value="{{ \Carbon\Carbon::now()->addDay(15)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d16">{{ \Carbon\Carbon::now()->addDay(15)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d17" name="date" value="{{ \Carbon\Carbon::now()->addDay(16)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d17">{{ \Carbon\Carbon::now()->addDay(16)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d18" name="date" value="{{ \Carbon\Carbon::now()->addDay(17)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d18">{{ \Carbon\Carbon::now()->addDay(17)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d19" name="date" value="{{ \Carbon\Carbon::now()->addDay(18)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d19">{{ \Carbon\Carbon::now()->addDay(18)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d20" name="date" value="{{ \Carbon\Carbon::now()->addDay(19)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d20">{{ \Carbon\Carbon::now()->addDay(19)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d21" name="date" value="{{ \Carbon\Carbon::now()->addDay(20)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d21">{{ \Carbon\Carbon::now()->addDay(20)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d22" name="date" value="{{ \Carbon\Carbon::now()->addDay(21)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d22">{{ \Carbon\Carbon::now()->addDay(21)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d23" name="date" value="{{ \Carbon\Carbon::now()->addDay(22)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d23">{{ \Carbon\Carbon::now()->addDay(22)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d24" name="date" value="{{ \Carbon\Carbon::now()->addDay(23)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d24">{{ \Carbon\Carbon::now()->addDay(23)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d25" name="date" value="{{ \Carbon\Carbon::now()->addDay(24)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d25">{{ \Carbon\Carbon::now()->addDay(24)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d26" name="date" value="{{ \Carbon\Carbon::now()->addDay(25)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d26">{{ \Carbon\Carbon::now()->addDay(25)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d27" name="date" value="{{ \Carbon\Carbon::now()->addDay(26)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d27">{{ \Carbon\Carbon::now()->addDay(26)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d28" name="date" value="{{ \Carbon\Carbon::now()->addDay(27)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d28">{{ \Carbon\Carbon::now()->addDay(27)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d29" name="date" value="{{ \Carbon\Carbon::now()->addDay(28)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d29">{{ \Carbon\Carbon::now()->addDay(28)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d30" name="date" value="{{ \Carbon\Carbon::now()->addDay(29)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d30">{{ \Carbon\Carbon::now()->addDay(29)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>

                                <div class="date-pick-item">
                                    <input type="radio" id="d31" name="date" value="{{ \Carbon\Carbon::now()->addDay(30)->locale('ru')->isoFormat('DD MMM (dd)') }}">
                                    <label for="d31">{{ \Carbon\Carbon::now()->addDay(30)->locale('ru')->isoFormat('DD MMM (dd)') }}</label>
                                </div>
                            </div>

                            @if ($errors->has('date'))
                                <div class="alert alert-danger">
                                    Укажите дату
                                </div>
                            @endif
                            
                        </div>

                        <div class="row">

                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Время</label>

                                <select name="time" class="form-control">
                                    <option value="9:00">9:00</option>
                                    <option value="10:00">10:00</option>
                                    <option value="11:00">11:00</option>
                                    <option value="12:00">12:00</option>
                                    <option value="13:00">13:00</option>
                                    <option value="14:00">14:00</option>
                                    <option value="15:00">15:00</option>
                                    <option value="16:00">16:00</option>
                                    <option value="17:00">17:00</option>
                                    <option value="18:00">18:00</option>
                                </select>

                                @if ($errors->has('time'))
                                    <div class="alert alert-danger">
                                        Укажите время
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Имя</label>
                                <input type="text" class="form-control" name="name" placeholder="Александр">
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger">
                                        Укажите имя
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-12 col-md-4">
                            <div class="form-group">
                                <label>Телефон</label>
                                <input type="text" class="form-control" name="phone" placeholder="+7 (999) 123-45-67" required>
                                @if ($errors->has('phone'))
                                    <div class="alert alert-danger">
                                        Укажите телефон
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-lg btn-primary">Отправить</button>
                        <p class="text-secondary mt-2"><small>Нажимая кнопку "Отправить", вы соглашаетесь с обработкой данных.</small></p>
                        </div>

                        </div>
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

    <script>
        $('.date-pick-slider').flickity({
        cellAlign: 'left',
        pageDots: false,
        });
    </script>

    <script>
        $('#lead').on( 'shown.bs.modal', function( event ) {
            $('.date-pick-slider').flickity('resize');
        });
    </script>
@endsection