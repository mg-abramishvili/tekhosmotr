@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Новая станция техосмотра</h1>
            </div>
        </div>

        <form action="/backend/techpoints" method="post" enctype="multipart/form-data">@csrf

            <div class="row">

                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Название</label>
                        <input type="text" class="form-control" name="title" placeholder="Название">
                        @if ($errors->has('title'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('title') }}-->
                                Укажите название
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Город</label>
                        <select class="form-control" name="cities">
                            <option disabled selected value> -- Укажите город -- </option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->city }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('cities'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('cities') }}-->
                                Укажите город
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Юр. адрес</label>
                        <input type="text" class="form-control" name="legal_address" placeholder="Юр. адрес">
                        @if ($errors->has('legal_address'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('legal_address') }}-->
                                Укажите юр. адрес
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Адрес</label>
                        <input type="text" class="form-control" name="address" placeholder="Адрес">
                        @if ($errors->has('address'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('address') }}-->
                                Укажите адрес
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Координаты</label>
                        <input type="text" class="form-control" name="coordinates" placeholder="Координаты">
                        @if ($errors->has('coordinates'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('coordinates') }}-->
                                Укажите координаты
                            </div>
                        @endif
                        <a href="https://yandex.ru/map-constructor/location-tool/" target="_blank">определение координат</a>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Телефон</label>
                        <input type="text" class="form-control" name="tel" placeholder="Телефон">
                        @if ($errors->has('tel'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('tel') }}-->
                                Укажите телефон
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">E-mail</label>
                        <input type="text" class="form-control" name="email" placeholder="E-mail">
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('email') }}-->
                                Укажите E-mail
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Номер</label>
                        <input type="text" class="form-control" name="number" placeholder="Номер">
                        @if ($errors->has('number'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('number') }}-->
                                Укажите Номер
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Номер аттестата</label>
                        <input type="text" class="form-control" name="att_number" placeholder="Номер аттестата">
                        @if ($errors->has('att_number'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('att_number') }}-->
                                Укажите Номер аттестата
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">ИНН</label>
                        <input type="text" class="form-control" name="inn" placeholder="ИНН">
                        @if ($errors->has('inn'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('inn') }}-->
                                Укажите ИНН
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">ОГРН</label>
                        <input type="text" class="form-control" name="ogrn" placeholder="ОГРН">
                        @if ($errors->has('ogrn'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('ogrn') }}-->
                                Укажите ОГРН
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Категории</label>
                        <select class="form-control" name="cats[]" multiple>
                            @foreach($cats as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('cats'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('cats') }}-->
                                Укажите Категории
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Время работы</label>
                        <div class="row">
                            <div class="col-6">
                                <select name="working_hours_start" class="custom-select">
                                    <option value="01:00">01:00</option>
                                    <option value="01:30">01:30</option>
                                    <option value="02:00">02:00</option>
                                    <option value="02:30">02:30</option>
                                    <option value="03:00">03:00</option>
                                    <option value="03:30">03:30</option>
                                    <option value="04:00">04:00</option>
                                    <option value="04:30">04:30</option>
                                    <option value="05:00">05:00</option>
                                    <option value="05:30">05:30</option>
                                    <option value="06:00">06:00</option>
                                    <option value="06:30">06:30</option>
                                    <option value="07:00">07:00</option>
                                    <option value="07:30">07:30</option>
                                    <option value="08:00">08:00</option>
                                    <option value="08:30">08:30</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:30">18:30</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:30">19:30</option>
                                    <option value="20:00">20:00</option>
                                    <option value="20:30">20:30</option>
                                    <option value="21:00">21:00</option>
                                    <option value="21:30">21:30</option>
                                    <option value="22:00">22:00</option>
                                    <option value="22:30">22:30</option>
                                    <option value="23:00">23:00</option>
                                    <option value="23:30">23:30</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select name="working_hours_end" class="custom-select">
                                    <option value="01:00">01:00</option>
                                    <option value="01:30">01:30</option>
                                    <option value="02:00">02:00</option>
                                    <option value="02:30">02:30</option>
                                    <option value="03:00">03:00</option>
                                    <option value="03:30">03:30</option>
                                    <option value="04:00">04:00</option>
                                    <option value="04:30">04:30</option>
                                    <option value="05:00">05:00</option>
                                    <option value="05:30">05:30</option>
                                    <option value="06:00">06:00</option>
                                    <option value="06:30">06:30</option>
                                    <option value="07:00">07:00</option>
                                    <option value="07:30">07:30</option>
                                    <option value="08:00">08:00</option>
                                    <option value="08:30">08:30</option>
                                    <option value="09:00">09:00</option>
                                    <option value="09:30">09:30</option>
                                    <option value="10:00">10:00</option>
                                    <option value="10:30">10:30</option>
                                    <option value="11:00">11:00</option>
                                    <option value="11:30">11:30</option>
                                    <option value="12:00">12:00</option>
                                    <option value="12:30">12:30</option>
                                    <option value="13:00">13:00</option>
                                    <option value="13:30">13:30</option>
                                    <option value="14:00">14:00</option>
                                    <option value="14:30">14:30</option>
                                    <option value="15:00">15:00</option>
                                    <option value="15:30">15:30</option>
                                    <option value="16:00">16:00</option>
                                    <option value="16:30">16:30</option>
                                    <option value="17:00">17:00</option>
                                    <option value="17:30">17:30</option>
                                    <option value="18:00">18:00</option>
                                    <option value="18:30">18:30</option>
                                    <option value="19:00">19:00</option>
                                    <option value="19:30">19:30</option>
                                    <option value="20:00">20:00</option>
                                    <option value="20:30">20:30</option>
                                    <option value="21:00">21:00</option>
                                    <option value="21:30">21:30</option>
                                    <option value="22:00">22:00</option>
                                    <option value="22:30">22:30</option>
                                    <option value="23:00">23:00</option>
                                    <option value="23:30">23:30</option>
                                </select>
                            </div>
                        </div>
                        @if ($errors->has('working_hours'))
                            <div class="alert alert-danger">
                                Укажите Время работы
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label class="font-weight-bold">День приема автобусов</label>
                <select name="bus_day[]" class="custom-select" multiple>
                    <option value="Monday">Понедельник</option>
                    <option value="Tuesday">Вторник</option>
                    <option value="Wednesday">Среда</option>
                    <option value="Thursday">Четверг</option>
                    <option value="Friday">Пятница</option>
                    <option value="Saturday">Суббота</option>
                    <option value="Sunday">Воскресенье</option>
                </select>
                @if ($errors->has('bus_day'))
                    <div class="alert alert-danger">
                        Укажите День приема автобусов
                    </div>
                @endif
            </div>

            @if(auth()->user()->id == '1')
            <div class="form-group">
                <label class="font-weight-bold">Кнопка записи</label>
                <select class="form-control" name="status">
                        <option value="enabled" selected>Вкл</option>
                        <option value="disabled">Выкл</option>
                </select>
                @if ($errors->has('status'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('status') }}-->
                        Укажите статус
                    </div>
                @endif
            </div>
            @endif

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
        </form>
    </div>

@endsection