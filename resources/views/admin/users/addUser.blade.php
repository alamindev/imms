@extends('admin.master')
@section('title')
  -::Add new User::-
@endsection
@section('main-content')
<div class="card">
    <div class="card-header">
        <p class="float-left text-light">Add new user</p>
        <a class="btn btn-danger waves-effect float-right" href="{{ url('/admin/users') }}">all user</a>
    </div>
    <form class="form-horizontal" method="POST" action="{{ url('/admin/users/insert') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <span class='text-success text-center'>{{ Session::get('message') }}</span>
    <div class="card-content"> 
            <div class="row">
                <div class="form-group col s6 {{ $errors->has('firstName') ? 'has-error' : '' }}">
                    <label for="fname">firstName</label>
                    <input type="text" id="fname" class="form-control" name="firstName" value="{{ old('firstName') }}">
                    <span class='text-danger'>{{ $errors->has('firstName')? $errors->first('firstName') : '' }}</span>
                </div>  
                <div class="form-group col s6 {{ $errors->has('lastName') ? 'has-error' : '' }}">
                    <label for="lname">lastName</label>
                    <input type="text" id="lname" class="form-control" name="lastName" value="{{ old('lastName') }}">
                     <span class='text-danger'>{{ $errors->has('lastName')? $errors->first('lastName') : '' }}</span>                 
                </div> 
                <div class="form-group {{ $errors->has('userName') ? 'has-error' : '' }}">
                    <label for="userName">userName</label>
                    <input type="text" id="userName" class="form-control" name="userName" value="{{ old('userName') }}">
                     <span class='text-danger'>{{ $errors->has('userName')? $errors->first('userName') : '' }}</span> 
                </div>
                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone') }}">
                    <span class='text-danger'>{{ $errors->has('phone')? $errors->first('phone') : '' }}</span> 
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email</label>
                    <input type="text" id="email" class="form-control" name="email" value="{{ old('email') }}">
                    <span class='text-danger'>{{ $errors->has('email')? $errors->first('email') : '' }}</span> 
                </div>
                <div class="form-group {{ $errors->has('userPhoto') ? 'has-error' : '' }}">
                    <label>Picture</label>
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>User Photo</span>
                            <input type="file" name="userPhoto">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                     <span class='text-danger'>{{ $errors->has('userPhoto')? $errors->first('userPhoto') : '' }}</span> 
                </div>
                <div class="form-group {{ $errors->has('userRole') ? 'has-error' : '' }}"> 
                    <label>select Role</label>
                    <select class="form-control" name="userRole" value="{{ old('userRole') }}">
                        <option value="" disabled selected>Choose your option</option>
                        <!--define showloginform function at register controoler-->
                        @foreach($userRole as $data)
                            <option value="{{ $data->roleId }}">{{ $data->roleName }}</option>
                         @endforeach
                    </select>
                     <span class='text-danger'>{{ $errors->has('userRole')? $errors->first('userRole') : '' }}</span> 
                </div>
                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <label for="password">Passaword</label>
                    <input type="password" id="password" class="form-control" name="password">
                     <span class='text-danger'>{{ $errors->has('password')? $errors->first('password') : '' }}</span> 
                </div>
                <div class="form-group">
                    <label for="password">Confirm Passaword</label>
                    <input type="password" id="password" class="form-control" name="password_confirmation">
                </div> 
            </div> 
    </div> 
    <div class="card-footer">
       <button type="submit" class="btn btn-success">Add User</button>
    </div>
</form>
</div>
@endsection
@section('script')
<script>
        
</script>
@endsection