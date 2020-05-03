<?php
session_start();

if (!isset($_SESSION['is_login'])){
    ?><script>
        alert('로그인이 필요한 서비스입니다.')
        Response.Write(location.href="login.php");
        // location:history.back();
    </script>
    <?php
}
?>

<?php
require_once "DBconnect.php";
include_once "upperNav.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
</head>
<body>
<form action="filtering.php" method="post" >


    <select id="number" name="number" onchange="getSelectValue2()">
        <option value="8">8장씩 보기</option>
        <option value="16">16장씩 보기</option>
        <option value="24">24장씩 보기</option>
        <option value="32">32장씩 보기</option>
    </select>

    <button type="submit" name="submit">정렬</button>

</form>

<script>


    function  getSelectValue2() {
        var selectedValue = document.getElementById("number").value;
        console.log(selectedValue);
    }
</script>
</body>
</html>

<?php



?>