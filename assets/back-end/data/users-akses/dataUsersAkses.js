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
                "aoColumnDefs": [ { "bSortable": true, "aTargets": [ 1, 3 ] } ],
                "iDisplayLength": 10,
                "aLengthMenu": [[10, 20, 30, -1], [10, 20, 30, "All"]],

                "ajax": window.location.protocol + "//" + window.location.host + "/User_akses/data_users_akses",
                            "columns": 
                                [
                                    {"data":"no"},
                                    {"data":"id_user_akses"},
                                    {"data":"label"},
                                    {"data":"description"},
                                ],
            });
            
            /* Add placeholder attribute to the search input */
            $('.dataTables_filter input').attr('placeholder', 'Search');
        }
    };
}();
