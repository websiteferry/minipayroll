			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Akun</li>
			</ol>
		</div><!--/.row-->
		
	<br>
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
<a href="#" style="text-decoration:none"><?php if($flag == 'update'){ echo "Tambah Akun";}else{echo "Edit Akun";};?></a></div>
					<div class="panel-body">
						
					<div class="col-md-6">
					<form method="post" action="<?php echo base_url();?><?php echo $url;?>">

					<input type="hidden" class="form-control" name="id" value="<?php echo $id;?>">

					<div class="form-group">
						<label>Username</label>
						<input class="form-control" name="username" required value="<?php echo $username;?>" placeholder="Username" required>
					</div>
                    <div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" required value="<?php echo $password;?>" placeholder="Password" required>
					</div>
                    <div class="form-group">
						<label>Nama</label>
						<input class="form-control" name="nama" required value="<?php echo $nama;?>" placeholder="Nama" required>
					</div>

					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="<?php echo base_url();?>akun/akun_list"  class="btn btn-danger">Batal</a>
				    </div>

				     </form>


					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
