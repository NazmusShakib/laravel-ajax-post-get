@extends('layouts.master')

@section('content')
    <h1>Edit User</h1>

    <a href="{{ route('author.article') }}">Generate!</a>

{{ Form::model($user, array('method' => 'patch','class'=>'form-horizontal', 'route' => array('users.update', $user->id))) }}

  <div class="form-group">
    {{ Form::label('inputname1', 'Your Name', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">

{{ Form::text('name', 'name', array('class' => 'form-control','id'=>'inputname1','placeholder'=>'nameeplace')) }}


    </div>
  </div>
            {{ Form::label('username', 'Username:') }}
            {{ Form::text('name') }}
        </li>

        <li>
            {{ Form::label('password', 'Password:') }}
            {{ Form::text('password') }}
        </li>
        <li>
            {{ Form::label('email', 'Email:') }}
            {{ Form::text('email') }}
        </li>
        <li>
            {{ Form::label('phone', 'Phone:') }}
            {{ Form::text('phone') }}
        </li>
        <li>
            {{ Form::submit('Update', array('class' => 'btn btn-info')) }}

        </li>
    </ul>



{{ Form::close() }}

@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif


@endsection
