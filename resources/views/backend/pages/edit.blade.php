@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>{{$page->title}}</h1>
                <p style="color: #999">Изменение страницы</p>
            </div>
        </div>

        <form action="/backend/pages/{{$page->id}}" method="post" enctype="multipart/form-data">@csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$page->id}}">

            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Название" value="{{ $page->title }}">
                @if ($errors->has('title'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('title') }}-->
                        Укажите название
                    </div>
                @endif
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="slug" placeholder="slug" value="{{ $page->slug }}">
                @if ($errors->has('slug'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('slug') }}-->
                        Укажите slug
                    </div>
                @endif
            </div>

            <div class="form-group">
                <textarea class="form-control" id="text" name="text" placeholder="Содержимое">{{ $page->text }}</textarea>
                @if ($errors->has('text'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('text') }}-->
                        Укажите text
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-lg btn-success">Сохранить</button>
        </form>

    </div>

@endsection
@section('scripts')
    <script>
        $('#text').summernote({
            height: 300,
            toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['height', ['height']],
            ['view', ['fullscreen', 'codeview']]
            ]
        });
    </script>
@endsection