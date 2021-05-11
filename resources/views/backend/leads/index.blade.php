@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1 style="text-transform: capitalize">{{ \Carbon\Carbon::parse($month)->locale('ru')->isoFormat('MMMM YYYY') }}</h1>
            </div>
            <div class="col-6" style="text-align: right;">
                @if(\Carbon\Carbon::parse($month)->locale('ru')->isoFormat('YYYY-MM') != '2021-05')
                <a href="/backend/leads-period/{{ \Carbon\Carbon::parse($month)->subMonth(1)->locale('ru')->isoFormat('YYYY-MM') }}">← пред. месяц</a>
                |
                @endif
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
                    height: 80px;
                    border-left: 1px solid #ccc;
                    border-bottom: 1px solid #ccc;
                    padding: 10px;
                    position: relative;
                }

                .month_view li:nth-child(7n) {
                    border-right: 1px solid #ccc;
                }

                .month_view li:last-child {
                    border-right: 1px solid #ccc;
                    width: calc(14.285% + 1px);
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
                    background-color: #007bff;
                    font-size: 15px;
                    padding: 7px 10px;
                    border-radius: 5px;
                    margin-bottom: 5px;
                    line-height: 1;
                    text-align: center;
                }

                .month_view li p.circle {
                    width: 20px;
                    height: 20px;
                    line-height: 20px;
                    font-size: 15px;
                    border-radius: 100%;
                    padding: 0;
                    margin: 0 auto;
                    font-weight: bold;
                    color: ##007bff;
                    position: absolute;
                    left: 0;
                    right: 0;
                    top: 50%;
                    transform: translateY(-50%);
                }

                .month_view li p.circle:hover {
                    cursor: pointer;
                }

                /*.month_view li p.circle.active {
                    background-color: #007bff;
                    color: #fff;
                    width: 100%;
                    height: 100%;
                    border-radius: 0;
                }*/

                .month_view .month_view_header {
                    height: 40px;
                    font-weight: bold;
                    border-top: 1px solid #ccc;
                    font-size: 16px;
                    line-height: 20px;
                    text-align: center;
                }

                #info_panel ul {
                    padding: 0;
                    margin: 0;
                    list-style-type: none;
                }

                #info_panel ul li {
                    margin-bottom: 15px;
                    padding: 15px 20px;
                    font-size: 15px;
                    border: 2px solid #007bff;
                }

                #info_panel ul li small {
                    color: #999;
                }

                #info_panel ul li i {
                    font-style: normal;
                    color: #888;
                    font-size: 11px;
                    text-transform: uppercase;
                }
            </style>

            <div class="current-month">
                <div class="row">
                    <div class="col-12 col-lg-7">
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
                                        @if($lead->n_date == \Carbon\Carbon::parse($day)->isoFormat('YYYY-MM-DD'))
                                            <p class="circle circle_{{\Carbon\Carbon::parse($day)->locale('ru')->isoFormat('YYYY_MM_DD') }}"><!--{{ $lead->where("n_date", \Carbon\Carbon::parse($day))->count() }}--></p>
                                        @endif

                                        @if(\Carbon\Carbon::parse($lead->n_date)->locale('en')->isoFormat('DD.MM.YYYY') == \Carbon\Carbon::parse($day)->locale('en')->isoFormat('DD.MM.YYYY'))
                                            <!--<p></p>-->
                                        @endif
                                    @endforeach
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div id="info_panel">
                            <ul>
                                @foreach ($leads as $lead)
                                    <li class="d-none lead_lead lead_{{ \Carbon\Carbon::parse($lead->n_date)->locale('ru')->isoFormat('YYYY_MM_DD') }}">
                                        <div class="row">
                                            <div class="col-6">
                                                @foreach(json_decode($lead->time) as $tm)
                                                    @if($loop->first)
                                                    <strong>{{ \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm') }}</strong>
                                                    @endif
                                                @endforeach
                                                <br>
                                                <span style="font-size: 12px; color: #757575;">{{ $lead->station }}</span>
                                            </div>
                                            <div class="col-6 text-right">
                                                <small>{{ \Carbon\Carbon::parse($lead->n_date)->locale('ru')->isoFormat('DD.MM.YYYY') }} @if(auth()->user()->id == '1')<i><a href="/backend/leads/delete/{{$lead->id}}">удалить заявку</a></i>@endif</small>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <p class="mt-0 mb-2"><i>Имя:</i> <br>{{ $lead->name }}</p>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <p class="mt-0 mb-2"><i>Телефон:</i> <br>{{ $lead->phone }}</p>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <p class="mt-0 mb-2"><i>Категория:</i> <br>{{ $lead->category }} <!--<span style="color: #999; font-size: 12px;">({{ count(json_decode($lead->time)) * 30 }} мин)</span>--></p>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <p class="mt-0 mb-2"><i>Госномер:</i> <br>{{ $lead->number }}</p>
                                            </div>
                                        </div>
                                    </li>

                                    <script>
                                        $('.circle_{{ \Carbon\Carbon::parse($lead->n_date)->locale('ru')->isoFormat('YYYY_MM_DD') }}').on('click', function() {
                                            $('.lead_lead').removeClass('d-none');
                                            $('.circle').removeClass('active');
                                            $('.circle_{{ \Carbon\Carbon::parse($lead->n_date)->locale('ru')->isoFormat('YYYY_MM_DD') }}').addClass('active');
                                            $('.lead_lead').hide();
                                            $('.lead_{{ \Carbon\Carbon::parse($lead->n_date)->locale('ru')->isoFormat('YYYY_MM_DD') }}').show();
                                        });
                                    </script>
                                @endforeach
                            </ul>
                        </div>
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