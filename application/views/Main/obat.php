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
                    <h5 class="card-title">Data obat</h5>
                <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered" id="mydata">
                <?= $this->session->flashdata('pesan'); ?>
        <thead>
			<tr align="center">
				<th>Id obat</th>
				<th>Nama obat</th>
				<th>Dosis</th>
				<th>Qty</th>
				<th>Indikasi</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
				foreach ($obat as $key => $values){
					echo "
						<tr  align='center'>
						<td>".$obat[$key]->id_obat."</td>						
						<td>".$obat[$key]->nama_obat."</td>				
                        <td>".$obat[$key]->dosis."Mg"."</td>                  		
                        <td>".$obat[$key]->qty."</td>                  		
                        <td>".$obat[$key]->indikasi."</td>                  		
					";?>
				<td align="center">
				<a class="btn btn-info btn-us" title="ubah" href="<?php echo base_url();?>C_obat/edit/<?php echo $obat[$key]->id_obat;?>"><span class="fa fa-edit"></span></a>
				<a class="btn btn-danger btn-us" title="hapus" onclick="return confirm('Ingin menghapus Data?');" href="<?php echo base_url();?>C_obat/delete/<?php echo $obat[$key]->id_obat;?>"><span class ="fa fa-trash"></span></a>
				</td>
				<?php echo "</tr>";
				}	
			?>
		</tbody>
	</table>
	<!--modal input-->
	<p><a data-toggle="modal" data-target="#modal_add_new3" class="btn btn-success"><i class="fa fa-plus"></i>Tambah obat</a></p>
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
                <h3 class="modal-title" id="myModalLabel">Tambah obat</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('C_obat/proses_tambah');?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Id obat</label>
                        <div class="col-xs-8">
                            <input type="text" name="id_obat" class="form-control" value="OBT<?php echo sprintf("%04s", $id_obat) ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama obat</label>
                        <div class="col-xs-8">
                            <input type="text" name="nama_obat" class="form-control" placeholder="Nama obat" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Dosis</label>
                        <div class="col-xs-8">
                            <input type="number" name="dosis" class="form-control" placeholder="Dosis/Mg" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Qty Obat</label>
                        <div class="col-xs-8">
                            <input type="number" name="qty" class="form-control" placeholder="Qty/pc" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Indikasi</label>
                        <div class="col-xs-8">
                            <input type="textarea" name="indikasi" class="form-control" placeholder="Indikasi/Gejala" required>
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