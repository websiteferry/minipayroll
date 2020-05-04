			
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
				<a style="text-decoration:none"><?php if($flag == 'add'){ echo "Tambah Data Tunjangan";}else{echo "Edit Data Tunjangan";};?></a></div>
				<div class="panel-body">
					
					<div class="col-md-6">
						<form method="post" action="<?php echo base_url();?><?php echo $url;?>">

							<input type="hidden" class="form-control" name="kd_tunjangan" value="<?php echo $kd_tunjangan;?>">

							<div class="form-group">
								<label>Jabatan</label>
								<select name="kd_jabatan" class="form-control">
									<option value="">--PILIH--</option>
									<?php
									foreach($jabatan->result() as $db)
									{
										if($kd_jabatan == $db->KdJabatan)
										{
											$selected = "selected";
										}
										else
										{
											$selected = "";
										}
										?>
										<option value="<?php echo $db->KdJabatan;?>" <?php echo $selected;?>><?php echo $db->NmJabatan;?></option>
										<?php
									}
									?>
								</select>
								<label>Pendidikan</label>
								<select name="kd_pendidikan" class="form-control">
									<option value="">--PILIH--</option>
									<?php
									foreach($pendidikan->result() as $db)
									{
										if($kd_pendidikan == $db->KdPendidikan)
										{
											$selected = "selected";
										}
										else
										{
											$selected = "";
										}
										?>
										<option value="<?php echo $db->KdPendidikan;?>" <?php echo $selected;?>><?php echo $db->NmPendidikan;?></option>
										<?php
									}
									?>
								</select>
								<label>Golongan</label>
								<select name="kd_golongan" class="form-control">
									<option value="">--PILIH--</option>
									<?php
									foreach($golongan->result() as $db)
									{
										if($kd_golongan == $db->KdGolongan)
										{
											$selected = "selected";
										}
										else
										{
											$selected = "";
										}
										?>
										<option value="<?php echo $db->KdGolongan;?>" <?php echo $selected;?>><?php echo $db->NmGolongan;?></option>
										<?php
									}
									?>
								</select>
								<label>Total Tunjangan</label>
								<input type="number" class="form-control" required="required" name="total_tunjangan" value="<?php echo $total_tunjangan;?>">
							</div>
							

							<button type="submit" class="btn btn-primary">Simpan</button>
							<a href="<?php echo base_url();?>tunjangan/tunjangan_list"  class="btn btn-danger">Batal</a>
						</div>

					</form>


				</div>
			</div>
		</div>
	</div><!--/.row-->	
	
	
