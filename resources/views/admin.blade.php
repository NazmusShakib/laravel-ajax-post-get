@extends('layouts.master')

@section('content')

<!-- Button trigger modal -->
<div class="well">
    <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalHorizontal">
        Add Member
    </button>
</div>

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



    <table class="table">
        <thead>
        <th>User Name</th>
        <th>Phone</th>
        <th>E-Mail</th>
        <th>User</th>
        <th>Author</th>
        <th>Admin</th>
        <th>Action</th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <form action="{{ route('admin.assign') }}" method="post">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }} <input type="hidden" name="email" value="{{ $user->email }}"></td>
                    <td><input type="checkbox" {{ $user->hasRole('User') ? 'checked' : '' }} name="role_user"></td>
                    <td><input type="checkbox" {{ $user->hasRole('Author') ? 'checked' : '' }} name="role_author"></td>
                    <td><input type="checkbox" {{ $user->hasRole('Admin') ? 'checked' : '' }} name="role_admin"></td>
                    {{ csrf_field() }}
                    <td><button type="submit">Assign Roles</button></td>
                </form>
                    <td>

                    {{ link_to_route('users.edit', 'Edit', array($user->id), array('class' => 'btn btn-primary')) }}
                        |

                    {!! Form::open(array('route'=>['user.destroy',$user->id],'class'=>'form-horizontal','id'=>'form','method'=>'delete'))!!}
                    {!! Form::hidden('id',$user->id)!!}
                    {!! Form::submit('Delete',['class'=>'btn btn-danger'])!!}
                    {!! Form::close() !!}


                    </td>
            </tr>
        @endforeach
        </tbody>
    </table>


<!-- Modal -->
<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close"
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Add User
                </h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">

                {!! Form::open(array('route'=>'admin.adduser','class'=>'form-horizontal','method'=>'POST','role="form"')) !!}

                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputname1">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name"
                        id="inputname1" placeholder="User Name"/>
                    </div>
                  </div>


                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control"  name="password"
                            id="inputPassword3" placeholder="Password"/>
                    </div>
                  </div>


                  <div class="form-group">
                    <label  class="col-sm-2 control-label" for="inputrole">Role</label>
                    <div class="col-sm-10">

                        <!--select name="role" id="inputrole" class="form-control" >
                            <option value="1">User</option>
                            <option value="2">Author</option>
                            <option value="3">Admin</option>
                        </select-->


                    </div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email"
                        id="inputEmail3" placeholder="Email"/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputphone">Phone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone"
                        id="inputphone" placeholder="Phone Number"/>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                            <input type="checkbox"/> Remember me
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">ADD</button>
                    </div>
                  </div>
                   {!! Form::close() !!}

            </div>

            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
                <!--button type="button" class="btn btn-primary">
                    Save changes
                </button-->
            </div>
        </div>
    </div>
</div>




















@endsection
