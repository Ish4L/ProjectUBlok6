<?php 
require_once 'session.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fonts.css">
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
    <title>Halaman Data Dokter</title>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <?php include 'sidebar.php' ?>
        </div>
        
        <div class="section">
            <h3>Data Dokter</h3>
            <p><a href="doctor_add.php" class="add-data">+Tambah Data</a></p>
            <table class="table1">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Bidang</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM tb_doctor ORDER BY doctor_id DESC");
                    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);

                    if (count($data) > 0) {
                        foreach($data as $d) {
                ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d['doctor_name'] ?></td>
                            <td><?= $d['doctor_role'] ?></td>
                            <td>
                                <a href="../img/doctor/<?= $d['doctor_img'] ?>" target="_blank">
                                    <img src="../img/doctor/<?= $d['doctor_img'] ?>" width="50px">
                                </a>
                            </td>
                            <td>
                                <a href="doctor_edit.php?id=<?= $d['doctor_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a> | 
                                <a href="delete.php?idd=<?= $d['doctor_id'] ?>" onclick="return confirm('Yakin ingin hapus?')"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                <?php }}else{ ?>
                    <tr>
                        <td colspan="5">Tidak ada data</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="../js/script.js"></script>
</body>
</html>