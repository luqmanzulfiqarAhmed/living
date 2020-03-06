<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Admin Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">
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
     var navListItems = $('div.setup-panel div a'),
     allWells = $('.setup-content'),
     allNextBtn = $('.nextBtn');
     allWells.hide();
     navListItems.click(function (e) 
     {
        e.preventDefault();
        var $target = $($(this).attr('href')),
        $item = $(this);
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
         var curStep = $(this).closest(".setup-content"),
         curStepBtn = curStep.attr("id"),
         nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
         curInputs = curStep.find("input[type='text'],input[type='url']"),
         isValid = true;
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
     {preview.src = reader.result;},false);
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
  {!!Html::style('css/bootstrap.min.css')!!}
  {!!Html::style('css/bootstrap-theme.css')!!}
  {!!Html::style('css/elegant-icons-style.css')!!} 
  {!!Html::style('css/font-awesome.min.css')!!} 
  {!!Html::style('assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css')!!}
  {!!Html::style('assets/fullcalendar/fullcalendar/fullcalendar.css')!!}
  {!!Html::style('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')!!}
  {!!Html::style('css/owl.carousel.css')!!}
  {!!Html::style('css/jquery-jvectormap-1.2.2.css')!!}
  {!!Html::style('css/fullcalendar.css')!!}
  {!!Html::style('css/form.css')!!}
  {!!Html::style('css/widgets.css')!!}
  {!!Html::style('css/style.css')!!}
  {!!Html::style('css/style-responsive.css')!!}
  {!!Html::style('css/xcharts.min.css')!!}
  {!!Html::style('css/jquery-ui-1.10.4.min.css')!!}

  {!!html::script('js/jquery.js')!!}
  {!!html::script('js/jquery-ui-1.10.4.min.js')!!}
  {!!html::script('js/jquery-1.8.3.min.js')!!}
  {!!html::script('js/jquery-ui-1.9.2.custom.min.js')!!}

     <!-- bootstrap -->
  {!!html::script('js/bootstrap.min.js')!!}
     
     <!-- nice scroll -->
  {!!html::script('js/jquery.scrollTo.min.js')!!}
  {!!html::script('js/jquery.nicescroll.js')!!}
     
     <!-- charts scripts -->
  {!!html::script('assets/jquery-knob/js/jquery.knob.js')!!}
  {!!html::script('js/jquery.sparkline.js')!!}
  {!!html::script('assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js')!!}
  {!!html::script('js/owl.carousel.js')!!}
     
     <!-- jQuery full calendar -->
  {!!html::script('js/fullcalendar.min.js')!!}
     
     <!-- Full Google Calendar - Calendar -->
  {!!html::script('assets/fullcalendar/fullcalendar/fullcalendar.js')!!}
     
     <!--script for this page only-->
  {!!html::script('js/calendar-custom.js')!!}
  {!!html::script('js/jquery.rateit.min.js')!!}
     
     <!-- custom select -->
  {!!html::script('js/jquery.customSelect.min.js')!!}
  {!!html::script('assets/chart-master/Chart.js')!!}
     
     <!--custome script for all page-->
  {!!html::script('js/scripts.js')!!}
     
     <!-- custom script for this page-->
  {!!html::script('js/sparkline-chart.js')!!}
  {!!html::script('js/easy-pie-chart.js')!!}
  {!!html::script('js/jquery-jvectormap-1.2.2.min.js')!!}
  {!!html::script('js/jquery-jvectormap-world-mill-en.js')!!}
  {!!html::script('js/xcharts.min.js')!!}
  {!!html::script('js/jquery.autosize.min.js')!!}
  {!!html::script('js/jquery.placeholder.min.js')!!}
  {!!html::script('js/gdp-data.js')!!}
  {!!html::script('js/morris.min.js')!!}
  {!!html::script('js/sparklines.js')!!}
  {!!html::script('js/charts.js')!!}
  {!!html::script('js/jquery.slimscroll.min.js')!!}
</head>

<body>
    <section id="container" class="">
      @yield('content')
    </section>  
</body>

</html>