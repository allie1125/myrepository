<?php
require_once "DBconnect.php";
session_start();

//$_POST['no']이 있을 때 (기존 글 수정)
if (isset($_POST['no'])){
    //$no 선언 및 기존 제목과 내용 가져오기
    $no=$_POST['no'];
    $title=$_POST['boardSubject'];
    $content=$_POST['boardContents'];
    $city1 = $_POST['firstSelect'];
    $city2 = $_POST['secondSelect'];

    if ($title == ""){
        header("Content-Type: text/html; charset=UTF-8");
        echo "<script>alert('제목과 내용을 모두 입력하세요.');
 history.back();</script>";

    }else{
        //글을 수정하는 업데이트 쿼리 작성
        $sql = " UPDATE board_findDonghaeng SET
             title='$title',
             content='$content',
             1stCitySelection='$city1',
             2ndCitySelection='$city2',
             date=NOW() 
             WHERE no=$no

    ";

        $result = mysqli_query($conn,$sql);
        if ($result === false){
            $msg = '수정 오류. 다시 시도하세요.';
            ?>
            <script>alert("<?php echo $msg?>");
                history.back();</script>
            <?php
            error_log(mysqli_error($conn));

        }else{
            header("Content-Type: text/html; charset=UTF-8");
            $msg = '정상적으로 글이 수정되었습니다.';

            //$no를 가지고 게시글을 보여주는 페이지로 이동하기 위한 URL을 저장
            $replaceURL = './boardviewcontents.php?no=' . $no;
            ?>
            <script>
                alert("<?php echo $msg?>");
                location.replace("<?php echo $replaceURL?>");
            </script>
            <?php
        }
    }


    //$_POST['no']가 없다면, (새 글 쓰기)
}else{

    if ($_POST['boardSubject'] == ""){
        header("Content-Type: text/html; charset=UTF-8");
        echo "<script>alert('제목과 내용을 모두 입력하세요.');
 history.back();</script>";

    }else{


    $date = date('Y-m-d H:i:s');

    $id = $_SESSION['id_string'];

    $sql = "INSERT INTO board_findDonghaeng
                (title,content,date,id_string,1stCitySelection,2ndCitySelection,replyCount)
                    VALUES(
                    '{$_POST['boardSubject']}',
                    '{$_POST['boardContents']}',
                    NOW(),
                    '$id',
                    '{$_POST['firstSelect']}',
                    '{$_POST['secondSelect']}',
                    '0' 
                    )";

    $result = mysqli_query($conn,$sql);
    if($result === false) {
        $msg = '글을 등록하지 못했습니다. 다시 시도하세요.';
        error_log(mysqli_error($conn));
        ?>
        <script>
            alert("<?php echo $msg?>");
           // history.back();
        </script>
        <?php
        error_log(mysqli_error($conn));

    }else{
        header("Content-Type: text/html; charset=UTF-8");
        $msg = '정상적으로글이 등록되었습니다.';

        //$no 에 insert 된 자료의 auto_increment 값을 반환한다.
        //이 값을 가지고 게시글이 나오는 화면으로 이동시킨다.
        $no = $conn->insert_id;
        //$no를 가지고 게시글을 보여주는 페이지로 이동하기 위한 URL을 저장
        $replaceURL = './boardviewcontents.php?no=' . $no;
        ?>
        <script>
            alert("<?php echo $msg?>");
            location.replace("<?php echo $replaceURL?>");
        </script>
        <?php
        //exit;
    }
}

}




////$_POST['no']이 있을 때만 $no선언
//if (isset($_POST['no'])){
//    $no=$_POST['no'];
//}
//
////no이 없다면 (새글쓰기라면) 변수 선언
//if(empty($no)){
//    $date = date('Y-m-d H:i:s');
//}
//
////항상 변수 선언
//$title=$_POST['boardSubject'];
//$content=$_POST['boardContents'];
//
//if (isset($no)){
//    //업데이트 쿼리 작성
//    $sql = " UPDATE board_findDonghaeng SET
//             title='$title',
//             content='$content'
//             created=NOW() WHERE no=$no;
//
//    ";
//}
//
//$id = $_SESSION['id_string'];
//
//    $sql = "INSERT INTO board_findDonghaeng
//                (title,content,date,id_string,1stCitySelection,2ndCitySelection)
//                    VALUES(
//                    '{$_POST['boardSubject']}',
//                    '{$_POST['boardContents']}',
//                    NOW(),
//                    '$id',
//                    '{$_POST['firstSelect']}',
//                    '{$_POST['secondSelect']}'
//                    )";
//
//    $result = mysqli_query($conn,$sql);
//    if($result === false) {
//        $msg = '글을 등록하지 못했습니다. 다시 시도하세요.';
//        ?>



