<?php

include "DBconnect.php";

mysqli_select_db($conn,$user);

//사용자의 입력 아이디&비밀번호를 변수에 담기.
$inputId = $_POST['loginId'];
$inputPw = $_POST['loginPw'];

//memberTable 에서 id_string 값이 사용자의 입력값과 일치하는 행만을 가져오기.
$sql = "SELECT * FROM memberTable WHERE id_string = '$inputId'LIMIT 1";
//쿼리를 데이터베이스 서버에 전송
$result = mysqli_query($conn,$sql);

//쿼리를 통해 가져온 데이터를 PHP에서 사용할 수 있도록 전환해서 가져와서 row 변수에 담음.
$row = mysqli_fetch_array($result);

//컬럼의 이름을 통해 데이터를 가져와 변수에 담는다.
$idFromDb = $row['id_string'];
$pwFromDb= $row['password'];
$nameFromDb= $row['name'];

if (!empty($inputId) && !empty($inputPw)){

    if ($inputId == $idFromDb) {

        //암호화한 비밀번호가 사용자 입력값과 같은 지 확인.
        //(암호화된 문자열을 원래 문자열로 바꾸는 것이 아니고, 같은지 다른지를 비교하여 True 또는 False를 반환.)
        if (password_verify($inputPw, $pwFromDb)) {

            if (isset($_POST['remember'])){
                setcookie('id',$inputId,time()+60*20,'/');
            }else{
                setcookie('id','',time()-60*20,'/');
            }

            session_start();
            $_SESSION['is_login'] = true;
            $_SESSION['name'] = $nameFromDb;
            $_SESSION['id_string'] = $idFromDb;
            header('Location: main1.php');
            exit;
        }else{
            header("Content-Type: text/html; charset=UTF-8");
            echo "<script>alert('비밀번호를 확인해 주세요.');";
            echo "window.location.replace('login.php');</script>";
            exit;
        }

    }else{
        header("Content-Type: text/html; charset=UTF-8");
        echo "<script>alert('존재하지 않는 아이디입니다.');";
        echo "window.location.replace('login.php');</script>";
        exit;

    }
}else{
    header("Content-Type: text/html; charset=UTF-8");
    echo "<script>alert('아이디와 비밀번호를 모두 입력하세요.');";
    echo "window.location.replace('login.php');</script>";
    exit;
}


?>