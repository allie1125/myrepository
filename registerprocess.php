
<?php
include "DBconnect.php";

if (isset($_POST['submit'])){
    $travelType = $_POST['travelType'];
    $checked="";
    foreach ($travelType as $checked1){
        $checked .= $checked1;
    }

//    //입력값이 비어있는 지 확인
//    if (empty($_POST['id_string']) || empty($_POST['name']) || empty($_POST['gender']) ||
//        empty($_POST['email']) || empty($_POST['password'])){
//        header("Location: ../register.php?signup=empty");
//        exit();
//    }else{
//        //입력문자가 유효한 지 확인
//        if (!preg_match("/^[a-zA-Z]*$/",$_POST['id_string']) || !preg_match("/^[a-zA-Z]*$/",$_POST['name'])){
//            header("Location: ../register.php?signup=char");
//            exit();
//        }else{
//            //이메일 유효성 검사
//            if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
//                header("Location: ../register.php?signup=email");
//                exit();
//            }else{
//                header("Location: ../register.php?signup=success");
//                exit();
//            }
//        }
//    }

    //패스워드 암호화
    $encrypted_password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    //회원가입 사용자 입력값을 memberTable DB에 저장
        $sql = "INSERT INTO memberTable
                (id_string,name,gender,email,password,travelType,created)
                    VALUES (
                    '{$_POST['id_string']}',
                    '{$_POST['name']}',
                    '{$_POST['gender']}',
                    '{$_POST['email']}',
                    '$encrypted_password',
                    '$checked',
                    NOW()
                    )";

        $result = mysqli_query($conn,$sql);
        if($result === false){
            echo '다시 시도하세요';
    //  아파치 에러로그에 기록
            error_log(mysqli_error($conn));
        }else{
            header("Content-Type: text/html; charset=UTF-8");
            echo "<script>alert('환영합니다.Travel Together 에서 멋진 여행 동반자를 만나보세요!');";
            echo "window.location.replace('login.php');</script>";
            exit;
//            echo '<script type="text/javascript">alert ("회원가입이 완료되었습니다.");</script>';
//            echo '<a href="login.php">로그인하기</a>';
        }
    echo $sql;


}else{
    header("Location: ../register.php");
    exit();
}


?>