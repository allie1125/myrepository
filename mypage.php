<?php require_once ("DBconnect.php");
session_start(); ?>
<!doctype html>
<html>
<head>
    <title>마이페이지</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=divice-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!--    lightbox-->
    <link rel="stylesheet" type="text/css" href="lightbox.min.css">
    <script type="text/javascript" src="lightbox-plus-jquery.min.js">    </script>
</head>
<style>

    .firstrow{
        color: #222222;
        font-size: 17px;
    }

    .boardArticle{
        margin-top: 30px;
    }
    .gallery-container {

        margin-left: 280px;
        width: 1200px;
        /*부모 요소에 반드시 지정해야 하는 유일한 속성이며, 자식 요소는 자동적으로 flex item이 된다.*/
        display: flex;
        /*컨테이너의 주축 방향을 설정 (좌에서 우로)*/
        flex-direction: row;
        /*컨테이너보다 아이템의 크기가 큰 경우, 아이템 각각의 크기를 줄일 것인 지, 개행 할 것인 지.*/
        flex-wrap: wrap;

        /*flex-flow: row-reverse wrap-reverse;*/

        border-radius: 5px;
        background: #ffffff;
        /*컨테이너 안에서 아이템들을 어디 기준으로 정렬할 지.*/
        justify-content: center;
        align-items: center;
        align-items: baseline;
        align-content: stretch;
    }

    .gallery-items{
        text-align: center;
    }
    .gallery-item:hover{
        transform: scale(1.1);
    }
    .gallery-item {
        /*flex item의 배치 순서*/

        order: revert;
        flex-basis: auto;
        float: left;
        margin: 10px;
        padding: 100px;
        color: #fff;
        text-align: center;
        border-radius: 5px;
        background: #fff;
        background-size: cover;
        width: 300px;
        height: 180px;

    }
</style>

<body>
<?php include_once "upperNav.php" ?>

    <div class="w3-sidebar w3-bar-block w3-black w3-card" style="width:130px">
        <h5 class="w3-bar-item">Menu</h5>
        <button class="w3-bar-item w3-button tablink" onclick="openLink('내가 쓴 글',this)" id="defaultOpen">내가 쓴 글</button>
<!--        <button class="w3-bar-item w3-button tablink" onclick="openLink('쪽지함',this)">쪽지함</button>-->
<!--        <button class="w3-bar-item w3-button tablink" onclick="openLink('내정보',this)" >내정보</button>-->

    </div>

    <div style="margin-left:0px">

<!--        <div id="내정보" class="w3-container city" style="display:none">-->
<!--                <div id="내정보" class="w3-container city w3-animate-opacity" style="display:none">-->
<!--            <h2>Fade in</h2>-->
<!--            <p>London is the capital city of England.</p>-->
<!--            <p>It is the most populous city in the United Kingdom, with a metropolitan area of over 13 million inhabitants.</p>-->
<!--        </div>-->
    </div>

