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
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            // Serialize other forms (non-file fields)
            var form1Data = $("#basicForm").serializeArray();  // Serialize as an array
            var form2Data = $("#addressForm").serializeArray();
            var form4Data = $("#submitForm").serializeArray();

            // FormData for file input (gallery form)
            var form3Data = new FormData(document.getElementById("galleryForm"));  // Form 3 data for file inputs

            // Append data from other forms (regular fields) to the FormData object
            form1Data.forEach(function(field) {
                form3Data.append(field.name, field.value);
            });

            form2Data.forEach(function(field) {
                form3Data.append(field.name, field.value);
            });

            form4Data.forEach(function(field) {
                form3Data.append(field.name, field.value);
            });

            // Append CSRF token manually
            form3Data.append('_token', csrfToken);

            // Debug: Log the final FormData content (optional)
            for (let [key, value] of form3Data.entries()) {
                console.log(key, value);
            }
            $.ajax({
                type: "POST",
                url: submitPropertyeUrl,
                data: form3Data,
                processData: false,
                contentType: false,
                success: function(response){
                    console.log("Success:", response);
                    if (response.success) {
                        window.location.href = response.redirect; // Redirect to home page
                    }
                }
                ,
                error: function(xhr) {
                    console.log("Error:", xhr.responseJSON); // Logs validation errors
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
