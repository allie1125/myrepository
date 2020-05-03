<!--이해 못한 부분-->
<?php
//include('DBconnect.php');
//include ('check.php');
//
//if (is_login()) {
//
//    if ($_SESSION['user_id'] == 'admin' && $_SESSION['is_admin'] == 1)
//        header("Location: admin.php");
//    else
//        header("Location: upperNav.php");
//}
//
//function validataPassword($password){
//    //begin basic testing
//    if(strlen($password) < 8 || empty($password)){
//        return 0; //returns 0 if : password is too short (<8 characters) OR doesn't exitst.
//    }
//    if((strlen($password) > 48)){
//        return 0; // returns 0 if: password is too long (>48 characters)
//    }
//    //end basic length tests
//
//    //begin more advanced testing
//    if(preg_match('/[A-Z]/',$password) == (0 || false)){
//        return 1; //return 1 if: password does not contain upper case letter;
//    }
//    if(!preg_match('/[\d]/',$password) != (0 || false)){
//        return 2; //return 2 if: password does not contain digits
//    }
//    if(preg_match('/[\W]/',$password) == (0 || false)){
//        return 3; //return 3 if: password does not contain any special characters
//    }
//    return true;
//}
//
//if( ($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST['submit'])){
//    foreach ($_POST as $key => $val){
//        if(preg_match('#^__autocomplete_fix_#', $key) ===1){
//            $n = substr($key,19);
//            if(isset($_POST[$n])){
//                $_POST[$val] = $_POST[$n];
//            }
//        }
//    }
//
//    $username = $_POST['newusername'];
//    $password = $_POST['newpassword'];
//    $confirmpassword=$_POST['newconfirmpassword'];
//    $userprofile=$_POST['newuserprofile'];
//
//    if($_POST['newpassword'] != $_POST['newconfirmpassword']){
//        $errMSG = "패스워드가 일치하지 않습니다.";
//    }
//    if (empty($username)){
//        $errMSG = "아이디를 입력하세요.";
//    }
//    elseif (empty($password)){
//        $errMSG = "패스워드를 입력하세요.";
//    }
//    elseif (empty($userprofile)){
//        $errMSG = "프로필을 입력하세요.";
//    }
//
//    try{
//        $stmt = $con -> prepare('select * from users where username=:username');
//        $stmt -> bindParam(':username',$username);
//        $stmt -> execute();
//    }catch (PDOException $e){
//        die("Database error: " . $e->getMessage());
//    }
//    $row = $stmt ->fetch();
//    if($row){
//        $errMSG = "이미 존재하는 아이디입니다.";
//    }
//
//    If(!isset($errMSG)){
//        try{
//            $stmt = $con->prepare('INSERT INTO users(username,password,userprofile,salt) VALUES (:username, :password, :userprofile, :salt)');
//            $stmt->bindParam(':username',$username);
//            $salt = bin2hex(openssl_random_pseudo_bytes(32));
//            $encrypted_password = base64_encode(encrypt($password,$salt));
//            $stmt->bindParam(':password',$encrypted_password);
//            $stmt->bindParam(':userprofile',$userprofile);
//            $stmt->bindParam(':salt',$salt);
//
//            if($stmt->execute()){
//                $successMSG = "새로운 사용자를 추가했습니다.";
//                header("refresh:1;index.php");
//            }
//            else{
//                $errMSG = "사용자 추가 에러";
//            }
//        }catch (PDOException $e){
//            die("Database error: " . $e->getMessage());
//        }
//    }
//}
//include (head.php);
//   ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="content-type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>회원가입</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
        #container{
            position: relative;
            left: 15%;
        }
        #editbtn{
            width: 30%;
            position: relative;
            left: 35%;
        }
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container">
    <div class="py-5 text-center">
        <h2>회원가입</h2>
        <p class="lead">아래 칸에 정보를 입력하여 회원가입을 진행하세요.</p>
    </div>

    <!--    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">-->
    <!--여기부터 가운데 정렬-->
    <hr class="mb-4">
    <div id = "container">
        <!-- 사용자기입내용 -->
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">필수 가입 정보</h4>
            <br class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="id_string">아이디</label>
                    <form method="post" action="registerprocess.php">
                        <input type="text" class="form-control" id="id_string" name="id_string" placeholder="" value=""  required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                </div>
            </div>


            <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="email">이메일</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="" value=""  required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                    </div>

