
<!-- 데이터베이스 접속 -->

<!-- 1.mysqli 방식-->
<?php

$conn = mysqli_connect("localhost","allie","11251125","opentutorials");
$sql = "
    
INSERT INTO topic
    (title,description,created)
        VALUES(
            'Oracle',
            'Oracle is...',
             NOW()
             )";

$result = mysqli_query($conn,$sql);

if($result === false){
    echo mysqli_error($conn);
}
?>



<!-- 2. PDO 방식-->
<!-- <?php

// 설정
$mysql_hostname = 'localhost';
$mysql_username = 'allie';
$mysql_password = '11251125';
$mysql_database = 'opentutorials';
$mysql_port = '3306';
$mysql_charset = 'utf8';

// 1. DB 연결
$dsn = 'mysql:host='.$mysql_hostname.';dbname='.$mysql_database.';port='.$mysql_port.';charset='.$mysql_charset;
try{
    $connect = new PDO($dsn,$mysql_username,$mysql_password);
}catch (PDOException $e){
    echo '연결실패 : '. $e->getMessage().'';
    return false;
}

// 쿼리 생성
$query = 'select \' complete \' as col from dual';

// 쿼리 실행
$result = $connect->query($query) or die($connect->errorInfo());

// 결과 처리
while($row=$result->fetch()){
    echo $row['col'].'';
}

?>  -->