<script language="javascript" type="text/javascript">
    $(document).ready(function() {

    	var data = {
			id_jabatan:$("#id_jabatan").val(),
			id_pendidikan:$("#id_pendidikan").val(),
			id_golongan:$("#id_golongan").val()
		};
		$.ajax({
				type: "POST",
				url : "<?php echo base_url().'select/select_tunjangan'?>",				
				data: data,
				success: function(msg){
					$('#div-order').html(msg);
				}
		});

		$("#id_golongan").change(function(){
	 		// Put an animated GIF image insight of content
			
			var data = {
				id_jabatan:$("#id_jabatan").val(),
				id_pendidikan:$("#id_pendidikan").val(),
				id_golongan:$("#id_golongan").val()
			};
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
			<li class="active">Karyawan</li>
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
						<a style="text-decoration:none"><?php if($flag == 'add'){ echo "Tambah Data Karyawan";}else{echo "Edit Data Karyawan";};?></a>
					</div>
					<div class="panel-body">
						<div class="col-md-6">
							<form method="post" action="<?php echo base_url();?><?php echo $url;?>">
								<input type="hidden" class="form-control" required="required" name="kd_karyawan" value="<?php echo $kd_karyawan;?>">
								<label>
									Nama Karyawan
								</label>
                    			<input type="text" class="form-control" required="required" name="nm_karyawan" value="<?php echo $nm_karyawan;?>">

                    			<label>
                    				Alamat
                				</label>
                    			<input type="text" class="form-control" name="alamat" required="required" value="<?php echo $alamat;?>">

                    			<label>
                    				No HP
                				</label>
                    			<input type="number" class="form-control" name="no_hp" value="<?php echo $no_hp;?>">

								<label>
									Tgl Lahir
								</label>
                    			<input type="date" required="required" class="form-control" name="tgl_lahir" value="<?php echo $tgl_lahir;?>">
                    			<?php
									if($flag == 'add')
									{
								?>
                            			<label>
                            				Jenis Kelamin
                        				</label>
                    					<select name="jenis_kelamin" class="form-control">
                            				<option value="">--PILIH--</option>
                            				<option value="L">Laki Laki</option>
                            				<option value="P">Perempuan</option>
                        				</select>

                            			<label>
                            				Status
                        				</label>
			                            <select name="status" class="form-control">
			                                <option value="">--PILIH--</option>
			                                <option value="single">Single</option>
			                                <option value="menikah">Menikah</option>
			                                <option value="duda">Duda</option>
			                                <option value="janda">Janda</option>
			                            </select>

                            			<label>
                            				Agama
                        				</label>
			                            <select name="agama" class="form-control">
			                                <option value="">--PILIH--</option>
			                                <option value="islam">Islam</option>
			                                <option value="kristen">Kristen</option>
			                                <option value="budha">Budha</option>
			                                <option value="hindu">Hindu</option>
			                                <option value="konghucu">Konghucu</option>
			                            </select>
                    			<?php
									}
									else
									{
										if($jenis_kelamin == 'L')
										{
											$jk = "Laki Laki";
										}
										else
										{
											$jk = "Perempuan";
										}
								?>
                    					<label>
                    						Jenis Kelamin
                						</label>
			                            <select name="jenis_kelamin" class="form-control">
			                                <option value="<?php echo $jenis_kelamin;?>" selected><?php echo $jk;?></option>
			                                <option value="L">Laki Laki</option>
			                                <option value="P">Perempuan</option>
			                            </select>

                            			<label>
                            				Status
                    					</label>
			                            <select name="status" class="form-control">
			                            	<option value="<?php echo $status;?>" selected><?php echo strtoupper($status);?></option>
			                                <option value="single">Single</option>
			                                <option value="menikah">Menikah</option>
			                                <option value="duda">Duda</option>
			                                <option value="janda">Janda</option>
			                            </select>

			                            <label>
			                            	Agama
		                            	</label>
			                            <select name="agama" class="form-control">
			                                <option value="<?php echo $agama;?>" selected><?php echo $agama;?></option>
			                                <option value="islam">Islam</option>
			                                <option value="kristen">Kristen</option>
			                                <option value="budha">Budha</option>
			                                <option value="hindu">Hindu</option>
			                                <option value="konghucu">Konghucu</option>
			                            </select>
                    			<?php
									}
								?>
	        					<div class="form-group">
									<label>
										Jabatan
									</label>
	                				<select name="kd_jabatan" id="id_jabatan" class="form-control">
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

	                				<label>
	                					Pendidikan
	            					</label>
	            					<select name="kd_pendidikan" class="form-control" id="id_pendidikan">
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

	                				<label>
	                					Golongan
	            					</label>
	                				<select name="kd_golongan" class="form-control" id="id_golongan">
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

	                				<label>
	                					Gaji Pokok
	            					</label>
	            					<input type="number" class="form-control" required="required" name="gaji_pokok" value="<?php echo $GajiPokok;?>">

	                				<div id="div-order">
	            						<label>
	            							Total Tunjangan
	        							</label>
	                					<input type="number" class="form-control" name="total_tunjangan" required="required" value="<?php echo $TotalTunjangan;?>">
	                				</div>
								</div>
                    
								<button type="submit" class="btn btn-primary">
									Simpan
								</button>
								<a href="<?php echo base_url();?>karyawan/karyawan_list"  class="btn btn-danger">
									Batal
								</a>
			    			</div>

				     </form>


					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
