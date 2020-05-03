<?php session_start(); ?>

<!doctype html>
<html>

<head>
    <title>여행갤러리</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=divice-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="flexbox.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<?php include_once "upperNav.php"?>

<section class="cases-links" >

    <div class="wrapper" align="center">
        <h2>여행갤러리</h2>

        <input id=.btn.btn-orange type="button" align="right" value="글쓰기" onclick="location.href='boardwrite.php'">

        <div class="gallery-container">
        <?php
        include_once "DBconnect.php";

        $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "SQL stmt failed";
        }else{
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while($row = mysqli_fetch_assoc($result)){

                echo '
            <div class="gallery-items">
                <a href="#" >
                <div class="gallery-item" style="background-image: url(pics/'.$row["imgFullNameGallery"].');">
                </div>
                <div class="title"><strong>'.$row["titleGallery"].'</strong></div>
                <div class="desc">'.$row["descGallery"].'</div>
                </a>
            </div>
                ';
            }
        } ?>
        </div>
    </div>
</section>


</body>

</html>

