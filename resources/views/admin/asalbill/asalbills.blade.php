@extends('admin.master')
@section('title')
 All Asal Bill
@endsection
@section('main-content')
<div class="card">
     <div class="card-header card-primary">
        <p class="text-light float-left">All Asalbills</p> 
     </div>
    <div class="card-content">
        @if(Session::has('success'))
        <div class="success"><strong>Success!</strong>Asal bill Add Successfully Complate</div>
        @endif
        <table class="bordered striped " id="data">
        <thead>
          <tr>
              <th>SL.</th>
              <th>cod_imm</th>
              <th>keterangan</th>
              <th>deposit</th>  
              <th>Receipt No.</th>  
              <th>Manage</th>
          </tr>
        </thead> 
        <tbody>
          @php
          $i = 1;
          @endphp
            @foreach($asalbills as $data)
          <tr>
            <td>{{ $i++ }}</td> 
            <td>{{ $data->cod_imm }}</td> 
            <td>{{ $data->keterangan }}</td> 
            <td>{{ $data->deposit }}</td>   
            <td>{{ $data->no_resit }}</td>   
            <td>
                @if(Auth::user()->roleId == 1)  
                    <a href="{{ route('asalbill_show',["id"=>$data->id ]) }}"><i class="text-success fa fa-eye-slash tooltip" data-position="top" data-delay="50" data-tooltip="View Employee"></i></a>
                    <a href="{{ route('asalbill_edit',["id"=>$data->id ]) }}"><i class="text-warning fa fa-edit tooltip" data-position="top" data-delay="50" data-tooltip="Edit User"></i></a> 
                    <a href="{{ route('delete-asalbill',["id"=>$data->id ]) }}" onclick="return confirm('Are You sure to delete!')"><i class=" text-danger fa fa-trash tooltip" data-position="top" data-delay="50" data-tooltip="Delete User"></i></a>
                @else
                <a href="{{ route('asalbill_show',["id"=>$data->id ]) }}"><i class="text-success fa fa-eye-slash tooltip" data-position="top" data-delay="50" data-tooltip="View User"></i></a>
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
   $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $(function(){
      setTimeout(function() {
            $('.success').fadeOut(1000);
       },4000); 
      // coding for ajax change status
    $(document).on('click','#status',function(e){ 
          e.preventDefault();
          var id = $(this).attr('href');  
          $.get(id,function(data){
              $('#data').load(location.href + ' #data');
          });
      });
    });
</script>
@endsection