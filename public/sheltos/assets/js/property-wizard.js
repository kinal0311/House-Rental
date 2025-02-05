(function ($) {
    "use strict";

     /*=====================
     wizard js
     ==========================*/
     $(".next1").on('click', function(e) {
        var form = $(this).closest('form').parsley().validate(); // Initialize Parsley on the form
        // console.log(`form ::: `, form);

        if (form) {
            //stepper.next();

            $('.step-1').removeClass('active').addClass('disabled');
            $('.step-2').addClass('active');
            $('.wizard-step-2').addClass('d-block').removeClass('d-none');
            $('.wizard-step-1').removeClass('d-block').addClass('d-none');

        } else {
          e.preventDefault();
        }

     });

     $(".prev1").on('click', function() {
        $('.step-1').addClass('active').removeClass('disabled');
        $('.step-2, .step-3, .step-4').removeClass('active');
        $('.wizard-step-2, .wizard-step-3, .wizard-step-4').removeClass('d-block').addClass('d-none');
        $('.wizard-step-1').addClass('d-block').removeClass('d-none');
     });

     $(".next2").on('click', function(e) {

        var form = $(this).closest('form').parsley().validate(); // Initialize Parsley on the form
        if (form) {
            $('.step-2').removeClass('active').addClass('disabled');
            $('.step-3').addClass('active');
            $('.wizard-step-3').addClass('d-block').removeClass('d-none');
            $('.wizard-step-2').removeClass('d-block').addClass('d-none');
        } else {
          e.preventDefault();
        }

     });

      $(".prev2").on('click', function() {
         $('.step-2').addClass('active').removeClass('disabled');
         $('.step-3').removeClass('active');
         $('.wizard-step-3').removeClass('d-block').addClass('d-none');
         $('.wizard-step-2').addClass('d-block').removeClass('d-none');
      });

      $(".next3").on('click', function(e) {

        var form = $(this).closest('form').parsley().validate(); // Initialize Parsley on the form
        if (form) {
            $('.step-3').removeClass('active').addClass('disabled');
            $('.step-4').addClass('active');
            $('.wizard-step-4').addClass('d-block').removeClass('d-none');
            $('.wizard-step-3').removeClass('d-block').addClass('d-none');
        } else {
          e.preventDefault();
        }
      });

      $(".prev3").on('click', function() {
         $('.step-3').addClass('active').removeClass('disabled');
         $('.step-4').removeClass('active');
         $('.wizard-step-4').removeClass('d-block').addClass('d-none');
         $('.wizard-step-3').addClass('d-block').removeClass('d-none');
      });

      $(".step-again").on('click', function(e) {

        var form = $(this).closest('form').parsley().validate(); // Initialize Parsley on the form
        if (form) {

            // Serialize multiple forms
            var form1Data = $("#basicForm").serialize();
            // console.log(form1Data);
            var form2Data = $("#addressForm").serialize();
            var form3Data = $("#galleryForm").serialize();
            var form4Data = $("#submitForm").serialize();

            // Combine the serialized data
            var combinedData = form1Data + '&' + form2Data + '&' + form3Data + '&' + form4Data;

            $.ajax({
                type: "POST",
                url: submitPropertyeUrl,
                data: combinedData,
                success: function(data){
                    console.log(data);
                 }
            });
            $('.step-1').addClass('active').removeClass('disabled');
            $('.step-2, .step-3, .step-4').removeClass('active').removeClass('disabled');
            $('.wizard-step-2, .wizard-step-3, .wizard-step-4').removeClass('d-block').addClass('d-none');
            $('.wizard-step-1').addClass('d-block').removeClass('d-none');
        } else {
          e.preventDefault();
        }

     });

})(jQuery);
