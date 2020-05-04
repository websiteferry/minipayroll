      
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Slip Gaji</li>
      </ol>
    </div><!--/.row-->
    
  <br>
        
    
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></svg>
<a href="#" style="text-decoration:none"></a></div>
          <div class="panel-body">


            <div id="printsection"> 
<style>

.scroll{
  width: 98%;
  background: white;
  padding: 10px;
  margin:0 0 0 0px; 
  overflow: scroll;
  height: 450px;
  font-size: 8px;
  align:center;
}

.tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;border-top-width:1px;border-bottom-width:1px;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;border-top-width:1px;border-bottom-width:1px;}
.tg .tg-yw4l{vertical-align:top}
.tg .tg-b7b8{background-color:#f9f9f9;vertical-align:top}

@media print {
    @page {
        size: letter portrait;
        margin: 0cm 0.5cm 0cm 0.5cm;
    }
}

</style>

<h4><b><u>SLIP GAJI</b></u></h4>
<h5><?php echo $tgl_awal;?> S/d <?php echo $tgl_akhir;?></h5>

<table class="tg" width="40%" style="margin-top:-2.8%;">
  <?php  
  	foreach($detail_absensi->result() as $db)
	{
		$pot_sakit = "select count(Sakit) as sakit from detail_absensi 
					  where TglAbsen Between '$tgl_awal' and '$tgl_akhir'  and Sakit <> '' and KdKaryawan = '$db->KdKaryawan'";
		$row_sakit = $this->db->query($pot_sakit)->row();
		
		$pot_alpa = "select count(Alpa) as alpa from detail_absensi 
					  where TglAbsen Between '$tgl_awal' and '$tgl_akhir' and Alpa <> '' and KdKaryawan = '$db->KdKaryawan'";
		$row_alpa = $this->db->query($pot_alpa)->row();

    $pot_sakit = "select TotalPotongan from potongan where JenisPotongan = 'SAKIT'";
    $pot_sakit = $this->db->query($pot_sakit)->row();
    $pot_alpa = "select TotalPotongan from potongan where JenisPotongan = 'ALPA'";
    $pot_alpa = $this->db->query($pot_alpa)->row();
		

    if($row_sakit <> '0' && $row_alpa == '0')
    {
      $potongan = $row_sakit->sakit * $pot_sakit->TotalPotongan;
    }

    else if($row_alpa <> '0' && $row_sakit <> '0')
    { 
      $potongan = ($row_alpa->alpa * $pot_alpa->TotalPotongan) + ($row_sakit->sakit * $pot_sakit->TotalPotongan);
    }
		// $potongan = ($row_sakit->sakit*$sakit) + ($row_alpa->alpa*$alpa);
  ?>
      <tr>
        <td class="">NAMA</td>
        <td class=""><?php echo $db->NmKaryawan;?></td>
      </tr>
      <tr>
        <td class="">JABATAN</td>
        <td class=""><?php echo $db->NmJabatan;?></td>
      </tr>
      <tr>
        <td class="">GAJI POKOK</td>
        <td class=""><?php echo number_format($db->GajiPokok);?></td>
      </tr>
      <tr>
        <td class="">TUNJANGAN JABATAN</td>
        <td class=""><?php echo number_format($db->TotalTunjangan);?></td>
      </tr>
      <tr>
        <td class="">POTONGAN</td>
        <td class=""><?php echo number_format($potongan);?></td>
      </tr>
      <tr>
        <td class="">SAKIT </td>
        <td class=""><?php echo $row_sakit->sakit;?> kali</td>
      </tr>
      <tr>
        <td class="">ALPA </td>
        <td class=""><?php echo $row_alpa->alpa;?> kali</td>
      </tr>
      <tr>
        <td colspan="4" style="text-align:right"><b>TOTAL BAYAR : <?php echo number_format($db->GajiPokok + $db->TotalTunjangan - $potongan);?> </b></td>
        <td><b></b></td>
      </tr>
	<div style="clear:both; height:20px;"></div>
<?php
	}
?>
</table>

</div>


      <script language="javascript"> 
function printPage(printContent) { 
var display_setting="toolbar=yes,menubar=yes,"; 
display_setting+="scrollbars=yes,width=1150, height=2000, left=100, top=25"; 
var printpage=window.open("","",display_setting); 
printpage.document.open(); 
//printpage.document.write('<html><head><title>Print Page</title></head>'); 
printpage.document.write('<body onLoad="self.print()" align="center">'+ printContent +'</body></html>'); 
printpage.document.close(); 
printpage.focus(); 
} 
</script>


<br>
<a href="javascript:void(0);" onClick="printPage(printsection.innerHTML)"><button type="button" class="btn btn-primary">CETAK</button></a>

<a href="<?php echo base_url();?>slip_gaji/periode_list"><button type="button" class="btn btn-danger">BATAL</button></a>



          </div>
        </div>
      </div>
    </div><!--/.row-->  