<?php 
require_once 'session.php';

$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION['id_login'] . "' ");
$a = mysqli_fetch_object($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fonts.css">
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
    <title>Dashboard Admin</title>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <?php include 'sidebar.php' ?>
        </div>

        <div class="section">
            <h2>Welcome, Admin <?= $a->admin_name; ?></h2>
        </div>
    </div>
    <script type="text/javascript" src="../js/script.js"></script>
</body>
</html>
