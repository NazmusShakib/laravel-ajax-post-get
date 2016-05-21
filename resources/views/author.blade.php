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

    <h1>New Article</h1>


    <a href="{{ route('author.article') }}">Generate!</a>



@endsection