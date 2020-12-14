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
                <input type="text" class="form-control" name="coordinates" placeholder="Координаты" value="{{ $techpoint->coordinates }}">
                @if ($errors->has('coordinates'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('coordinates') }}-->
                        Укажите координаты
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
        </form>

    </div>

@endsection