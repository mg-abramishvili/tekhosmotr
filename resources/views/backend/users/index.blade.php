@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Пользователи <span style="color: #999;">({{ $users->count() }})</span></h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/backend/users/create" class="btn btn-primary">Добавить пользователя</a>
            </div>
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($users as $user)
                <tr>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px; vertical-align: middle;">
                        {{$user->name}}
                        <span style="display:block; font-size: 13px; color: #999;">
                            @foreach($user->techpoints as $techpoint)
                                {{ $techpoint->title }}
                            @endforeach
                        </span>
                    </td>
                    <td style="width: 200px; vertical-align: middle; text-align: center;">
                        <a href="/backend/users/{{$user->id}}/edit" class="btn btn-sm btn-warning">Изменить</a>
                        @if(auth()->user()->id == '1')
                        <a href="/backend/users/delete/{{$user->id}}" class="btn btn-sm btn-danger">Удалить</a>
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