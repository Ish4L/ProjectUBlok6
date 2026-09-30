<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>RagaSense | Register</title>
</head>
<body class="login">
    <div class="login-wrapper">
        <form action="" method="POST">
            <h1>Isi Data Anda</h1>
            <div class="input-box">
                <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" required>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-box">
                <input type="text" name="telpon" placeholder="Nomor Telpon" class="input-control" required>
                <i class="fa-solid fa-phone"></i>
            </div>
            <div class="input-box">
                <input type="text" name="alamat" placeholder="Alamat" class="input-control" required>
                <i class="fa-solid fa-location-dot"></i>
            </div>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" class="input-control" required>
                <i class="fa-solid fa-envelope"></i>
            </div>
            <br>
            <div class="input-box">
                <input type="text" name="user" placeholder="Username" class="input-control" required>
                <i class="fa-solid fa-user"></i>
            </div>
            <div class="input-box">
                <input type="text" name="pass" placeholder="Password" class="input-control" required>
                <i class="fa-solid fa-key"></i>
            </div>
            <button type="submit" name="submit" class="btn">Register</button>
            <p>Sudah punya akun? <a href="login.php"><b>Login</b></a></p>
        </form>
    </div>
        
    <?php
    require_once 'db.php';
    if (isset($_POST['submit'])) {
        $nama     = $_POST['nama'];
        $alamat   = $_POST['alamat'];
        $telpon   = $_POST['telpon'];
        $email    = $_POST['email'];
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (
            null,
            '" . $nama . "',
            '" . $username . "',
            '" . $password . "',
            '" . $telpon . "',
            '" . $email . "',
            '" . $alamat . "',
            'admin'
            ) ");

        if ($insert) {
            echo "<script>alert('Register Berhasil, Silahkan Login');window.location='login.php'</script>";
            echo "<script type='text/javascript'>window.location='login.php'</script>";
        } else {
            echo "<script>alert('Register Gagal');</script>";
            echo "<script type='text/javascript'>window.location='register.php'</script>";
        }
    }
    ?>
</body>

</html>