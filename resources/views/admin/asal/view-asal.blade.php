@extends('admin.master')
@section('title')
  view Asal
@endsection
@section('main-content')
<div class="card">
     <div class="card-header card-primary">
        <p class="text-light float-left">view asal</p>
        <a class="btn btn-primary waves-effect float-right" href="{{ route('asals') }}">asals</a>
     </div>
    <div class="card-content"> 
    <div class="row">
        <div class="col s12">
            <table class="bordered striped "> 
                    <tbody>
                        <tr>
                            <td>daripada</td>
                            <td>:</td>
                            <td>{{ $viewAsal->daripada }}</td>
                        </tr>
                        <tr>
                            <td>perniagaan</td>
                            <td>:</td>
                            <td>{{ $viewAsal->perniagaan }}</td>
                        </tr>
                        <tr>
                            <td>alamat</td>
                            <td>:</td>
                            <td>{{ $viewAsal ->alamat }}</td>
                        </tr>
                        <tr>
                            <td>im</td>
                            <td>:</td>
                            <td>{{ $viewAsal ->im }}</td>
                        </tr>
                        <tr>
                            <td>no_resit</td>
                            <td>:</td>
                            <td>{{ $viewAsal ->no_resit }}</td>
                        </tr> 
                         <tr>
                            <td>date</td>
                            <td>:</td>
                            <td>{{ $viewAsal ->datetime }}</td>
                        </tr> 
                        <tr>
                            <td>ringgit</td>
                             <td>:</td>
                            <td>{{ $viewAsal ->ringgit }}</td>
                        </tr>
                         <tr>
                            <td>bayaran_name</td>
                             <td>:</td>
                            <td>{{ $viewAsal ->bayaran_name }}</td>
                        </tr> 
                        <tr>
                            <td>bayaran_number</td>
                             <td>:</td>
                            <td>{{ $viewAsal ->bayaran_number }}</td>
                        </tr> 
                        <tr>
                            <td>notis_makluman</td>
                             <td>:</td>
                            <td>{{ $viewAsal ->notis_makluman }}</td>
                        </tr>    
                        <tr>
                            <td>ptj</td>
                             <td>:</td>
                            <td>{{ $viewAsal ->ptj }}</td>
                        </tr>    
                        <tr>
                            <td>mashana_name</td>
                             <td>:</td>
                            <td>{{ $viewAsal ->mashana_name }}</td>
                        </tr>    
                        <tr>
                            <td>mashana_no</td>
                             <td>:</td>
                            <td>{{ $viewAsal ->mashana_no }}</td>
                        </tr> 
                         <tr>
                            <td>n_name</td>
                             <td>:</td>
                            <td>{{ $viewAsal ->n_name }}</td>
                        </tr>  
                        <tr>
                            <td>n_number</td>
                             <td>:</td>
                            <td>{{ $viewAsal ->n_number }}</td>
                        </tr>  
                        <tr>
                            <td>kelulusan</td>
                             <td>:</td>
                            <td>{{ $viewAsal ->kelulusan }}</td>
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