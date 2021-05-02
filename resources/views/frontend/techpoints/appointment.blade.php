@extends('layouts.front')
@section('content')

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

            <div class="form-group">

                <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" class="custom-select">
                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                    <option value="/appointment/{{$techpoint->id}}/{{ $cat }}/{{ \Carbon\Carbon::now()->addDay(1)->locale('ru')->isoFormat('YYYY-MM-DD') }}" @if(\Carbon\Carbon::now()->addDay(1)->locale('ru')->isoFormat('YYYY-MM-DD') == \Carbon\Carbon::parse($date)->isoFormat('YYYY-MM-DD')) selected @endif>{{ \Carbon\Carbon::now()->addDay(1)->locale('ru')->isoFormat('DD MMM (dd)') }}</option>
                </select>

                <span class="date_error text-center text-danger"></span>
                
            </div>

            <div class="row">

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label>Время</label>

                    <style>
                        select option:disabled {
                            color: rgb(194, 194, 194);
                        }
                    </style>

                    <select id="time" name="time[]" class="form-control" multiple>
                        <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->isoFormat('H:mm') }}</option>
                        <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(30)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(30)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(30)->locale('ru')->isoFormat('H:mm') }}</option>
                        <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(60)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(60)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(60)->locale('ru')->isoFormat('H:mm') }}</option>
                        <option @foreach($leads as $lead) @foreach(json_decode($lead->time) as $tm) @if(\Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(90)->isoFormat('H:mm') == \Carbon\Carbon::parse($tm)->locale('ru')->isoFormat('H:mm')) disabled @endif @endforeach @endforeach value="{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->locale('ru')->addMinutes(90)->isoFormat('H:mm') }}">{{ \Carbon\Carbon::parse($techpoint->working_hours_start)->addMinutes(90)->locale('ru')->isoFormat('H:mm') }}</option>
                    </select>
                    <span class="time_error text-danger"></span>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label>Категория ТС</label>

                    <select onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" name="category" class="custom-select">
                        <option disabled selected value>Выберите категорию</option>
                        <option value="/appointment/{{$techpoint->id}}/M1/{{ $date }}" @if($cat == 'M1') selected @endif>M1</option>
                        <option value="/appointment/{{$techpoint->id}}/M2/{{ $date }}" @if($cat == 'M2') selected @endif>M2</option>
                    </select>
                    <span class="category_error text-danger"></span>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label>Госномер</label>
                    <input type="text" class="form-control" name="number" placeholder="Номер">
                    <span class="number_error text-danger"></span>
                </div>
            </div>

            <div class="col-12 col-md-8">
                <div class="form-group">
                    <label>ФИО полностью</label>
                    <input type="text" class="form-control" name="name" placeholder="Иванов Иван Иванович">
                    <span class="name_error text-danger"></span>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label>Телефон</label>
                    <input type="text" class="form-control" name="phone" placeholder="+7 (999) 123-45-67">
                    <span class="phone_error text-danger"></span>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="form-group">
                    <label>Продолжительность</label>
                    <input type="text" class="form-control" name="duration">
                    <span class="duration_error text-danger"></span>
                </div>
            </div>

            <div class="col-12 col-md-12 text-center">
            <button type="button" class="btn btn-lg btn-primary" id="lead_submit" onclick="storeData();">Отправить</button>
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Отправка...</span>
            </div>
            <p class="text-secondary mt-2"><small>Нажимая кнопку "Отправить", вы соглашаетесь с обработкой данных.</small></p>
            </div>

            </div>
        </form>
    </div>
    

@endsection

@section('scripts')
    <script>
        $(function() {
            $('#time').change(function() {
                $('#time option:selected').next().prop('selected', true);
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
            var n_date = $('input[name=n_date]:checked').val();
            var time = $('#time').val();
            var number = $('input[name=number]').val();
            var category = $('select[name=category]').val();
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
                    $('.flash-success').show();
                    $('#lead_form').trigger("reset");
                    setTimeout(function() {
                        $('.flash-success').hide()
                    }, 3000);
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