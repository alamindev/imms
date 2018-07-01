@extends('admin.master')
@section('title')
  View Employee
@endsection
@section('main-content')
<div class="card">
     <div class="card-header card-danger">
        <p class="text-light float-left">view Users</p>
        <a class="btn btn-danger waves-effect float-right" href="{{ route('employees') }}">Employees</a>
     </div>
    <div class="card-content">
        <h5 class="text-danger mt-0" style="text-transform: capitalize"> See the detail's of '{{  $viewEmployees->employee_name }}'</h5>
    <div class="row">
        <div class="col s6">
            <table class="bordered striped "> 
                    <tbody>
                        <tr>
                            <td>First Name</td>
                            <td>:</td>
                            <td>{{ $viewEmployees->first_name }}</td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td>:</td>
                            <td>{{ $viewEmployees->last_name }}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>:</td>
                            <td>{{ $viewEmployees ->gender }}</td>
                        </tr> 
                         <tr>
                            <td>Nationality</td>
                            <td>:</td>
                            <td>{{ $viewEmployees ->nationality }}</td>
                        </tr> 
                        <tr>
                            <td>Remarks</td>
                            <td>:</td>
                            <td>{{ $viewEmployees ->remarks }}</td>
                        </tr>
                        <tr>
                            <td>ref_no</td>
                            <td>:</td>
                            <td>{{ $viewEmployees ->ref_no }}</td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td>:</td>
                            <td>{{ $viewEmployees ->date }}</td>
                        </tr>
                         <tr>
                            <td>Issue Date</td>
                            <td>:</td>
                            <td>{{ $viewEmployees ->issue_date }}</td>
                        </tr>   
                        <tr>
                            <td>VD</td>
                            <td>:</td>
                            <td>{{ $viewEmployees ->vd }}</td>
                        </tr> 
                         <tr>
                            <td>Identification Card No.</td>
                            <td>:</td>
                            <td>{{ $viewEmployees ->identification_card_no }}</td>
                        </tr> 
                        <tr>
                            <td>Company Registration no.</td>
                             <td>:</td>
                            <td>{{ $viewEmployees ->company_reg_no }}</td>
                        </tr>
                         <tr>
                            <td>Application Number</td>
                             <td>:</td>
                            <td>{{ $viewEmployees ->application_number }}</td>
                        </tr> 
                        <tr>
                            <td>Document Number</td>
                             <td>:</td>
                            <td>{{ $viewEmployees ->doc_number }}</td>
                        </tr> 
                        <tr>
                            <td>Create Date</td>
                             <td>:</td>
                            <td>{{ $viewEmployees ->date }}</td>
                        </tr> 
                    </tbody> 
                  </table>
        </div>
        <div class="col s6">
            <table class="bordered striped "> 
                  <tr>
                    <td>Country</td>
                     <td>:</td>
                    <td>{{ $viewEmployees ->country }}</td>
                  </tr>      
                <tr>
                    <td>Seramay</td>
                     <td>:</td>
                    <td>{{ $viewEmployees ->seramay }}</td>
                </tr>   
                <tr>
                    <td>Surat</td>
                     <td>:</td>
                    <td>{{ $viewEmployees ->surat }}</td>
                </tr>   
                <tr>
                    <td>Sejumlah</td>
                     <td>:</td>
                    <td>{{ $viewEmployees ->sejumlah }}</td>
                </tr>   
                <tr>
                    <td>Tempoh</td>
                     <td>:</td>
                    <td>{{ $viewEmployees ->tempoh }}</td>
                </tr>   
                <tr> 
                    <td>
                        @if($viewEmployees->picture != '')
                        <img style="width:250px;"src="{{ asset('/uploads/'. $viewEmployees ->picture) }}">
                         @else
                        <img style="width:250px;"src="{{ asset('/images/avatar.png') }}">
                        @endif
                    </td>
                </tr> 
                <tr> 
                    <td>
                        @if($viewEmployees->signature != '')
                        <img style="width:250px;"src="{{ asset('/uploads/'. $viewEmployees ->signature) }}">
                         @else
                        <img style="width:250px;"src="{{ asset('/images/avatar.png') }}">
                        @endif
                    </td>
                </tr> 
            </table> 
        </div>
    </div>
    </div> 
    <div class="card-footer card-warning"> 
    </div>
    </div>
@endsection
@section('script')

@endsection