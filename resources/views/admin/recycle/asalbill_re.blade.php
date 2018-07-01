@extends('admin.master')
@section('title')
  Asal Bill Recycle Bin
@endsection
@section('main-content')
<div class="card">
     <div class="card-header card-primary">
        <p class="text-light float-left">Asalbill Recycle Bin</p> 
     </div>
    <div class="card-content"> 
      <div style="text-align: center" class="message"></div>
      <div class="search-form" style="margin-bottom: 30px;"> 
              <div class="form-group col s6">
              <label for="application">Kod Imm</label>
              <input type="text" name="cod_imm" id="cod_imm" placeholder="cod imm write"> 
      </div>
      <hr>
      <br><br>
        <table class="bordered striped" id="dataTable" >
        <thead>
          <tr>
              <th>SL.</th>
              <th>cod_imm</th>
              <th>keterangan</th>
              <th>deposit</th>
              <th>asal resit no</th>  
              <th style="text-align: center">Manage</th>
          </tr>
        </thead> 
        <tbody id="tbody">
        @php 
         $i = 1;
        @endphp
        @foreach($asalbills as $asalbill)
         <tr>
          <td>{{ $i++ }}</td> 
          <td>{{ $asalbill->cod_imm }}</td> 
          <td>{{ $asalbill->keterangan }}</td> 
          <td>{{ $asalbill->deposit }}</td> 
          <td>{{ $asalbill->no_resit }}</td>  
           <td> 
           <button id='restore' data-id='{{ $asalbill->id }}' class='btn btn-success btn-sm'> restore </button>
           <button id='del' data-id='{{ $asalbill->id }}' class='btn btn-danger btn-sm'> Delete </button></td>
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
    $(function(){
        $('#cod_imm').on('keyup',function(e){
            $value = $(this).val(); 
            $.ajax({
                type: 'get',
                 url: '{{ URL::to('/admin/employee/asalbill/recycle/search') }}',
                 data: {'user' :$value},
                 success: function(data){  
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