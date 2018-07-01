@extends('admin.master')
@section('title')
 -::edit User::-
@endsection
@section('main-content')
<div class="card">
    <div class="card-header">
        <p class="float-left text-light">Add new user</p>
        <a class="btn btn-danger waves-effect float-right" onclick="return confirm('are you sure to go back')"  href="{{ url('/admin/users') }}">all user</a>
    </div>
    <form class="form-horizontal" method="POST" action="{{ url('/admin/users/update') }}" enctype="multipart/form-data" name="userForm">
    {{ csrf_field() }} 
    <div class="card-content"> 
            <div class="row">
                <div class="form-group col s6 {{ $errors->has('firstName') ? 'has-error' : '' }}">
                    <label for="fname">firstName</label>
                    <input type="text" id="fname" class="form-control" name="firstName" value="{{ $edit->firstName }}">
                    <input type="hidden" class="form-control" name="updateUser" value="{{ $edit->id }}">
                    <span class='text-danger'>{{ $errors->has('firstName')? $errors->first('firstName') : '' }}</span>
                </div>  
                <div class="form-group col s6 {{ $errors->has('lastName') ? 'has-error' : '' }}">
                    <label for="lname">lastName</label>
                    <input type="text" id="lname" class="form-control" name="lastName" value="{{ $edit->lastName }}">
                     <span class='text-danger'>{{ $errors->has('lastName')? $errors->first('lastName') : '' }}</span>                 
                </div> 
                <div class="form-group {{ $errors->has('userName') ? 'has-error' : '' }}">
                    <label for="userName">userName</label>
                    <input type="text" id="userName" class="form-control" name="userName" value="{{ $edit->userName }}">
                     <span class='text-danger'>{{ $errors->has('userName')? $errors->first('userName') : '' }}</span> 
                </div>
                <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" class="form-control" name="phone" value="{{ $edit->phone }}">
                    <span class='text-danger'>{{ $errors->has('phone')? $errors->first('phone') : '' }}</span> 
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email">Email</label>
                    <input type="text" id="email" class="form-control" name="email" value="{{ $edit->email }}">
                    <span class='text-danger'>{{ $errors->has('email')? $errors->first('email') : '' }}</span> 
                </div>
                <div class="image">
                   @if($edit->userPhoto != '')
                    <img style="width:250px;"src="{{ asset('/uploads/'. $edit->userPhoto) }}">
                    @else
                    <img style="width:250px;"src="{{ asset('/images/avatar.png') }}">
                   @endif
                </div>
                <div class="form-group {{ $errors->has('userPhoto') ? 'has-error' : '' }}">
                    <label>Picture</label>
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>User Photo</span>
                            <input type="file" name="userImage">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                     <span class='text-danger'>{{ $errors->has('userImage')? $errors->first('userImage') : '' }}</span> 
                </div>
                <div class="form-group {{ $errors->has('userRole') ? 'has-error' : '' }}"> 
                    <label>select Role</label>
                    <select class="form-control" name="userRole" >
                        <option value="">Choose your option</option>
                        @foreach($userRole as $data)
                            <option value="{{ $data->roleId }}">{{ $data->roleName }}</option>
                         @endforeach
                    </select>
                     <span class='text-danger'>{{ $errors->has('userRole')? $errors->first('userRole') : '' }}</span> 
                </div>  
            </div> 
    </div> 
    <div class="card-footer">
       <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
</div>
<script>
    document.forms['userForm'].elements['userRole'].value="{{ $edit->roleId}}";  
</script>
@endsection 