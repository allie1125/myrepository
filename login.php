

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>로그인</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<//link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    #inputbox{
        width: 20%;
        margin: 0 auto;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>
<!-- Custom styles for this template -->
<link href="signin.css" rel="stylesheet">
</head>
<div id="inputbox">
<body class="text-center">

<form class="form-signin" method="post" action="loginprocess.php">
<!--    <img class="mb-4" src="/docs/4.3/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">-->
    <p></p>
    <h1 class="h3 mb-3 font-weight-normal">로그인</h1>

<!--    <form method="post" action="check.php">-->

    <label for="loginid" class="sr-only">Id</label>
    <input type="text" id="loginId" name="loginId" class="form-control" placeholder="아이디" required autofocus>
    <label for="loginpw" class="sr-only">Password</label>
    <input type="password" id="loginPw" name="loginPw" class="form-control" placeholder="비밀번호" required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" id="remember" name="remember" value="1"> 아이디 기억하기
        </label>
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit">로그인</button>
</div>
<!--</form>-->

<div class="py-5 text-center text-muted"><p><u><a href="register.php">아직 회원이 아니신가요?</a> </u></p></div>

</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" 
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" 
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" 
crossorigin="anonymous"></script>

</body>
</html>
<?php

//아이디쿠키가 있으면,
if (isset($_COOKIE['id'])){
    //아이디 란에 쿠키 아이디 자동 입력
    $id = $_COOKIE['id'];
    echo "<script>
$('input[name=remember]').attr('checked',true);

        document.getElementById('loginId').value = '$id';
</script>";
}else{
    //아이디쿠키가 없으면, 기존쿠키 삭제
    echo "<script> 
$('input[name=remember]').attr('checked',false);
</script>";
}
?>

<!--//$userid = $_POST["id"];-->
<!--//$userpw = $_POST["password"];-->
<!--//-->
<!--//$sql = "SELECT * FROM membertbl WHERE id ='{$userid}' AND password='{$userpw}'";-->
<!--//$res = $connect -> query($sql);-->
<!--//-->
<!--//$row = $res -> fetch_array(MYSQLI_ASSOC);-->
<!--//-->
<!--//if($row != null){-->
<!--//    $_SESSION['id'] = $row['id'];-->
<!--//    echo $_SESSION['id'].'님 안녕하세요.';-->
<!--//    echo '';-->
<!--//    if ($row == null){-->
<!--//        echo '아이디와 비밀번호를 확인하세요.';-->
<!--//    }-->
<!--//}-->
<!---->
<!---->
<!--?>-->

