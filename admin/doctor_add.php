<?php 
require_once 'session.php'; 

// $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION['id_login'] . "' ");
// $d = mysqli_fetch_object($query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fonts.css">
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
    <title>Halaman Tambah Data Dokter</title>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <?php include 'sidebar.php' ?>
        </div>
        
        <div class="section">
            <div class="container">
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>Tambah Dokter</h3>
                    <fieldset>
                        <label>Nama Dokter</label>
                        <input type="text" name="nama" placeholder="...Nama Dokter..." class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Bidang</label>
                        <input type="text" name="bidang" placeholder="...Nama Bidang..." class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Foto</label>
                        <input type="file" name="foto" placeholder="...Foto Dokter..." class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Tambah</button>
                    </fieldset>
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    // print_r($_FILES['gambar']);
                    // menampung inputan dari form
                    $nama       = $_POST['nama'];
                    $bidang      = $_POST['bidang'];

                    // menampung data file yang diupload
                    $filename = $_FILES['foto']['name'];
                    $tmp_name = $_FILES['foto']['tmp_name'];

                    $type1 = explode('.', $filename);
                    // $type2 = $type1[1];
                    $type2 = strtolower(end($type1));

                    $newname = 'dokter' . time() . '.' . $type2;

                    // menampung data format file yang diizinkan
                    $allowed_type = array('jpg', 'jpeg', 'png', 'gif');

                    // validasi format file
                    if (!in_array($type2, $allowed_type)) {
                        // jika format file tidak ada di dalam tipe diizinkan
                        echo '<script>alert("Format file tidak diizinkan")</script>';
                    } else {
                        // jika format file sesuai dengan yang ada di dalam array tipe diizinkan
                        // proses upload file sekaligus insert ke database
                        move_uploaded_file($tmp_name, '../img/doctor/' . $newname);

                        $insert = mysqli_query($conn, "INSERT INTO tb_doctor VALUES (null, '" . $nama . "', '" . $bidang . "', '" . $newname . "') ");

                        if ($insert) {
                            echo '<script>alert("Tambah data berhasil")</script>';
                            echo '<script>window.location="doctor_data.php"</script>';
                        } else {
                            echo 'gagal ' . mysqli_error($conn);
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/script.js"></script>
</body>

</html>