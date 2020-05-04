      
<div class="row">
  <ol class="breadcrumb">
    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
    <li class="active">Laporan Gaji</li>
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

            <h4><b><u>LAPORAN GAJI KARYAWAN</b></u></h4>
            <h5><?php echo $tgl_awal;?> S/d <?php echo $tgl_akhir;?></h5>
            <br />
            <br>
            <table class="tg" width="100%" style="margin-top:-2.8%;">
              <tr>
               <th>NO</th>
               <th>NAMA KARYAWAN</th>
               <th>JABATAN</th>
               <th>GAJI POKOK</th>
               <th>TUNJANGAN JABATAN</th>
               <th>HADIR</th>
               <th>SAKIT</th>
               <th>ALPA/LIBUR</th>
               <th>POTONGAN</th>
               <th>TOTAL BAYAR</th>
             </tr>
             <?php
             $no=1;
             foreach($detail_absensi->result() as $db)
      // $total_potongan_alpa = 0;
      // $total_potongan_sakit = 0;

             { 
              ?>

              <tr>
               <td><?php echo $no++;?></td>
               <td><?php echo $db->NmKaryawan;?></td>  
               <td><?php echo $db->NmJabatan;?></td> 
               <td><?php echo number_format($db->GajiPokok);?></td>
               <td><?php echo number_format($db->TotalTunjangan);?></td>
               <?php
               $potongan_hadir = "select COUNT(Hadir) as hadir from detail_absensi 
               where TglAbsen between '$tgl_awal' and '$tgl_akhir' and Hadir <> ''
               and KdKaryawan = '$db->KdKaryawan'";
               $row_hadir = $this->db->query($potongan_hadir)->row();
               $potongan_sakit = "select COUNT(Sakit) as sakit from detail_absensi 
               where TglAbsen between '$tgl_awal' and '$tgl_akhir' and Sakit <> ''
               and KdKaryawan = '$db->KdKaryawan'";
               $row_sakit = $this->db->query($potongan_sakit)->row();
               $potongan_alpa = "select COUNT(Alpa) as alpa from detail_absensi 
               where TglAbsen between '$tgl_awal' and '$tgl_akhir' and Alpa <> ''
               and KdKaryawan = '$db->KdKaryawan'";
               $row_alpa = $this->db->query($potongan_alpa)->row();
               ?>
               <td><?php echo $row_hadir->hadir;?></td>
               <td><?php echo $row_sakit->sakit;?></td>
               <td><?php echo $row_alpa->alpa;?></td>
               <?php
               $pot_sakit = "select TotalPotongan from potongan where JenisPotongan = 'SAKIT'";
               $pot_sakit = $this->db->query($pot_sakit)->row();
               $pot_alpa = "select TotalPotongan from potongan where JenisPotongan = 'ALPA'";
               $pot_alpa = $this->db->query($pot_alpa)->row();

               if($row_sakit <> '0' && $row_alpa == '0')
               {
                 $total_potongan= $row_sakit->sakit * $pot_sakit->TotalPotongan;
               }

               else if($row_alpa <> '0' && $row_sakit <> '0')
               {	
                 $total_potongan= ($row_alpa->alpa * $pot_alpa->TotalPotongan) + ($row_sakit->sakit * $pot_sakit->TotalPotongan);
               }
               $grandTotalPotongan = $total_potongan;
               $gajiBersih = $db->GajiPokok + $db->TotalTunjangan -  $grandTotalPotongan
               ?>
               <td><?php echo number_format($grandTotalPotongan);?></td>
               <td><?php echo number_format($gajiBersih);?></td>
             </tr>
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

<a href="<?php echo base_url();?>lap_gaji/periode_list"><button type="button" class="btn btn-danger">BATAL</button></a>



</div>
</div>
</div>
</div><!--/.row-->  