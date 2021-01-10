@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Заявки <span style="color: #999;">({{ $leads->count() }})</span></h1>
            </div>
            <div class="col-6" style="text-align: right;">
            
            </div>
        </div>

        <div class="page">
        
            <table class="table table-bordered table-hover">
                @forelse($leads as $lead)
                <tr>
                    <td style="text-align: left; padding-left: 20px; padding-right: 20px; vertical-align: middle;">
                        {{$lead->created_at}}
                        <span style="display:block; font-size: 13px; color: #999;">
                            {{ $lead->station }} | {{ $lead->date }} | {{ $lead->time }} | {{ $lead->name }} | {{ $lead->phone }}
                        </span>
                    </td>
                    <!--<td style="width: 200px; vertical-align: middle; text-align: center;">
                        <a href="#" class="btn btn-sm btn-danger">Удалить</a>
                    </td>-->
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