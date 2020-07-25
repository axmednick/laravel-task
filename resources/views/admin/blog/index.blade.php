@extends('admin.blocks.app')

@section('content')
    @if($permission['create']=='true')
<a href="{{route('blog.create')}}" class="btn-lg btn btn-danger">Add post</a>
@endif
<br>
<br>
<br>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Image</th>
        <th scope="col">Title</th>
        <th scope="col">Handle</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
    <tr>
        <th scope="row">
            <img src="{{url('/')}}/uploads/blog/{{$post->image}}" class="img-thumbnail" width="64px">
        </th>
        <td>{{$post->title}}</td>
        <td>
            @if($permission['delete']=='true')
            <a  class="btn btn-danger delete" onclick="myFunction({{$post->id}})"><i class="fa fa-trash-o"></i> </a>
            @endif
                @if($permission['update']=='true')
            <a href="{{route('blog.edit',$post->id)}}" class="btn btn-info"><i class="fa fa-edit"></i> </a>
                    @endif

        </td>
    </tr>
    @endforeach

    </tbody>
</table>

    <script>
function myFunction(id) {
    alertify.confirm('Are you sure you want to delete it?\n', function(){

        axios.delete('blog/'+id).then(function (cavab) {
            if (cavab.data.delete=='true'){
                location.reload()
            }
        })

    });
}

    </script>
@endsection