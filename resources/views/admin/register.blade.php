@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{route('register.submit')}}">
                            @csrf
                            <input type="text" name="email" class="form-control" placeholder="Email">
                            <br>
                            <input type="text" name="password" class="form-control" placeholder="Password">
                            <br>
                            <input type="submit" value="Register">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
