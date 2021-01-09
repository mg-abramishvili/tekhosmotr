@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Страницы <span style="color: #999;">({{ $pages->count() }})</span></h1>
            </div>
            <div class="col-6" style="text-align: right;">
                
            </div>
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($pages as $page)
                <tr>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px; vertical-align: middle;">
                        {{$page->title}}
                    </td>
                    <td style="width: 200px; vertical-align: middle; text-align: center;">
                        <a href="/backend/pages/{{$page->id}}/edit" class="btn btn-sm btn-warning">Изменить</a>
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