{{-- AddGraveYard --}}


@extends('AdminPages.adminHomePage')
@section('adminContent')
@include('inc.message')
<script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
</script>
{!! Form::open(['action' => 'GraveYardReg@store' , 'method' => 'POST']) !!}
    <div class="panel-heading">
        <h3 class="panel-title">Add Grave Yard</h3>
    </div> 

    <div class="form-group">
        <label class="control-label"> <strong> Grave Yard Name </strong></label>
        <input id="input" maxlength="15" name="graveYardName" type="text" required="required" class="form-control" placeholder="Grave Yard Name" onkeydown="return alphaOnly(event);"/>
    </div>

    <div class="form-group">
        <label class="control-label"> <strong> Area of GraveYard </strong></label>
        <input id="input" maxlength="100" name = "graveYardArea" type="Number" placeholder="Area"  required="required" class="form-control" 
        placeholder="CNIC" />
    </div>
                
    <div class="form-group">
        <label class="control-label"> <strong> Average Size of Grave </strong></label>
        <input id="input" maxlength="100" name = "averageSize" type="Number" placeholder="Avg Size"  required="required" class="form-control" />
    </div>

    <div class="form-group">
        <label class="control-label"> <strong> Number of Graves </strong></label>
        <input id="input" maxlength="100" name = "numberofGraves" type="Number" placeholder="Number of Graves"  required="required" class="form-control" 
        placeholder="CNIC" />
    </div>

    <div class="form-group">
        <label class="control-label"> <strong> Description </strong></label>
        <textarea name="graveYardDescription" class="md-textarea form-control" rows="4" placeholder="Description" required="required" id="input"></textarea>
    </div>
    {!! Form::submit('Submit', ['class' => 'btn btn-primary nextBtn pull-right']) !!}
{!! Form::close() !!}

    
@endsection