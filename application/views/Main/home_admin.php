<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard Admin</title>
        <?php
          include'header.php';
        ?>
        <?= $this->session->flashdata('pesan'); ?>
        <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-cyan text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-account"></i></h1></br>
                                <h1><strong><?php echo $total_user; ?></strong></h1>
                                <h6 class="text-white">Total User</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-dropbox"></i></h1></br>
                                <h1><strong><?php echo $total_pasien; ?></strong></h1>
                                <h6 class="text-white">Total Pasien</h6>
                            </div>
                        </div>
                    </div>
                     <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-chart-bar"></i></h1></br>
                                <h1><strong><?php echo $total_obat; ?></strong></h1>
                                <h6 class="text-white">Total Obat</h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-6 col-lg-6 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-chart-line"></i></h1></br>
                                <h1><strong><?php echo $total_tindakan; ?></strong></h1>
                                <h6 class="text-white">Total Tindakan</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <footer class="footer text-center" &nbsp;&nbsp;&nbsp;>
                All Rights Reserved by Darpeee. <a href="https://instagram.com/darpeee/">Instagram Me</a>.
            </footer>
                    
    </body>
</html>