<script type="text/javascript">
	function ambildatakelas(){
        var kodekelas=$('#kodekelas').val();
        $.ajax({
            type: 'POST',
            url: '<?=base_url()?>pendaftaran/getkelas',
            data: 'kodekelas='+kodekelas,
            dataType: 'JSON',
            success: function(msg){
                
                $('#biayadaftar').val(msg.biayadaftar);
                $('#biayabulanan').val(msg.biayabulanan);
                $('#jumlahsiswa').val(msg.jumlahsiswa);
            }
        });
    };
</script>