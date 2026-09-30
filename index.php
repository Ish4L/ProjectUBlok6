<?php require_once 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>RagaSense</title>
</head>
<body>
    <header class="header-homepage">
        <?php include 'navbar.php'; ?>
    </header>

    <div class="section hero-homepage">
        <h1>Shape the Body, <br>Refine the Senses</h1>
        <p>Begin with small steps today toward a healthier body and a more meaningful future.</p>
        <img src="img/doctor.png" alt="">
    </div>

    <div class="section about-homepage">
        <h2>About<br>RagaSense</h2>
        <div class="content">
            <p>In today's digital era, where speed and accuracy are essential, RagaSense serves as an integrated healthcare platform that combines artificial intelligence with professional medical expertise to deliver responsive, accurate, and accessible healthcare services. We are committed to helping individuals and organizations create healthier lives and work environments through preventive solutions, real-time consultations, and trusted health education.</p>  
            <div class="buttons">
                <a href="about.php"><button>Learn More</button></a>
                <a href="contact.php"><button>Contact Us</button></a>
            </div>
        </div>
    </div>

    <div class="section service-homepage">
        <h2>Featured Services</h2>
        <div class="card-container">
            <div class="card-service">
                <img src="icon/icon-clinic.svg" alt="">
                <h3>Clinic Service</h3><hr>
                <p>Providing access to professional healthcare services through timely, measurable, and high-quality care delivered by experienced medical professionals.</p>
            </div>
            <div class="card-service">
                <img src="icon/icon-clipboard.svg" alt="">
                <h3>Consultation Service</h3><hr>
                <p>Providing personalized health consultations and corporate wellness programs to help maintain productivity and improve quality of life.</p>
            </div>
            <div class="card-service">
                <img src="icon/icon-article.svg" alt="">
                <h3>Health Articles</h3><hr>
                <p>Providing reliable health information and education to help people understand and adopt healthy lifestyle practices.</p>
            </div>
        </div>
    </div>

    <div class="section doctor-homepage">
        <h2>Meet Our Experts</h2>
        <div class="card-container">
            <?php 
                $doctor = mysqli_query($conn, "SELECT * FROM tb_doctor");
                $doctor_data = mysqli_fetch_all($doctor, MYSQLI_ASSOC);
                if(count($doctor_data) > 0) {
                    foreach($doctor_data as $d) {
            ?>
                    <div class="card doctor">
                        <img src="img/doctor/<?= $d['doctor_img'] ?>">
                        <p><?= $d['doctor_role'] ?></p>
                        <h3><?= $d['doctor_name'] ?></h3><br>
                    </div>
            <?php }}else{ ?>
                <h3><i>No data</i></h3>
            <?php } ?>
        </div>
    </div>

    <div class="section article-homepage">
        <div class="title">
            <h2>Newest Article</h2>
            <a href="articles.php"><button>View More</button></a>
        </div>
        <div class="card-container">
            <?php
                $article = mysqli_query($conn, "SELECT * FROM tb_article ORDER BY article_date DESC LIMIT 4");
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
                <h3><i>No articles</i></h3>
            <?php } ?>
        </div>
    </div>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>