			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">User</li>
			</ol>
		</div><!--/.row-->
		
	<br>
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<svg class="glyph stroked male user ">
							<use xlink:href="#stroked-male-user"/>
						</svg>
						<a href="#" style="text-decoration:none">Tambah Data User</a>
					</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form method="post" action="<?php echo base_url();?><?php echo $url;?>">
								<input type="hidden" class="form-control" name="id_akun" value="<?php echo $id_akun;?>">
									<?php if($flag=="edit")
									{

									}else{
									?>
								<div class="form-group">
									<label>Nama Karyawan</label>
										<?php echo form_dropdown('id_pegawai',$dd_pegawai, $id_pegawai, ' id="id_pegawai" required class="form-control"');?>
								</div>

								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" name="password" value="<?php echo $password;?>">
								</div>
								<?php }?>
								<div class="form-group">
									<label>Level</label>
										<?php echo form_dropdown('id_level',$dd_level, $id_level, ' id="id_level" required class="form-control"');?>
								</div>
								<button type="submit" class="btn btn-primary">
									Simpan
								</button>
								<a href="<?php echo base_url();?>akun/akun_list"  class="btn btn-danger">Batal</a>
			    			</div>
				     		</form>
						</div>
					</div>
				</div>
			</div><!--/.row-->	
		
		
