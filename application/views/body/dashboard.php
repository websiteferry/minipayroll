		
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Dashboard <?php echo $this->session->userdata('id_jabatan');?></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-12">
				<br>
				<h1 class="page-header"><font color=#f5f5f5><b><center>Dashboard Mini Payroll</center></b></font></h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<!-- <div class="col-md-12 col-md-6 col-lg-3"> -->
				<div class="col-md-12 col-md-6">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_karyawan;?></div>
							<div class="text-muted"><b>Total Karyawan</b></div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="col-md-12 col-md-6 col-lg-3"> -->
				<div class="col-md-12 col-md-6">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_karyawan_hadir;?></div>
							<div class="text-muted"><b>Total Kehadiran</b></div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="col-md-12 col-md-6 col-lg-3"> -->
				<div class="col-md-12 col-md-6">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_karyawan_sakit;?></div>
							<div class="text-muted"><b>Total Sakit</b></div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="col-md-12 col-md-6 col-lg-3"> -->
				<div class="col-md-12 col-md-6">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $jml_karyawan_libur;?></div>
							<div class="text-muted"><b>Total Alpa</b></div>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
</div>	<!--/.main-->