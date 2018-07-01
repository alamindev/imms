@extends('admin.master')
@section('title')
  Add Asal for employee
@endsection
@section('main-content')
<div class="card">
    <div class="card-header bg-primary">
        <p class="float-left text-light">Add asal</p>
        <a class="btn btn-danger waves-effect float-right" href="{{ route('asals') }}">all asal</a>
    </div>
    <form class="form-horizontal" method="POST" action="{{ route('asal_store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <span class='text-success text-center'>{{ Session::get('message') }}</span>
    <div class="card-content">  
                 <div class="form-group {{ $errors->has('daripada') ? 'has-error' : '' }}">
                    <label for="daripada">Daripada<span class="text-danger">*</span></label>
                    <input type="text" id="daripada" class="form-control" name="daripada" value="{{ old('daripada') }}"  placeholder="SINMAH LIVESTOCKS SDN BHD">
                    <input type="hidden" id="employee_id" class="form-control" name="employee_id" value="{{ $asal->id }}">
                     <span class='text-danger'>{{ $errors->has('daripada')? $errors->first('daripada') : '' }}</span> 
                </div> 
                <div class="form-group {{ $errors->has('perniagaan') ? 'has-error' : '' }}">
                    <label for="perniagaan">Perniagaan<span class="text-danger">*</span></label>
                    <input type="text" id="perniagaan" class="form-control" name="perniagaan" value="{{ old('perniagaan') }}" placeholder="58163-W">
                     <span class='text-danger'>{{ $errors->has('perniagaan')? $errors->first('perniagaan') : '' }}</span> 
                </div>     
                <div class="form-group {{ $errors->has('alamat') ? 'has-error' : '' }}">
                    <label for="alamat">Alamat<span class="text-danger">*</span></label>
                    <input type="text" id="alamat" class="form-control" name="alamat" value="{{ old('alamat') }}" placeholder="">
                     <span class='text-danger'>{{ $errors->has('alamat')? $errors->first('alamat') : '' }}</span> 
                </div>  
                <div class="form-group {{ $errors->has('im') ? 'has-error' : '' }}">
                    <label for="im">im<span class="text-danger">*</span></label>
                    <input type="text" id="im" class="form-control" name="im" value="{{ old('im') }}" placeholder="IM. 199-PIN. 1/10">
                     <span class='text-danger'>{{ $errors->has('im')? $errors->first('im') : '' }}</span> 
                </div>    
                <div class="form-group {{ $errors->has('no_resit') ? 'has-error' : '' }}">
                    <label for="no_resit">No_resit<span class="text-danger">*</span></label>
                    <input type="text" id="no_resit" class="form-control" name="no_resit" value="{{ old('no_resit') }}" placeholder="M01G066944">
                     <span class='text-danger'>{{ $errors->has('no_resit')? $errors->first('no_resit') : '' }}</span> 
                </div>   
            <div class="row">
              <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                    <label for="date">Select Date<span class="text-danger">*</span></label>
                    <input type="text" id="date" class="form-control" name="date" value="{{ old('date') }}">
                     <span class='text-danger'>{{ $errors->has('date')? $errors->first('date') : '' }}</span> 
               </div> 
            </div>
            <div class="form-group {{ $errors->has('ringgit') ? 'has-error' : '' }}">
                    <label for="ringgit">Ringgit<span class="text-danger">*</span></label>
                    <input type="text" id="ringgit" class="form-control" name="ringgit" value="{{ old('ringgit') }}" placeholder="SATU RIBU ENAM RATUS EMPAT PULUH">
                     <span class='text-danger'>{{ $errors->has('ringgit')? $errors->first('ringgit') : '' }}</span> 
                </div>   
            <div class="form-group {{ $errors->has('bayaran_name') ? 'has-error' : '' }}">
                    <label for="bayaran_name">Bayaran Name<span class="text-danger">*</span></label>
                    <input type="text" id="bayaran_name" class="form-control" name="bayaran_name" value="{{ old('bayaran_name') }}" placeholder="BANK DRAF">
                     <span class='text-danger'>{{ $errors->has('bayaran_name')? $errors->first('bayaran_name') : '' }}</span> 
            </div>   
            <div class="form-group {{ $errors->has('bayaran_number') ? 'has-error' : '' }}">
                    <label for="bayaran_number">Bayaran Number<span class="text-danger">*</span></label>
                    <input type="text" id="bayaran_number" class="form-control" name="bayaran_number" value="{{ old('bayaran_number') }}" placeholder="BANK DRAF NUMBER 712787">
                     <span class='text-danger'>{{ $errors->has('bayaran_number')? $errors->first('bayaran_number') : '' }}</span> 
            </div>      
            <div class="form-group">
                    <label for="notis_makluman">Notis Makluman</label>
                    <input type="text" id="notis_makluman" class="form-control" name="notis_makluman" value="{{ old('notis_makluman') }}" placeholder="NOTIS"> 
            </div>  
            <div class="form-group {{ $errors->has('ptj') ? 'has-error' : '' }}">
                    <label for="ptj">PTJ<span class="text-danger">*</span></label>
                    <input type="text" id="ptj" class="form-control" name="ptj" value="{{ old('ptj') }}" placeholder="060100-PEJ. IMM.MELAKA">
                     <span class='text-danger'>{{ $errors->has('ptj')? $errors->first('ptj') : '' }}</span> 
            </div> 
            <div class="form-group {{ $errors->has('mashana_name') ? 'has-error' : '' }}">
                    <label for="mashana_name">Mashana Name<span class="text-danger">*</span></label>
                    <input type="text" id="mashana_name" class="form-control" name="mashana_name" value="{{ old('mashana_name') }}" placeholder="MASHANA ">
                     <span class='text-danger'>{{ $errors->has('mashana_name')? $errors->first('mashana_name') : '' }}</span> 
            </div> 
            <div class="form-group {{ $errors->has('mashana_no') ? 'has-error' : '' }}">
                    <label for="mashana_no">mashana no.<span class="text-danger">*</span></label>
                    <input type="text" id="mashana_no" class="form-control" name="mashana_no" value="{{ old('mashana_no') }}" placeholder="337">
                     <span class='text-danger'>{{ $errors->has('mashana_no')? $errors->first('mashana_no') : '' }}</span> 
            </div> 
          <div class="form-group {{ $errors->has('n_name') ? 'has-error' : '' }}">
                    <label for="n_name">N Name<span class="text-danger">*</span></label>
                    <input type="text" id="n_name" class="form-control" name="n_name" value="{{ old('n_name') }}" placeholder="n">
                     <span class='text-danger'>{{ $errors->has('n_name')? $errors->first('n_name') : '' }}</span> 
            </div> 
             <div class="form-group {{ $errors->has('n_number') ? 'has-error' : '' }}">
                    <label for="n_name">N number<span class="text-danger">*</span></label>
                    <input type="text" id="n_number" class="form-control" name="n_number" value="{{ old('n_number') }}" placeholder="828670">
                     <span class='text-danger'>{{ $errors->has('n_number')? $errors->first('n_number') : '' }}</span> 
            </div>   
        <div class="form-group {{ $errors->has('kelulusan') ? 'has-error' : '' }}">
                    <label for="kelulusan">Kelulusan<span class="text-danger">*</span></label>
                    <input type="text" id="kelulusan" class="form-control" name="kelulusan" value="{{ old('kelulusan') }}" placeholder="BPKS(8.15)248-11(43)">
                     <span class='text-danger'>{{ $errors->has('kelulusan')? $errors->first('kelulusan') : '' }}</span> 
            </div> 
                
     </div> 
    <div class="card-footer">
       <button type="submit" class="btn btn-success">Add asal</button>
    </div>
</form>
</div>
@endsection
@section('script')
<script>
     $(function(){
        $( "#date" ).datepicker({
        currentText: "Now",
        dateFormat: "yy-mm-dd",
        duration: "slow",
        changeMonth: true, 
    });     
  
    });    
</script>
@endsection