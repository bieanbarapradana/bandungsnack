            function generate(type, text) {



                var n = noty({

                    text        : text,

                    type        : type,

                    dismissQueue: true,

                    layout      : 'topRight',

                    closeWith   : ['click','timeout'],

                    theme       : 'defaultTheme',

                    maxVisible  : 10,

                     timeout     :10000,

                    animation   : {

                        open  : 'animated bounceInRight',

                        close : 'animated bounceOutRight',

                        easing: 'swing',

                        speed : 500

                    }

                });





                console.log('html: ' + n.options.id);

            }



            function generateAll() {

               var isi = '<div class="alert alert-dask media fade in bd-0" id="message-alert"><div class="media-body width-100p"><p class="f-12 alert-message pull-left">Akun Belum Diaktivasi.</p><p class="pull-right"></p></div></div>';

                generate('error',isi);

            }



            $(document).ready(function () {



                setTimeout(function() {

                    generateAll();

                }, 500);



            });