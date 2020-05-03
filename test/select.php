<!doctype html>

<html>
<?php
$conn = mysqli_connect('localhost','allie','11251125','opentutorials');

// 하나의 row를 가져오는 방법

// 쿼리 생성
$sql="SELECT * FROM topic WHERE id =5";

// 쿼리를 데이터베이스 서버에 전송
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

//  결과의 자릿수나 컬럼의 이름을 통해서 자료를 가져올수 있다.
// 자릿수(인덱스)를 이용 : 배열
// 이름을 이용 : 연관배열
echo "<h1>" . $row['title'] . "</h1>";
echo $row['description'];


// 모든 row를 가져오는 방법

// 쿼리 생성
$sql="SELECT * FROM topic";

// 쿼리를 데이터베이스 서버에 전송
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
echo "<h1>" . $row['title'] . "</h1>";
echo $row['description'];

$row = mysqli_fetch_array($result);
echo "<h1>" . $row['title'] . "</h1>";
echo $row['description'];

$row = mysqli_fetch_array($result);
echo "<h1>" . $row['title'] . "</h1>";
echo $row['description'];
?>

</html>