<!--        <article class="boardArticle">-->
<!---->
<!--        <div id="쪽지함" class="w3-container city" style="display:none">-->
<!--            <!--    <div id="쪽지함" class="w3-container city w3-animate-left" style="display:none">-->-->
<!---->
<!--            <h3 align="center">쪽지함</h3>-->
<!---->
<!--            <table class="tbclass" width="1200" height="%" align="center" border="3" frame="hsides" rules="rows">-->
<!---->
<!--                <thead align="center" valign="center">-->
<!---->
<!--                <tr bgcolor="#ff551f" height="40">-->
<!--                    <td class="firstrow" scope="col" class="msgContent"><strong>내용</strong></td>-->
<!--                    <td class="firstrow" scope="col" class="msgSender"><strong>보낸사람</strong></td>-->
<!--                    <td class="firstrow" scope="col" class="msgdate"><strong>보낸날짜</strong></td>-->
<!--                </tr>-->
<!--                </thead>-->
<!--                <tbody>-->
<!---->
<!--                --><?php
//                //로그인한 아이디에 해당하는 글만 가져옴
//                $sql = "select * from board_findDonghaeng where id_string='".$_SESSION['id_string']."' order by no desc";
//
//                //쿼리를 보내서 결과값을 result변수에 저장
//                $result = mysqli_query($conn,$sql);
//
//                //쿼리의 행이 끝날 때 까지 반복실행
//                while($row = $result->fetch_assoc())
//
//                {
//                    $datetime = explode(' ', $row['date']);
//                    $date = $datetime[0];
//                    $time = $datetime[1];
//
//                    if($date == Date('Y-m-d'))
//                        $row['date'] = $time;
//                    else
//                        $row['date'] = $date;
//                    ?>
<!---->
<!--                    <tr align="center" width="%" height="%">-->
<!--                        <td align="left" class="title" truncated><a href="boardviewcontents.php?no=--><?//=$row['no']?><!--">--><?php //echo $row['title']?><!--</a>-->
<!--                            --><?php //if ($row['replyCount'] > 0 ){?>
<!--                                [--><?php //echo $row['replyCount']?><!--]--><?php //} ?><!-- </td>-->
<!---->
<!--                        <td class="author">--><?php //echo $row['id_string']?><!--</td>-->
<!--                        <td class="date">--><?php //echo $row['date']?><!--</td>-->
<!--                    </tr>-->
<!--                    --><?php
//                }
//                ?>
<!--                </tbody>-->
<!--            </table><br>-->
<!--        </div>-->
<!--        </article>-->


        <article class="boardArticle">
        <div id="내가 쓴 글" class="w3-container city" style="display:none">
            <!--    <div id="내가 쓴 글" class="w3-container city w3-animate-top" style="display:none">-->

            <h2 align="center" margin-bottom="50px">나의 게시물</h2><br>
            <h3 align="center" style="color: #5a5a5a">동행 구하기 게시판</h3>

            <table class="tbclass" width="1200" height="%" align="center" border="3" frame="hsides" rules="rows">

                <thead align="center" valign="center">
                <tr bgcolor="#ff551f" height="40">

                    <td class="firstrow" scope="col" class="no"><strong>글번호</strong></td>
                    <td class="firstrow" scope="col" class="citySelect"><strong>지역</strong></td>
                    <td class="firstrow" scope="col" class="title"><strong>제목</strong></td>
                    <td class="firstrow" scope="col" class="author"><strong>작성자</strong></td>
                    <td class="firstrow" scope="col" class="date"><strong>작성일</strong></td>
                    <td class="firstrow" scope="col" class="hit"><strong>조회수</strong></td>
                </tr>
                </thead>
                <tbody>

                <?php
                //로그인한 아이디에 해당하는 글만 가져옴
                $sql = "select * from board_findDonghaeng where id_string='".$_SESSION['id_string']."' order by no desc limit 6";

                //쿼리를 보내서 결과값을 result변수에 저장
                $result = mysqli_query($conn,$sql);

                //쿼리의 행이 끝날 때 까지 반복실행
                while($row = $result->fetch_assoc())

                {
                    $datetime = explode(' ', $row['date']);
                    $date = $datetime[0];
                    $time = $datetime[1];

                    if($date == Date('Y-m-d'))
                        $row['date'] = $time;

                    else
                        $row['date'] = $date;
                    ?>

                    <tr align="center" width="%" height="%">

                        <td class="no"><?php echo $row['no']?></td>
                        <td class="citySelect"><?php echo $row['2ndCitySelection']?></td>

                        <td align="left" class="title" truncated><a href="boardviewcontents.php?no=<?=$row['no']?>"><?php echo $row['title']?></a>
                            <?php if ($row['replyCount'] > 0 ){?>
                                [<?php echo $row['replyCount']?>]<?php } ?> </td>

                        <td class="author"><?php echo $row['id_string']?></td>
                        <td class="date"><?php echo $row['date']?></td>
                        <td class="hit"><?php echo $row['hit']?></td>

                    </tr>

                    <?php
                }
                ?>
                </tbody>
            </table><br><br>


<!--           나의 갤러리 글 가져오기-->

            <h3 align="center" style="color: #5a5a5a">여행 갤러리 게시판</h3>
            <div class="gallery-container">

                <?php
                include_once "DBconnect.php";

                $sql = "SELECT * FROM gallery WHERE id_string='".$_SESSION['id_string']."' ORDER BY idGallery DESC limit 6";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt,$sql)){
                    echo "SQL stmt failed";
                }else{
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    while($row = mysqli_fetch_assoc($result)){

                        echo '

            <div class="gallery-items" >
                <a href="./img/gallery/'.$row["imgFullNameGallery"].'" data-lightbox="travelgallery" data-title="'.$row["titleGallery"].'">
                <div class="gallery-item" style="background-image: url(img/gallery/'.$row["imgFullNameGallery"].');" >
                </div>
                </a>
                
                <div class="title"><strong>'.$row["titleGallery"].'</strong></div>
                <div class="desc">'.$row["descGallery"].'</div>
            
            </div>
                ';
                    }
                } ?>
            </div><br>

    </div>

</article>




<script>
    function openLink(pageName,elmnt) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("city");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            document.getElementById(pageName).style.display = "block";
        }
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>


</body>
</html>
