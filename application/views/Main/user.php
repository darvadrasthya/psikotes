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
                    <h5 class="card-title">Data User</h5>
                <div class="table-responsive">
            <table id="zero_config" class="table table-striped table-bordered" id="mydata">
                <?= $this->session->flashdata('pesan'); ?>
        <thead>
            <tr align="center">
                <th>Id User</th>
                <th>Username</th>
                <th>Id Level</th>
                <th>Nama User</th>
                <th>Create Date</th>
                <th>Update Date</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($user as $key => $values){
                    echo "
                        <tr  align='center'>
                        <td>".$user[$key]->id_user."</td>                     
                        <td>".$user[$key]->username."</td>                   
                        <td>".$user[$key]->nama_user."</td>                   
                        <td>".$level[$key]->nama_level."</td>                   
                        <td>".$user[$key]->create_date."</td>                   
                        <td>".$user[$key]->update_date."</td>                   
                    ";?>
                <td align="center">
                <a class="btn btn-info btn-us" title="ubah" href="<?php echo base_url();?>C_user/edit/<?php echo $user[$key]->id_user;?>"><span class="fa fa-edit"></span></a>
                <a class="btn btn-danger btn-us" title="hapus" onclick="return confirm('Ingin menghapus Data?');" href="<?php echo base_url();?>c_user/delete/<?php echo $user[$key]->id_user;?>"><span class ="fa fa-trash"></span></a>
                </td>
                <?php echo "</tr>";
                }   
            ?>
        </tbody>
    </table>
    <!--modal input-->
        <p><a class="btn btn-success" data-toggle="modal" data-target="#modal_add_new"><i class="fa fa-plus"></i>Tambah User</a></p>
        </div>
    </div>
</div>
<footer class="footer text-center">
                All Rights Reserved by Darpeee. <a href="https://instagram.com/darpeee/">Instagram Me</a>.
            </footer>
<div class="modal fade" id="modal_add_new" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Tambah User</h3>
            </div>
            <form class="form-horizontal" method="post" action="<?php echo base_url('c_user/proses_tambah');?>">
                <div class="modal-body">
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Id User</label>
                        <div class="col-xs-8">
                            <input type="text" class="form-control" name="id_user" value="USR<?php echo sprintf("%04s", $id_user) ?>" readonly>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Username</label>
                        <div class="col-xs-8">
                            <input type="text" name="username" class="form-control" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Password</label>
                        <div class="col-xs-8">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nama User</label>
                        <div class="col-xs-8">
                            <input type="text" name="nama_user" class="form-control" placeholder="Nama" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Level</label>
                        <div class="col-xs-8">
                             <select name="id_level" class="form-control" required>
                                <option value="0">-Pilih-</option>
                            <?php foreach($level as $data){ ?>
                                <option value="<?= $data->id_level?>"><?= $data->nama_level; ?></option>
                            <?php } ?>
                             </select>
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