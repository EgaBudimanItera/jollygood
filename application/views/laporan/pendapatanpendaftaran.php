<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style>
table {
    border-collapse: collapse;
}
table.tabel{
    border-collapse: collapse;
}
td.garis {
  border-bottom: 1pt solid black;
}

</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Laporan Pendapatan Pendaftaran Siswa</title>
</head>
<body onload="window.print()" background="<?=base_url()?>/assets/bgh.jpg" >
  <table border="1px" width="100%">
    <tr>
      <td>
        <table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10%" align="center" rowspan="4"><img src="<?=base_url()?>assets/logo.jpg" width="150px" height="100px"></td>
            <td width="80%" align="center">JOLLY GOOD ENGLISH</td>
            <td width="10%">&nbsp</td>
          </tr>  
          <tr>
            
            <td align="center">Jl. Jend. Sudirman No 50 - Tanjung Karang</td>
            <td>&nbsp</td>
          </tr> 
          <tr>
           
            <td align="center">Bandar Lampung Phone (0721) 5600030</td>
            <td>&nbsp</td>
          </tr>  
          <tr>
           
            <td align="center">&nbsp</td>
            <td>&nbsp</td>
          </tr>  
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td align="center" >Laporan Pendapatan Pendaftaran Siswa</td>
          </tr> 
          <tr>
            <td align="center" >Periode <?=date_format(date_create($d),'d F Y')?> s/d <?=date_format(date_create($h),'d F Y')?></td>
          </tr> 
          <tr>
            <td align="center">
              <table border="1" width="70%" cellspacing="0" cellpadding="0">
                <tr>
                  <td align="center">No</td>
                  <td align="center">Kode Pendaftaran</td>
                  <td align="center">Tanggal Pendaftaran</td>
                  <td align="center">Kode Siswa</td>
                  <td align="center">Nama Siswa</td>
                  <td align="center">Jumlah Pendapatan (Rp)</td>
                </tr>
                <?php
                  $no=1;
                  $total=0;
                  foreach($list as $l){
                    $total=$total+$l->uangdaftar;
                ?>
                <tr>
                  <td align="center"><?=$no++?></td>
                  <td align="left"><?=$l->kodependaftaran?></td>
                  <td align="center"><?=$l->tanggal?></td>
                  <td align="left"><?=$l->kodesiswa?></td>
                  <td align="left"><?=$l->namasiswa?></td>
                  <td align="right"><?=number_format($l->uangdaftar,0,',','.')?></td>
                </tr>
                <?php
                  }
                ?>
                <tr>
                  <td colspan="5" align="center">Total</td>
                  <td align="right"><?=number_format($total,0,',','.')?></td>
                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td>&nbsp</td>
          </tr>
          <tr>
            <td align="center">
              <table border="0" cellspacing="0" cellpadding="0" width="100%">
                <tr>
                  <td width="5%">&nbsp</td>
                  <td width="45%" align="center">&nbsp</td>
                  <td width="45%" align="center">Bandarlampung, <?=date('d F Y')?></td>
                  <td width="5%">&nbsp</td>
                </tr>
                <tr>
                  <td >&nbsp</td>
                  <td  align="center">Menyetujui</td>
                  <td  align="center">Mengetahui</td>
                  <td >&nbsp</td>
                </tr>
                <tr>
                  <td >&nbsp</td>
                  <td  align="center">Pimpinan</td>
                  <td  align="center">Bendahara</td>
                  <td >&nbsp</td>
                </tr>
                <tr>
                  <td colspan="4">&nbsp</td>
                  
                </tr>
                <tr>
                  <td colspan="4">&nbsp</td>
                  
                </tr>
                <tr>
                  <td colspan="4">&nbsp</td>
                  
                </tr>
                <tr>
                  <td colspan="4">&nbsp</td>
                  
                </tr>
                <tr>
                  <td >&nbsp</td>
                  <td  align="center">(.............................)</td>
                  <td  align="center">(.............................)</td>
                  <td >&nbsp</td>
                </tr>
              </table>
            </td>
          </tr> 
          <tr>
            <td align="center" >&nbsp</td>
          </tr> 
        </table>
      </td>
    </tr>
  </table> 
</body>
</html>

