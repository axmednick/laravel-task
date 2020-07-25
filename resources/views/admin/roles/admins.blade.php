@extends('admin.blocks.app')
@section('content')
<div class="col-md-6">
    @foreach( $admins as $admin)
        <form action="{{route('roles.update',$admin->id)}}" method="post">
            @csrf
            @method('put')
            {{$admin->email}}
            <select name="role">
                @foreach($roles as $role)
                    <option value="{{$role->id}}" {{$admin->role_id==$role->id ? 'selected':''}} >{{$role->name}}</option>

                @endforeach
            </select>
            <input type="submit" value="Save">
        </form>
    @endforeach
</div>

@endsection