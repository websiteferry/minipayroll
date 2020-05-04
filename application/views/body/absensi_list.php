			
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
					<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
						<!-- <a href="<?php echo base_url();?>karyawan/add" style="text-decoration:none">List Karyawan</a> -->
						<a style="text-decoration:none">List Karyawan</a>
						<p style="float:right;">Tanggal Absensi : <input type="text" name="tgl_absensi" style="border:none; padding-bottom:-10%;" value="<?php echo $tgl_absensi;?>" />
						  </p>  
                    </div>
					<div class="panel-body">
                    	<form method="post" action="<?php echo base_url();?><?php echo $url;?>" enctype="multipart/form-data">
						<?php
							$attributes = array('name' => 'file_upload_form', 'id' => 'file_upload_form');
							echo form_open_multipart($this->uri->uri_string(), $attributes);
						?>
                        <input type="hidden" name="tgl_absensi" value="<?php echo $tgl_absensi;?>" />
                        <table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="false" data-sort-name="name" data-sort-order="desc">
                        	    <thead>
                                <tr>
                                    <th data-field="nik" data-sortable="true" width="10px"> Nik</th>
                                    <th data-field="nm_karyawan" data-sortable="true" width="10px"> Nama Karyawan</th>
                                    <th data-field="jenis_kelamin" data-sortable="true" width="10px"> Jenis Kelamin</th>
                                    <th data-field="jabatan" data-sortable="true">Jabatan</th>
                                    <th>Hadir</th>
                                    <th>Ijin/Sakit</th>
                                    <th>Libur</th>
                                </tr>
                                </thead>
                                <tbody>
                               <?php $no = 0; foreach($datakaryawan as $row) : $no++;?>
                               	 	
                                 <tr>
                                    <td data-field="no" width="10px"><input type="text" style="border:none; width:45px;" name="kd_karyawan[]" value="<?php echo $row->KdKaryawan;?>" /></td>
                                    
                                    <td data-field="nm_karyawan"><?php echo $row->NmKaryawan;?></td>
                                    <td data-field="jenis_kelamin"><?php echo $row->JenisKelamin;?></td>
                                    <td data-field="jabatan"><?php echo $row->NmJabatan;?></td>
                                    <td><input type="radio" name="jenis_absensi_<?php echo $no;?>" value="hadir" /></td>
                                    <td><input type="radio" name="jenis_absensi_<?php echo $no;?>" value="sakit" />
										<input type="file" name="gambar_<?php echo $no;?>" /></td>
                                    <td><input type="radio" name="jenis_absensi_<?php echo $no;?>" value="mangkir" /></td>
    
                                </tr>
                                <?php endforeach;?>
                                </tbody>
                                
                            </table>
                        	<button type="submit" class="btn btn-primary">Simpan</button>
                        	<a href="<?php echo base_url();?>absensi/periode_absensi"  class="btn btn-danger">
									Batal
								</a>
                          </form>
					</div>
				</div>
			</div>
		</div><!--/.row-->	

		



					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
