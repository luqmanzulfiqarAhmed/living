{{-- AddNewVehical --}}
@extends('AdminPages.adminHomePage')
@section('adminContent')
@include('inc.message')
<script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
</script>
{!! Form::open(['action' => 'VehicalController@store' , 'method' => 'POST']) !!}
    <div class="panel-heading">
        <h3 class="panel-title">Add New Vehical</h3>
    </div> 

    <br> <br> 
    <div class="form-group" id ="VehicalNo">
        <label class="control-label"> <strong> Vehical No </strong> </label>
        <input id="input" maxlength="30" name="vehicalNo" type="text" required="required" class="form-control" placeholder="Vehical No" 
        data-inputmask="'mask': '9999'" />
    </div>

    <script>
        $(":VehicalNo").inputmask();
    </script>
            
    <div class="form-group">
        <label class="control-label"> <strong> Vehical Type </strong></label>
        <select id="input" class="custom-select" name="vehicalType">
            <option selected>Choose...</option>
            <option value="Bus">Bus</option>
            <option value="Taxi">Taxi</option>
            <option value="KLIA Express">KLIA Express</option>
        </select>
    </div>

    <div class="form-group" id="ModelYear">
        <label class="control-label"> <strong> Model Year </strong> </label>
        <input id="input" maxlength="100" name="modelYear" type="text" required="required" class="form-control" placeholder="Model Year"
        data-inputmask="'mask': '9999'" />
    </div>
    
    <script>
        $(":ModelYear").inputmask();
    </script>
    
    <div class="form-group" id="PassengerCapacity">
        <label class="control-label"> <strong> Passenger Capacity </strong></label>
        <input id="input" maxlength="100" name="passengerCapacity" type="text" required="required" class="form-control" placeholder="Passenger Capacity"
        data-inputmask="'mask': '99'" />
    </div>
    
    <script>
         $(":input").inputmask();
    </script>
            
    <div class="form-group">
        <label class="control-label"> <strong> Description </strong></label>
        <textarea id="input" name="vehicalDescription" class="md-textarea form-control" rows="4" placeholder="Description" required="required"></textarea>
    </div>
        {!! Form::submit('Submit', ['class' => 'btn btn-primary nextBtn pull-right']) !!}
{!! Form::close() !!}

    
@endsection