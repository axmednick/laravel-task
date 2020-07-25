@extends('admin.blocks.app')
@section('content')
    <div class="col-md-9">
        <form action="{{route('blog.update',$blog->id)}}" method="POST" enctype="multipart/form-data">
            @CSRF
            @method('put')
            <p>Feature image</p>
            <img src="{{url('/')}}/uploads/blog/{{$blog->image}}" class="img-thumbnail" width="128px">
            <br>
            <br>

            <input type="file" name="img" class="btn btn-danger"><br>
            <br>
            <input type="text" name="title" class="form-control" placeholder="Post title" value="{{$blog->title}}">
            <br>
            <textarea name="text">{{$blog->content}}</textarea>
            <br>
            <input type="submit" value="Publish" class="btn btn-danger">
        </form>
    </div>


    <script>
        CKEDITOR.replace( 'text' );
    </script>

@endsection