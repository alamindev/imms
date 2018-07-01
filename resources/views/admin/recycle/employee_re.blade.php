@extends('admin.master')
@section('title')
  Employee Recycle Bin
@endsection
@section('main-content')
<div class="card">
     <div class="card-header card-primary">
        <p class="text-light float-left">Employee Recycle Bin</p> 
     </div>
    <div class="card-content"> 
      <div style="text-align: center" class="message"></div>
      <div class="search-form" style="margin-bottom: 30px;"> 
              <div class="form-group col s6">
              <label for="application">SEARCH EMPLOYEE BY DOCEUMENT NAME</label>
              <input type="text" name="employee" id="employee" placeholder="DOCEUMENT NAME"> 
      </div>
      <hr>
      <br><br>
        <table class="bordered striped" id="dataTable" >
        <thead>
          <tr>
              <th>serial</th>
              <th>Name</th>
              <th>company_reg_no</th>
              <th>doc_number</th>
              <th>application_number</th>
              <th style="text-align: center">Manage</th>
          </tr>
        </thead> 
        <tbody id="tbody">
          @php 
           $i = 1;
          @endphp
          @foreach($employees as $data)
           <tr>
             <td>{{ $i++ }}</td>
             <td>{{ $data->first_name .' '. $data->last_name }}</td> 
             <td>{{ $data->company_reg_no }}</td> 
             <td>{{ $data->doc_number }}</td> 
             <td>{{ $data->application_number }}</td> 
             <td> 
             <button id='restore' data-id='{{ $data->id }}' class='btn btn-success btn-sm'> restore </button>
             <button id='del' data-id='{{ $data->id }}' class='btn btn-danger btn-sm'> Delete </button></td>
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
<script type="text/javascript">
  $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    $(function(){
        $('#employee').on('keyup',function(e){
            $value = $(this).val(); 
            $.ajax({
                type: 'get',
                 url: '{{ URL::to('/admin/employee/recycle/search') }}',
                 data: {'doc_number' :$value},
                 success: function(data){ 
                    $('#tbody').empty(data); 
                    $('#tbody').html(data); 
                 }

            });
        });
        // for restore data 
    $(document).on('click','#restore',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
          type: 'GET',
          url: 'recycle/restore/'+id, 
          success: function(data){
            $('#dataTable').load(location.href + ' #dataTable');
            $('.message').append(data.success);
            setTimeout(function() {
                         $('.message').fadeOut(1000); 
                 },2000);
          }
        }); 
    });
    // for permanently dele data 
    $(document).on('click','#del',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        if(confirm('Are you sure to delete data permanently')){ 
        $.ajax({
          type: 'GET',
          url: 'recycle/forece/'+id, 
          success: function(data){
            $('#dataTable').load(location.href + ' #dataTable');
            $('.message').append(data.success);
            setTimeout(function() {
                         $('.message').fadeOut(1000); 
                 },2000);
          }
        });
      }
    });

    // for data table
  $('#dataTable').DataTable({
    "paging": false,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": false,
    "autoWidth": false,
    "order": [[ 0, "desc" ]],
  });
    });
</script>
@endsection