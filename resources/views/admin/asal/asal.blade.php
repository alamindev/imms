@extends('admin.master')
@section('title')
  All Asal
@endsection
@section('main-content')
<div class="card">
     <div class="card-header card-primary">
        <p class="text-light float-left">All Asals</p> 
     </div>
    <div class="card-content">
        @if(Session::has('success'))
        <div class="success"><strong>Success!</strong>Employee Add Successfully Complate</div>
        @endif
        <table class="bordered striped " id="data">
        <thead>
          <tr>
              <th>SL.</th>
              <th>daripada</th>
              <th>perniagaan</th>
              <th>receipt_no</th> 
              <th>Document Number</th>
              <th>add asal bill</th> 
              <th>Asal</th> 
              <th>Manage</th>
          </tr>
        </thead> 
        <tbody>
          @php
          $i = 1;
          @endphp
            @foreach($asals as $data)
          <tr>
            <td>{{ $i++ }}</td> 
            <td>{{ $data->daripada }}</td> 
            <td>{{ $data->perniagaan }}</td> 
            <td>{{ $data->no_resit }}</td>  
            <td>{{ $data->doc_number }}</td> 
            <td><a id="asal" href="{{ route('asalbill_create',['id'=>$data->id ]) }}" class="btn btn-success">Asal Bill</i></a></td>   
            <td><a  href="{{ route('asal_download',['id'=>$data->id ]) }}" class="btn btn-primary"> download</i></a></td>  
            <td>
                @if(Auth::user()->roleId == 1)  
                    <a href="{{ route('asal_show',["id"=>$data->id ]) }}"><i class="text-success fa fa-eye-slash tooltip" data-position="top" data-delay="50" data-tooltip="View Employee"></i></a>
                    <a href="{{ route('asal_edit',["id"=>$data->id ]) }}"><i class="text-warning fa fa-edit tooltip" data-position="top" data-delay="50" data-tooltip="Edit User"></i></a> 
                @else
                <a href="{{ route('asal_show',["id"=>$data->id ]) }}"><i class="text-success fa fa-eye-slash tooltip" data-position="top" data-delay="50" data-tooltip="View User"></i></a>
                @endif
            </td>
          </tr> 
          @endforeach 
        </tbody> 
      </table>
    </div> 
    <div class="card-footer card-primary">
          
    </div>
    </div>
@endsection
@section('script')
<script>
 
</script>
@endsection