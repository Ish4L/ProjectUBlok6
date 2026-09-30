<?php require_once 'session.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fonts.css">
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
    <title>Halaman Edit Artikel</title>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <?php include 'sidebar.php' ?>
        </div>
        
        <div class="section">
            <div class="container">
                <?php
                $query = mysqli_query($conn, "SELECT * FROM tb_article WHERE article_id = '" . $_GET['id'] . "' ");
                if (mysqli_num_rows($query) == 0) {
                    echo '<script>window.location="article_data.php"</script>';
                }
                $a = mysqli_fetch_object($query);
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>Edit Data Artikel</h3>
                    <fieldset>
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" value="<?= $a->article_date ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Judul</label>
                        <input type="text" name="judul" value="<?= $a->article_title ?>" class="form-control" required>
                    </fieldset>
                    <fieldset>
                        <label>Isi Artikel</label>
                        <textarea type="text" name="isi" value="<?= $a->article_content ?>" placeholder="Isi Artikel" class="form-control" required><?= $a->article_content ?></textarea><br>
                    </fieldset>
                    <fieldset>
                        <label>Gambar</label>
                        <img src="../img/article/<?= $a->article_img ?>" width="100px">
                        <input type="hidden" name="foto" value="<?= $a->article_img ?>">
                        <input type="file" name="gambar" placeholder="...Gambar Artikel..." class="form-control">
                    </fieldset>
                    <fieldset>
                        <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Edit</button>
                    </fieldset>
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    // data inputan dari form
                    $tanggal    = $_POST['tanggal'];
                    $judul      = $_POST['judul'];
                    $isi        = $_POST['isi'];
                    $foto       = $_POST['foto'];

                    // data gambar yang baru
                    $filename = $_FILES['gambar']['name'];
                    $tmp_name = $_FILES['gambar']['tmp_name'];

                    // jika admin ganti gambar
                    if ($filename != '') {
                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        $newname = 'artikel' . time() . '.' . $type2;

                        // menampung data format file yang diizinkan
                        $allowed_type = array('jpg', 'jpeg', 'png', 'gif');

                        // validasi format file
                        if (!in_array($type2, $allowed_type)) {
                            // jika format file tidak ada di dalam tipe diizinkan
                            echo '<script>alert("Format file tidak diizinkan")</script>';
                        } else {
                            unlink('../img/article/' . $foto);
                            move_uploaded_file($tmp_name, '../img/article/' . $newname);
                            $namagambar = $newname;
                        }
                    } else {
                        // jika admin tidak ganti gambar
                        $namagambar = $foto;
                    }

                    // query update data produk
                    $update = mysqli_query($conn, "UPDATE tb_article SET 
                                            article_date     = '" . $tanggal . "',
                                            article_title    = '" . $judul . "',
                                            article_content  = '" . $isi . "',
                                            article_img      = '" . $namagambar . "'
                                            WHERE article_id = '" . $a->article_id . "' ");

                    if ($update) {
                        echo '<script>alert("Ubah data berhasil")</script>';
                        echo '<script>window.location="article_data.php"</script>';
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