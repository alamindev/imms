@extends('admin.master')
@section('title')
  All Employees
@endsection
@section('main-content')
<div class="card">
     <div class="card-header">
        <p class="text-light float-left">All Employees</p>
        @if(Auth::user()->roleId == 1) 
        <a class="btn btn-danger waves-effect float-right" href="{{ route('add-employee') }}">Add Employee</a>
        @endif
     </div>
    <div class="card-content">
        @if(Session::has('success'))
        <div class="success"><strong>Success!</strong>Employee Add Successfully Complate</div>
        @endif
        <table class="bordered striped " id="data">
        <thead>
          <tr>
              <th>first Name</th>
              <th>Last Name</th>
              <th>company_reg_no</th>
              <th>application_number</th>
              <th>doc_number</th>
              <th>info</th>
              <th>Manage</th>
          </tr>
        </thead> 
        <tbody>
            @foreach($employees as $data)
          <tr>
            <td>{{ $data->first_name }}</td> 
            <td>{{ $data->last_name }}</td> 
            <td>{{ $data->company_reg_no }}</td> 
            <td>{{ $data->application_number }}</td> 
            <td>{{ $data->doc_number }}</td>  
             <td>  
              <a id="asal" href="{{ route('asal_create',['id'=>$data->id ]) }}" class="btn btn-primary">Asal</a> 
             </td> 
            <td>
                @if(Auth::user()->roleId == 1)  
                    <a href="{{ route('view-employee',["id"=>$data->id ]) }}"><i class="text-success fa fa-eye-slash tooltip" data-position="top" data-delay="50" data-tooltip="View Employee"></i></a>
                    <a href="{{ route('edit-employee',["id"=>$data->id ]) }}"><i class="text-warning fa fa-edit tooltip" data-position="top" data-delay="50" data-tooltip="Edit User"></i></a>
                    <a href="{{ route('delete-employee',["id"=>$data->id ]) }}" onclick="return confirm('Are You sure to delete!')"><i class=" text-danger fa fa-trash tooltip" data-position="top" data-delay="50" data-tooltip="Delete User"></i></a>
                @else
                <a href="{{ route('edit-employee',["id"=>$data->id ]) }}"><i class="text-success fa fa-eye-slash tooltip" data-position="top" data-delay="50" data-tooltip="View User"></i></a>
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
   
</script>
@endsection