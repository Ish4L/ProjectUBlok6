<?php require_once 'session.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fonts.css">
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
    <title>Halaman Edit Data Dokter</title>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <?php include 'sidebar.php' ?>
        </div>
        
        <div class="section">
            <div class="container">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM tb_doctor WHERE doctor_id = '" . $_GET['id'] . "' ");
                if (mysqli_num_rows($query) == 0) {
                    echo '<script>window.location="doctor_data.php"</script>';
                }
                $d = mysqli_fetch_object($query);
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>Edit Data Dokter</h3>
                    <fieldset>
                        <label>Nama Dokter</label>
                        <input type="text" name="nama" value="<?= $d->doctor_name ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Bidang</label>
                        <input type="text" name="bidang" value="<?= $d->doctor_role ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Foto</label>
                        <img src="../img/doctor/<?= $d->doctor_img ?>" width="100px">
                        <input type="hidden" name="foto" value="<?= $d->doctor_img ?>">
                        <input type="file" name="gambar" placeholder="...Gambar Dokter..." class="form-control">
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Edit</button>
                    </fieldset>
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    // data inputan dari form
                    $nama       = $_POST['nama'];
                    $bidang     = $_POST['bidang'];
                    $foto       = $_POST['foto'];

                    // data gambar yang baru
                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    // jika admin ganti gambar
                    if ($filename != '') {
                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        $newname = 'dokter' . time() . '.' . $type2;

                        // menampung data format file yang diizinkan
                        $allowed_type = array('jpg', 'jpeg', 'png', 'gif');

                        // validasi format file
                        if (!in_array($type2, $allowed_type)) {
                            // jika format file tidak ada di dalam tipe diizinkan
                            echo '<script>alert("Format file tidak diizinkan")</script>';
                        } else {
                            unlink('../img/doctor/' . $foto);
                            move_uploaded_file($tmp_name, '../img/doctor/' . $newname);
                            $namagambar = $newname;
                        }
                    } else {
                        // jika admin tidak ganti gambar
                        $namagambar = $foto;
                    }

                    // query update data produk
                    $update = mysqli_query($conn, "UPDATE tb_doctor SET 
                                            doctor_name = '" . $nama . "',
                                            doctor_role = '" . $bidang . "',
                                            doctor_img = '" . $namagambar . "'
                                            WHERE doctor_id = '" . $d->doctor_id . "' ");

                    if ($update) {
                        echo '<script>alert("Ubah data berhasil")</script>';
                        echo '<script>window.location="doctor_data.php"</script>';
                    } else {
                        echo 'gagal ' . mysqli_error($conn);
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/script.js"></script>
</body>

</html>