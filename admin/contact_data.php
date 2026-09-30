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
    <title>Halaman Data Contact</title>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <?php include 'sidebar.php' ?>
        </div>
        
        <div class="section">
            <h3 class="card-title">Data Contact</h3>
            <table class="table1">
                <tr>
                    <th>No</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Email</th>
                    <th>No. Telp</th>
                    <th>Subjek</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM tb_contact ORDER BY contact_id DESC");
                    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);

                    if (count($data) > 0) {
                        foreach($data as $d) {
                ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $d['fname'] ?></td>
                            <td><?= $d['lname'] ?></td>
                            <td><?= $d['email'] ?></td>
                            <td><?= $d['phone'] ?></td>
                            <td><?= $d['subject'] ?></td>
                            <td>"<?= $d['message'] ?>"</td>
                            <td>
                                <a href="delete.php?idc=<?= $d['contact_id'] ?>" onclick="return confirm('Yakin ingin hapus?')"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                <?php }}else{ ?>
                    <tr>
                        <td colspan="8">Tidak ada data</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="../js/script.js"></script>
</body>
</html>