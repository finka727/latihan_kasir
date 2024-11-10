<?php
session_start();
session_regenerate_id();
require_once "koneksi.php";
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $selectLogin = mysqli_query($koneksi, "SELECT * FROM admin WHERE email = '$email'");
    if (mysqli_num_rows($selectLogin) > 0) {
        $row = mysqli_fetch_assoc($selectLogin);

        if ($row['email'] == $email && $row['password'] == $password) {
            $_SESSION['ID'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['nama'] = $row['nama'];
            header("Location:admin/home.php");
            exit();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-5.3.3/bootstrap-5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
   
    <div class="container justify-content-center">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h1>Login</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mt-2">
                                <label class="form-label" for="">Email</label>
                                <input class="form-control" type="email" name="email" placeholder="Isi email anda" required>
                            </div>
                            <div class="mt-3">
                                <label class="form-label" for="">Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Isi password anda!" required>
                            </div>
                            <div class="mt-3" align="right">
                                <button class="btn btn-primary" type="submit" name="login">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="bootstrap-5.3.3/bootstrap-5.3.3/dist/js/bootstrap.bundle.min.js">
</body>
</html>