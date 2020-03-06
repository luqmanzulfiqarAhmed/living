{{-- AddUtilityBill --}}
@extends('AdminPages.adminHomePage')
@section('adminContent')
@include('inc.message')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
<script>
    function myFunction(element) 
    {
        var meterNumberGas = document.getElementById("meterNumberGas");
        var meterRentGas = document.getElementById("meterRentGas");
        var GST = document.getElementById("GST");
        var CurrentBill = document.getElementById("Current Bill");

        //Electricty
        var meterNumberElectricty = document.getElementById("meterNumberElectricty");
        var unitsConsumed = document.getElementById("unitsConsumed");
        var meterRentElectricity = document.getElementById("meterRentElectricity");
        var electricityDuty = document.getElementById("electricityDuty");
        var N_J_Surcharges = document.getElementById("N.J Surcharges");
        //Internet
       
        var InternetCharges = document.getElementById("InternetCharges");
        var serviceTax = document.getElementById("serviceTax");
        var WithHoldingTax = document.getElementById("WithHoldingTax");

        if (element.value == "Sui Gas") 
        {
            meterNumberGas.style.display = "block";
            meterRentGas.style.display = "block";
            GST.style.display = "block";
            CurrentBill.style.display = "block";
            meterNumberElectricty.style.display = "none";
            unitsConsumed.style.display = "none";
            meterRentElectricity.style.display = "none";
            electricityDuty.style.display = "none";
            N_J_Surcharges.style.display = "none";
            InternetCharges.style.display = "none";
            serviceTax.style.display = "none";
            WithHoldingTax.style.display = "none";
        }
        else if (element.value == "Electricity") 
        { 
            meterNumberGas.style.display = "none";
            meterRentGas.style.display = "none";
            InternetCharges.style.display = "none";
            serviceTax.style.display = "none";
            WithHoldingTax.style.display = "none"; 
                  
            meterNumberElectricty.style.display = "block";
            unitsConsumed.style.display = "block";
            meterRentElectricity.style.display = "block";
            electricityDuty.style.display = "block";
            N_J_Surcharges.style.display = "block";
            GST.style.display = "block";
            CurrentBill.style.display = "block";
        }
        else if (element.value =="Internet") 
        {
            meterNumberGas.style.display = "none";
            meterRentGas.style.display = "none";
            meterNumberElectricty.style.display = "none";
            unitsConsumed.style.display = "none";
            meterRentElectricity.style.display = "none";
            electricityDuty.style.display = "none";
            N_J_Surcharges.style.display = "none";
            GST.style.display = "none";

            InternetCharges.style.display = "block";
            serviceTax.style.display = "block";
            WithHoldingTax.style.display = "block";
            CurrentBill.style.display = "block";
        }
        else if (element.value == "Water" || element.value == "Choose..." )
        {
            meterNumberGas.style.display = "none";
            meterRentGas.style.display = "none";
            meterNumberElectricty.style.display = "none";
            unitsConsumed.style.display = "none";
            meterRentElectricity.style.display = "none";
            electricityDuty.style.display = "none";
            N_J_Surcharges.style.display = "none";
            GST.style.display = "none";
            CurrentBill.style.display = "none";
            InternetCharges.style.display = "none";
            serviceTax.style.display = "none";
            WithHoldingTax.style.display = "none";
            CurrentBill.style.display = "none";
        }
    }
