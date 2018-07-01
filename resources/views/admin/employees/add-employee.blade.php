@extends('admin.master')
@section('title')
  Add New employee
@endsection
@section('main-content')
<div class="card">
    <div class="card-header">
        <p class="float-left text-light">Add new Employee</p>
        <a class="btn btn-danger waves-effect float-right" href="{{ url('/admin/employees') }}">all Employees</a>
    </div>
    <form class="form-horizontal" method="POST" action="{{ route('store-employee') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <span class='text-success text-center'>{{ Session::get('message') }}</span>
    <div class="card-content"> 
            <div class="row">
                 <div class="form-group col s6 {{ $errors->has('first_name') ? 'has-error' : '' }}">
                    <label for="first_name">First Name <span class="text-danger">*</span></label>
                    <input type="text" id="first_name" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="example- md">
                     <span class='text-danger'>{{ $errors->has('first_name')? $errors->first('first_name') : '' }}</span> 
                </div> 
                <div class="form-group col s6 {{ $errors->has('last_name') ? 'has-error' : '' }}">
                    <label for="last_name">Last Name <span class="text-danger">*</span></label>
                    <input type="text" id="last_name" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="example- tomas">
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
                      <small style="display: block; color: #ccc">select any one male or female</small>
                     <span class='text-danger' style="display: block;">{{ $errors->has('gender')? $errors->first('gender') : '' }}</span> 
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
                    <input type="text" id="remarks" class="form-control" name="remarks" value="{{ old('remarks') }}" placeholder="example- For issue of vp(social) 30 days">
                    <span class='text-danger'>{{ $errors->has('remarks')? $errors->first('remarks') : '' }}</span> 
                </div>
                <div class="form-group col s6 {{ $errors->has('ref_no') ? 'has-error' : '' }}">
                    <label for="ref_no">reference no. </label>
                    <input type="text" id="ref_no" class="form-control" name="ref_no" value="{{ old('ref_no') }}" placeholder="example- OVS/32111/DG201/007">
                    <span class='text-danger'>{{ $errors->has('ref_no')? $errors->first('ref_no') : '' }}</span> 
                </div> 
                <div class="form-group col s6 {{ $errors->has('date') ? 'has-error' : '' }} col s6">
                    <label for="date">Select Date</label>
                    <input type="text" id="date" class="form-control" name="date" value="{{ old('date') }}">
                    <span class='text-danger'>{{ $errors->has('date')? $errors->first('date') : '' }}</span> 
                </div>  
                <div class="form-group col s6 {{ $errors->has('issue_date') ? 'has-error' : '' }} col s6">
                    <label for="issue_date">Select issue Date</label>
                    <input type="text" id="issue_date" class="form-control" name="issue_date" value="{{ old('issue_date') }}">
                    <span class='text-danger'>{{ $errors->has('issue_date')? $errors->first('issue_date') : '' }}</span> 
                </div>
                <div class="form-group {{ $errors->has('place_issue') ? 'has-error' : '' }}">
                    <label for="place_issue">Place of issue</label>
                    <input type="text" id="place_issue" class="form-control" name="place_issue" value="{{ old('place_issue') }}">
                    <span class='text-danger'>{{ $errors->has('place_issue')? $errors->first('place_issue') : '' }}</span> 
                </div>  
                <div class="form-group col s6 {{ $errors->has('receipt_no') ? 'has-error' : '' }}">
                    <label for="receipt_no">Receipt No.</label>
                    <input type="text" id="receipt_no" class="form-control" name="receipt_no" value="{{ old('receipt_no') }}" placeholder="Example - VBG1Go1851">
                    <span class='text-danger'>{{ $errors->has('receipt_no')? $errors->first('receipt_no') : '' }}</span> 
                </div>   
                 <div class="form-group col s6 {{ $errors->has('fee_paid') ? 'has-error' : '' }}">
                    <label for="fee_paid">Fee Paid for visa Card</label>
                    <input type="text" id="fee_paid" class="form-control" name="fee_paid" value="{{ old('fee_paid') }}" placeholder="Example - 600 BDT">
                    <span class='text-danger'>{{ $errors->has('fee_paid')? $errors->first('fee_paid') : '' }}</span> 
                </div> 
                <div class="form-group col s6 {{ $errors->has('vd') ? 'has-error' : '' }} col s6">
                    <label for="vd">VD </label>
                    <input type="text" id="vd" class="form-control" name="vd" value="{{ old('vd') }}" placeholder="example- VD5186058">
                    <span class='text-danger'>{{ $errors->has('vd')? $errors->first('vd') : '' }}</span> 
                </div>  
                <div class="form-group col s6 {{ $errors->has('vp_no') ? 'has-error' : '' }} col s6">
                    <label for="vp_no">vp no.</label>
                    <input type="text" id="vp_no" class="form-control" name="vp_no" value="{{ old('vp_no') }}" placeholder="example- ENGB2N260832111003">
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
                     <span class='text-danger'>{{ $errors->has('signature')? $errors->first('signature') : '' }}</span> 
                </div>
            </div> 
                 <div class="form-group {{ $errors->has('identification_card_no') ? 'has-error' : '' }}">
                    <label for="identification_card_no">identification card no</label>
                    <input type="text" id="identification_card_no" class="form-control" name="identification_card_no" value="{{ old('identification_card_no') }}" placeholder="example- 99999999-9999-999999">
                    <span class='text-danger'>{{ $errors->has('identification_card_no')? $errors->first('identification_card_no') : '' }}</span> 
                </div>  
                 <div class="form-group {{ $errors->has('company_reg_no') ? 'has-error' : '' }}">
                    <label for="company_reg_no">Company Registration No. <span class="text-danger">*</span></label>
                    <input type="text" id="company_reg_no" class="form-control" name="company_reg_no" value="{{ old('company_reg_no') }}" placeholder="example- 1014994-T">
                    <span class='text-danger'>{{ $errors->has('company_reg_no')? $errors->first('company_reg_no') : '' }}</span> 
                </div>   
                <div class="form-group {{ $errors->has('application_number') ? 'has-error' : '' }}">
                    <label for="application_number">Application Number <span class="text-danger">*</span></label>
                    <input type="text" id="application_number" class="form-control" name="application_number" value="{{ old('application_number') }}" placeholder="example- BFA/FWCMS/HBBE1611511181">
                    <span class='text-danger'>{{ $errors->has('application_number')? $errors->first('application_number') : '' }}</span> 
                </div>   
                <div class="form-group {{ $errors->has('doc_number') ? 'has-error' : '' }}">
                    <label for="doc_number">Document Number <span class="text-danger">*</span></label>
                    <input type="text" id="doc_number" class="form-control" name="doc_number" value="{{ old('doc_number') }}" placeholder="example- BN0548111">
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
                    <input type="text" id="seramay" class="form-control" name="seramay" value="{{ old('seramay') }}" placeholder="example- 194">
                    <span class='text-danger'>{{ $errors->has('seramay')? $errors->first('seramay') : '' }}</span> 
                </div>  
                <div class="form-group {{ $errors->has('surat') ? 'has-error' : '' }}">
                    <label for="surat">Surat<span class="text-danger">*</span></label>
                    <input type="text" id="surat" class="form-control" name="surat" value="{{ old('surat') }}" placeholder="example- KDB/16031/GAAFv15567">
                    <span class='text-danger'>{{ $errors->has('surat')? $errors->first('surat') : '' }}</span> 
                </div>  
                <div class="form-group {{ $errors->has('sejumlah') ? 'has-error' : '' }}">
                    <label for="sejumlah">Sejumlah<span class="text-danger">*</span></label>
                    <input type="text" id="sejumlah" class="form-control" name="sejumlah" value="{{ old('docsejumlah_number') }}" placeholder="example- 24">
                    <span class='text-danger'>{{ $errors->has('sejumlah')? $errors->first('sejumlah') : '' }}</span> 
                </div>  
                <div class="form-group {{ $errors->has('tempoh') ? 'has-error' : '' }}">
                    <label for="tempoh">Tempoh<span class="text-danger">*</span></label>
                    <input type="text" id="tempoh" class="form-control" name="tempoh" value="{{ old('tempoh') }}" placeholder="example- 6 ka, selepas ketibann">
                    <span class='text-danger'>{{ $errors->has('tempoh')? $errors->first('tempoh') : '' }}</span> 
                </div>   
                <div class="form-group {{ $errors->has('jawatan') ? 'has-error' : '' }}">
                    <label for="jawatan">jawatan<span class="text-danger">*</span></label>
                    <input type="text" id="jawatan" class="form-control" name="jawatan" value="{{ old('jawatan') }}" placeholder="example- Pekerja binnan">
                    <span class='text-danger'>{{ $errors->has('jawatan')? $errors->first('jawatan') : '' }}</span> 
                </div>  
    </div> 
    <div class="card-footer">
       <button type="submit" class="btn btn-success">Add Employee</button>
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
 $( "#issue_date" ).datepicker({
        currentText: "Now",
        dateFormat: "yy-mm-dd",
        duration: "slow",
        changeMonth: true, 
    }); 
    });    
</script>
@endsection