<?php

require_once("DBconnect.php");
session_start();

?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <title>게시판 - 동행 구하기</title>

    <link rel="stylesheet" href="./css/normalize.css" />
    <link rel="stylesheet" href="./css/board.css" />

        <title>Travel Together - 메인</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=divice-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!--        모달창-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <style>
        .paging {
            width: 100%;
            float: left;
            padding: 15px;
        }

        .paging ul {
            display: block;
            text-align: center;
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .paging ul li{
            height:35px;
            width: 35px;
            border: 1px solid #5a5a5a;
            margin: 4px;
            display: inline-block;
            line-height: 33px;
            cursor: pointer;

        }

        .paging ul li.active{
            background-color: darkorange;
            color: #f5f5f5f5;
        }

    </style>
</head>

<body>

<?php include_once "upperNav.php"; ?>

<article class="boardArticle">
    <h3 align="center">동행 구하기</h3>
    <table class="tbclass" width="1200" height="300" align="center" border="3" frame="hsides" rules="rows">
        <caption class="readHide">여행 동행 및 쉐어 등의 목적으로 동행인을 구하는 곳입니다.<br></caption>
        <thead align="center" valign="center">

        <tr bgcolor="#ff7b17">
            <td scope="col" class="no"><strong>글번호</strong></td>
            <td scope="col" class="city"><strong>지역</strong></td>
            <td scope="col" class="title"><strong>제목</strong></td>
            <td scope="col" class="author"><strong>작성자</strong></th>
            <td scope="col" class="date"><strong>작성일</strong></td>
            <td scope="col" class="hit"><strong>조회수</strong></td>
        </tr>
        </thead>
        <tbody>

        <?php
        /*페이징 시작*/
        //페이지 get변수가 있다면 받아오고, 없다면 1페이지를 보여준다.
        if (isset($_GET['page'])){
            $page=$_GET['page'];
        }else{
            //주소창에서 주소값으로 직접 접근하면 $_GET['page']의 값이 없기 때문에 page 에 직접 1을 넣어줌.
            $page=1;
        }
        //전체 게시물의 수 구하기
        //board_findDonghaeng 내의 모든 행의 개수를 가져온다.(행=게시글의 수)
        $sql='select count(*) as cnt from board_findDonghaeng order by no desc';
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);

        $allPost = $row['cnt']; //전체 게시글의 수
        $onePage = 10; //한 페이지에 보여줄 게시글의 수
        //ceil: 올림,반올림,내림에서 올림을 나타냅.
        $allPage = ceil($allPost / $onePage);    //전체 페이지의 수

        //페이지가 1페이지보다 작거나 allPage 보다 큰 지 확인해서 해당되면 경고로 알리고 이전 페이지로 돌려보냄.
        if ($page < 1 || ($allPage && $page > $allPage)){

            ?><script>
                alert("존재하지 않는 페이지입니다.");
                history.back();
            </script>
            <?php
            exit;
        }
        $oneSection = 10;   //한번에 보여줄 총 페이지 개수 (1~10, 11~20...)
        $currentSection = ceil($page/$oneSection);  //현재섹션
        $allSection = ceil($allPage / $oneSection);  //전체 섹션의 수

        $firstPage = ($currentSection*$oneSection) - ($oneSection-1);   //현재 섹션의 처음 페이지

        if($currentSection == $allSection) {
            $lastPage = $allPage; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.
        } else {
            $lastPage = $currentSection * $oneSection; //현재 섹션의 마지막 페이지
        }

        $prevPage = (($currentSection - 1) * $oneSection); //이전 페이지, 11~20일 때 이전을 누르면 10 페이지로 이동.
        $nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); //다음 페이지, 11~20일 때 다음을 누르면 21 페이지로 이동.
        $paging = '<ul>'; // 페이징을 저장할 변수


        //첫 페이지가 아니라면 처음 버튼을 생성
        if($page != 1) {
            $paging .= '<li class="page page_start"><a href="./boardlist.php?page=1">처음</a></li>';
        }

        //첫 섹션이 아니라면 이전 버튼을 생성
        if($currentSection != 1) {
            $paging .= '<li class="page page_prev"><a href="./boardlist.php?page=' . $prevPage . '">이전</a></li>';
        }

        for($i = $firstPage; $i <= $lastPage; $i++) {
            if($i == $page) {
                $paging .= '<li class="page current">' . $i . '</li>';
            } else {
                $paging .= '<li class="page"><a href="./boardlist.php?page=' . $i . '">' . $i . '</a></li>';
            }
        }

        //마지막 섹션이 아니라면 다음 버튼을 생성

        if($currentSection != $allSection) {
            $paging .= '<li class="page page_next"><a href="./boardlist.php?page=' . $nextPage . '">다음</a></li>';
        }

        //마지막 페이지가 아니라면 끝 버튼을 생성
        if($page != $allPage) {
            $paging .= '<li class="page page_end"><a href="./boardlist.php?page=' . $allPage . '">끝</a></li>';
        }

        $paging .= '</ul>';

        /* 페이징 끝 */
        $currentLimit = ($onePage * $page) - $onePage; //몇 번째의 글부터 가져오는지
        $sqlLimit = ' LIMIT ' . $currentLimit . ',' . $onePage; //limit sql 구문

        $sql = 'select * from board_findDonghaeng order by no desc' . $sqlLimit; //원하는 개수만큼 가져온다. (0번째부터 20번째까지
        $result = mysqli_query($conn,$sql);