</script>
{!! Form::open(['action' => 'AddUtlityBill@store' , 'method' => 'POST']) !!}
    <div>
        <h3 class="panel-title">Utility Bill Details</h3>          
    </div>
    
    <br>

    <div class="form-group">
        <label class="control-label"> <strong> Resident CNIC </strong></label>
        <input id="input" maxlength="100" name = "residentCnic" type="text" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X" 
        required="required" class="form-control" placeholder="Resident CNIC" />
    </div>

    <div class="form-group">
        <label  class="control-label"> <strong> Resident Email </strong> </label>
        <input id="input" maxlength="100" name="residentEmail" type="email" required="required" class="form-control" placeholder="Resident Email" />
    </div>

    <script>
        $(":input").inputmask();
    </script>
    <div class="form-group">
        <label class="control-label"> <strong> Issue Date </strong></label>
        <input id="input" name="issueDate" type="date" required="required" class="form-control"/>
    </div>
    
    <div class="form-group">
        <label class="control-label"> <strong> Due Date </strong></label>
        <input id="input" name="dueDate" type="date" required="required" class="form-control"/>
    </div>

    <div class="form-group">
        <label class="control-label"> <strong> Bill Type </strong> </label>
        <select class="custom-select" name="billType" onchange="myFunction(this)" id="input">
            <option selected>Choose...</option>
            <option value="Electricity">Electricity</option>
            <option value="Sui Gas">Sui Gas</option>
            <option value="Water">Water</option>
            <option value="Internet">Internet</option>
        </select>
    </div>

    
    {{-- Electricity --}}

        <div class="form-group" id = "meterNumberElectricty" style="display:none">
            <label class="control-label"> <strong> Meter Number </strong></label>
            <input id="input" maxlength="4" name = "electricMeterNumber" type="Number" placeholder="Meter Number"  required="required" class="form-control" />
        </div>

        <div class="form-group" id = "unitsConsumed" style="display:none">
            <label class="control-label"> <strong> Units Consumed</strong></label>
            <input id="input" name = "electricUnitsConsumed" type="Number" placeholder="Units Consumed"  required="required" class="form-control" />
        </div>

        <div class="form-group" id = "meterRentElectricity" style="display:none">
            <label class="control-label"> <strong> Meter Rent</strong></label>
            <input id="input" value="7.50" readonly name = "electricMeterRent" type="Number" placeholder="Gas Charges"  required="required" class="form-control" />
        </div>

        <div class="form-group" id = "electricityDuty" style="display:none">
            <label class="control-label"> <strong> Electricty Duty </strong></label>
            <input id="input" name = "electrictyDuty" type="Number" placeholder="Electricty Duty"  required="required" class="form-control" />
        </div>

        <div class="form-group" id = "N.J Surcharges" style="display:none">
            <label class="control-label"> <strong> N.J Surcharges </strong></label>
            <input id="input" name = "N_J_Surcharges" type="Number" placeholder="N.J Surcharges"  required="required" class="form-control" />
        </div>

    {{-- Sui Gas --}}

        <div class="form-group" id = "meterNumberGas" style="display:none">
            <label class="control-label"> <strong> Meter Number </strong></label>
            <input id="input" maxlength="4" name = "suiGacmeterNumber" type="Number" placeholder="Meter Number"  required="required" class="form-control" />
        </div>


        <div class="form-group" id = "meterRentGas" style="display:none">
            <label class="control-label"> <strong> Meter Rent </strong></label>
            <input id="input" value="20.86" readonly name = "suiGasMeterRent" type="Number" placeholder="Meter rent"  required="required" class="form-control" />
        </div>

        <div class="form-group" id = "GST" style="display:none">
            <label class="control-label"> <strong> GST </strong></label>
            <input id="input" name = "GST" type="Number" placeholder="GST"  required="required" class="form-control" />
        </div>

    {{-- Internet --}}

        <div class="form-group" id = "InternetCharges" style="display:none">
            <label class="control-label"> <strong> Internet Charges </strong></label>
            <input id="input" maxlength="4" name = "internetCharges" type="Number" placeholder="Internet Charges"  required="required" class="form-control" />
        </div>


        <div class="form-group" id = "serviceTax" style="display:none">
            <label class="control-label"> <strong> Service Tax </strong></label>
            <input id="input" value="430" readonly name = "serviceTax" type="Number" placeholder="Service Tax"  required="required" class="form-control" />
        </div>

        <div class="form-group" id = "WithHoldingTax" style="display:none">
            <label class="control-label"> <strong> With Holding Tax </strong></label>
            <input id="input" value="321" readonly name = "withHoldingTax" type="Number" placeholder="With Holding Tax"  required="required" class="form-control" />
        </div>

        <div class="form-group" id = "Current Bill" style="display:none">
            <label class="control-label"> <strong> Current Bill </strong></label>
            <input id="input" name = "currentBill" type="Number" placeholder="Current Bill"  required="required" class="form-control" />
        </div>
    {{-- enc --}}

    {!! Form::submit('Submit', ['class' => 'btn btn-primary nextBtn pull-right']) !!}
{!! Form::close() !!}

    
@endsection