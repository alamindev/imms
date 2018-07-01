@extends('admin.master')
@section('title')
  Edit Employee
@endsection
@section('main-content')
<div class="card">
    <div class="card-header">
        <p class="float-left text-light">Edit {{ $editEmployee->employee_name }} detail's</p>
        <a class="btn btn-danger waves-effect float-right" href="{{ url('/admin/employees') }}">all Employees</a>
    </div>
    <form class="form-horizontal" method="POST" action="{{ route('update-employee') }}" enctype="multipart/form-data" name="employee">
    {{ csrf_field() }}
    <span class='text-success text-center'>{{ Session::get('message') }}</span>
    <div class="card-content"> 
            <div class="row">
                 <div class="form-group col s6 {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label for="first_name">First Name <span class="text-danger">*</span></label>
                    <input type="text" id="first_name" class="form-control" name="first_name" value="{{ $editEmployee->first_name }}">
                    <input type="hidden" name="id" value="{{ $editEmployee->id }}">
                     <span class='text-danger'>{{ $errors->has('first_name')? $errors->first('first_name') : '' }}</span> 
                </div> 
                <div class="form-group col s6 {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <label for="last_name">Last Name <span class="text-danger">*</span></label>
                    <input type="text" id="last_name" class="form-control" name="last_name" value="{{ $editEmployee->last_name }}">
                     <span class='text-danger'>{{ $errors->has('last_name')? $errors->first('last_name') : '' }}</span> 
                </div> 
                <div class="form-group col s6 {{ $errors->has('gender') ? 'has-error' : '' }}">
                    <label style="display: block;">Gender</label>
                        <label>
                        <input class="with-gap" name="gender" type="radio" value="male"  />
                        <span>male</span>
                      </label> 
                       <label>
                        <input class="with-gap" name="gender" type="radio" value="female" />
                        <span>female</span>
                      </label>
                     <span class='text-danger'>{{ $errors->has('gender')? $errors->first('gender') : '' }}</span> 
                </div>
                <div class="input-field form-group col s6 {{ $errors->has('nationality') ? 'has-error' : '' }}">
                    <select name="nationality">
                          <option value="" disabled selected>nationality</option>
                          <option value="bangladesh">Bangladesh</option> 
                    </select>
                    <label>Nationality</label> 
                     <span class='text-danger'>{{ $errors->has('nationality')? $errors->first('nationality') : '' }}</span> 
                </div> 
                <div class="form-group col s6 {{ $errors->has('remarks') ? 'has-error' : '' }}">
                    <label for="remarks">Remarks</label>
                    <input type="text" id="remarks" class="form-control" name="remarks" value="{{ $editEmployee->remarks }}">
                    <span class='text-danger'>{{ $errors->has('remarks')? $errors->first('remarks') : '' }}</span> 
                </div>
                <div class="form-group col s6 {{ $errors->has('ref_no') ? 'has-error' : '' }}">
                    <label for="ref_no">reference no. </label>
                    <input type="text" id="ref_no" class="form-control" name="ref_no" value="{{ $editEmployee->ref_no }}">
                    <span class='text-danger'>{{ $errors->has('ref_no')? $errors->first('ref_no') : '' }}</span> 
                </div> 
                <div class="form-group col s6 {{ $errors->has('date') ? 'has-error' : '' }}">
                    <label for="date">Select Date</label>
                    <input type="text" id="date" class="form-control" name="date" value="{{ $editEmployee->date }}">
                    <span class='text-danger'>{{ $errors->has('date')? $errors->first('date') : '' }}</span> 
                </div>  
                <div class="form-group col s6 {{ $errors->has('issue_date') ? 'has-error' : '' }}">
                    <label for="issue_date">Select issue Date</label>
                    <input type="text" id="issue_date" class="form-control" name="issue_date" value="{{ $editEmployee->issue_date}}">
                    <span class='text-danger'>{{ $errors->has('issue_date')? $errors->first('issue_date') : '' }}</span> 
                </div>
                <div class="form-group {{ $errors->has('place_issue') ? 'has-error' : '' }}">
                    <label for="place_issue">Place of issue</label>
                    <input type="text" id="place_issue" class="form-control" name="place_issue" value="{{ $editEmployee->place_issue }}">
                    <span class='text-danger'>{{ $errors->has('place_issue')? $errors->first('place_issue') : '' }}</span> 
                </div> 
                  <div class="form-group col s6 {{ $errors->has('receipt_no') ? 'has-error' : '' }}">
                    <label for="receipt_no">Receipt No.</label>
                    <input type="text" id="receipt_no" class="form-control" name="receipt_no" value="{{ $editEmployee->receipt_no }}" placeholder="Example - VBG1Go1851">
                    <span class='text-danger'>{{ $errors->has('receipt_no')? $errors->first('receipt_no') : '' }}</span> 
                </div>   
                 <div class="form-group col s6 {{ $errors->has('fee_paid') ? 'has-error' : '' }}">
                    <label for="fee_paid">Fee Paid for visa Card</label>
                    <input type="text" id="fee_paid" class="form-control" name="fee_paid" value="{{ $editEmployee->fee_paid }}" placeholder="Example - 600 BDT">
                    <span class='text-danger'>{{ $errors->has('fee_paid')? $errors->first('fee_paid') : '' }}</span> 
                </div>  
                <div class="form-group col s6 {{ $errors->has('vd') ? 'has-error' : '' }}">
                    <label for="vd">VD </label>
                    <input type="text" id="vd" class="form-control" name="vd" value="{{ $editEmployee->vd }}">
                    <span class='text-danger'>{{ $errors->has('vd')? $errors->first('vd') : '' }}</span> 
                </div>  
                <div class="form-group col s6 {{ $errors->has('vp_no') ? 'has-error' : '' }}">
                    <label for="vp_no">vp no.</label>
                    <input type="text" id="vp_no" class="form-control" name="vp_no" value="{{ $editEmployee->vp_no }}">
                    <span class='text-danger'>{{ $errors->has('vp_no')? $errors->first('vp_no') : '' }}</span> 
                </div>  
                <div class="form-group col s6 {{ $errors->has('picture') ? 'has-error' : '' }}">
                    <label>Employee Photo <span class="text-danger">*</span></label>
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Employee Photo</span>
                            <input type="file" name="picture">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                     <span class='text-danger'>{{ $errors->has('picture')? $errors->first('picture') : '' }}</span> 
                </div> 
                <div class="form-group col s6 {{ $errors->has('signature') ? 'has-error' : '' }}">
                    <label>Upload signature<span class="text-danger">*</span></label>
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Upload signature</span>
                            <input type="file" name="signature">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                     <span class='text-danger'>{{ $errors->has('singature')? $errors->first('singature') : '' }}</span> 
                </div> 
             <div class="form-group col s6">
                    @if($editEmployee->picture != '')
                    <img src="{{ asset('/uploads/'.$editEmployee->picture) }}" style="width: 100px; height: 100px;">
                     @else
                      <img src="{{ asset('/images/avatar.png') }}" width="70px">
                     @endif 
                     <p>photo</p>
                </div>
            <div class="form-group col s6">
                    @if($editEmployee->signature != '')
                    <img src="{{ asset('/uploads/'.$editEmployee->signature) }}" style="width: 100px; height: 100px;">
                     @else
                      <img src="{{ asset('/images/avatar.png') }}" width="70px">
                     @endif 
                     <p> signature</p>
                </div>
              </div> 
            <div class="form-group {{ $errors->has('identification_card_no') ? 'has-error' : '' }}">
                    <label for="identification_card_no">identification card no</label>
                    <input type="text" id="identification_card_no" class="form-control" name="identification_card_no" value="{{ $editEmployee->identification_card_no }}">
                    <span class='text-danger'>{{ $errors->has('identification_card_no')? $errors->first('identification_card_no') : '' }}</span> 
                </div>  
                 <div class="form-group {{ $errors->has('company_reg_no') ? 'has-error' : '' }}">
                    <label for="company_reg_no">Company Registration No. <span class="text-danger">*</span></label>
                    <input type="text" id="company_reg_no" class="form-control" name="company_reg_no" value="{{ $editEmployee->company_reg_no }}">
                    <span class='text-danger'>{{ $errors->has('company_reg_no')? $errors->first('company_reg_no') : '' }}</span> 
                </div>   
                <div class="form-group {{ $errors->has('application_number') ? 'has-error' : '' }}">
                    <label for="application_number">Application Number <span class="text-danger">*</span></label>
                    <input type="text" id="application_number" class="form-control" name="application_number" value="{{ $editEmployee->application_number }}">
                    <span class='text-danger'>{{ $errors->has('application_number')? $errors->first('application_number') : '' }}</span> 
                </div>   
                <div class="form-group {{ $errors->has('doc_number') ? 'has-error' : '' }}">
                    <label for="doc_number">Document Number <span class="text-danger">*</span></label>
                    <input type="text" id="doc_number" class="form-control" name="doc_number" value="{{ $editEmployee->doc_number }}">
                    <span class='text-danger'>{{ $errors->has('doc_number')? $errors->first('doc_number') : '' }}</span> 
                </div>  
                <div class="input-field form-group{{ $errors->has('country') ? 'has-error' : '' }}">
                    <select name="country">
                          <option value="" disabled selected>Choose Country</option>
                          <option value="Bangladesh">BANGLADESH</option> 
                    </select>
                    <label>Country</label> 
                     <span class='text-danger'>{{ $errors->has('country')? $errors->first('country') : '' }}</span> 
                </div>
                <div class="form-group {{ $errors->has('seramay') ? 'has-error' : '' }}">
                    <label for="seramay">Seramay<span class="text-danger">*</span></label>
                    <input type="text" id="seramay" class="form-control" name="seramay" value="{{ $editEmployee->seramay }}">
                    <span class='text-danger'>{{ $errors->has('seramay')? $errors->first('seramay') : '' }}</span> 
                </div>  
                <div class="form-group {{ $errors->has('surat') ? 'has-error' : '' }}">
                    <label for="surat">Surat<span class="text-danger">*</span></label>
                    <input type="text" id="surat" class="form-control" name="surat" value="{{ $editEmployee->surat }}">
                    <span class='text-danger'>{{ $errors->has('surat')? $errors->first('surat') : '' }}</span> 
                </div>  
                <div class="form-group {{ $errors->has('sejumlah') ? 'has-error' : '' }}">
                    <label for="sejumlah">Sejumlah<span class="text-danger">*</span></label>
                    <input type="text" id="sejumlah" class="form-control" name="sejumlah" value="{{ $editEmployee->sejumlah }}">
                    <span class='text-danger'>{{ $errors->has('sejumlah')? $errors->first('sejumlah') : '' }}</span> 
                </div>  
                <div class="form-group {{ $errors->has('tempoh') ? 'has-error' : '' }}">
                    <label for="tempoh">Tempoh<span class="text-danger">*</span></label>
                    <input type="text" id="tempoh" class="form-control" name="tempoh" value="{{ $editEmployee->tempoh }}">
                    <span class='text-danger'>{{ $errors->has('tempoh')? $errors->first('tempoh') : '' }}</span> 
                </div> 
                 <div class="form-group {{ $errors->has('jawatan') ? 'has-error' : '' }}">
                    <label for="jawatan">Jawatan<span class="text-danger">*</span></label>
                    <input type="text" id="jawatan" class="form-control" name="jawatan" value="{{ $editEmployee->jawatan }}">
                    <span class='text-danger'>{{ $errors->has('jawatan')? $errors->first('jawatan') : '' }}</span> 
                </div>  
    </div> 
    <div class="card-footer">
       <button type="submit" class="btn btn-success">Update info</button>
    </div>
</form>
</div>
@endsection
@section('script')
<script>
document.forms['employee'].elements['gender'].value = "{{ $editEmployee->gender }}";
document.forms['employee'].elements['nationality'].value = "{{ $editEmployee->nationality }}";
document.forms['employee'].elements['country'].value = "{{ $editEmployee->country }}";
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