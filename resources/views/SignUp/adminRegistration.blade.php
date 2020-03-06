<html>

<head>
    <title> Housing Society App Builder</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href={{asset('css/adminPanel.css')}}>
  <link rel="stylesheet" href={{asset('css/form.css')}}>
  <link rel="javascript" href={{asset('js/adminPanel.js')}}>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>

  <script>
    $(document).ready(function () 
        {
            var navListItems = $('div.setup-panel div a'),allWells = $('.setup-content'),allNextBtn = $('.nextBtn');
            allWells.hide();
            navListItems.click(function (e) 
            {
                e.preventDefault();
                var $target = $($(this).attr('href')),$item = $(this);
                if (!$item.hasClass('disabled')) 
                {
                  navListItems.removeClass('btn-success').addClass('btn-default');
                  $item.addClass('btn-success');
                  allWells.hide();
                  $target.show();
                  $target.find('input:eq(0)').focus();
                }
            });
            allNextBtn.click(function () 
            {
                var curStep = $(this).closest(".setup-content"),curStepBtn = curStep.attr("id"),
                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                curInputs = curStep.find("input[type='text'],input[type='url']"),isValid = true;
                $(".form-group").removeClass("has-error");
                for (var i = 0; i < curInputs.length; i++) 
                {
                    if (!curInputs[i].validity.valid) 
                    {
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }
                if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
            });
            $('div.setup-panel div a.btn-success').trigger('click');
        });
    function previewFile() 
    {
        var preview = document.querySelector('img');
        var file    = document.querySelector('input[type=file]').files[0];
        var reader  = new FileReader();
        reader.addEventListener("load", function () 
        {
            preview.src = reader.result;
            }, false);
            if (file) 
            {
                reader.readAsDataURL(file);
            }
        }
        $(function() 
        {
            $('#profile-image1').on('click', function() 
            {
                $('#profile-image-upload').click();
            });
    });
    function alphaOnly(event) 
    {
        var key = event.keyCode;
        return ((key >= 65 && key <= 90) || key == 8);
    };
</script>

  <style>
        .mapouter 
        {
          position:relative;
          text-align:right;
          border-radius: 5%;
          padding: 2%;
          width: 250%;
        }
        .gmap_canvas 
        {
            overflow:hidden;
            background:none!important;
        }
    </style>

</head>

<body>
    <div class="container" style="width:40%" id="form">

        @include('inc.message')

        <br> <br>

        <div class="stepwizard">

            <div class="stepwizard-row setup-panel">

                <div class="stepwizard-step col-xs-3"> 
                    <a href="#step-1" type="button" class="btn btn-success btn-square">1</a>
                    <p><small>Admin Registration</small></p>
                </div>

                <div class="stepwizard-step col-xs-3"> 
                    <a href="#step-2" type="button" class="btn btn-default btn-square" disabled="disabled">2</a>
                    <p><small>Society Registration</small></p>
                </div>

                <div class="stepwizard-step col-xs-3">  
                    <a href="#step-3" type="button" class="btn btn-default btn-square" disabled="disabled">3</a>
                    <p><small>Select Features</small></p>
                </div>

                <div class="stepwizard-step col-xs-3"> 
                    <a href="#step-4" type="button" class="btn btn-default btn-square" disabled="disabled">3</a>
                    <p><small>Map Digitization</small></p>
                </div>

            </div>
        </div>

     {!! Form::open(['action' => 'AdminRegistration@store' , 'method' => 'POST' , 'class' => 'formclass']) !!}

        <div class="panel panel-primary setup-content" id="step-1">

            <div class="panel-heading">
                <h3 class="panel-title">Admin Registration</h3>
            </div>

            <div>

                <div class="col-md-4 col-md-offset-4 col-sm-6 col-xs-12">

                    <div class="profile-pic">
                        <img alt="User Pic" src="https://d30y9cdsu7xlg0.cloudfront.net/png/138926-200.png" id="profile-image1" height="400">
                        <input id="profile-image-upload" class="hidden" type="file" hidden onchange="previewFile()">                  
                    </div>
                </div>
                <br> <br> <br> <br> <br> <br> <br> <br>

                <div class="form-group">
                    <strong>
                        {{{ Form::label('adminFirstName', 'First Name') }}}
                    </strong>
                    {{{ Form::text('adminFirstName', '', ['class' => 'form-control' , 'id' => 'input', 'placeholder' => 'First Name' , 'maxlength' => '15',
                    'onkeydown' => 'return alphaOnly(event)'] )}}}
                </div>

                <div class="form-group">
                    <strong>
                        {{{ Form::label('adminLastName', 'Last Name') }}}
                    </strong>
                    {{{ Form::text('adminLastName', '', ['class' => 'form-control' , 'id' => 'input', 'placeholder' => 'Last Name' , 'maxlength' => '15',
                    'onkeydown' => 'return alphaOnly(event)'] )}}}
                </div>

                <div class="form-group">
                    <strong>
                        {{{ Form::label('adminPassword', 'Password') }}}
                    </strong>
                    {{{ Form::password('adminPassword', ['class' => 'form-control' , 'id' => 'input', 'placeholder' => 'Password' , 'maxlength' => '15'] )}}}
                </div>
                
                <div class="form-group">
                    <strong>
                        {{{ Form::label('adminRetypePassword', 'Retype Password') }}}
                    </strong>
                    {{{ Form::password('adminRetypePassword', ['class' => 'form-control' , 'id' => 'input', 'placeholder' => 'Retype Password' , 'maxlength' => '15'] )}}}
                </div>

                <div class="form-group">
                    <label class="control-label"> <strong> CNIC </strong></label>
                    <input id="input" maxlength="100" name = "adminCnic" type="text" data-inputmask="'mask': '99999-9999999-9'"  placeholder="XXXXX-XXXXXXX-X" 
                    required="required" class="form-control" placeholder="Enter CNIC" />
                </div>

                <div class="form-group">
                    <label class="control-label"> <strong> Phone No </strong></label>
                    <input id="input" maxlength="12" name="adminPhoneNo" type="text"  required="required" data-inputmask="'mask': '0399-99999999'" class="form-control" 
                    placeholder="Phone Number" />
                </div>

                <script>
                    $(":input").inputmask();
                </script>

                <div class="form-group">
                    <strong>
                        {{{ Form::label('adminEmail', 'Email') }}}
                    </strong>
                    {{{ Form::email('adminEmail', '', ['class' => 'form-control' , 'id' => 'input', 'placeholder' => 'Email' , 'maxlength' => '25']) }}}
                </div>

                <div class="form-group">
                    <strong>
                        {{{ Form::label('admindateofBirth', 'Date of Birth') }}}
                    </strong>
                    {{{ Form::date('admindateofBirth', '', ['class' => 'form-control' , 'id' => 'input', 'placeholder' => 'Date of Birth' ]) }}}
                </div>


                <div class="form-group">
                    {!! Form::button('Next', ['class' => 'btn btn-primary nextBtn pull-right']) !!}
                </div>
            </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-2">

                <div class="panel-heading">
                    <h3 class="panel-title">Society Registration</h3>
                </div>

                <div class="form-group">
                    <strong>
                        {{{ Form::label('scoietyName', 'Scoiety Name') }}}
                    </strong>
                    {{{ Form::text('scoietyName', '', ['class' => 'form-control' , 'id' => 'input', 'placeholder' => 'Scoiety Name' , 'maxlength' => '20',
                    'onkeydown' => 'return alphaOnly(event)'] )}}}
                </div>

                <div class="form-group">
                    <strong>
                        {{{ Form::label('scoietyLocation', 'Scoiety Location') }}}
                    </strong>
                    {{{ Form::text('scoietyLocation', '', ['class' => 'form-control' , 'id' => 'input', 'placeholder' => 'Scoiety Location' , 'maxlength' => '20',
                    'onkeydown' => 'return alphaOnly(event)'] )}}}
                </div>

                <div class="form-group">
                    <strong>
                        {{{ Form::label('societyArea', 'Society Area') }}}
                    </strong>
                    {{{ Form::number('societyArea', '', ['class' => 'form-control' ,'id' => 'input', 'placeholder' => 'society Area' , 'maxlength' => '12'] )}}}
                </div>

                <div class="form-group">
                    {!! Form::button('Next', ['class' => 'btn btn-primary nextBtn pull-right']) !!}
                </div>
        </div>

        <div class="panel panel-primary setup-content" id="step-3">

            <div class="panel-heading">
                    <h3 class="panel-title">Select Features</h3>
            </div>

            <label class="container1"> 
                <strong style="font-size: 100%"> 
                    Utility Billing Management 
                </strong>
            {{{ Form::checkbox('facilities[]', 'utilityBillingManagement', false, [ 'id' => 'input']) }}}
            <span class="checkmark1"></span>
            </label>

            <br>

            <label class="container1"> 
                <strong style="font-size: 100%"> 
                    Transportation 
                </strong>
                {{{ Form::checkbox('facilities[]', 'transportation', false, [ 'id' => 'input']) }}}
                <span class="checkmark1"></span>
            </label>

            <br>

            <label class="container1"> 
                    <strong style="font-size: 100%"> 
                        Announcements 
                    </strong>
                    {{{ Form::checkbox('facilities[]', 'Announcements', false, [ 'id' => 'input']) }}}
                    <span class="checkmark1"></span>
            </label>

            <br>

            <label class="container1"> 
                <strong style="font-size: 100%"> 
                        Emergency 
                </strong>
                {{{ Form::checkbox('facilities[]', 'emergency', false, [ 'id' => 'input']) }}}
                <span class="checkmark1"></span>
            </label>

            <br>

            <label class="container1"> 
                <strong style="font-size: 100%"> 
                        GraveYard Booking 
                </strong>
                {{{ Form::checkbox('facilities[]', 'graveYardBooking', '', [ 'id' => 'input']) }}}
                <span class="checkmark1"></span>
            </label>

            <br>

            <label class="container1"> 
                <strong style="font-size: 100%"> 
                    Banquet Hall Booking
                </strong>
                {{{ Form::checkbox('facilities[]', 'banquetHallBooking', '', [ 'id' => 'input']) }}}
                <span class="checkmark1"></span>
            </label>

            <br>

            <label class="container1"> 
                <strong style="font-size: 100%"> 
                    Food Ordering
                </strong>
                {{{ Form::checkbox('facilities[]', 'foodOrdering', '', [ 'id' => 'input']) }}}
                <span class="checkmark1"></span>
            </label>

            <br>

            <label class="container1"> 
                <strong style="font-size: 100%"> 
                        Complaint Management
                </strong>
                {{{ Form::checkbox('facilities[]', 'complaintManagement', '', [ 'id' => 'input']) }}}
                <span class="checkmark1"></span>
            </label>

            <br>

            <label class="container1"> 
                <strong style="font-size: 100%"> 
                    Employee Management
                </strong>
                {{{ Form::checkbox('facilities[]', 'employeeManagement', '', [ 'id' => 'input']) }}}
                <span class="checkmark1"></span>
            </label>
            <br>

            <label class="container1"> 
                <strong style="font-size: 100%"> 
                    Request Home Maintainance
                </strong>
                {{{ Form::checkbox('facilities[]', 'requestHomeMaintainance', '', [ 'id' => 'input']) }}}
                <span class="checkmark1"></span>
            </label>

            <div class="form-group">
                {!! Form::button('Next', ['class' => 'btn btn-primary nextBtn pull-right']) !!}
            </div>
            
        </div>

        <div class="panel panel-primary setup-content" id="step-4" style="width:40%">
        
            <div class="panel-heading">
            <h3 class="panel-title">Map Digitization</h3>
                </div>
        
            <div class="mapouter">

                <div class="gmap_canvas">

                    <iframe width="776" height="656" id="gmap_canvas" src="https://maps.google.com/maps?q=Faisalabad&t=&z=11&ie=UTF8&iwloc=&output=embed" frameborder="0" 
                        scrolling="no" marginheight="0" marginwidth="0">
                    </iframe>
                </div>
        
            </div>
            {!! Form::submit('Submit', ['class' => 'btn btn-primary nextBtn pull-right']) !!}
        </div>
        
     {!! Form::close() !!}
    </div>       
</body>
</html>