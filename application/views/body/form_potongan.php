			
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
			<div class="panel-heading">
				<svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
				<a style="text-decoration:none"><?php if($flag == 'add'){ echo "Tambah Data Potongan";}else{echo "Edit Data Potongan";};?></a>
			</div>
			<div class="panel-body">

				<div class="col-md-6">
					<form method="post" action="<?php echo base_url();?><?php echo $url;?>">

						<input type="hidden" class="form-control" name="kd_potongan" value="<?php echo $kd_potongan;?>">

						<div class="form-group">
							<?php
							if($flag == 'add')
							{
								?>
								<label>
									Jenjang Potongan
								</label>
								<select name="jenis_potongan" class="form-control">	
									<option value="ALPA">ALPA</option>
									<option value="SAKIT">SAKIT</option>
								</select>
								<?php
							}
							else
							{
								?>
								<label>
									Status
								</label>
								<select name="jenis_potongan" class="form-control">
									<option value="<?php echo $jenis_potongan;?>" selected><?php echo strtoupper($jenis_potongan);?></option>
									<option value="ALPA">ALPA</option>
									<option value="SAKIT">SAKIT</option>
								</select>
								<?php
							}
							?>
						<!-- <label>Jenjang Potongan</label>
							<input class="form-control" name="jenis_potongan" required="required" value="<?php echo $jenis_potongan;?>" placeholder="Jenis Potongan" required> -->
						</div>

						<div class="form-group">
							<label>Total Potongan</label>
							<input type="number"  required="required" class="form-control" name="total_potongan" value="<?php echo $total_potongan;?>" placeholder="TotaL Potongan" required>
						</div>

						<button type="submit" class="btn btn-primary">Simpan</button>
						<a href="<?php echo base_url();?>potongan/potongan_list"  class="btn btn-danger">Batal</a>
					</div>

				</form>


			</div>
		</div>
	</div>
</div><!--/.row-->	


