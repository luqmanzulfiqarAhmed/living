{{-- AddNewRoute --}}

@extends('AdminPages.adminHomePage')
@section('adminContent')
@include('inc.message')
<script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
</script>
{!! Form::open(['action' => 'RouteController@store' , 'method' => 'POST']) !!}
    <div class="panel-heading">
        <h3 class="panel-title">Add New Route</h3>
    </div> 

    <br> <br> 
    <div class="form-group" id ="VehicalNo">
        <label class="control-label"> <strong> Vehical Number </strong> </label>
        <input id="input" maxlength="30" name="vehicalNumber" type="text" required="required" class="form-control" placeholder="Vehical Number" 
        data-inputmask="'mask': '9999'" />
    </div>

    <div class="form-group">
        <label class="control-label"> <strong> Driver Name </strong> </label>
        <input id="input" maxlength="30" name="drivertName" type="text" required="required" class="form-control" placeholder="Driver Name" onkeydown="return alphaOnly(event);" />
    </div>

    <div class="form-group">
        <label class="control-label"> <strong> Phone Number </strong></label>
        <input id="input" maxlength="12" name="driverPhoneNo" type="text"  required="required" data-inputmask="'mask': '0399-99999999'" class="form-control" 
        placeholder="Phone Number" />
    </div>

    <script>
        $(":input").inputmask();
    </script>

    <div class="form-group">
        <label class="control-label"> <strong> Departure Time </strong></label>
        <input id="input"  name="departureTime" type="time" required="required" class="form-control"/>
    </div>

    <div class="form-group">
        <label class="control-label"> <strong> Departure Location </strong> </label>
        <input id="input" maxlength="30" name="departurelocation" type="text" required="required" class="form-control" placeholder="Location" onkeydown="return alphaOnly(event);" />
    </div>

    <div class="form-group">
        <label class="control-label"> <strong> Arrival Location </strong> </label>
        <input id="input" maxlength="30" name="arrivallocation" type="text" required="required" class="form-control" placeholder="Location" onkeydown="return alphaOnly(event);" />
    </div>
    
    <div class="form-group" >
        <label class="control-label"> <strong> Arrival Time </strong></label>
        <input id="input"  name="arrivalTime" type="time" required="required" class="form-control"/>
    </div>

    <div class="form-group">
        <label class="control-label"> <strong> Bus Stop </strong> </label>
        <input id="input" maxlength="30" name="busStop" type="text" required="required" class="form-control" placeholder="Bus Stop" />
    </div>

    {!! Form::submit('Submit', ['class' => 'btn btn-primary nextBtn pull-right']) !!}
{!! Form::close() !!}

    
@endsection