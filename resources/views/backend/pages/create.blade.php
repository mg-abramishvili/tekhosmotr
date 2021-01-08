@extends('layouts.app')
@section('content')

    <div>
        <div class="row align-items-center mb-4">
            <div class="col-6">
                <h1>Новая страница</h1>
            </div>
        </div>

        <form action="/backend/pages" method="post" enctype="multipart/form-data">@csrf
            <div class="form-group">
                <input type="text" class="form-control" name="title" placeholder="Название">
                @if ($errors->has('title'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('title') }}-->
                        Укажите название
                    </div>
                @endif
            </div>

            <div class="form-group">
                <input type="text" class="form-control" name="slug" placeholder="slug">
                @if ($errors->has('slug'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('slug') }}-->
                        Укажите slug
                    </div>
                @endif
            </div>

            <div class="form-group">
                <textarea class="form-control" id="text" name="text"></textarea>
                @if ($errors->has('text'))
                    <div class="alert alert-danger">
                        <!--{{ $errors->first('text') }}-->
                        Укажите содержимое
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