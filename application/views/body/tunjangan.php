			
<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Tunjangan</li>
	</ol>
</div><!--/.row-->

<br>


<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
				<a href="<?php echo base_url();?>tunjangan/add" class="btn btn-success" style="text-decoration:none"><b>+ Tambah Data Tunjangan</b></a></div>
				<div class="panel-body">
					<table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="desc">
						<thead>
							<tr>
								<th data-field="no" data-sortable="true" width="10px"> No</th>
								<th data-field="jabatan" data-sortable="true">Jabatan</th>
								<th data-field="pendidikan" data-sortable="true">Pendidikan</th>
								<th data-field="golongan" data-sortable="true">Golongan</th>
								<th data-field="tunjangan" data-sortable="true">Total Tunjangan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 0; foreach($datatunjangan as $row) : $no++;?>
							<tr>
								<td data-field="no" width="10px"><?php echo $row->KdTunjangan;?></td>
								<td data-field="jabatan"><?php echo $row->NmJabatan;?></td>
								<td data-field="pendidikan"><?php echo $row->NmPendidikan;?></td>
								<td data-field="golongan"><?php echo $row->NmGolongan;?></td>
								<td data-field="tunjangan"><?php echo number_format($row->TotalTunjangan);?></td>
								<td>
									<a class="ubah btn btn-primary btn-xs" href="<?php echo base_url();?>tunjangan/edit/<?php echo $row->KdTunjangan;?>"><span class="glyphicon glyphicon-edit" ></span></a>
									<a data-toggle="modal"  title="Hapus Kontak" class="hapus btn btn-danger btn-xs" href="#modKonfirmasi" data-id="<?php echo $row->KdTunjangan;?>"><span class="glyphicon glyphicon-trash"></span></a>
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


