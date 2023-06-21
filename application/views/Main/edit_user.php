<!DOCTYPE html>
<?php include "header.php"; ?>
<html>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/libs/select2/dist/css/select2.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/libs/jquery-minicolors/jquery.minicolors.css')?>">
<body>
<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <form class="form-horizontal" method="POST" 
                            action="<?php echo base_url('c_user/update');?>">
                                <div class="card-body">
                                    <h4 class="card-title">Edit User</h4>
                                    <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Id User</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"  name="id_user" value="<?php echo $id_user; ?>" readonly="readonly">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="lname" class="col-sm-3 text-right control-label col-form-label">Nama User</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="nama_user" name="nama_user" value="<?php echo $nama_user; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="level" class="col-sm-3 text-right control-label col-form-label">Level</label>
                                        <div class="col-sm-9">
                                        <select name="id_level" class="form-control">
				                               <option value="0">-Pilih-</option>
                                                    <?php foreach($level as $data){ ?>
                                                        <option value="<?= $data->id_level?>" 
                                                            <?= $data->id_level == $id_level ? 'selected' : '' ; ?>>
                                                            <?= $data->nama_level; ?>
                                                        </option>
                                                    <?php } ?>      
                            		      </select>
                                        </div>
                                    </div>
                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit" class="btn btn-primary" >Ubah</button>
										<button type="button" value="Go Back" onclick="history.back(-1)" class="btn btn-warning">Batal</button>
                                    </div>
                                </div>
                            </form>
                        </div>
					</body>
  	<script src="<?php echo base_url('assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js')?>"></script>
    <script src="<?php echo base_url('assets/dist/js/pages/mask/mask.init.js')?>"></script>
    <script src="<?php echo base_url('assets/libs/select2/dist/js/select2.full.min.js')?>"></script>
    <script src="<?php echo base_url('assets/libs/select2/dist/js/select2.min.js')?>"></script>
</html>