@extends('admin.blocks.app')
@section('content')


    <div class="col-md-9">
        <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
            @CSRF
        <p>Feature image</p>
        <input type="file" name="img" class="btn btn-danger"><br>
        <br>
        <input type="text" name="title" class="form-control" placeholder="Post title">
        <br>
        <textarea name="text"></textarea>
        <br>
        <input type="submit" value="Publish" class="btn btn-danger">
        </form>
    </div>


    <script>
        CKEDITOR.replace( 'text' );
    </script>
@endsection