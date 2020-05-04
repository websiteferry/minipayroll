			
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Jabatan</li>
	</ol>
</div><!--/.row-->

<br>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
				<a style="text-decoration:none"><?php if($flag == 'add'){ echo "Tambah Data Jabatan";}else{echo "Edit Data Jabatan";};?></a></div>
				<div class="panel-body">
					
					<div class="col-md-6">
						<form method="post" action="<?php echo base_url();?><?php echo $url;?>">

							<input type="hidden" class="form-control" name="kd_jabatan" value="<?php echo $kd_jabatan;?>">

							<div class="form-group">
								<label>Nama Jabatan</label>
								<input class="form-control" name="nm_jabatan" required="required" value="<?php echo $nm_jabatan;?>" placeholder="Nama Jabatan" required>
							</div>

							<button type="submit" class="btn btn-primary">Simpan</button>
							<a href="<?php echo base_url();?>jabatan/jabatan_list"  class="btn btn-danger">Batal</a>
						</div>

					</form>


				</div>
			</div>
		</div>
	</div><!--/.row-->	
	
	
