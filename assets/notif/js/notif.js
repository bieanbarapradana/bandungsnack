var x = 1;

function cek(){
    $.ajax({
        url: "http://bandungsnack.dev/Notif/cek_notif",
        cache: false,
        success: function(msg){
            $("#notifikasi").html(msg);
            $("#notifikasi-baru").html(msg + " Pemberitahuan");
        }
    });
    $.ajax({
        url: "http://bandungsnack.dev/Orders/order_baru",
        cache: false,
        success: function(msg){
            $("#new_order").html(msg);
            $("#notifikasi-baru").html(msg + " Pemberitahuan");
        }
    });
   
    $.ajax({
        url: "http://bandungsnack.dev/Orders/confirmed_payment",
        cache: false,
        success: function(msg){
            $("#konfirmasi_pembayaran").html(msg);
            $("#notifikasi-baru").html(msg + " Pemberitahuan");
        }
    });
    var waktu = setTimeout("cek()",3000);

}

$(document).ready(function(){
    cek();
    $("#pesan").click(function(){
        $("#loading").show();
        if(x==1){
            $("#pesan").css("background-color","#efefef");
            x = 0;
        }else{
            $("#pesan").css("background-color","#4B59a9");
            x = 1;
        }
        $("#info").toggle();
        //ajax untuk menampilkan pesan yang belum terbaca
        $.ajax({
            url: "http://bandungsnack.dev/Notif/lihat_pesan",
            cache: false,
            success: function(msg){
                $("#loading").hide();
                $("#konten-info").html(msg);
            }
        });

    });
    $("#content").click(function(){
        $("#info").hide();
        $("#pesan").css("background-color","#4B59a9");
        x = 1;
    });
});


