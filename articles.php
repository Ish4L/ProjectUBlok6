<?php require_once 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Articles | RagaSense</title>
</head>
<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    
    <div class="section banner-articles">
        <h1>Discover Articles</h1>
        <p>“Discover a variety of health, lifestyle, and medical education articles all in one place.”</p>
    </div>

    <div class="section list-articles">
        <div class="card-container">
            <?php
                $article = mysqli_query($conn, "SELECT * FROM tb_article ORDER BY article_date DESC");
                $article_data = mysqli_fetch_all($article, MYSQLI_ASSOC);

                if(count($article_data) > 0) {
                    foreach($article_data as $a) {
            ?>
                    <a href="article.php?id=<?= $a['article_id'] ?>" class="card">
                        <img src="img/article/<?= $a['article_img'] ?>">
                        <div class="content">
                            <h3><?= $a['article_title'] ?></h3>
                            <p><?= date('d M Y', strtotime($a['article_date'])) ?></p>
                        </div>
                    </a>
            <?php }}else{ ?>
                <h3><i>Tidak ada artikel</i></h3>
            <?php } ?>
        </div>
    </div>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>