<?php require_once 'session.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fonts.css">
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
    <title>Halaman Tambah Arikel</title>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <?php include 'sidebar.php' ?>
        </div>
        
        <div class="section">
            <div class="container">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION['id_login'] . "' ");
                $d = mysqli_fetch_object($query);
                ?>
                <form class="article" action="" method="post" enctype="multipart/form-data">
                    <h3>Tambah Artikel</h3>
                    <fieldset>
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" placeholder="...Tanggal..." class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Judul Artikel</label>
                        <input type="text" name="judul" placeholder="...Judul Artikel..." class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Isi Artikel</label>
                        <textarea type="text" name="isi" placeholder="Isi Artikel" class="form-control" required></textarea><br>
                    </fieldset>
                    <fieldset>
                        <label>Gambar</label>
                        <input type="file" name="gambar" placeholder="...Gambar Artikel..." class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Tambah</button>
                    </fieldset>
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    // print_r($_FILES['gambar']);
                    // menampung inputan dari form
                    $tanggal     = $_POST['tanggal'];
                    $judul       = $_POST['judul'];
                    $isi      = $_POST['isi'];

                    // menampung data file yang diupload
                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    $type1 = explode('.', $filename);
                    // $type2 = $type1[1];
                    $type2 = strtolower(end($type1));

                    $newname = 'artikel' . time() . '.' . $type2;

                    // menampung data format file yang diizinkan
                    $allowed_type = array('jpg', 'jpeg', 'png', 'gif');

                    // validasi format file
                    if (!in_array($type2, $allowed_type)) {
                        // jika format file tidak ada di dalam tipe diizinkan
                        echo '<script>alert("Format file tidak diizinkan")</script>';
                    } else {
                        // jika format file sesuai dengan yang ada di dalam array tipe diizinkan
                        // proses upload file sekaligus insert ke database
                        move_uploaded_file($tmp_name, '../img/article/' . $newname);

                        $insert = mysqli_query($conn, "INSERT INTO tb_article VALUES (null, 
                                                '" . $tanggal . "',
                                                '" . $judul . "',
                                                '" . $isi . "',
                                                '" . $newname . "') ");

                        if ($insert) {
                            echo '<script>alert("Tambah data berhasil")</script>';
                            echo '<script>window.location="article_data.php"</script>';
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