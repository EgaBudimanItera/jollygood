<script type="text/javascript">
	function ambilpendaftaran(){
        var kodesiswa=$('#kodesiswa').val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>tagihan/getpendaftaran',
            data: 'kodesiswa='+kodesiswa,
            dataType: 'JSON',
            beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
            success: function(response){ // Ketika proses pengiriman berhasil
                  // set isi dari combobox kota
                  // lalu munculkan kembali combobox kotanya
                  $("#kodependaftaran").html(response.list_pendaftaran).show();
                  $('#jumlah').val(response.biayabulanan);
            },
            error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
                  alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
            }
        });
    };
    function ambilbiaya(){
        var kodependaftaran=$('#kodependaftaran').val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>tagihan/getbiaya',
            data: 'kodependaftaran='+kodependaftaran,
            dataType: 'JSON',
            success: function(msg){
                $('#jumlah').val(msg.biayabulanan);
            }
        });
    };
    function ambilbiaya2(){
        var kodekelas=$('#kodekelas2').val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>tagihan/getbiaya2',
            data: 'kodekelas='+kodekelas,
            dataType: 'JSON',
            success: function(msg){
                $('#jumlah2').val(msg.biayabulanan);
            }
        });
    };
    function ambilbiaya3(){
        var kodekelas=$('#kodekelas').val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>tagihan/getbiaya2',
            data: 'kodekelas='+kodekelas,
            dataType: 'JSON',
            success: function(msg){
                $('#jumlah').val(msg.biayabulanan);
            }
        });
    };
</script>