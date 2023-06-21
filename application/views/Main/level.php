<html lang="en">
<?php include "header.php"; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/extra-libs/multicheck/multicheck.css')?>">
<link href="<?php echo base_url('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet')?>">
<link href="<?php echo base_url('assets/dist/css/style.min.css" rel="stylesheet')?>">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <h5 class="card-title">Data Level</h5>
                <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered" id="mydata">
                <?= $this->session->flashdata('pesan'); ?>
        <thead>
			<tr align="center">
				<th>Id Level</th>
				<th>Nama Level</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i=1;
				foreach ($level as $key => $values){
					echo "
						<tr  align='center'>
						<td>".$level[$key]->id_level."</td>						
						<td>".$level[$key]->nama_level."</td>					
					";?>
				<td align="center">
				<a class="btn btn-info btn-us" title="ubah" href="<?php echo base_url();?>C_level/edit/<?php echo $level[$key]->id_level;?>"><span class="fa fa-edit"></span></a>
				<a class="btn btn-danger btn-us" title="hapus" onclick="return confirm('Ingin menghapus Data?');"  href="<?php echo base_url();?>C_level/delete/<?php echo $level[$key]->id_level;?>"><span class ="fa fa-trash"></span></a>
				</td>
				<?php echo "</tr>";
				}	
			?>
		</tbody>
	</table>
	<!--modal input-->
	<p><a data-toggle="modal" data-target="#modal_add_new2" class="btn btn-success"><i class="fa fa-plus"></i>Tambah Level</a></p>
		</div>
    </div>
</div>
<footer class="footer text-center">
                All Rights Reserved by Darpeee. <a href="https://instagram.com/darpeee/">Instagram Me</a>.
            </footer>
<div class="modal fade" id="modal_add_new2" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Tambah Level</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('C_level/proses_tambah');?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Id Level</label>
                        <div class="col-xs-8">
                            <input type="text" name="id_level" class="form-control" value="LVL<?php echo sprintf("%04s", $id_level) ?>" readonly>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama Level</label>
                        <div class="col-xs-8">
                            <input type="text" name="nama_level" class="form-control" placeholder="Nama Level" required>
                        </div>
                    </div>
                </div>
 
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                    <button class="btn btn-info" name="submit">Simpan</button>
                </div>
            </form>
            </div>
            </div>
        </div>
    <script src="<?php echo base_url('assets/extra-libs/multicheck/datatable-checkbox-init.js')?>"></script>
    <script src="<?php echo base_url('assets/extra-libs/multicheck/jquery.multicheck.js')?>"></script>
    <script src="<?php echo base_url('assets/extra-libs/DataTables/datatables.min.js')?>"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
</html>