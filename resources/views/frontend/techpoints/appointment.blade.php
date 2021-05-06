@extends('layouts.front')
@section('content')
<div class="front-lead-form">
    <div class="container">
        <h4 class="text-center mb-4">Запись на техосмотр в <br>{{ $techpoint->title }}</h4>
        <form action="/email/{{ $techpoint->id }}" method="post" id="lead_form" enctype="multipart/form-data">@csrf
            
            <div class="flash-success">
                <div class="alert alert-success" role="alert">
                    Заявка успешно отправлена!
                </div>
            </div>

            <div class="form-group">
                <input type="hidden" name="station" value="{{ $techpoint->title }}">
                <span class="station_error text-danger"></span>
            </div>

            <div class="row">
                <div class="col-12 col-lg-6">

                        <div class="form-group">
                            <label>Категория ТС</label>
        
                            <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" name="category" class="custom-select">
                                <option disabled selected value>Выберите категорию</option>
                                @foreach ($techpoint->cats as $tcat)
                                    <option value="/appointment/{{$techpoint->id}}/{{ $tcat->title }}/{{ $date }}" @if($cat == $tcat->title) selected @endif>{{$tcat->title}}</option>
                                @endforeach
                            </select>
                            <span class="category_error text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label>Дата</label>
                            <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" name="n_date" class="custom-select">
                                @if($cat == 'M2' || $cat == 'M3')
                                    @foreach(json_decode($techpoint->bus_day) as $bd)
                                        @if($bd == \Carbon\Carbon::now()->addDay(5)->locale('en')->isoFormat('dddd'))
                                            <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(5)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(5)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>
                                                {{ \Carbon\Carbon::now()->addDay(5)->locale('ru')->isoFormat('DD MMM (dd)') }}
                                            </option>
                                        @endif
                                    @endforeach
            
                                    @foreach(json_decode($techpoint->bus_day) as $bd)
                                        @if($bd == \Carbon\Carbon::now()->addDay(6)->locale('en')->isoFormat('dddd'))
                                            <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(6)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(6)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>
                                                {{ \Carbon\Carbon::now()->addDay(6)->locale('ru')->isoFormat('DD MMM (dd)') }}
                                            </option>
                                        @endif
                                    @endforeach
            
                                    @foreach(json_decode($techpoint->bus_day) as $bd)
                                        @if($bd == \Carbon\Carbon::now()->addDay(7)->locale('en')->isoFormat('dddd'))
                                            <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(7)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(7)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>
                                                {{ \Carbon\Carbon::now()->addDay(7)->locale('ru')->isoFormat('DD MMM (dd)') }}
                                            </option>
                                        @endif
                                    @endforeach
            
                                    @foreach(json_decode($techpoint->bus_day) as $bd)
                                        @if($bd == \Carbon\Carbon::now()->addDay(8)->locale('en')->isoFormat('dddd'))
                                            <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(8)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(8)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>
                                                {{ \Carbon\Carbon::now()->addDay(8)->locale('ru')->isoFormat('DD MMM (dd)') }}
                                            </option>
                                        @endif
                                    @endforeach
            
                                    @foreach(json_decode($techpoint->bus_day) as $bd)
                                        @if($bd == \Carbon\Carbon::now()->addDay(9)->locale('en')->isoFormat('dddd'))
                                            <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(9)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(9)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>
                                                {{ \Carbon\Carbon::now()->addDay(9)->locale('ru')->isoFormat('DD MMM (dd)') }}
                                            </option>
                                        @endif
                                    @endforeach
            
                                    @foreach(json_decode($techpoint->bus_day) as $bd)
                                        @if($bd == \Carbon\Carbon::now()->addDay(10)->locale('en')->isoFormat('dddd'))
                                            <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(10)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(10)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>
                                                {{ \Carbon\Carbon::now()->addDay(10)->locale('ru')->isoFormat('DD MMM (dd)') }}
                                            </option>
                                        @endif
                                    @endforeach
            
                                    @foreach(json_decode($techpoint->bus_day) as $bd)
                                        @if($bd == \Carbon\Carbon::now()->addDay(11)->locale('en')->isoFormat('dddd'))
                                            <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(11)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(11)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>
                                                {{ \Carbon\Carbon::now()->addDay(11)->locale('ru')->isoFormat('DD MMM (dd)') }}
                                            </option>
                                        @endif
                                    @endforeach
                                @else
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(1)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(1)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(1)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(2)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(2)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(2)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(3)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(3)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(3)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(4)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(4)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(4)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(5)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(5)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(5)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(6)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(6)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(6)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(7)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(7)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(7)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(8)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(8)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(8)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(9)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(9)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(9)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(10)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(10)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(10)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(11)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(11)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(11)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(12)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(12)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(12)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(13)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(13)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(13)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(14)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(14)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(14)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(15)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(15)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(15)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(16)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(16)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(16)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(17)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(17)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(17)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(18)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(18)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(18)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(19)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(19)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(19)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(20)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(20)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(20)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(21)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(21)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(21)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(22)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(22)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(22)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(23)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(23)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(23)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(24)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(24)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(24)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(25)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(25)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(25)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(26)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(26)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(26)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(27)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(27)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(27)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(28)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(28)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(28)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(29)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(29)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(29)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                                @endif
                            </select>
                            <span class="date_error text-center text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label>Время</label>
        
                            <style>
                                select option:disabled {
                                    color: rgb(194, 194, 194);
                                }
                            </style>
                            <br>
                            <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->isoFormat('H:mm') }}</button>
                            <script>
                                $('#{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->isoFormat('H_mm') }}').click(function(event) {
                                    event.preventDefault();
                                    $('#time').val('');
                                    $('#time option[value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->isoFormat('H:mm') }}"]').prop('selected', true);
                                    if($('#time option:selected').next().is(':enabled')) {
                                        $('#time option:selected').next().prop('selected', true);
                                    } else {
                                        alert('Времени на техосмотр категории {{$cat}} не хватит. Пожалуйста, выберите другое время.')
                                    }
                                });
                            </script>

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(30)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(30)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(30)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(30)->locale('ru')->isoFormat('H:mm') }}</button>
                                <script>
                                    $('#{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(30)->isoFormat('H_mm') }}').click(function(event) {
                                        event.preventDefault();
                                        $('#time').val('');
                                        $('#time option[value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(30)->isoFormat('H:mm') }}"]').prop('selected', true);
                                        if($('#time option:selected').next().is(':enabled')) {
                                            $('#time option:selected').next().prop('selected', true);
                                        } else {
                                            alert('Времени на техосмотр категории {{$cat}} не хватит. Пожалуйста, выберите другое время.')
                                        }
                                    });
                                </script>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(60)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(60)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(60)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(60)->locale('ru')->isoFormat('H:mm') }}</button>
                                <script>
                                    $('#{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(60)->isoFormat('H_mm') }}').click(function(event) {
                                        event.preventDefault();
                                        $('#time').val('');
                                        $('#time option[value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(60)->isoFormat('H:mm') }}"]').prop('selected', true);
                                        if($('#time option:selected').next().is(':enabled')) {
                                            $('#time option:selected').next().prop('selected', true);
                                        } else {
                                            alert('Времени на техосмотр категории {{$cat}} не хватит. Пожалуйста, выберите другое время.')
                                        }
                                    });
                                </script>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(90)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(90)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(90)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(90)->locale('ru')->isoFormat('H:mm') }}</button>
                                <script>
                                    $('#{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(90)->isoFormat('H_mm') }}').click(function(event) {
                                        event.preventDefault();
                                        $('#time').val('');
                                        $('#time option[value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(90)->isoFormat('H:mm') }}"]').prop('selected', true);
                                        if($('#time option:selected').next().is(':enabled')) {
                                            $('#time option:selected').next().prop('selected', true);
                                        } else {
                                            alert('Времени на техосмотр категории {{$cat}} не хватит. Пожалуйста, выберите другое время.')
                                        }
                                    });
                                </script>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(120)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(120)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(120)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(120)->locale('ru')->isoFormat('H:mm') }}</button>
                                <script>
                                    $('#{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(120)->isoFormat('H_mm') }}').click(function(event) {
                                        event.preventDefault();
                                        $('#time').val('');
                                        $('#time option[value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(120)->isoFormat('H:mm') }}"]').prop('selected', true);
                                        if($('#time option:selected').next().is(':enabled')) {
                                            $('#time option:selected').next().prop('selected', true);
                                        } else {
                                            alert('Времени на техосмотр категории {{$cat}} не хватит. Пожалуйста, выберите другое время.')
                                        }
                                    });
                                </script>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(150)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(150)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(150)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(150)->locale('ru')->isoFormat('H:mm') }}</button>
                                <script>
                                    $('#{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(150)->isoFormat('H_mm') }}').click(function(event) {
                                        event.preventDefault();
                                        $('#time').val('');
                                        $('#time option[value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(150)->isoFormat('H:mm') }}"]').prop('selected', true);
                                        if($('#time option:selected').next().is(':enabled')) {
                                            $('#time option:selected').next().prop('selected', true);
                                        } else {
                                            alert('Времени на техосмотр категории {{$cat}} не хватит. Пожалуйста, выберите другое время.')
                                        }
                                    });
                                </script>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(180)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(180)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(180)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(180)->locale('ru')->isoFormat('H:mm') }}</button>
                                <script>
                                    $('#{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(180)->isoFormat('H_mm') }}').click(function(event) {
                                        event.preventDefault();
                                        $('#time').val('');
                                        $('#time option[value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(180)->isoFormat('H:mm') }}"]').prop('selected', true);
                                        if($('#time option:selected').next().is(':enabled')) {
                                            $('#time option:selected').next().prop('selected', true);
                                        } else {
                                            alert('Времени на техосмотр категории {{$cat}} не хватит. Пожалуйста, выберите другое время.')
                                        }
                                    });
                                </script>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(210)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(210)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(210)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(210)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(240)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(240)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(240)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(240)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(270)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(270)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(270)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(270)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(300)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(300)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(300)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(300)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(330)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(330)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(330)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(330)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(360)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(360)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(360)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(360)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(390)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(390)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(390)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(390)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(420)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(420)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(420)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(420)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(450)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(450)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(450)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(450)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(480)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(480)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(480)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(480)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(510)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(510)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(510)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(510)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(540)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(540)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(540)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(540)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(570)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(570)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(570)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(570)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(600)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(600)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(600)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(600)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(630)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(630)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(630)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(630)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(660)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(660)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(660)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(660)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(690)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(690)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(690)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(690)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(720)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(720)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(720)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(720)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(750)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(750)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(750)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(750)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(780)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(780)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(780)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(780)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(810)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(810)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(810)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(810)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(840)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(840)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(840)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(840)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif

                            @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(870)->locale('ru')->isoFormat('Hmm') >= 0)
                                <button @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(870)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach id="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(870)->isoFormat('H_mm') }}" class="btn btn-outline-primary mb-1">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(870)->locale('ru')->isoFormat('H:mm') }}</button>
                            @endif
                            <br><br>
                            <select id="time" name="time[]" class="form-control" multiple>
                                <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->isoFormat('H:mm') }}</option>
                                
                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(30)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(30)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(30)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(30)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(60)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(60)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(60)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(60)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif
                                
                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(90)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(90)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(90)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(90)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif
                                
                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(120)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(120)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(120)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(120)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(150)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(150)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(150)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(150)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(180)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(180)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(180)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(180)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(210)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(210)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(210)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(210)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(240)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(240)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(240)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(240)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(270)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(270)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(270)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(270)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(300)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(300)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(300)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(300)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(330)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(330)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(330)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(330)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(360)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(360)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(360)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(360)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(390)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(390)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(390)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(390)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(420)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(420)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(420)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(420)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(450)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(450)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(450)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(450)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(480)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(480)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(480)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(480)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(510)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(510)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(510)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(510)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(540)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(540)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(540)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(540)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(570)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(570)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(570)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(570)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(600)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(600)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(600)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(600)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(630)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(630)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(630)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(630)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(660)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(660)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(660)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(660)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(690)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(690)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(690)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(690)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(720)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(720)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(720)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(720)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(750)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(750)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(750)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(750)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(780)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(780)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(780)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(780)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(810)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(810)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(810)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(810)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(840)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(840)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(840)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(840)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif

                                @if(\Carbon\Carbon::parse($techpoint->working_hours_end)->locale('ru')->isoFormat('Hmm') - \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(870)->locale('ru')->isoFormat('Hmm') >= 0)
                                    <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(870)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(870)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(870)->locale('ru')->isoFormat('H:mm') }}</option>
                                @endif
                            </select>
                            <span class="time_error text-danger"></span>
                        </div>

                </div>
                <div class="col-12 col-lg-6">

                    <div class="form-group">
                        <label>Госномер</label>
                        <input type="text" class="form-control" name="number" placeholder="Номер">
                        <span class="number_error text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label>ФИО полностью</label>
                        <input type="text" class="form-control" name="name" placeholder="Иванов Иван Иванович">
                        <span class="name_error text-danger"></span>
                    </div>

                    <div class="form-group">
                        <label>Телефон</label>
                        <input type="text" class="form-control" name="phone" placeholder="+7 (999) 123-45-67">
                        <span class="phone_error text-danger"></span>
                    </div>

                    <!--<div class="form-group">
                        <label>Продолжительность</label>
                        <input type="text" class="form-control" name="duration">
                        <span class="duration_error text-danger"></span>
                    </div>-->

                </div>
            </div>

            <div class="col-12 col-md-12 text-center">
                <button type="button" class="btn btn-lg btn-primary" id="lead_submit" onclick="storeData();">Отправить</button>
                <div class="spinner-border text-primary" role="status">
                    <span class="sr-only">Отправка...</span>
                </div>
                <p class="text-secondary mt-2"><small>Нажимая кнопку "Отправить", вы соглашаетесь с обработкой данных.</small></p>
            </div>

        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('#time').change(function() {
                if($('#time option:selected').next().is(':enabled')) {
                    $('#time option:selected').next().prop('selected', true);
                } else {
                    alert('Времени на техосмотр категории {{$cat}} не хватит. Пожалуйста, выберите другое время.')
                }
            });
        });
    </script>

    <script>
        $('#lead').on( 'shown.bs.modal', function( event ) {
            $('.date-pick-slider').flickity('resize');
        });
    </script>

    <script>
        $('.flash-success').hide();
        $('.spinner-border').hide();
        function storeData() {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var station = $('input[name=station]').val();
            var station_id = '{{ $techpoint->id }}';
            var n_date = $('select[name=n_date] option:selected').val().substr(-10);
            var time = $('#time').val();
            var number = $('input[name=number]').val();
            var category = $('select[name=category] option:selected').text();
            var name = $('input[name=name]').val();
            var phone = $('input[name=phone]').val();
            var duration = $('input[name=duration]').val();

            $('.flash-success').hide();
            $('.station_error').hide();
            $('.date_error').hide();
            $('.time_error').hide();
            $('.number_error').hide();
            $('.category_error').hide();
            $('.name_error').hide();
            $('.phone_error').hide();
            $('.duration_error').hide();

            $.ajax({
                type: 'POST',
                url: '/email/{{ $techpoint->id }}',
                data: {
                    _token: CSRF_TOKEN,
                    station: station,
                    station_id: station_id,
                    n_date: n_date,
                    time: time,
                    number: number,
                    category: category,
                    name: name,
                    phone: phone,
                    duration: duration,
                },

                beforeSend: function () {
                    $('#lead_submit').hide();
                    $('.spinner-border').show();
                    setTimeout(function() {
                        $('#lead_submit').show();
                    }, 2000);
                    setTimeout(function() {
                        $('.spinner-border').hide();
                    }, 2000);
                },

                success: function (data) {
                    if(data === 'занято') {
                        alert('Время уже занято')
                    } else {
                        $('.flash-success').show();
                        $('#lead_form').trigger("reset");
                        setTimeout(function() {
                            $('.flash-success').hide()
                        }, 3000);
                    }
                },

                error: function (data) {
                    var errors = data.responseJSON;
                    if($.isEmptyObject(errors) == false) {
                        $.each(errors.errors, function (key, value) {
                            var ErrorID = '.' + key + '_error';
                            $(ErrorID).show();
                            $(ErrorID).text(value);
                        })
                    }
                }

            });
        }
    </script>
    
@endsection