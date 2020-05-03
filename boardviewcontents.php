<?php

require_once("DBconnect.php");
session_start();

$no=$_GET['no'];

//$no가 있고, $_cookie['board_findDonghaeng'.$no(글번호)]가 없을 때 update쿼리를 전송한다.
if(!empty($no) && empty($_COOKIE['board_findDonghaeng' . $no])) {

    $sql = 'update board_findDonghaeng set hit = hit + 1 where no = ' . $no;
    $result = mysqli_query($conn,$sql);

    //쿼리 결과가 없다면 오류 메시지를 출력하고 이전 화면으로 돌아간다.
    if(empty($result)) {
        ?>
        <script>
            alert('오류가 발생했습니다.');
            history.back();
        </script>
        <?php
        //쿼리 결과가 성공이라면 setcookie함수를 이용해서 'board_findDonghaeng.$no'라는 쿠키를 만든다.
        //setcookie의 매개변수: (쿠키명,쿠키값,쿠키유지시간,경로)
    } else {
        setcookie('board_findDonghaeng' . $no, TRUE, time() + (60 * 60 * 24), '/');
    }

}

if (isset($no)){
    //no값을 이용하여 하나의 데이터 지정
    //no은 primary key이기 때문에 중복값이 없으며, 단 하나의 게시물을 출력한다.
    $sql = 'select title, content, date, hit, id_string,1stCitySelection,2ndCitySelection from board_findDonghaeng where no = ' . $no;
    //쿼리 보내고 데이터 받기
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
}
 //   $sql2 = 'SELECT * FROM board_findDonghaeng LEFT JOIN reply ON board_findDonghaeng.no = reply.bno';
?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=divice-width, initial-scale=1">
    <title>동행 구하기</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!--    <link rel="stylesheet" href="./css/normalize.css" />-->
<!--    <link rel="stylesheet" href="./css/board.css" />-->

    <style>


        .rep_me ul li {
            float:left;
            width: 30px;
        }
        .dat_delete {
            display: none;
        }
        .dat_edit {
            display:none;
        }
        .dap_sm {
            position: absolute;
            top: 10px;
        }
        .dap_edit_t{
            width:520px;
            height:70px;
            position: absolute;
            top: 40px;
        }
        .re_mo_bt {
            position: absolute;
            top:40px;
            right: 5px;
            width: 90px;
            height: 72px;
        }
        #re_content {
            width:700px;
            height: 56px;
        }
        .dap_ins {
            margin-top:50px;
        }
        .re_bt {
            position: absolute;
            width:100px;
            height:56px;
            font-size:16px;
            margin-left: 10px;
        }
        #foot_box {
            height: 50px;
        }

        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        .welcomeMsg{
            color: white;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }

        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial;
        }

        /* Style tab links */
        .tablink {
            background-color: #555;
            color: white;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            font-size: 17px;
            width: 25%;
        }

        .tablink:hover {
            background-color: #777;
        }

        /* Style the tab content (and add height:100% for full page content) */
        .tabcontent {
            color: white;
            display: none;
            padding: 100px 20px;
            height: 60%;
        }

        .boardArticle{
            padding:2em;
            align: center;
            align-items: center;
        }
        .boardView {
            width: 1100px;
            border: 1px solid grey;
            border-radius: 5px;
            padding:1em;
            margin-bottom: 1em;
        }
        #boardTitle {
            font-weight: bold;
            font-size: 1.3em;
            margin-bottom:.6em;
        }

        #boardInfo{
            color: #555555;
        }
        #boardContent{
            font-size: 1.1em;
        }
        .replyView{
            width: 1100px;
        }
        .reply_box{
            width: 1100px;

            border: 1px solid grey;
            border-radius: 5px;
            padding:1em;
            margin-bottom: 1em;

        }
    </style>
</head>

<body>

<?php include_once "upperNav.php"; ?>

<article id="boardArticle" class="boardArticle" >

    <div class="boardbox" align="center">
    <h3 align="center">동행 구하기</h3>

        <div class="box">
    <div class="boardView" align="left">

        <h3 id="boardTitle"><?php echo $row['title']?> </h3>

        <div id="boardInfo">
            <span id="boardID">작성자: <?php echo $row['id_string']?> &nbsp;&nbsp;</span>
            <span id="boardDate">작성일: <?php echo $row['date']?>&nbsp;&nbsp;</span>
            <span id="boardHit" >조회수: <?php echo $row['hit']?><br></span>
            <span id="board2ndCity">희망 동행지역: <?php echo $row['2ndCitySelection']?></span>
        </div><br>

        <div id="boardContent"><?php echo $row['content']?>
        </div><br>

        <div class="btnSet">

            <?php
            if (isset($_SESSION['is_login']) && (($_SESSION['id_string']) === ($row['id_string']))){
            ?>
                <a href="./boardwrite.php?no=<?php echo $no?>">수정</a>
                <a href="./boarddelete.php?no=<?php echo $no?>">삭제</a>
                <a href="./boardlist.php">목록</a>                <?php
            }else{
            ?>
            <a href="./boardlist.php">목록</a>
            <?php } ?>
        </div>
    </div>
            <!--댓글 및 댓글 입력창 로드-->
            <?php include "reply.php" ?>
        </div>


    </div>
</article>

</body>

</html>