			
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Potongan</li>
	</ol>
</div><!--/.row-->

<br>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
				<a style="text-decoration:none"><?php if($flag == 'add'){ echo "Tambah Data Golongan";}else{echo "Edit Data Golongan";};?></a></div>
				<div class="panel-body">

					<div class="col-md-6">
						<form method="post" action="<?php echo base_url();?><?php echo $url;?>">

							<input type="hidden" class="form-control" name="kd_golongan" value="<?php echo $kd_golongan;?>">

							<div class="form-group">
								<label>Jenjang Potongan</label>
								<input class="form-control" name="nm_golongan" required="required" value="<?php echo $nm_golongan;?>" placeholder="Jenis Golongan" required>
							</div>


							<button type="submit" class="btn btn-primary">Simpan</button>
							<a href="<?php echo base_url();?>golongan/golongan_list"  class="btn btn-danger">Batal</a>
						</div>

					</form>


				</div>
			</div>
		</div>
	</div><!--/.row-->	


