{{-- MaintainanceStaffReg --}}

@extends('AdminPages.adminHomePage')
@section('adminContent')
@include('inc.message')
<script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
</script>
{!! Form::open(['action' => 'MaintainanceStaffReg@store' , 'method' => 'POST']) !!}
    <div class="panel-heading">
        <h3 class="panel-title">MaintainanceStaff Registration</h3>
    </div> 

    <br> <br> <br> <br> <br> 
    <div class="form-group">
        <label class="control-label"> <strong> First Name </strong> </label>
        <input id="input" maxlength="30" name="mStaffFirstName" type="text" required="required" class="form-control" placeholder="First Name" onkeydown="return alphaOnly(event);" />
    </div>
            
    <div class="form-group">
        <label class="control-label"> <strong> Last Name </strong> </label>
        <input id="input" maxlength="30" name="mStaffLastName" type="text" required="required" class="form-control" placeholder="Last Name" onkeydown="return alphaOnly(event);" />
    </div>
                
    <div class="form-group">
        <label class="control-label"> <strong> CNIC </strong></label>
        <input id="input" maxlength="100" name = "mStaffCNIC" type="text" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X" 
        required="required" class="form-control" placeholder="Enter CNIC" />
    </div>
    
    <div class="form-group">
        <label class="control-label"> <strong> Phone No </strong></label>
        <input id="input" maxlength="12" name="mStaffPhoneNo" type="text"  required="required" data-inputmask="'mask': '0399-99999999'" class="form-control" 
        placeholder="Phone Number" />
    </div>
    
    <script>
        $(":input").inputmask();
    </script>
                
    <div class="form-group">
        <label  class="control-label"> <strong> Email </strong> </label>
        <input id="input" maxlength="100" name="mStaffEmail" type="email" required="required" class="form-control" placeholder="Email" />
    </div>
            
    <div class="form-group">
        <label  class="control-label"> <strong> Date of Birth </strong> </label>
        <input  id="input" maxlength="100" name="DateofBirth" type="date" required="required" class="form-control" placeholder="Date of Birth" />
    </div>
            
    <div class="form-group" id="MaintainanceStaffType">
        <label class="control-label"> <strong> Maintainance Staff Type </strong></label>
        <select id="input" class="custom-select" name="mStaffType">
            <option selected>Choose...</option>
            <option value="Plumber">Plumber</option>
            <option value="Electrition">Electrition</option>
            <option value="OtherTechnicalStaff">Other Technical Staff</option>
        </select>
    </div>
            
    <div class="form-group" id="MaintainanceStaffExperience">
        <label class="control-label"> <strong> Experience </strong> (in years)</label>
        <input id="input" maxlength="100" name="mStaffExperience" type="text" required="required" class="form-control" placeholder="Experience in Years"
        data-inputmask="'mask': '99'" />
    </div>

    <script>
        $(":MaintainanceStaffExperience").inputmask();
    </script>
                
    <div class="form-group">
        <label class="control-label"> <strong> Home Address </strong></label>
        <textarea id="input" name="mStaffhomeAddress" class="md-textarea form-control" rows="2" placeholder="Address" required="required"></textarea>
    </div>
            
    <div class="form-group">
        <label class="control-label"> <strong> Description </strong></label>
        <textarea id="input" name="mStaffDescription" class="md-textarea form-control" rows="4" placeholder="Description" required="required"></textarea>
    </div>
                
    <script>
        $(":input").inputmask();
    </script> 
        {!! Form::submit('Submit', ['class' => 'btn btn-primary nextBtn pull-right']) !!}
{!! Form::close() !!}

    
@endsection