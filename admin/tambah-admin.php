<?php
session_start();
include '../koneksi.php';

// jika button simpan ditekan
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    if (!empty($_FILES['foto']['name'])) {
        $nama_foto = $_FILES['foto']['name'];
        $ukuran_foto = $_FILES['foto']['size'];

        // png, jpg, jpeg
        $ext = array('png', 'jpg', 'jpeg');
        $extFoto = pathinfo($nama_foto, PATHINFO_EXTENSION);

        // JIKA EXTENSI FOTO TIDAK ADA EXT YANG TERDAFTAR DI ARRAY EXT
        if (!in_array($extFoto, $ext)) {
            echo "Ext tidak ditemukan";
            die;
        } else {
            // pindahkan gambar dari tmp folder ke folder yang sudah kita buat
            move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $nama_foto);
            $insert = mysqli_query($koneksi, "INSERT INTO admin (nama, email, password, phone, foto) VALUES ('$nama','$email','$password','$phone','$nama_foto')");
        }
    } else {
        $insert = mysqli_query($koneksi, "INSERT INTO admin (nama, email, password, phone) VALUES ('$nama','$email','$password','$phone')");
    }

    header("location:admin.php?tambah=berhasil");
}

$id = isset($_GET['edit']) ? $_GET['edit'] : '';
$queryEdit = mysqli_query($koneksi, "SELECT * FROM admin WHERE id ='$id'");
$rowEdit = mysqli_fetch_assoc($queryEdit);

//jika button edit di klik

if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // jika user ingin memasukkan gambar
    if (!empty($_FILES['foto']['name'])) {
        $nama_foto = $_FILES['foto']['name'];
        $ukuran_foto = $_FILES['foto']['size'];

        // png, jpg, jpeg
        $ext = array('png', 'jpg', 'jpeg');
        $extFoto = pathinfo($nama_foto, PATHINFO_EXTENSION);

        if (!in_array($extFoto, $ext)) {
            echo "Extensi gambar tidak ditemukan";
            die;
        } else {
            unlink('upload/' . $rowEdit['foto']);
            move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/' . $nama_foto);
            $update = mysqli_query($koneksi, "UPDATE admin SET nama='$nama',email='$email',password='$password',phone='$phone',foto='$nama_foto' WHERE id='$id'");
            //coding ubah/update disini
        }
    } else {
        // kalo user tidak ingin memasukkan gambar
        $update = mysqli_query($koneksi, "UPDATE admin SET nama='$nama',email='$email',password='$password',phone='$phone' WHERE id='$id'");
    }
    header("location:admin.php?ubah=berhasil");
}
?>


<?php include('inc/header.php'); ?>

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-sm-12">
            <div class="card mt-4 shadow-sm">
                <div class="card-header"><?php echo isset($_GET['edit']) ? 'Edit' : 'Tambah' ?> Admin</div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3 row">
                                <div class="col-sm-6">
                                    <label for="" class="form-label">Nama</label>
                                    <input type="text"
                                        class="form-control"
                                        name="nama"
                                        placeholder="Masukkan Nama Anda"
                                        value="<?php echo isset($_GET['edit']) ? $rowEdit['nama'] : '' ?>"
                                        required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email"
                                        class="form-control"
                                        name="email"
                                        placeholder="Masukkan Email Anda"
                                        value="<?php echo isset($_GET['edit']) ? $rowEdit['email'] : '' ?>"
                                        required>
                                </div>
                                <div class="col-sm-6 pt-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="password"
                                        class="form-control"
                                        name="password"
                                        placeholder="Masukkan Password Anda"
                                        value="<?php echo isset($_GET['edit']) ? $rowEdit['password'] : '' ?>"
                                        required>
                                </div>
                                <div class="col-sm-6 pt-3">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="number"
                                        class="form-control"
                                        name="phone"
                                        placeholder="Masukkan Nomor telephone Anda"
                                        value="<?php echo isset($_GET['edit']) ? $rowEdit['phone'] : '' ?>"
                                        required>
                                </div>
                            </div>    
                             <div class="mb-3">
                                <button class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'simpan' ?>" type="submit">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>                        
            </div>
        </div>
    </div>
</div>

<?php include('inc/footer.php'); ?>    