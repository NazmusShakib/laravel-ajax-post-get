@extends('layouts.master')

@section('content')
    <h1>Edit User</h1>

    <a href="{{ route('author.article') }}">Generate!</a>
  <section class="row new-post">
      <div class="col-md-6 col-md-offset-3">
{{ Form::model($user, array('method' => 'patch','class'=>'form-horizontal', 'route' => array('users.update', $user->id))) }}

  <div class="form-group">
    {{ Form::label('inputname1', 'Name', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">

{{ Form::text('name', null, array('class' => 'form-control','id'=>'inputname1','placeholder'=>'nameeplace')) }}

    </div>
  </div>

  <div class="form-group">
    {{ Form::label('inputname2', 'Password: ', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">

{{ Form::text('password', null, array('class' => 'form-control','id'=>'inputname2','placeholder'=>'nameeplace')) }}

    </div>
  </div>

  <div class="form-group">
    {{ Form::label('inputname3', 'Email: ', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">

{{ Form::text('email', null, array('class' => 'form-control','id'=>'inputname3','placeholder'=>'nameeplace')) }}

    </div>
  </div>

  <div class="form-group">
    {{ Form::label('inputname4', 'Phone: ', array('class' => 'col-sm-2 control-label')) }}
    <div class="col-sm-10">

{{ Form::text('phone', null, array('class' => 'form-control','id'=>'inputname4','placeholder'=>'nameeplace')) }}

    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-success')) }}
    </div>
  </div>

{{ Form::close() }}
</div>
</section>
@if ($errors->any())
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
@endif


@endsection
