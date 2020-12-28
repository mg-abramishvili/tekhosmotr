@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Новая станция техосмотра</h1>
            </div>
        </div>

        <form action="/backend/techpoints" method="post" enctype="multipart/form-data">@csrf
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Название">
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

            <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Адрес">
                @if ($errors->has('address'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('address') }}-->
                        Укажите адрес
                    </div>
                @endif
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="tel" placeholder="Телефон">
                @if ($errors->has('tel'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('tel') }}-->
                        Укажите телефон
                    </div>
                @endif
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="E-mail">
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('email') }}-->
                        Укажите E-mail
                    </div>
                @endif
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="coordinates" placeholder="Координаты">
                @if ($errors->has('coordinates'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('coordinates') }}-->
                        Укажите координаты
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

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
        </form>
    </div>

@endsection