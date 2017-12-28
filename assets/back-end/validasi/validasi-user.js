/*
 *  Document   : formsValidation.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Forms Validation page
 */

var FormsValidation = function() {

    return {
        init: function() {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Initialize Form Validation */
            $('#form-validation').validate({
                errorClass: 'help-block animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block').remove();
                },
                ignore: '',
                rules: {
                    username: {
                        required: true,
                        minlength: 5
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    re_password: {
                        required: true,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        email:true
                    },
                    first_name: {
                        required: true,
                    },
                    last_name: {
                        required: true,
                    },
                    profile: {
                        required: true,
                        file:true
                    },
                    example_chosen: {
                        required: true,
                    }
                },
                messages: {
                    username: {
                        required: 'Please enter a username',
                        minlength: 'Your name must consist of at least 5 characters'
                    },
                    password: {
                        required: 'Please enter a password',
                        minlength: 'Your name must consist of at least 5 characters'
                    },
                    re_password: {
                        required: 'Please enter a Re-password',
                    },
                    email: {
                        required: 'Please enter a Email',
                    },
                    first_name: {
                        required: 'Please enter a first name',
                    },
                    last_name: {
                        required: 'Please enter a last name',
                    },
                    profile: {
                        required: 'Please enter a profile',
                    },
                    example_chosen: {
                        required: 'Choose One',
                    }
                }
            });

            // Initialize Masked Inputs
            // a - Represents an alpha character (A-Z,a-z)
            // 9 - Represents a numeric character (0-9)
            // * - Represents an alphanumeric character (A-Z,a-z,0-9)
            $('#masked_date').mask('99/99/9999');
            $('#masked_date2').mask('99-99-9999');
            $('#masked_phone').mask('(999) 999-9999');
            $('#masked_phone_ext').mask('(999) 999-9999? x99999');
            $('#masked_taxid').mask('99-9999999');
            $('#masked_ssn').mask('999-99-9999');
            $('#masked_pkey').mask('a*-999-a999');
        }
    };
}();