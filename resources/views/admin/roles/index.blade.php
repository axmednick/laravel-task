@extends('admin.blocks.app')
@section('content')

<a href="{{route('roles.create')}}" class="btn btn-danger btn-lg">Add new Role</a>
<a href="{{route('admins.roles')}}" class="btn btn-danger btn-lg">Admins Roles</a>


<br>
<br>
<br>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Create</th>
        <th scope="col">Update</th>
        <th scope="col">Delete</th>
    </tr>
    </thead>
    <tbody>
    @foreach($roles as $role)
        <tr>
            <th scope="row">{{$role->name}}</th>
            @php($permission=json_decode($role->permission,true))
            <td>{!!  $permission['create']=='true' ?'<i class="fas fa-check"></i>' :'<i class="far fa-times-circle"></i>' !!}</td>
            <td>{!!  $permission['update']=='true' ?'<i class="fas fa-check"></i>' :'<i class="far fa-times-circle"></i>'!!}</td>
            <td>{!!  $permission['delete']=='true' ?'<i class="fas fa-check"></i>' :'<i class="far fa-times-circle"></i>'!!}</td>
        </tr>
    @endforeach


    </tbody>
</table>

@endsection