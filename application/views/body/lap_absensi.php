<script language="javascript" type="text/javascript">
	$(document).ready(function() {

		$("#id_golongan").change(function(){
	 		// Put an animated GIF image insight of content

	 		var data = {id_jabatan:$("#id_jabatan").val(),
	 		id_pendidikan:$("#id_pendidikan").val(),
	 		id_golongan:$("#id_golongan").val()};
	 		$.ajax({
	 			type: "POST",
	 			url : "<?php echo base_url().'select/select_tunjangan'?>",				
	 			data: data,
	 			success: function(msg){
	 				$('#div-order').html(msg);
	 			}
	 		});
	 	});   

	});

</script>				
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
			<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
				<a style="text-decoration:none">Laporan Absensi Karyawan</a></div>
				<div class="panel-body">
					<div class="col-md-6">
						<form method="post" action="<?php echo base_url();?><?php echo $url;?>">
							<label>Tgl Awal</label>
							<input type="date" required class="form-control" name="tgl_awal" value="">
							<label>Tgl Akhir</label>
							<input type="date" required class="form-control" name="tgl_akhir" value="">

						</div>
						<br>
						<button type="submit" class="btn btn-primary">Cari</button>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>	






