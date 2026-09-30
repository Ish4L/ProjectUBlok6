<?php 
    require_once 'db.php'; 
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM tb_article WHERE article_id = '$id'");
    $article = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title><?= $article['article_title'] ?> | RagaSense</title>
</head>
<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>

    <div class="section title-article">
        <h1><?= $article['article_title'] ?></h1>
    </div>

    <div class="section content-article">
        <div class="content-wrapper">
            <a href="#" onclick="history.back(); return false;">
                <i class="fa-solid fa-angle-left"></i> 
                Back
            </a>

            <img src="img/article/<?= $article['article_img'] ?>" alt="">
            <p class="date"><?= date('d M Y', strtotime($article['article_date'])) ?></p>
            <p><?= nl2br(trim($article['article_content'])) ?></p><br>

            <a href="#" onclick="history.back(); return false;">
                <i class="fa-solid fa-angle-left"></i>
                Back
            </a>
        </div>
    </div>
    
    <footer>
        <?php include 'footer.php'; ?>
    </footer>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>