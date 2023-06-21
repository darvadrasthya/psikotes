<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/logo.png')?>">
      <title>Q&Dee Market</title>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/login.css')?>">
        
  </head>
  <body>

      <form class="login-form" action="<?php echo base_url('C_login/auth');?>" method="post">
        <h1>Login</h1>

        <div class="txtb">
          <input type="text" name="username" placeholder="Username">
        </div>

        <div class="txtb">
          <input type="password" name="password" placeholder="Password">
        </div>

        <input type="submit" class="logbtn" name="submit" value="Login">

        <div class="bottom-text">
          Belum punya akun? <a href="<?php echo base_url('C_user/daftar');?>">Sign up</a>
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
