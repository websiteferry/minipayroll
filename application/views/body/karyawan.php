			
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
						<a href="<?php echo base_url();?>karyawan/add" class="btn btn-success" style="text-decoration:none"><b>
							+ Tambah Data Karyawan</b>
						</a>
					</div>
					<div class="panel-body">
						<table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="desc">
						    <thead>
							    <tr>
							        <th data-field="nik" data-sortable="true" width="10px"> Nik</th>
	                                <th data-field="nm_karyawan" data-sortable="true" width="10px"> Nama Karyawan</th>
	                                <th data-field="no_hp" data-sortable="true" width="10px"> No Hp</th>
	                                <th data-field="tgl_lahir" data-sortable="true" width="10px"> Tgl Lahir</th>
	                                <th data-field="alamat" data-sortable="true" width="10px"> Alamat</th>
	                                <th data-field="jenis_kelamin" data-sortable="true" width="10px"> Jenis Kelamin</th>
	                                <th data-field="status" data-sortable="true" width="10px"> Status</th>
	                                <th data-field="agama" data-sortable="true" width="10px"> Agama</th>
							        <th data-field="jabatan" data-sortable="true">Jabatan</th>
	                                <th data-field="pendidikan" data-sortable="true">Pendidikan</th>
	                                <th data-field="golongan" data-sortable="true">Golongan</th>
	                                <th data-field="tunjangan" data-sortable="true">Total Tunjangan</th>
	                                <th data-field="gapok" data-sortable="true">Gaji Pokok</th>
							        <th>Aksi</th>
							    </tr>
                            </thead>
                            <tbody>
                           	<?php $no = 0; foreach($datakaryawan as $row) : $no++;?>
						     <tr>
						        <td data-field="nik" width="10px"><?php echo $row->KdKaryawan;?></td>
						        <td data-field="nm_karyawan"><?php echo $row->NmKaryawan;?></td>
                                <td data-field="no_hp"><?php echo $row->NoHp;?></td>
                                <td data-field="tgl_lahir"><?php echo $row->TglLahir;?></td>
                                <td data-field="alamat"><?php echo $row->Alamat;?></td>
                                <td data-field="jenis_kelamin"><?php echo $row->JenisKelamin;?></td>
                                <td data-field="status"><?php echo $row->Status;?></td>
                                <td data-field="agama"><?php echo $row->Agama;?></td>
                                <td data-field="jabatan"><?php echo $row->NmJabatan;?></td>
                                <td data-field="pendidikan"><?php echo $row->NmPendidikan;?></td>
                                <td data-field="golongan"><?php echo $row->NmGolongan;?></td>
                                <td data-field="tunjangan" align="right"><?php echo number_format($row->TotalTunjangan);?></td>
                                <td data-field="gapok"><?php echo number_format($row->GajiPokok);?></td>
                                <td>
									<a class="ubah btn btn-primary btn-xs" href="<?php echo base_url();?>karyawan/edit/<?php echo $row->KdKaryawan;?>"><span class="glyphicon glyphicon-edit" ></span>
									</a>
									<a data-toggle="modal"  title="Hapus Kontak" class="hapus btn btn-danger btn-xs" href="#modKonfirmasi" data-id="<?php echo $row->KdKaryawan;?>"><span class="glyphicon glyphicon-trash"></span>
									</a>
								</td>
						    </tr>
						    <?php endforeach;?>
						    </tbody>
						</table>
					</div>
				</div>
			</div>
		</div><!--/.row-->	

		<?php echo $this->session->flashdata("msg");?>
		<script>
		    $(function () {
		        $('#hover, #striped, #condensed').click(function () {
		            var classes = 'table';
		
		            if ($('#hover').prop('checked')) {
		                classes += ' table-hover';
		            }
		            if ($('#condensed').prop('checked')) {
		                classes += ' table-condensed';
		            }
		            $('#table-style').bootstrapTable('destroy')
		                .bootstrapTable({
		                    classes: classes,
		                    striped: $('#striped').prop('checked')
	                });
		        });
		    });
		
		    function rowStyle(row, index) {
		        var classes = ['active', 'success', 'info', 'warning', 'danger'];
		
		        if (index % 2 === 0 && index / 2 < classes.length) {
		            return {
		                classes: classes[index / 2]
		            };
		        }
		        return {};
		    }
		</script>


<?php $this->load->view('konfirmasi');?>

<script type="text/javascript">
	$(document).ready(function(){

		$(".hapus").click(function(){
			var id = $(this).data('id');
			$(".modal-body #mod").text(id);
		});

	});
</script>



					</div>
				</div>
			</div>
		</div><!--/.row-->	
		
		
