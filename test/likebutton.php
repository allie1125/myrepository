<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
<!--    Font Awesome 4.7.0      -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            font-family: Verdana;
            display:flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        a{
            color: #00000030;
            font-size: 3em;
        }
        .heart i.fa-heart{
            color: #f44336;
        }
        .heart{
            animation: heart 0.5s linear;
        }
        @keyframes heart {
            0%{
                transform: rotate(0deg) scale(1.7);
            }
            40%{
                transform: rotate(0deg) scale(1);
            }
            41%{
                transform: rotate(360deg) scale(1);
            }
            100%{
                transform: rotate(0deg) scale(1.7);
            }

        }
    </style>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

</head>
<body>

<a href="#" class="like">
    <i class="fa fa-heart" aria-hidden="true"></i>
</a>

<?php
require_once "DBconnect.php";


?>

<script>
    // $(document).ready(function(){
    //     $(".like").click(function () {
    //         $(this).toggleClass("heart");
    //
    //     });
    // });

    jQuery(function () {
        $(".like").on("click",function () {
            $(this).toggleClass("heart");
        });
    });
</script>
</body>
</html><!--        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>-->
