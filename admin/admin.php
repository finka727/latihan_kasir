<?php
session_start();
include '../koneksi.php';
//munculkan / pilih sebuah atau semua kolom dari table user
$query = mysqli_query($koneksi, "SELECT * FROM admin");
// mysqli_fetch_assoc = untuk menjadikan hasil query menjadi sebuah data (object)

// jika parameternya ada ?delete=nilai parameter
if (isset($_GET['delete'])) {
    $id = $_GET['delete']; //mengambil nilai parameter

    //query / perintah hapus
    $delete = mysqli_query($koneksi, "DELETE FROM admin WHERE id ='$id'");
    header("location:admin.php?hapus=berhasil");
}
?>

<?php include('inc/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Admin
                <a href="tambah-admin.php" class="btn btn-primary float-end">Add Admin</a>
            </h4>
        </div>
        <div class="card-body">
            <?php if (isset($_GET['hapus'])): ?>
                <div class="alert alert-success" role="alert">Data berhasil dihapus</div>
            <?php endif ?>
            <div class="table-responsive">
                <table class="table table-striped table-border">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $no = 1;
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['nama'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td>
                                <a href="tambah-admin.php?edit=<?php echo $row['id'] ?>" class="btn btn-success btn-sm">
                                    <span class="tf-icon bx bx-pencil bx-18px "></span>
                                </a>
                                <a onclick="return confirm('apakah anda yakin akan menghapus data ini??')"
                                    href="admin.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger btn-sm">
                                    <span class="tf-icon bx bx-trash bx-18px "></span>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.php'); ?>    