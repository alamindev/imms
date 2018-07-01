@extends('admin.master')
@section('title')
  -::All User::-
@endsection
@section('main-content')
<div class="card">
     <div class="card-header">
        <p class="text-light float-left">All Users</p>
        @if(Auth::user()->roleId == 1) 
        <a class="btn btn-danger waves-effect float-right" href="{{ url('admin/users/add') }}">Add User</a>
        @endif
     </div>
    <div class="card-content">
        @if(Session::has('success'))
        <div class="success"><strong>Success!</strong> User Add Successfully Complate</div>
        @endif
        <table class="bordered striped " id="data">
        <thead>
          <tr>
              <th>UserName</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Role</th>
              <th>Manage</th>
          </tr>
        </thead> 
        <tbody>
            @foreach($users as $user)
          <tr>
            <td>{{ $user->userName }}</td> 
            <td>{{ $user->email }}</td> 
            <td>{{ $user->phone }}</td> 
            <td>{{ $user->roles->roleName }}</td> 
            <td>
                @if(Auth::user()->roleId == 1)  
                    <a href="{{ url('admin/users/view/'.$user->id) }}"><i class="text-success fa fa-eye-slash tooltip" data-position="top" data-delay="50" data-tooltip="View User"></i></a>
                    <a href="{{ url('admin/users/edit/'.$user->id) }}"><i class="text-warning fa fa-edit tooltip" data-position="top" data-delay="50" data-tooltip="Edit User"></i></a>
                    <a href="{{ url('admin/users/delete/'.$user->id) }}" onclick="return confirm('Are You sure to delete!')"><i class=" text-danger fa fa-trash tooltip" data-position="top" data-delay="50" data-tooltip="Delete User"></i></a>
                @else
                <a href="{{ url('admin/users/view/'.$user->id) }}"><i class="text-success fa fa-eye-slash tooltip" data-position="top" data-delay="50" data-tooltip="View User"></i></a>
                @endif
            </td>
          </tr> 
          @endforeach 
        </tbody> 
      </table>
    </div> 
    <div class="card-footer">
         
    </div>
    </div>
@endsection
@section('script')
<script>
    $(function(){
      setTimeout(function() {
            $('.success').fadeOut(1000);
       },4000);
    });
</script>
@endsection