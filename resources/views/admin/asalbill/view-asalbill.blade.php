@extends('admin.master')
@section('title')
  view Asal Bill
@endsection
@section('main-content')
<div class="card">
     <div class="card-header card-primary">
        <p class="text-light float-left">view asal bills</p>
        <a class="btn btn-primary waves-effect float-right" href="{{ route('asalbills') }}">asalbills</a>
     </div>
    <div class="card-content"> 
    <div class="row">
        <div class="col s12">
            <table class="bordered striped "> 
                    <tbody>
                        <tr>
                            <td>cod_imm</td>
                            <td>:</td>
                            <td>{{ $viewAsalbill->cod_imm }}</td>
                        </tr>
                        <tr>
                            <td>keterangan</td>
                            <td>:</td>
                            <td>{{ $viewAsalbill->keterangan }}</td>
                        </tr> 
                         <tr>
                            <td>deposit</td>
                            <td>:</td>
                            <td>{{ $viewAsalbill->deposit }}</td>
                        </tr>  
                        <tr>
                            <td>kadar (RM)</td>
                            <td>:</td>
                            <td>{{ $viewAsalbill->kadar }}</td>
                        </tr> 
                         <tr>
                            <td>kuantiti</td>
                            <td>:</td>
                            <td>{{ $viewAsalbill->kuantiti }}</td>
                        </tr> 
                        <tr>
                            <td>Jumlaj (RM)</td>
                            <td>:</td>
                            <td>{{ $viewAsalbill->kadar * $viewAsalbill->kuantiti }}</td>
                        </tr> 
                        <tr>
                            <td>resit No</td>
                            <td>:</td>
                            <td>{{ $viewAsalbill->asal->no_resit  }}</td>
                        </tr> 
                    </tbody> 
                  </table>
        </div> 
    </div> 
    <div class="card-footer card-primary"> 
    </div>
    </div>
@endsection
@section('script')

@endsection