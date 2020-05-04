			
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
				<a href="<?php echo base_url();?>potongan/add" class="btn btn-success" style="text-decoration:none"><b>+ Tambah Data Potongan</b></a></div>
				<div class="panel-body">
					<table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true"  data-pagination="true" data-sort-name="name" data-sort-order="desc">
						<thead>
							<tr>
								<th data-field="no" data-sortable="true" width="10px"> No</th>
								<th data-field="jenis" data-sortable="true">Jenis Potongan</th>
								<th data-field="total" data-sortable="true">Total Potongan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 0; foreach($datapotongan as $row) : $no++;?>
							<tr>
								<td data-field="no" width="10px"><?php echo $row->KdPotongan;?></td>
								<td data-field="jenis"><?php echo $row->JenisPotongan;?></td>
								<td data-field="total"><?php echo number_format($row->TotalPotongan);?></td>
								<td> 
									<a class="ubah btn btn-primary btn-xs" href="<?php echo base_url();?>potongan/edit/<?php echo $row->KdPotongan;?>"><span class="glyphicon glyphicon-edit" ></span></a>
									<a data-toggle="modal"  title="Hapus Kontak" class="hapus btn btn-danger btn-xs" href="#modKonfirmasi" data-id="<?php echo $row->KdPotongan;?>"><span class="glyphicon glyphicon-trash"></span></a>
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


