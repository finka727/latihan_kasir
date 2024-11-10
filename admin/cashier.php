<?php
session_start();
session_regenerate_id();
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

</head>

<body>
<?php include('inc/header.php'); ?>
    <div class="container text-center">
        <div class="container justify-content-center">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="card mt-3">
                        <div class="card-header text-center">
                            <h1>Manage Kasir</h1>
                        </div>
                        <div class="card-body">
                            <div class="table table-responsive">
                                <div class="mt-2 mb-2" align="left">
                                    <a href="tambah-transaksi.php" class="btn btn-primary btn-sm">Add</a>
                                </div>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Transaksi</th>
                                            <th>Tanggal Transaksi</th>
                                            <th>Struk Pembayaran</th>
                                            <th>Status Pembayaran</th>
                                            <th>Settings</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <!-- <script src="../bootstrap-5.3.3/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->
     <?php include('inc/footer.php'); ?>
</body>

</html>