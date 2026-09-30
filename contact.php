<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Contact | RagaSense</title>
</head>
<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>

    <div class="section banner-contact">
        <h1>Contact Us</h1>
        <p>“Have questions or need professional guidance? RagaSense is here to support you anytime.”</p>
    </div>

    <div class="section form-contact">
        <div class="form-wrapper">
            <form action="" method="POST">
                <h2>Contact Form</h2>
                <div class="input-row">
                    <div class="input-group">
                        <label>Front Name*</label>
                        <input type="text" name="fname" placeholder="Front Name" required>
                    </div>
                    <div class="input-group">
                        <label>Back Name*</label>
                        <input type="text" name="lname" placeholder="Back Name" required>
                    </div>
                </div>
                <div class="input-row">
                    <div class="input-group">
                        <label>Email Address*</label>
                        <input type="text" name="email" placeholder="Email" required>
                    </div>
                    <div class="input-group">
                        <label>Phone Number*</label>
                        <input type="text" name="phone" placeholder="Phone" required>
                    </div>
                </div>
                <div class="input-group">
                    <label>Subject*</label>
                    <input type="text" name="subject" placeholder="Subject" required>
                </div>
                <div class="input-group">
                    <label>Message*</label>
                    <textarea name="message" placeholder="Enter messages..." required></textarea>
                </div>
                <input type="submit" name="submit" value="Submit" class="btn">
            </form>

            <?php
            require_once 'db.php';
            if (isset($_POST['submit'])) {
                $fname   = $_POST['fname'];
                $lname   = $_POST['lname'];
                $email   = $_POST['email'];
                $phone   = $_POST['phone'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];

                $insert = mysqli_query($conn, "INSERT INTO tb_contact VALUES (
                    null,
                    '" . $fname . "',
                    '" . $lname . "',
                    '" . $email . "',
                    '" . $phone . "',
                    '" . $subject . "',
                    '" . $message . "'
                    ) ");

                if ($insert) {
                    echo "<script>alert('Pesan Terkirim');window.location='contact.php'</script>";
                    echo "<script type='text/javascript'>window.location='contact.php'</script>";
                } else {
                    echo "<script>alert('Pesan Gagal Terkirim');</script>";
                    echo "<script type='text/javascript'>window.location='contact.php'</script>";
                }
            }
            ?>
        </div>
    </div>

    <div class="section cardInfo-contact">
        <div class="card-container odd">
            <h3><img src="icon/icon-location.svg" alt="">Location</h3>
            <p class="desc">
                Access our services with ease.
            </p>
                <br><hr>
            <p class="info">
                Jl. Cakrawala Sehat No. 101, Emerald District, Veloria
            </p>
        </div>
        <div class="card-container even">
            <h3><img src="icon/icon-contact.svg" alt="">Contact</h3>
            <p class="desc">
                Available to assist you anytime.
            </p>
                <hr>
            <p class="info">
                +62 21 5550 1234<br>
            </p>
        </div>
        <div class="card-container odd">
            <h3><img src="icon/icon-email.svg" alt="">Email</h3>
            <p class="desc">
                Email us to explore collaboration opportunities.
            </p>
                <hr>
            <p class="info">
                info@ragasense.com<br><br>
            </p>
        </div>
    </div>

    <footer>
        <?php include 'footer.php'; ?>
    </footer>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>