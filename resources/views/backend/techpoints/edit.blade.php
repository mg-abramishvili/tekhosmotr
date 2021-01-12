@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>{{$techpoint->title}}</h1>
                <p style="color: #999">Изменение станции техосмотра</p>
            </div>
        </div>

        <form action="/backend/techpoints/{{$techpoint->id}}" method="post" enctype="multipart/form-data">@csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$techpoint->id}}">

            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Название" value="{{ $techpoint->title }}">
                @if ($errors->has('title'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('title') }}-->
                        Укажите название
                    </div>
                @endif
            </div>

            <div class="form-group">
                <select class="form-control" name="cities">
                    <option disabled selected value> -- Укажите город -- </option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}" @foreach($techpoint->cities as $s) @if($s->id == $city->id) selected @endif @endforeach>{{ $city->city }}</option>
                    @endforeach
                </select>
                @if ($errors->has('cities'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('cities') }}-->
                        Укажите город
                    </div>
                @endif
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Адрес" value="{{ $techpoint->address }}">
                @if ($errors->has('address'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('address') }}-->
                        Укажите адрес
                    </div>
                @endif
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="coordinates" placeholder="Координаты" value="{{ $techpoint->coordinates }}">
                @if ($errors->has('coordinates'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('coordinates') }}-->
                        Укажите координаты
                    </div>
                @endif
                <a href="https://yandex.ru/map-constructor/location-tool/" target="_blank">определение координат</a>
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="tel" placeholder="Телефон" value="{{ $techpoint->tel }}">
                @if ($errors->has('tel'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('tel') }}-->
                        Укажите Телефон
                    </div>
                @endif
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="E-mail" value="{{ $techpoint->email }}">
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('email') }}-->
                        Укажите E-mail
                    </div>
                @endif
            </div>

            <div class="form-group">
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

            <div class="form-group">
                <input type="text" class="form-control" name="number" placeholder="Номер" value="{{ $techpoint->number }}">
                @if ($errors->has('number'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('number') }}-->
                        Укажите Номер
                    </div>
                @endif
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="att_number" placeholder="Номер аттестата" value="{{ $techpoint->att_number }}">
                @if ($errors->has('att_number'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('att_number') }}-->
                        Укажите Номер аттестата
                    </div>
                @endif
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="inn" placeholder="ИНН" value="{{ $techpoint->inn }}">
                @if ($errors->has('inn'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('inn') }}-->
                        Укажите ИНН
                    </div>
                @endif
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="ogrn" placeholder="ОГРН" value="{{ $techpoint->ogrn }}">
                @if ($errors->has('ogrn'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('ogrn') }}-->
                        Укажите ОГРН
                    </div>
                @endif
            </div>

            <div class="form-group">
                <select class="form-control" name="cats[]" multiple>
                    @foreach($cats as $cat)
                        <option value="{{ $cat->id }}" @foreach($techpoint->cats as $c) @if($c->id == $cat->id) selected @endif @endforeach>{{ $cat->title }}</option>
                    @endforeach
                </select>
                @if ($errors->has('cats'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('cats') }}-->
                        Укажите Категории
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
        </form>

    </div>

@endsection