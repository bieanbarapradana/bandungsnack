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

                    id_seller: {

                        required: true,

                    },

                    id_category: {

                        required: true,

                    },

                    product_name: {

                        required: true,

                        minlength:5

                    },

                    product_price: {

                        required: true,

                        number:true,

                    },

                    stock: {

                        required: true,

                        number:true,

                    },

                    photo: {

                        required: true,

                    },

                    photo1: {

                        required: true,

                    },

                    photo2: {

                        required: true,

                    },

                    promo: {

                        required: true,

                    },

                    discount: {

                        required: true,

                        number:true,

                    },

                    description: {

                        required: true,

                    },

                    val_terms: {

                        required: true

                    }

                },

                messages: {

                    id_seller: {

                        required: 'Please choose one seller name',

                    },

                    id_category: {

                        required: 'Please choose one category ',

                    },

                    product_name: {

                        required: 'Enter your product name :-)',

                        minlength: 'Your product name must consist of at least 5 characters'

                    },

                    product_price: {

                        required: 'Enter your product price :-)',

                    },

                    stock: {

                        required: 'Enter your stock :-)',

                    },

                    photo: {

                        required: 'Please Enter your image product :-)',

                    },

                    promo: {

                        required: 'Please choose one',

                    },

                    discount: {

                        required: 'Please Enter your discount product :-)',

                    },

                    description: {

                        required: 'Enter your Description :-)',

                        minlength: 'Your Description must consist of at least 5 characters'

                    },

                    val_terms: 'You must agree to the service terms!'

                  

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