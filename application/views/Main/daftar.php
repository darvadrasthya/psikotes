<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/logo.png')?>">
      <title>Q&Dee Market</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/js/bootstrap.min.js')?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/libs/popper.js/dist/popper.min.js')?>">
        <script src="<?php echo base_url('assets/js/jquery.min.js')?>" charset="utf-8"></script>
  </head>
  <body>
    <div class="container">
      <form class="login-form" action="<?php echo base_url('C_user/proses_tambah2');?>" method="post">
  <?= $this->session->flashdata('pesan'); ?>
        <h1>Daftar</h1>
        <input type="hidden" class="form-control" name="id_user" value="USR<?php echo sprintf("%04s", $id_user) ?>" readonly>
        <input type="hidden" name="level" value="LVL0002">

        <div class="txtb">
          <input type="text" name="nama_user" placeholder="Nama User">
        </div>

        <div class="txtb">
          <input type="text" name="username" placeholder="Username">
        </div>

        <div class="txtb">
          <input type="password" name="password" placeholder="Password">
        </div>

        <input type="submit" class="logbtn" name="submit" value="Daftar">
        <div class="bottom-text">
          Sudah punya akun? <a href="<?php echo base_url('Main/index');?>">Login</a>
          </div>
        </div>
      </form>

      <script type="text/javascript">
      $(".txtbb input").on("focus",function(){
        $(this).addClass("focus");
      });

      $(".txtbb input").on("blur",function(){
        if($(this).val() == "")
        $(this).removeClass("focus");
      });

      </script>


  </body>
</html>