<!--                    <div class="col-md-6 mb-3">-->
<!--                    <label for="email"></label>-->
<!--                        <div class="selectBox">-->
<!--                            <select name="select_email" id="select_email">-->
<!--                                <option value="@naver.com">@naver.com</option>-->
<!--                                <option value="@gmail.com">@gmail.com</option>-->
<!--                                <option value="@daum.net">@daum.net</option>-->
<!--                                <option value="@nate.com">@nate.com</option>-->
<!--                                <option value="직접입력">직접입력</option>-->
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
                
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="password">비밀번호</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="confirmpassword">비밀번호 재확인</label>
                    <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="name">이름</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>
            </div>

            <div class="col-md-6 mb-3">성별

                <!--                <div class="d-block my-3">-->
                <div class="custom-control custom-radio">
                    <input id="female" name="gender" type="radio" value="female" class="custom-control-input" checked="true" checked required>
                    <label class="custom-control-label" for="female">여성</label>
                </div>
                <div class="custom-control custom-radio">
                    <input id="male" name="gender" type="radio" value="male" class="custom-control-input" checked required>
                    <label class="custom-control-label" for="male">남성</label>
                </div>
            </div>

            <hr class="mb-4">
            <h4 class="mb-3">선호하는 여행 스타일 <span class="text-muted">(선택)</span></h4>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="travelType[]" id="travelType_healing" value="_healing" >
                <label class="custom-control-label" for="travelType_healing">여유있는 여행</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="travelType[]" id="travelType_tour" value="_tour">
                <label class="custom-control-label" for="travelType_tour">알찬 스케쥴 여행</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="travelType[]" id="travelType_food" value="_food" >
                <label class="custom-control-label" for="travelType_food">먹거리 위주 여행</label>
            </div>

            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="travelType[]" id="travelType_photo" value="_photo">
                <label class="custom-control-label" for="travelType_photo">인생샷 여행</label>
            </div>
            <br/>
        </div>
        <!--여기까지 가운데 정렬-->


    </div>
    <!--                <hr class="mb-4">-->
    <div id = editbtn>
        <input type="submit" class="btn btn-primary btn-lg btn-block" name="submit" type="submit" value="회원가입"></input><br>
    </div>
    </form>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script><script src="/docs/4.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>
<script src="form-validation.js"></script>

<?php
//$fullUrl = "http://$_SERVER[HTTP_HOST]$SERVER[REQUEST_URI]";
//
//if (strpos($fullUrl, "signup=empty") == true){
//    echo "<p>입력사항을 모두 기입하세요.</p>";
//    exit();
//}elseif (strpos($fullUrl, "signup=char") == true){
//    echo "<p>유효하지 않은 문자입니다.</p>";
//    exit();
//}elseif (strpos($fullUrl, "signup=email") == true){
//    echo "<p>유효하지 않은 이메일형식입니다.</p>";
//    exit();
//}elseif (strpos($fullUrl, "signup=success") == true){
//    echo "<p>회원가입 되었습니다.</p>";
//    exit();
//}

//if (!isset($_GET['signup'])){
//    exit();
//}else{
//    $_signupCheck = $_GET['signup'];
//
//    if ($_signupCheck == "empty"){
//        echo "<p>입력사항을 모두 기입하세요.</p>";
//        exit();
//    }elseif ($_signupCheck == "char"){
//        echo "<p>유효하지 않은 문자입니다.</p>";
//        exit();
//    }elseif ($_signupCheck == "email"){
//        echo "<p>유효하지 않은 이메일형식입니다.</p>";
//        exit();
//    }elseif ($_signupCheck == "success"){
//        echo "<p>회원가입 되었습니다.</p>";
//        exit();
//    }
//}
?>

</body>
</html>


<!--이해못한부-->
<?php
//include "../db.php";
//include "../password.php";
//
//$userid = $_POST['userid'];
//$userpw = password_hash($_POST['userpw'], PASSWORD_DEFAULT);
//$username = $_POST['name'];
//$gender = $_POST['gender'];
//
//$sql = mq("insert into member (id,pw,name,gender) values ('".$userid."','".$userpw."','".$username."','".$gender."')");
//    ?>
<!--<meta charset ="utf-8"/>-->
<!--<script type="text/javascript">alert ('회원가입이 완료되었습니다.')</script>-->
<!--<meta http-equiv="refresh" content="0 url=/">-->
