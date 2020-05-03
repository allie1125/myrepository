<?php
require_once "DBconnect.php";

//$_GET['bno']이 있어야만 글삭제가 가능함.
if(isset($_GET['no'])) {
    $no = $_GET['no'];
    $sql="DELETE FROM board_findDonghaeng WHERE no = ".$no;
    $result=mysqli_query($conn,$sql);
    if ($result===false){
        echo "삭제에 실패함";

    }else{
        echo "삭제에 성공함";
    }
    ?>
<!--    <script type="text/javascript"> alert ("삭제되었습니다.");</script>-->

    <?php

}else{?>
    <script type="text/javascript"> alert ("잘못된 접근입니다.");
    history.back();</script>
    <?php
}
?>
