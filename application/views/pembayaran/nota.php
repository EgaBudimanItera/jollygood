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
<title>Nota Pembayaran</title>
</head>
<body onload="window.print()" background="<?=base_url()?>/assets/bgh.jpg" >
  <table border="1px" width="100%">
    <tr>
      <td>
        <table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10%" align="center" rowspan="4">
              <img src="<?=base_url()?>assets/logo.jpg" width="150px" height="100px">
            </td>
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
            <td align="center" colspan="4"> <h2>Nota Pembayaran</h2><hr></td>
          </tr>
          <tr>
            <td width="10%">&nbsp</td>
            <td width="20%">Sudah Terima Dari</td>
            <td width="5%">:</td>
            <td><?=$list->namasiswa?></td>
          </tr>
          <tr>
            <td colspan="4">&nbsp</td>
          </tr>
          <tr>
            <td width="10%">&nbsp</td>
            <td width="20%">Uang Sebanyak</td>
            <td width="5%">:</td>
            <td><?=$terbilang .' Rupiah'?></td>
          </tr>
          <tr>
            <td colspan="4">&nbsp</td>
          </tr>
          <?php
            $bulan=$list->bulan;
            if($bulan=="1"){
              $namabulan="Januari";
            }else if($bulan=="2"){
              $namabulan="Februari";
            }else if($bulan=="3"){
              $namabulan="Maret";
            }else if($bulan=="4"){
              $namabulan="April";
            }else if($bulan=="5"){
              $namabulan="Mei";
            }else if($bulan=="6"){
              $namabulan="Juni";
            }else if($bulan=="7"){
              $namabulan="Juli";
            }else if($bulan=="8"){
              $namabulan="Agustus";
            }else if($bulan=="9"){
              $namabulan="September";
            }else if($bulan=="10"){
              $namabulan="Oktober";
            }else if($bulan=="11"){
              $namabulan="November";
            }else if($bulan=="12"){
              $namabulan="Desember";
            }
          ?>
          <tr>
            <td width="10%">&nbsp</td>
            <td width="20%">Untuk Pembayaran</td>
            <td width="5%">:</td>
            <td>Biaya Kursus Bulan <?=$namabulan?></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td>
        <table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td width="50%">&nbsp</td>
            <td width="50%">&nbsp</td>
          </tr>
          <tr>
            <td width="50%">&nbsp</td>
            <td width="50%" align="center">Bandarlampung,<?=date('d-m-Y')?></td>
          </tr>
          <tr>
            <td width="50%">&nbsp</td>
            <td width="50%">&nbsp</td>
          </tr>
          <tr>
            <td width="50%">&nbsp</td>
            <td width="50%">&nbsp</td>
          </tr>
          <tr>
            <td width="50%" align="center"><?='Total Bayar : Rp '.number_format($list->jumlah,0,',','.')?></td>
            <td width="50%" align="center">........................</td>
          </tr>
          <tr>
            <td width="50%">&nbsp</td>
            <td width="50%">&nbsp</td>
          </tr>
        </table>   
      </td>
      
    </tr>
  </table> 
</body>
</html>

