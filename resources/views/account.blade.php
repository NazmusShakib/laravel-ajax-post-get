@extends('layouts.master')

@section('content')

    @if (session('mes'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (session('mes'))
        <div class="alert alert-warning">
            {{ session('message') }}
        </div>
    @endif

    <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Account</h3></header>
            <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{ $user->id }}" id="">
                <div class="form-group">
                    <label for="first_name">Name: </label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="first_name">
                </div>
                <div class="form-group">
                    <label for="first_name">Phone: </label>
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" id="first_name">
                </div>
                <div class="form-group">
                    <label for="first_name">Email: </label>
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" id="first_name">
                </div>
                <div class="form-group">
                    <label for="first_name">Password: </label>
                    <input type="text" name="password" class="form-control" value=" " id="first_name">
                </div>
                <button type="submit" class="btn btn-primary">Update Account</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>

@endsection
