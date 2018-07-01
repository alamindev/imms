@extends('admin.master')
@section('title')
  Search Employee
@endsection
@section('main-content')
<div class="card">
     <div class="card-header card-primary">
        <p class="text-light float-left">All Employees</p>
        <a class="btn btn-danger waves-effect float-right" href="{{ route('add-employee') }}">Add Employee</a>
     </div>
    <div class="card-content"> 
      <div class="search-form" style="margin-bottom: 30px;">
    
              <div class="form-group col s6">
              <label for="application">Document Number</label>
              <input type="text" name="doc_number" id="doc_number" placeholder="Document Number Here"> 
      </div>
      <hr>
      <br><br>
        <table class="bordered striped" id="dataTable" >
        <thead>
          <tr>
              <th>Serial</th>
              <th>Employee Name </th>
              <th>company_reg_no</th>
              <th>application_number</th>
              <th>doc_number</th> 
              <th>download visa</th>
              <th>download visa detalis</th>
          </tr>
        </thead> 
        <tbody id="tbody">
           
        </tbody> 
      </table>
    </div> 
    <div class="card-footer card-primary">
        
    </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $(function(){
        $('#doc_number').on('keyup',function(e){
            $value = $(this).val(); 
            $.ajax({
                type: 'get',
                 url: '{{ URL::to('/admin/employees/search/show') }}',
                 data: {'doc_number' :$value},
                 success: function(data){ 
                    $('#tbody').html(data); 
                 }

            });
        });
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