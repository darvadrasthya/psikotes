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
                    <h5 class="card-title">Data Pasien</h5>
                <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered" id="mydata">
                <?= $this->session->flashdata('pesan'); ?>
        <thead>
			<tr align="center">
				<th>Id Pasien</th>
				<th>Nama Pasien</th>
				<th>Keluhan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($pasien as $key => $values){
					echo "
						<tr  align='center'>
						<td>".$pasien[$key]->id_pasien."</td>						
						<td>".$pasien[$key]->nama_pasien."</td>				
                        <td>".$pasien[$key]->keluhan."</td>                  		
					";?>
				<td align="center">
				<a class="btn btn-info btn-us" title="ubah" href="<?php echo base_url();?>C_pasien/edit/<?php echo $pasien[$key]->id_pasien;?>"><span class="fa fa-edit"></span></a>
				<a class="btn btn-danger btn-us" title="hapus" onclick="return confirm('Ingin menghapus Data?');" href="<?php echo base_url();?>C_pasien/delete/<?php echo $pasien[$key]->id_pasien;?>"><span class ="fa fa-trash"></span></a>
				</td>
				<?php echo "</tr>";
				}	
			?>
		</tbody>
	</table>
	<!--modal input-->
	<p><a data-toggle="modal" data-target="#modal_add_new3" class="btn btn-success"><i class="fa fa-plus"></i>Tambah Pasien</a></p>
 		</div>
    </div>
</div>
<footer class="footer text-center">
                All Rights Reserved by Darpeee. <a href="https://instagram.com/darpeee/">Instagram Me</a>.
            </footer>
<div class="modal fade" id="modal_add_new3" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Tambah pasien</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('C_pasien/proses_tambah');?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Id pasien</label>
                        <div class="col-xs-8">
                            <input type="text" name="id_pasien" class="form-control" value="PSN<?php echo sprintf("%04s", $id_pasien) ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama pasien</label>
                        <div class="col-xs-8">
                            <input type="text" name="nama_pasien" class="form-control" placeholder="Nama pasien" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Keluhan</label>
                        <div class="col-xs-8">
                            <input type="textarea" name="keluhan" class="form-control" placeholder="keluhan" required>
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