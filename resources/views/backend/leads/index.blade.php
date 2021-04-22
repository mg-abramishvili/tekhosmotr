@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1 style="text-transform: capitalize">{{ \Carbon\Carbon::parse($month)->locale('ru')->isoFormat('MMMM YYYY') }}</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                <a href="/backend/leads-period/{{ \Carbon\Carbon::parse($month)->subMonth(1)->locale('ru')->isoFormat('YYYY-MM') }}">← пред. месяц</a>
                |
                <a href="/backend/leads-period/{{ \Carbon\Carbon::parse($month)->addMonth(1)->locale('ru')->isoFormat('YYYY-MM') }}">след. месяц →</a>
            </div>
        </div>

        <div class="page">

            <style>
                .month_view {
                    padding: 0;
                    margin: 0;
                    list-style-type: none;
                }

                .month_view li {
                    display: block;
                    float: left;
                    width: 14.285%;
                    height: 100px;
                    border-left: 1px solid #ccc;
                    border-bottom: 1px solid #ccc;
                    padding: 10px;
                }

                .month_view li:nth-child(7n) {
                    border-right: 1px solid #ccc;
                }

                .month_view li:last-child {
                    border-right: 1px solid #ccc;
                    width: calc(14.285% + 0.5px);
                }

                .month_view li span {
                    font-size: 13px;
                    color: rgb(168, 168, 168);
                    display: block;
                    text-align: right;
                    margin-top: -5px;
                    margin-right: -5px;
                }

                .month_view li p {
                    background-color: aquamarine;
                    font-size: 15px;
                    padding: 7px 10px;
                    border-radius: 5px;
                    margin-bottom: 5px;
                    line-height: 1;
                    text-align: center;
                }

                .month_view .month_view_header {
                    height: 40px;
                    font-weight: bold;
                    border-top: 1px solid #ccc;
                    font-size: 16px;
                    line-height: 20px;
                    text-align: center;
                }
            </style>

            <div class="current-month">
                <div class="row">
                    <div class="col-12 col-lg-9">
                        <ul class="month_view">
                            <li class="month_view_header">ПН</li>
                            <li class="month_view_header">ВТ</li>
                            <li class="month_view_header">СР</li>
                            <li class="month_view_header">ЧТ</li>
                            <li class="month_view_header">ПТ</li>
                            <li class="month_view_header">СБ</li>
                            <li class="month_view_header">ВС</li>
                            @foreach ($month_days as $day)
                                @if($loop->first)
                                    @if(\Carbon\Carbon::parse($day)->locale('en')->isoFormat('ddd') == 'Tue')
                                        <li></li>
                                    @elseif(\Carbon\Carbon::parse($day)->locale('en')->isoFormat('ddd') == 'Wed')
                                        <li></li>
                                        <li></li>
                                    @elseif(\Carbon\Carbon::parse($day)->locale('en')->isoFormat('ddd') == 'Thu')
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    @elseif(\Carbon\Carbon::parse($day)->locale('en')->isoFormat('ddd') == 'Fri')
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    @elseif(\Carbon\Carbon::parse($day)->locale('en')->isoFormat('ddd') == 'Sat')
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    @elseif(\Carbon\Carbon::parse($day)->locale('en')->isoFormat('ddd') == 'Sun')
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                        <li></li>
                                    @endif
                                @endif
                                <li class="{{ \Carbon\Carbon::parse($day)->locale('en')->isoFormat('ddd') }}">
                                    <span>{{ \Carbon\Carbon::parse($day)->locale('ru')->isoFormat('D') }}</span>

                                    @foreach ($leads as $lead)
                                        @if(\Carbon\Carbon::parse($lead->n_date)->locale('en')->isoFormat('DD.MM.YYYY') == \Carbon\Carbon::parse($day)->locale('en')->isoFormat('DD.MM.YYYY'))
                                            <p>{{ \Carbon\Carbon::parse($lead->time)->locale('ru')->isoFormat('H:mm') }}</p>
                                        @endif
                                    @endforeach
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-12 col-lg-3">
                        info
                    </div>
                </div>
            </div>








        
            <table class="table table-bordered table-hover" style="display:none">
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