//        //sql생성
//        $sql = 'select * from board_findDonghaeng order by no desc';
//        //쿼리를 보내서 결과값을 result변수에 저장
//        $result = mysqli_query($conn,$sql);

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
                <td class="city"><?php echo $row['2ndCitySelection']?></td>
                <td align="left" class="title" truncated><a href="boardviewcontents.php?no=<?=$row['no']?>"><?php echo $row['title']?></a>
                    <?php if ($row['replyCount'] > 0 ){?>
                    [<?php echo $row['replyCount']?>]<?php } ?> </td>

<!--                <td class="author"><a href="#" id="openModal--><?//=$row['no']?><!--"> --><?php //echo $row['id_string']?><!--</a></td>-->
                <td class="author"><a href="#" id="openModal"><?php echo $row['id_string']?></a></td>
                <td class="date"><?php echo $row['date']?></td>
                <td class="hit"><?php echo $row['hit']?></td>

            </tr>
            <?php
        }
        ?>

        </tbody>
    </table>
</article>

<table width="1200" align="center" border="0">
    <td>
        <input id=.btn.btn-orange type="button" align="right" value="글쓰기" onclick="location.href='boardwrite.php'">
    </td>
</table>
<table>
<div class="paging">
    <?php echo $paging ?>
</div>
</table>

<table width="1200" align="center" border="0">
    <td align="left">
<!--        <br>-->
- 본 게시판의 목적 외의 사용, 불순한 의도로 동행접근, 상업적 사용을 금하며 적발 시 강퇴처리합니다.<br>
- 본 홈페이지는 동행으로 인한 정신적 물질적 피해에 대한 책임이 없습니다.
    </td>
</table>

<table >
    <div id="search_box" align="center">
        <br/>
        <form action="search_result.php" method="get">
            <select name="catgo">

                <option value="title">제목</option>
                <option value="id_string">글쓴이</option>
                <option value="content">내용</option>

            </select>
            <input type="text" name="searchText" size="40" required="required" /><button>검색</button>
        </form>
    </div>
    <br/>
</table>

<!-- Button to Open the Modal -->
<!--<a href="#" id="test"  >사용자 아이디</a>-->
<div id="result"></div>

<div class="container">

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">쪽지 보내기</h4>
                    <button type="button" id="close" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="sendingMsg">받는 사람: </label>
                        <input type="text" class="form-control" id="sendingMsg"
                               aria-describedby="emailHelp" placeholder="내용을 입력하세요.">
                        <small id="emailHelp" class="form-text text-muted">불순한 의도로 동행접근 및 금전적 요구 적발시 강퇴처리합니다.</small>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="buttonCloseId" data-dismiss="modal">보내기</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!--모달창 끝-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!--모달 자바스크립트-->
<script type="text/javascript">

    jQuery(function () {
        $('a#openModal').on("click",function () {
            $('a#openModal').popover({
                trigger: 'manual',
                placement: 'bottom',
                content: '쪽지보내기',
                trigger: 'focus'
            });
             $('a#openModal').popover("show");

            //쪽지 보내기 클릭 시
            $('.popover-content').on("click",function () {
                //메시지창 빈칸으로 초기화
                $('#sendingMsg').val('');
                //모달창 띄우기
                $('#myModal').show();
            });
        });
    });

    jQuery(function () {
        //보내기 버튼 눌렀을 때 데이터 전송 후 끔
        $('#buttonCloseId').on('click',function () {
            var databack = $("#myModal #sendingMsg").val().trim();
            $('#result').html(databack);
            $('#myModal').hide();
        });
        //우측상단 엑스 눌렀을 때 모달창 끔
        $('#close').on('click',function () {
            $('#myModal').hide();
        });
    });
</script>
<!--모달 자바스크립트 끝-->
</body>

</html>