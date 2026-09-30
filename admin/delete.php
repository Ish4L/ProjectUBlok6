<?php
require_once '../db.php';

if (isset($_GET['idd'])) {
    $doctor = mysqli_query($conn, "SELECT doctor_img FROM tb_doctor WHERE doctor_id = '" . $_GET['idd'] . "' ");
    $d = mysqli_fetch_object($doctor);

    unlink('doctor/' . $d->doctor_img);
    $delete = mysqli_query($conn, 'DELETE FROM tb_doctor WHERE doctor_id = "' . $_GET['idd'] . '" ');
    echo '<script>window.location="doctor_data.php"</script>';
}

if (isset($_GET['ida'])) {
    $article = mysqli_query($conn, "SELECT article_img FROM tb_article WHERE article_id = '" . $_GET['ida'] . "' ");
    $a = mysqli_fetch_object($article);

    unlink('produk/' . $a->article_img);
    $delete = mysqli_query($conn, 'DELETE FROM tb_article WHERE article_id = "' . $_GET['ida'] . '" ');
    echo '<script>window.location="post_data.php"</script>';
}

if (isset($_GET['idc'])) {
    $delete = mysqli_query($conn, 'DELETE FROM tb_contact WHERE contact_id = "' . $_GET['idc'] . '" ');
    echo '<script>window.location="contact_data.php"</script>';
}
?>