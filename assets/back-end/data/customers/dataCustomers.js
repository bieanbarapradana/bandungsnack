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

                "aoColumnDefs": [ { "bSortable": true, "aTargets": [ 1, 5 ] } ],

                "iDisplayLength": 10,

                "aLengthMenu": [[10, 20, 30, -1], [10, 20, 30, "All"]],

                "ajax": window.location.protocol + "//" + window.location.host + "/Customers/data_customers",

                            "columns": 

                                [

                                    {"data":"no"},

                                    {"data":"id_customers"},

                                    {"data":"full_name"},

                                    {"data":"username"},

                                    {"data":"email"},

                                    {"data":"contact"},

                                    {"data":"active_code"},

                                    {"data":"link"}

                                ]

            });

            

            /* Add placeholder attribute to the search input */

            $('.dataTables_filter input').attr('placeholder', 'Search');

        }

    };

}();