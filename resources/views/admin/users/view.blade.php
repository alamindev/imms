@extends('admin.master')
@section('title')
 -::View User::-
@endsection
@section('main-content')
<div class="card">
     <div class="card-header card-danger">
        <p class="text-light float-left">view Users</p>
        <a class="btn btn-danger waves-effect float-right" href="{{ url('admin/users') }}">all User</a>
     </div>
    <div class="card-content">
        <h5 class="text-danger mt-0" style="text-transform: capitalize"> See the detail's of '{{ $viewUser->userName }}'</h5>
    <table class="bordered striped "> 
        <tbody>
            <tr>
                <td>FirstName</td>
                <td>:</td>
                <td>{{ $viewUser->firstName }}</td>
            </tr>
            <tr>
                <td>LastName</td>
                <td>:</td>
                <td>{{ $viewUser->lastName }}</td>
            </tr>
            <tr>
                <td>FullName</td>
                <td>:</td>
                <td>{{ $viewUser->userName }}</td>
            </tr>
            <tr>
                <td>Phone</td>
                <td>:</td>
                <td>{{ $viewUser->phone }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>{{ $viewUser->email }}</td>
            </tr>
            <tr>
                <td>Picture</td>
                 <td>:</td>
                <td>
                   @if($viewUser->userPhoto != '')
                    <img style="width:250px;"src="{{ asset('/uploads/'. $viewUser->userPhoto) }}">
                    @else
                    <img style="width:250px;"src="{{ asset('/images/avatar.png') }}">
                   @endif
                </td>
            </tr>
            <tr>
                <td>User Role</td>
                 <td>:</td>
                <td>{{ $viewUser->roleName }}</td>
            </tr> 
        </tbody> 
      </table>
    </div> 
    <div class="card-footer card-warning">
         @if(Auth::user()->userId == $viewUser->userId)
         <a href="{{ URL::to('/admin/users/edit/'.Auth::user()->id) }}" class="btn waves-effect waves-yellow ">edit user info</a>
         @endif
    </div>
    </div>
@endsection
@section('script')

@endsection