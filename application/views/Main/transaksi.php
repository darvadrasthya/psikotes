<!DOCTYPE html>
<?php include "header.php"; ?>
<html>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/libs/select2/dist/css/select2.min.css')?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/libs/jquery-minicolors/jquery.minicolors.css')?>">
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form class="form-horizontal" method="POST" action="<?php echo base_url('c_transaksi/proses_tambah');?>">
                    <div class="card-body">
                        <h4 class="card-title">Transaksi</h4>
                            <div class="form-group row">
                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">NO TRANSAKSI</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="id_transaksi" value="TRANSAKSI<?php echo sprintf("%04s", $id_transaksi) ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 text-right control-label col-form-label" >
                                    ID ORDER</label>
                                        <div class="col-sm-9">
                                            <select name="id_order" id="id_order" class="form-control" required>
                                                <option value="0">-Pilih-</option>
                                                    <?php foreach($order as $query){ ?>
                                <option value="<?= $query->id_order?>"><?= $query->id_order; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Tanggal Order</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="tanggal" id="tanggal"  readonly="readonly">
                        </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-right control-label col-form-label" >
                                ID MASAKAN</label>
                                    <div class="col-sm-9">
                                        <select id="id_masakan" class="form-control" required>
                                            <option value="0">-Pilih-</option>
                                                <?php foreach($masakan as $query){ ?>
                                                    <option value="<?= $query->id_masakan?>">
                                                        <?= $query->id_masakan; ?></option>
                                                        <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                             <div class="form-group row">
                                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama Menu</label>
                                    <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_masakan"  
                                readonly="readonly">
                            </div>
                        </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Harga</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="harga"  readonly="readonly">
                                    </div>
                                        </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 text-right control-label col-form-label" >ID USER</label>
                                                    <div class="col-sm-9">
                                                <select name="id_user" id="id_user" class="form-control" required>
                                                <option value="0">-Pilih-</option>
                                            <?php foreach($user as $query){ ?>
                                        <option value="<?= $query->id_user?>"><?= $query->id_user; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    <div class="form-group row">
            <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nama User</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_user"  readonly="readonly">
                        </div>
                            </div>
                    
            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Ubah</button>
                        <button href="<?php echo base_url('c_transaksi/index')?>" class="btn btn-warning">Batal</button>
                            </div>
                                </div>
                                    </form>
                                        </div>
                    </body>
    <script src="<?php echo base_url('assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js')?>"></script>
    <script src="<?php echo base_url('assets/dist/js/pages/mask/mask.init.js')?>"></script>
    <script src="<?php echo base_url('assets/libs/select2/dist/js/select2.full.min.js')?>"></script>
    <script src="<?php echo base_url('assets/libs/select2/dist/js/select2.min.js')?>"></script>
    <script>
    $("#id_user").change(function(){    
        var id_user = $("#id_user").val();
        
        $.ajax({
            url:"<?php echo site_url('c_transaksi/cari_user');?>",
            type:"POST",
            data:"id_user="+id_user,
            cache:false,
            success:function(html){
                $("#nama_user").val(html);
                // document.write(html)
            }
        })
        
    });
   $("#id_masakan").change(function(){    
        var id_masakan = $("#id_masakan").val();
        
        $.ajax({
            url:"<?php echo site_url('c_transaksi/cari_masakan');?>",
            type:"POST",
            data:"id_masakan="+id_masakan,
            cache:false,
            success:function(html){
                $("#nama_masakan").val(html);
                // document.write(html)
            }
        })
        
    });
   $("#id_masakan").change(function(){    
        var id_masakan = $("#id_masakan").val();
        
        $.ajax({
            url:"<?php echo site_url('c_transaksi/cari_masakan2');?>",
            type:"POST",
            data:"id_masakan="+id_masakan,
            cache:false,
            success:function(html){
                $("#harga").val(html);
                // document.write(html)
            }
        })
        
    });
   $("#id_order").change(function(){    
        var id_order = $("#id_order").val();
        
        $.ajax({
            url:"<?php echo site_url('c_transaksi/cari_order');?>",
            type:"POST",
            data:"id_order="+id_order,
            cache:false,
            success:function(html){
                $("#tanggal").val(html);
                // document.write(html)
            }
        })
        
    });
   $("#id_order").change(function(){    
        var id_order = $("#id_order").val();
        
        $.ajax({
            url:"<?php echo site_url('c_transaksi/cari_order2');?>",
            type:"POST",
            data:"id_order="+id_order,
            cache:false,
            success:function(html){
                $("#id_masakan").val(html);
                // document.write(html)
            }
        })
        
    });
</script>
</html>