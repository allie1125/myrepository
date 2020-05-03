<?php
require_once "DBconnect.php";

//$_POST['cno']이 있을 때 (기존 글 수정)
if (isset($_POST['cno'])){
    //$no 선언 및 기존 제목과 내용 가져오기
    $cno=$_POST['cno'];
    $content=$_POST['data'];

    //글을 수정하는 업데이트 쿼리 작성
    $sql1 = " UPDATE reply SET
                 content='$content'
                 WHERE cno='$cno'
    
        ";

    $result = mysqli_query($conn,$sql1);
        if ($result === false) {
            $msg = '수정 오류. 다시 시도하세요.';
        }
}else{

    $bno = $_POST['bno'];
    $sql = "INSERT INTO reply (bno,id_string,content,date) 
            VALUES ('".$bno."','".$_POST['dat_user']."','".$_POST['content']."',NOW())";

    $result = mysqli_query($conn,$sql);
    if ($result ===false){
        $msg = '오류. 다시 시도하세요.';
    }else{
        $msg = '댓글이 등록되었습니다.';
        //쿼리 실행 후 replyCount값 가져오기
        $replyCount = $conn->insert_id;
        //댓글 카운트 올리기
        $sql3 = "UPDATE board_findDonghaeng SET replyCount = replyCount +1 WHERE no =" .$bno;
        $result = mysqli_query($conn,$sql3);

    }
}?>
<script>
    alert("<?php echo $msg ?> ");
    history.back()</script>

