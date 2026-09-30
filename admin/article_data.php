<?php require_once 'session.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../css/fonts.css">
    <link rel="stylesheet" type="text/css" href="../css/styleadmin.css">
    <title>Halaman Data Artikel</title>
</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <?php include 'sidebar.php' ?>
        </div>
        
        <div class="section">
            <h3 class="card-title">Data Artikel</h3>
            <p><a href="article_add.php" class="add-data">+Tambah Data</a></p>
            <table class="table1">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Judul</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
                <?php
                    $no = 1;
                    $query = mysqli_query($conn, "SELECT * FROM tb_article ORDER BY article_id DESC");
                    $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
                    if (count($data) > 0) {
                        foreach($data as $d) {
                ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= date('d M Y', strtotime($d['article_date'])) ?></td>
                            <td><?= $d['article_title'] ?></td>
                            <td>
                                <a href="../img/article/<?= $d['article_img'] ?>" target="_blank">
                                    <img src="../img/article/<?= $d['article_img'] ?>" width="50px">
                                </a></td>
                            <td>
                                <a href="article_edit.php?id=<?= $d['article_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a> |
                                <a href="delete.php?ida=<?= $d['article_id'] ?>" onclick="return confirm('Yakin ingin hapus?')"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                <?php }}else{ ?>
                    <tr>
                        <td colspan="6">Tidak ada data</td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="../js/script.js"></script>
</body>

</html>