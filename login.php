<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Login | RagaSense</title>
</head>
<body class="login">
    <a href="index.php" class="home-link">
        <i class="fa-solid fa-angle-left"></i>
        Home
    </a>

    <div class="section form-login">
        <div class="login-wrapper">
            <form action="" method="POST">
                <h1>Admin Login</h1>
                <div class="input-box">
                    <input type="text" name="user" placeholder="Username">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="pass" placeholder="Password">
                    <i class="fa-solid fa-key"></i>
                </div>
                <button type="submit" name="submit" class="btn">Login</button>
                <!-- <p>Belum Punya akun? <a href="register.php"><b>Register</b></a></p> -->
            </form>
        </div>
    </div>

    <?php
    require_once 'db.php';
    if(isset($_POST['submit'])) {
        $username = $_POST['user'];
        $password = $_POST['pass'];

        $sql = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username='$username' AND password='$password'")
        or die(mysqli_error());

        if(mysqli_num_rows($sql) == 0){
            echo "<script>alert('Username / Password salah!')</script>";
            echo '<script type="text/javascript">window.location="login.php"</script>';

        }else{
            session_start();

            $row = mysqli_fetch_assoc($sql);
            $_SESSION['id_login']   = $row['admin_id'];
            $_SESSION['level']      = $row['level'];
            $_SESSION['status_login'] = true;

            if($row['level'] == 'admin'){
                echo "<script>alert('Login Berhasil')</script>";
                echo '<script type="text/javascript">window.location="admin/dashboard.php"</script>';

            }elseif($row['level'] == 'pelanggan'){
                echo "<script>alert('Login Berhasil')</script>";
                echo '<script type="text/javascript">window.location="user/dashboard_user.php"</script>';

            }else{
                header('location:index.php');
            }
        }
    }
    ?>
</body>
</html>