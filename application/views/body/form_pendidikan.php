			
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Pendidikan</li>
	</ol>
</div><!--/.row-->

<br>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
				<a style="text-decoration:none"><?php if($flag == 'add'){ echo "Tambah Data Pendidikan";}else{echo "Edit Data Pendidikan";};?></a></div>
				<div class="panel-body">

					<div class="col-md-6">
						<form method="post" action="<?php echo base_url();?><?php echo $url;?>">

							<input type="hidden" class="form-control" name="kd_pendidikan" value="<?php echo $kd_pendidikan;?>">

							<div class="form-group">
								<label>Jenjang Pendidikan</label>
								<input class="form-control" name="nm_pendidikan" required="required" value="<?php echo $nm_pendidikan;?>" placeholder="Jenjang Pendidikan" required>
							</div>

							<button type="submit" class="btn btn-primary">Simpan</button>
							<a href="<?php echo base_url();?>pendidikan/pendidikan_list"  class="btn btn-danger">Batal</a>
						</div>

					</form>


				</div>
			</div>
		</div>
	</div><!--/.row-->	


