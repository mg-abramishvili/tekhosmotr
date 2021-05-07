@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Новый пользователь</h1>
            </div>
        </div>

        <form action="/backend/users" method="post" enctype="multipart/form-data">@csrf

            <div class="row">

                <div class="col-12 col-lg-4">
                    <div class="form-group">
                        <label class="font-weight-bold">Имя</label>
                        <input type="text" class="form-control" name="name" placeholder="Имя">
                        @if ($errors->has('name'))
                            <div class="alert alert-danger">
                                Укажите имя
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="form-group">
                        <label class="font-weight-bold">E-mail</label>
                        <input type="text" class="form-control" name="email" placeholder="E-mail">
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">
                                Укажите E-mail
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="form-group">
                        <label class="font-weight-bold">Пароль</label>
                        <input type="text" class="form-control" name="password" placeholder="Пароль">
                        @if ($errors->has('password'))
                            <div class="alert alert-danger">
                                Укажите пароль
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Станции</label>
                        <select class="form-control" name="techpoints[]" multiple>
                            @foreach($techpoints as $techpoint)
                                <option value="{{ $techpoint->id }}">{{ $techpoint->title }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('techpoints'))
                            <div class="alert alert-danger">
                                Укажите станцию(и)
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-lg btn-success">Добавить</button>
        </form>
    </div>

@endsection