<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="teststyle.css">
</head>
<body>

<section class="gallery-links">

<div class="wrapper">
    <h2 class="gallery-links-h2">갤러리</h2>

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
    <a href="#" class="gallery-pics">
        <div class="gallery-img1" style="background-image: url(pics/'.$row["imgFullNameGallery"].');"></div>
    <p>'.$row["titleGallery"].'</p>
    </a>';
    }
    } ?>
    </div>
<!--    <div class="gallery-container">-->
<!---->
<!--        <a href="#">-->
<!--            <div></div>-->
<!--            <h3>Title</h3>-->
<!--            <p>Paragraph</p>-->
<!--        </a>-->
<!---->
<!--        <a href="#">-->
<!--            <div></div>-->
<!--            <h3>Title</h3>-->
<!--            <p>Paragraph</p>-->
<!--        </a>-->
<!---->
<!--        <a href="#">-->
<!--            <div></div>-->
<!--            <h3>Title</h3>-->
<!--            <p>Paragraph</p>-->
<!--        </a>-->
<!---->
<!--    </div>-->
</div>


<!--        <a href="#" class="gallery-img">-->
<!--            <img src="waterfall.jpg" alt="gallery image" width="200px">-->
<!--        </a>-->
<!--        <a href="#" class="gallery-img">-->
<!--            <img src="waterfall.jpg" alt="gallery image" width="200px">-->
<!--        </a>-->
<!--        <a href="#" class="gallery-img">-->
<!--            <img src="waterfall.jpg" alt="gallery image" width="200px">-->
<!--        </a>-->
<!--        <a href="#" class="gallery-img">-->
<!--            <img src="waterfall.jpg" alt="gallery image" width="200px">-->
<!--        </a>-->
<!--        <a href="#" class="gallery-img">-->
<!--            <img src="waterfall.jpg" alt="gallery image" width="200px">-->
<!--        </a>-->
<!--        <a href="#" class="gallery-img">-->
<!--            <img src="waterfall.jpg" alt="gallery image" width="200px">-->
<!--        </a>-->
<!--        <a href="#" class="gallery-img">-->
<!--            <img src="waterfall.jpg" alt="gallery image" width="200px">-->
<!--        </a>-->
</section>

</body>
</html>