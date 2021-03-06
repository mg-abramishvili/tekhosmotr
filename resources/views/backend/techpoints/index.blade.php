@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-12 col-lg-6">
                <h1>Станции техосмотра <span style="color: #999;">({{ $techpoints->count() }})</span></h1>
            </div>
            @if(auth()->user()->id == '1')
            <div class="col-12 col-lg-6" style="text-align: right;">
                <a href="/backend/techpoints/create" class="btn btn-primary">Добавить станцию</a>
            </div>
            @endif
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($techpoints as $techpoint)
                <tr>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px; vertical-align: middle;">
                        {{$techpoint->title}}
                        <span style="display:block; font-size: 13px; color: #999;">
                            @foreach($techpoint->cities as $city)
                                {{ $city->city }}
                            @endforeach
                        </span>
                    </td>
                    <td style="width: 200px; vertical-align: middle; text-align: center;">
                        <a href="/backend/techpoints/{{$techpoint->id}}/edit" class="btn btn-sm btn-warning">Изменить</a>
                        @if(auth()->user()->id == '1')
                        <a href="/backend/techpoints/delete/{{$techpoint->id}}" class="btn btn-sm btn-danger">Удалить</a>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td style="text-align: center;">
                        Пусто &#9785;
                    </td>
                </tr>
                @endforelse
            </table>
        </div>
    </div>
@endsection