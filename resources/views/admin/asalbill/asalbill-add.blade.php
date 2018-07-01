@extends('admin.master')
@section('title')
  Add Asal bill for employee
@endsection
@section('main-content')
<div class="card">
    <div class="card-header bg-primary">
        <p class="float-left text-light">Add asal</p>
        <a class="btn btn-danger waves-effect float-right" href="{{ route('asalbills') }}">all asal</a>
    </div>
    <form class="form-horizontal" method="POST" action="{{ route('asalbill_store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <span class='text-success text-center'>{{ Session::get('message') }}</span>
    <div class="card-content">  
                 <div class="form-group {{ $errors->has('cod_imm') ? 'has-error' : '' }}">
                    <label for="cod_imm">cod_imm<span class="text-danger">*</span></label>
                    <input type="text" id="cod_imm" class="form-control" name="cod_imm" value="{{ old('cod_imm') }}"  placeholder="example - 221100">
                    <input type="hidden" class="form-control" name="asal_id" value="{{ $asalbill->id }}">
                     <span class='text-danger'>{{ $errors->has('cod_imm')? $errors->first('cod_imm') : '' }}</span> 
                </div>  
                 <div class="form-group {{ $errors->has('keterangan') ? 'has-error' : '' }}">
                    <label for="keterangan">keterangan<span class="text-danger">*</span></label>
                    <input type="text" id="keterangan" class="form-control" name="keterangan" value="{{ old('keterangan') }}"  placeholder="example - visa single entry"> 
                     <span class='text-danger'>{{ $errors->has('keterangan')? $errors->first('keterangan') : '' }}</span> 
                </div>   
                <div class="form-group {{ $errors->has('deposit') ? 'has-error' : '' }}">
                    <label for="deposit">deposit<span class="text-danger">*</span></label>
                    <input type="text" id="deposit" class="form-control" name="deposit" value="{{ old('deposit') }}"  placeholder="example - 71306"> 
                     <span class='text-danger'>{{ $errors->has('deposit')? $errors->first('deposit') : '' }}</span> 
                </div>  
                <div class="form-group {{ $errors->has('kadar') ? 'has-error' : '' }}">
                    <label for="kadar">kadar<span class="text-danger">*</span></label>
                    <input type="text" id="kadar" class="form-control" name="kadar" value="{{ old('kadar') }}"  placeholder="example- 110"> 
                     <span class='text-danger'>{{ $errors->has('kadar')? $errors->first('kadar') : '' }}</span> 
                </div>  
                <div class="form-group {{ $errors->has('kuantiti') ? 'has-error' : '' }}">
                    <label for="kuantiti">kuantiti<span class="text-danger">*</span></label>
                    <input type="text" id="kuantiti" class="form-control" name="kuantiti" value="{{ old('kuantiti') }}"  placeholder="example - 8"> 
                     <span class='text-danger'>{{ $errors->has('kuantiti')? $errors->first('kuantiti') : '' }}</span> 
                </div>  
                
     </div> 
    <div class="card-footer">
       <button type="submit" class="btn btn-success">Add asalbill</button>
    </div>
</form>
</div>
@endsection
@section('script')
<script>
   
</script>
@endsection