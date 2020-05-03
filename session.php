<?php
session_start();
if (!isset($_SESSION['is_login'])){
    header('Location: ./login.php');
}
?>
<html>
     <body>
     <?php echo $_SESSION['name'];?>님 환영합니다.<br />
     <a href = "./logout.php">로그아웃</a>

     </body>
</html>