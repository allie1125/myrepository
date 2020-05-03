
<!-- 데이터베이스 연결 -->
<!-- 1.mysqli 방식-->
<?php

    $host="localhost";      //db서버주소
    $user="allie";          //유저이름
    $password="11251125";   //비밀번호
    $database="db";         //데이터베이

    $conn = mysqli_connect($host,$user,$password,$database);
    $conn->set_charset('utf8');
?>