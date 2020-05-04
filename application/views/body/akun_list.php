			
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

						<!-- <a href="<?php echo base_url();?>akun/add" style="text-decoration:none">Tambah Data Akun</a></div> -->

						<a style="text-decoration:none">Data Akun</a></div>
					<div class="panel-body">

						<!-- <table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" data-search="true" data-pagination="true" data-sort-name="name" data-sort-order="desc"> -->
							
						<table data-toggle="table" data-show-refresh="false" data-show-toggle="true" data-show-columns="true" >
					    	<thead>
							    <tr>
							        <th data-field="username" data-sortable="true" width="10px"> USERNAME</th>
							        <th data-field="password" data-sortable="true">PASSWORD</th>
	                                <th data-field="nama" data-sortable="true">NAMA</th>
							        <th>Aksi</th>
							    </tr>
                            </thead>
                            <tbody>
                           		<?php $no = 0; foreach($dataakun as $row) : $no++;?>
							     	<tr>
								        <td data-field="no" width="10px"><?php echo $row->username;?></td>
								        <td data-field="pass"><?php echo $row->password;?></td>
		                                <td data-field="id"><?php echo $row->nama;?></td>
							         	<td> 
											<a class="ubah btn btn-primary btn-xs" href="<?php echo base_url();?>akun/edit/<?php echo $row->Id;?>"><span class="glyphicon glyphicon-edit" ></span></a>
											<!-- <a data-toggle="modal"  title="Hapus Kontak" class="hapus btn btn-danger btn-xs" href="#modKonfirmasi" data-id="<?php echo $row->Id;?>"><span class="glyphicon glyphicon-trash"></span></a> -->
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
		
		
