{{-- makeAnnouncement --}}

@extends('AdminPages.adminHomePage')
@section('adminContent')
@include('inc.message')
<script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
</script>
{!! Form::open(['action' => 'Announcements@store' , 'method' => 'POST']) !!}
    <div class="panel-heading">
        <h3 class="thead-dark">Make Announcements</h3>
    </div> 

    <br> <br> 

    <div class="form-group">
        <label class="control-label"> <strong> Announcement ID </strong></label>
        <input id="input" maxlength="100" name = "announcementID" type="text" data-inputmask="'mask': '9-99-99'"  placeholder="Announcement ID" 
        required="required" class="form-control" placeholder="Enter CNIC" />
    </div>

    <div class="form-group">
        <label class="control-label"> <strong> Subject  </strong> </label>
        <input id="input" maxlength="30" name="subject" type="text" required="required" class="form-control" placeholder="Subject" onkeydown="return alphaOnly(event);"/>
    </div>
                   
    <div class="form-group">
        <label class="control-label"> <strong> Description </strong></label>
        <textarea id="input" name="description" class="md-textarea form-control" rows="4" placeholder="Description" required="required"></textarea>
    </div>
                
    <script>
        $(":input").inputmask();
    </script> 
        {!! Form::submit('Submit', ['class' => 'btn btn-primary nextBtn pull-right']) !!}
{!! Form::close() !!}

    
@endsection