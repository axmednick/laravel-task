@extends('admin.blocks.app')
@section('content')
<div class="col-md-6">
    <form action="{{route('roles.store')}}" method="POST">
        @csrf
    <input type="text" name="name" class="form-control" placeholder="Role Name"><br>
    <b>Create</b> <input type="checkbox" name="create" value="1"> |
    <b>Update</b> <input type="checkbox" name="update" value="1"> |
    <b>Delete</b> <input type="checkbox" name="delete" value="1">
        <br>
        <br>
        <input type="submit" value="Save" class="btn btn-danger">
    </form>
</div>

@endsection