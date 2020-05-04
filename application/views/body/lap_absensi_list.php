      
    <div class="row">
      <ol class="breadcrumb">
        <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
        <li class="active">Laporan Absensi</li>
      </ol>
    </div>
    
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

<h4><b><u>LAPORAN ABSENSI KARYAWAN</b></u></h4>
<br>
<br>
<table class="tg" width="100%" style="margin-top:-2.8%;">
  <tr>
  	<th>NO</th>
    <th>NAMA KARYAWAN</th>
    <th>JABATAN</th>
    <th>TANGGAL</th>
    <th>HADIR</th>
    <th>SAKIT</th>
    <th>ALPA/LIBUR</th>
  </tr>
  <?php
  	$no=1;
  	foreach($detail_absensi->result() as $db)
	{ 
  ?>
  		<tr>
        	<td><?php echo $no++;?></td>
            <td><?php echo $db->NmKaryawan;?></td>
            <td><?php echo $db->NmJabatan;?></td> 
            <td><?php echo $db->TglAbsen;?></td>
            <?php
            	if($db->Hadir=='1')
				{
            ?>
					<td><img src="<?php echo base_url();?>assets/download.png" width="26px"></td>
            <?php
				}
				else
				{
			?>
            		<td></td>
            <?php
				}
			?>
            <?php
            	if($db->Sakit=='1')
				{
            ?>
					<td><img src="<?php echo base_url();?>assets/download.png" width="26px"></td>
            <?php
				}
				else
				{
			?>
            		<td></td>
            <?php
				}
			?><?php
            	if($db->Alpa=='1')
				{
            ?>
					<td><img src="<?php echo base_url();?>assets/download.png" width="26px"></td>
            <?php
				}
				else
				{
			?>
            		<td></td>
            <?php
				}
			?>
        </tr>
  <?php
	}
  ?>
</table>
<table>
	<tr>
    	<td>Total Hadir : <?php echo $hadir;?></td>
    </tr>
    <tr>
    	<td>Total Sakit : <?php echo $sakit;?></td>
    </tr>
    <tr>
    	<td>Total Alpa : <?php echo $alpa;?></td>
    </tr>
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

<a href="<?php echo base_url();?>lap_absensi/periode_list"><button type="button" class="btn btn-danger">BATAL</button></a>



          </div>
        </div>
      </div>
    </div>