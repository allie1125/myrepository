<!doctype html>
<html>
<head>
    <title>Travel Together - 메인</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=divice-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>



    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }


        .welcomeMsg{
            color: white;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }

        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial;
        }

        </style>
        </head>
        <body>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="main1.php"><strong>Travel Together</strong></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">홈</a></li>
                        <li><a href="boardlist.php ">동행구하기</a></li>
                        <li><a href="travelgallery.php">여행후기</a></li>
                        <li><a href="#">공동구매</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <?php
                        if (!isset($_SESSION['is_login'])){?>

                            <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> 로그인</a></li>
                            <li><a href="register.php"> 회원가입</a></li>

                        <?php }else{
                            $id=$_SESSION['id_string'];
                            ?>
                            <li class = welcomeMsg><a><?php echo $id.'님, 환영합니다.'?></a> </li>
                            <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> 로그아웃</a></li>
                            <li><a href="mypage.php"> 마이페이지</a></li>

                        <?php }?>

                    </ul>
                </div>
            </div>
        </nav>

        </body>
</html>