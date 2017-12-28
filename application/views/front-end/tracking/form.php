s<script type="text/javascript " src="<?=base_url('assets/notif/js/jquery.js');?>"></script>
<script type="text/javascript " src="//code.jquery.com/jquery-1.`12.3.js"></script>
<script type="text/javascript " src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type='text/javascript'>
	$(document).ready(function() {
    $('#example').dataTable( {
        "bPaginate": false,
        "bFilter": false,
        "bInfo": false
                 } );

} );
$(document).ready(function() {
		//$("#search_results").slideUp();

		$("#button_find").click(function(event) {
			event.preventDefault();
			//search_ajax_way();
			ajax_search();
		});
		$("#search_query").keyup(function(event) {
			event.preventDefault();
			//search_ajax_way();
			ajax_search();
		});
	});
	function ajax_search() {

		var judul = $("#search_query").val();
		$.ajax({
			url : "<?=base_url('Tracking/get_data_order')?>",
			type:"POST",
			data : "judul=" + judul,
			success : function(data) {
				// jika data sukses diambil dari server, tampilkan di <select id=kota>
				$("#display_results").html(data);
			}
		});

	}

	</script>
<div>
	<center><form class="form-search" method="POST">
		<div class="input-append">
			<input type="text"  name="search_query" id="search_query"
			placeholder="Kode Transaksi "
			class="input-xxlarge search-query">
			<button type="submit" id="button_find" class="btn">
				<i class='icon-search' ></i>
			</button>
		</div>
	</form>
	</center>
</div>
<table id='example' style="font-family: arial;" class='display' cellspacing='0' width='100%'>
        <thead>
            <tr  style='background:#fff;'>
                 <td>No</td>
                 <td>Nomer Transaksi</td>
                 <td>Kode Transaksi</td>
                 <td>Tanggal Transaksi</td>
                 <td>Status Sebelumnya</td>
                 <td>Status </td>
                 <td>Tanggal Perubahan Status</td>
            </tr>
        </thead>
<tbody id="display_results">
       
    </tbody>
    
    </table>
</body>
</html> 