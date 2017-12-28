/*

 *  Document   : tablesDatatables.js

 *  Author     : pixelcave

 *  Description: Custom javascript code used in Tables Datatables page

 */



var TablesDatatables = function() {



    return {

        

        init: function() {

            /* Initialize Bootstrap Datatables Integration */

            App.datatables();



            /* Initialize Datatables */

            $('#example-datatable').dataTable({

                "aoColumnDefs": [ { "bSortable": true, "aTargets": [ 1, 8 ] } ],

                "iDisplayLength": 10,

                "aLengthMenu": [[10, 20, 30, -1], [10, 20, 30, "All"]],



                "ajax": window.location.protocol + "//" + window.location.host + "/Product/data_products",

                            "columns": 

                                [

                                    {"data":"no"},

                                    {"data":"product_name"},

                                    {"data":"category_name"},

                                    {"data":"product_price"},
                                    {"data":"price_reseller"},
                                    {"data":"purchase_price"},
                                    {"data":"netto"},

                                    {"data":"stock"},

                                    {"data":"rating"},

                                    {"data":"promo"},

                                    {"data":"discount"},

                                    {"data":"link"}

                                ],



            });

            

            /* Add placeholder attribute to the search input */

            $('.dataTables_filter input').attr('placeholder', 'Search');

        }

    };

}();

