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

            <div class="row">

                <div class="col-12 col-md-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Название</label>
                        <input type="text" class="form-control" name="title" placeholder="Название" value="{{ $techpoint->title }}">
                        @if ($errors->has('title'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('title') }}-->
                                Укажите название
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Город</label>
                        <select class="form-control" name="cities">
                            <option disabled selected value> -- Укажите город -- </option>
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}" @foreach($techpoint->cities as $s) @if($s->id == $city->id) selected @endif @endforeach>{{ $city->city }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('cities'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('cities') }}-->
                                Укажите город
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Юр. адрес</label>
                        <input type="text" class="form-control" name="legal_address" placeholder="Юр. адрес" value="{{ $techpoint->legal_address }}">
                        @if ($errors->has('legal_address'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('legal_address') }}-->
                                Укажите юр. адрес
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Адрес</label>
                        <input type="text" class="form-control" name="address" placeholder="Адрес" value="{{ $techpoint->address }}">
                        @if ($errors->has('address'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('address') }}-->
                                Укажите адрес
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Координаты</label>
                        <input type="text" class="form-control" name="coordinates" placeholder="Координаты" value="{{ $techpoint->coordinates }}">
                        @if ($errors->has('coordinates'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('coordinates') }}-->
                                Укажите координаты
                            </div>
                        @endif
                        <a href="https://yandex.ru/map-constructor/location-tool/" target="_blank">определение координат</a>
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Телефон</label>
                        <input type="text" class="form-control" name="tel" placeholder="Телефон" value="{{ $techpoint->tel }}">
                        @if ($errors->has('tel'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('tel') }}-->
                                Укажите Телефон
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">E-mail</label>
                        <input type="text" class="form-control" name="email" placeholder="E-mail" value="{{ $techpoint->email }}">
                        @if ($errors->has('email'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('email') }}-->
                                Укажите E-mail
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Номер</label>
                        <input type="text" class="form-control" name="number" placeholder="Номер" value="{{ $techpoint->number }}">
                        @if ($errors->has('number'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('number') }}-->
                                Укажите Номер
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Номер аттестата</label>
                        <input type="text" class="form-control" name="att_number" placeholder="Номер аттестата" value="{{ $techpoint->att_number }}">
                        @if ($errors->has('att_number'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('att_number') }}-->
                                Укажите Номер аттестата
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">ИНН</label>
                        <input type="text" class="form-control" name="inn" placeholder="ИНН" value="{{ $techpoint->inn }}">
                        @if ($errors->has('inn'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('inn') }}-->
                                Укажите ИНН
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">ОГРН</label>
                        <input type="text" class="form-control" name="ogrn" placeholder="ОГРН" value="{{ $techpoint->ogrn }}">
                        @if ($errors->has('ogrn'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('ogrn') }}-->
                                Укажите ОГРН
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Категории</label>
                        <select class="form-control" name="cats[]" multiple>
                            @foreach($cats as $cat)
                                <option value="{{ $cat->id }}" @foreach($techpoint->cats as $c) @if($c->id == $cat->id) selected @endif @endforeach>{{ $cat->title }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('cats'))
                            <div class="alert alert-danger">
                                <!--{{ $errors->first('cats') }}-->
                                Укажите Категории
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Время работы</label>
                        <div class="row">
                            <div class="col-6">
                                <select name="working_hours_start" class="custom-select">
                                    <option value="01:00" @if($techpoint->working_hours_start == '01:00') selected @endif>01:00</option>
                                    <option value="01:30" @if($techpoint->working_hours_start == '01:30') selected @endif>01:30</option>
                                    <option value="02:00" @if($techpoint->working_hours_start == '02:00') selected @endif>02:00</option>
                                    <option value="02:30" @if($techpoint->working_hours_start == '02:30') selected @endif>02:30</option>
                                    <option value="03:00" @if($techpoint->working_hours_start == '03:00') selected @endif>03:00</option>
                                    <option value="03:30" @if($techpoint->working_hours_start == '03:30') selected @endif>03:30</option>
                                    <option value="04:00" @if($techpoint->working_hours_start == '04:00') selected @endif>04:00</option>
                                    <option value="04:30" @if($techpoint->working_hours_start == '04:30') selected @endif>04:30</option>
                                    <option value="05:00" @if($techpoint->working_hours_start == '05:00') selected @endif>05:00</option>
                                    <option value="05:30" @if($techpoint->working_hours_start == '05:30') selected @endif>05:30</option>
                                    <option value="06:00" @if($techpoint->working_hours_start == '06:00') selected @endif>06:00</option>
                                    <option value="06:30" @if($techpoint->working_hours_start == '06:30') selected @endif>06:30</option>
                                    <option value="07:00" @if($techpoint->working_hours_start == '07:00') selected @endif>07:00</option>
                                    <option value="07:30" @if($techpoint->working_hours_start == '07:30') selected @endif>07:30</option>
                                    <option value="08:00" @if($techpoint->working_hours_start == '08:00') selected @endif>08:00</option>
                                    <option value="08:30" @if($techpoint->working_hours_start == '08:30') selected @endif>08:30</option>
                                    <option value="09:00" @if($techpoint->working_hours_start == '09:00') selected @endif>09:00</option>
                                    <option value="09:30" @if($techpoint->working_hours_start == '09:30') selected @endif>09:30</option>
                                    <option value="10:00" @if($techpoint->working_hours_start == '10:00') selected @endif>10:00</option>
                                    <option value="10:30" @if($techpoint->working_hours_start == '10:30') selected @endif>10:30</option>
                                    <option value="11:00" @if($techpoint->working_hours_start == '11:00') selected @endif>11:00</option>
                                    <option value="11:30" @if($techpoint->working_hours_start == '11:30') selected @endif>11:30</option>
                                    <option value="12:00" @if($techpoint->working_hours_start == '12:00') selected @endif>12:00</option>
                                    <option value="12:30" @if($techpoint->working_hours_start == '12:30') selected @endif>12:30</option>
                                    <option value="13:00" @if($techpoint->working_hours_start == '13:00') selected @endif>13:00</option>
                                    <option value="13:30" @if($techpoint->working_hours_start == '13:30') selected @endif>13:30</option>
                                    <option value="14:00" @if($techpoint->working_hours_start == '14:00') selected @endif>14:00</option>
                                    <option value="14:30" @if($techpoint->working_hours_start == '14:30') selected @endif>14:30</option>
                                    <option value="15:00" @if($techpoint->working_hours_start == '15:00') selected @endif>15:00</option>
                                    <option value="15:30" @if($techpoint->working_hours_start == '15:30') selected @endif>15:30</option>
                                    <option value="16:00" @if($techpoint->working_hours_start == '16:00') selected @endif>16:00</option>
                                    <option value="16:30" @if($techpoint->working_hours_start == '16:30') selected @endif>16:30</option>
                                    <option value="17:00" @if($techpoint->working_hours_start == '17:00') selected @endif>17:00</option>
                                    <option value="17:30" @if($techpoint->working_hours_start == '17:30') selected @endif>17:30</option>
                                    <option value="18:00" @if($techpoint->working_hours_start == '18:00') selected @endif>18:00</option>
                                    <option value="18:30" @if($techpoint->working_hours_start == '18:30') selected @endif>18:30</option>
                                    <option value="19:00" @if($techpoint->working_hours_start == '19:00') selected @endif>19:00</option>
                                    <option value="19:30" @if($techpoint->working_hours_start == '19:30') selected @endif>19:30</option>
                                    <option value="20:00" @if($techpoint->working_hours_start == '20:00') selected @endif>20:00</option>
                                    <option value="20:30" @if($techpoint->working_hours_start == '20:30') selected @endif>20:30</option>
                                    <option value="21:00" @if($techpoint->working_hours_start == '21:00') selected @endif>21:00</option>
                                    <option value="21:30" @if($techpoint->working_hours_start == '21:30') selected @endif>21:30</option>
                                    <option value="22:00" @if($techpoint->working_hours_start == '22:00') selected @endif>22:00</option>
                                    <option value="22:30" @if($techpoint->working_hours_start == '22:30') selected @endif>22:30</option>
                                    <option value="23:00" @if($techpoint->working_hours_start == '23:00') selected @endif>23:00</option>
                                    <option value="23:30" @if($techpoint->working_hours_start == '23:30') selected @endif>23:30</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select name="working_hours_end" class="custom-select">
                                    <option value="01:00" @if($techpoint->working_hours_end == '01:00') selected @endif>01:00</option>
                                    <option value="01:30" @if($techpoint->working_hours_end == '01:30') selected @endif>01:30</option>
                                    <option value="02:00" @if($techpoint->working_hours_end == '02:00') selected @endif>02:00</option>
                                    <option value="02:30" @if($techpoint->working_hours_end == '02:30') selected @endif>02:30</option>
                                    <option value="03:00" @if($techpoint->working_hours_end == '03:00') selected @endif>03:00</option>
                                    <option value="03:30" @if($techpoint->working_hours_end == '03:30') selected @endif>03:30</option>
                                    <option value="04:00" @if($techpoint->working_hours_end == '04:00') selected @endif>04:00</option>
                                    <option value="04:30" @if($techpoint->working_hours_end == '04:30') selected @endif>04:30</option>
                                    <option value="05:00" @if($techpoint->working_hours_end == '05:00') selected @endif>05:00</option>
                                    <option value="05:30" @if($techpoint->working_hours_end == '05:30') selected @endif>05:30</option>
                                    <option value="06:00" @if($techpoint->working_hours_end == '06:00') selected @endif>06:00</option>
                                    <option value="06:30" @if($techpoint->working_hours_end == '06:30') selected @endif>06:30</option>
                                    <option value="07:00" @if($techpoint->working_hours_end == '07:00') selected @endif>07:00</option>
                                    <option value="07:30" @if($techpoint->working_hours_end == '07:30') selected @endif>07:30</option>
                                    <option value="08:00" @if($techpoint->working_hours_end == '08:00') selected @endif>08:00</option>
                                    <option value="08:30" @if($techpoint->working_hours_end == '08:30') selected @endif>08:30</option>
                                    <option value="09:00" @if($techpoint->working_hours_end == '09:00') selected @endif>09:00</option>
                                    <option value="09:30" @if($techpoint->working_hours_end == '09:30') selected @endif>09:30</option>
                                    <option value="10:00" @if($techpoint->working_hours_end == '10:00') selected @endif>10:00</option>
                                    <option value="10:30" @if($techpoint->working_hours_end == '10:30') selected @endif>10:30</option>
                                    <option value="11:00" @if($techpoint->working_hours_end == '11:00') selected @endif>11:00</option>
                                    <option value="11:30" @if($techpoint->working_hours_end == '11:30') selected @endif>11:30</option>
                                    <option value="12:00" @if($techpoint->working_hours_end == '12:00') selected @endif>12:00</option>
                                    <option value="12:30" @if($techpoint->working_hours_end == '12:30') selected @endif>12:30</option>
                                    <option value="13:00" @if($techpoint->working_hours_end == '13:00') selected @endif>13:00</option>
                                    <option value="13:30" @if($techpoint->working_hours_end == '13:30') selected @endif>13:30</option>
                                    <option value="14:00" @if($techpoint->working_hours_end == '14:00') selected @endif>14:00</option>
                                    <option value="14:30" @if($techpoint->working_hours_end == '14:30') selected @endif>14:30</option>
                                    <option value="15:00" @if($techpoint->working_hours_end == '15:00') selected @endif>15:00</option>
                                    <option value="15:30" @if($techpoint->working_hours_end == '15:30') selected @endif>15:30</option>
                                    <option value="16:00" @if($techpoint->working_hours_end == '16:00') selected @endif>16:00</option>
                                    <option value="16:30" @if($techpoint->working_hours_end == '16:30') selected @endif>16:30</option>
                                    <option value="17:00" @if($techpoint->working_hours_end == '17:00') selected @endif>17:00</option>
                                    <option value="17:30" @if($techpoint->working_hours_end == '17:30') selected @endif>17:30</option>
                                    <option value="18:00" @if($techpoint->working_hours_end == '18:00') selected @endif>18:00</option>
                                    <option value="18:30" @if($techpoint->working_hours_end == '18:30') selected @endif>18:30</option>
                                    <option value="19:00" @if($techpoint->working_hours_end == '19:00') selected @endif>19:00</option>
                                    <option value="19:30" @if($techpoint->working_hours_end == '19:30') selected @endif>19:30</option>
                                    <option value="20:00" @if($techpoint->working_hours_end == '20:00') selected @endif>20:00</option>
                                    <option value="20:30" @if($techpoint->working_hours_end == '20:30') selected @endif>20:30</option>
                                    <option value="21:00" @if($techpoint->working_hours_end == '21:00') selected @endif>21:00</option>
                                    <option value="21:30" @if($techpoint->working_hours_end == '21:30') selected @endif>21:30</option>
                                    <option value="22:00" @if($techpoint->working_hours_end == '22:00') selected @endif>22:00</option>
                                    <option value="22:30" @if($techpoint->working_hours_end == '22:30') selected @endif>22:30</option>
                                    <option value="23:00" @if($techpoint->working_hours_end == '23:00') selected @endif>23:00</option>
                                    <option value="23:30" @if($techpoint->working_hours_end == '23:30') selected @endif>23:30</option>
                                </select>
                            </div>
                        </div>
                        @if ($errors->has('working_hours'))
                            <div class="alert alert-danger">
                                Укажите Время работы
                            </div>
                        @endif
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label class="font-weight-bold">День приема автобусов</label>
                <select name="bus_day[]" class="custom-select" multiple>
                    <option value="Monday" @if($techpoint->bus_day) @foreach(json_decode($techpoint->bus_day) as $bd) @if($bd == 'Monday') selected @endif @endforeach @endif>Понедельник</option>
                    <option value="Tuesday" @if($techpoint->bus_day) @foreach(json_decode($techpoint->bus_day) as $bd) @if($bd == 'Tuesday') selected @endif @endforeach @endif>Вторник</option>
                    <option value="Wednesday" @if($techpoint->bus_day) @foreach(json_decode($techpoint->bus_day) as $bd) @if($bd == 'Wednesday') selected @endif @endforeach @endif>Среда</option>
                    <option value="Thursday" @if($techpoint->bus_day) @foreach(json_decode($techpoint->bus_day) as $bd) @if($bd == 'Thursday') selected @endif @endforeach @endif>Четверг</option>
                    <option value="Friday" @if($techpoint->bus_day) @foreach(json_decode($techpoint->bus_day) as $bd) @if($bd == 'Friday') selected @endif @endforeach @endif>Пятница</option>
                    <option value="Saturday" @if($techpoint->bus_day) @foreach(json_decode($techpoint->bus_day) as $bd) @if($bd == 'Saturday') selected @endif @endforeach @endif>Суббота</option>
                    <option value="Sunday" @if($techpoint->bus_day) @foreach(json_decode($techpoint->bus_day) as $bd) @if($bd == 'Sunday') selected @endif @endforeach @endif>Воскресенье</option>
                </select>
                @if ($errors->has('bus_day'))
                    <div class="alert alert-danger">
                        Укажите День приема автобусов
                    </div>
                @endif
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Аттестат</label>
                <input class="docpic" type="file" name="docpic">
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Доп. услуги</label>
                <textarea name="dopus" id="dopus" class="form-control">{{$techpoint->dopus}}</textarea>
            </div>

            @if(auth()->user()->id == '1')
            <div class="form-group">
                <label class="font-weight-bold">Кнопка записи</label>
                <select class="form-control" name="status">
                        <option value="enabled" @if($techpoint->status == 'enabled') selected @endif>Вкл</option>
                        <option value="disabled" @if($techpoint->status == 'disabled') selected @endif>Выкл</option>
                </select>
                @if ($errors->has('status'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('status') }}-->
                        Укажите статус
                    </div>
                @endif
            </div>
            @endif

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
        </form>

    </div>

    <script>
        FilePond.registerPlugin(FilePondPluginImagePreview);
        $('.docpic').filepond({
            allowMultiple: false,
            allowReorder: false,
            imagePreviewHeight: 140,
            labelIdle: 'Нажмите для загрузки файлов',
            labelFileProcessing: 'Загрузка',
            labelFileProcessingComplete: 'Загружено',
            labelTapToCancel: '',
            labelTapToUndo: '',

            server: {
                remove: (filename, load) => {
                    load('1');
                    return  ajax_delete('deletedocpic');
                },
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    const formData = new FormData();
                    formData.append(fieldName, file, file.name);
                    const request = new XMLHttpRequest();
                    request.open('POST', '/backend/techpoints/file/upload');
                    request.upload.onprogress = (e) => {
                        progress(e.lengthComputable, e.loaded, e.total);
                    };
                    request.onload = function() {
                        if (request.status >= 200 && request.status < 300) {
                            load(request.responseText);
                        }
                        else {
                            error('oh no');
                        }
                    };
                    request.send(formData);
                    return {
                        abort: () => {
                            request.abort();
                            abort();
                        }
                    };
                },
                revert: (filename, load) => {
                    load(filename)
                },
                load: (source, load, error, progress, abort, headers) => {
                    var myRequest = new Request(source);
                    fetch(myRequest).then(function(response) {
                        response.blob().then(function(myBlob) {
                            load(myBlob)
                        });
                    });
                },
            },

            files: [
                @if(isset($techpoint->docpic))
                {
                    source: '{{ $techpoint->docpic }}',
                    options: {
                        type: 'local',
                    }
                }
                @endif
            ]

        });

        function ajax_delete(methos){
            $.ajax({
               url:'/backend/techpoints/file/'+methos,
                method:'POST'
            });
        }
    </script>

    <script>
        $('textarea[id="dopus"]').summernote({
            height: 100,
            toolbar: [
                ['style', ['bold', 'underline', 'clear']],
                ['para', ['ul', 'ol']],
                ['view', ['codeview']],
            ],
        });
    </script>

@endsection