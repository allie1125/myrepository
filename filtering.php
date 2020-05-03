<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .gallery-container {
            /*부모 요소에 반드시 지정해야 하는 유일한 속성이며, 자식 요소는 자동적으로 flex item이 된다.*/
            display: flex;
            /*컨테이너의 주축 방향을 설정 (좌에서 우로)*/
            flex-direction: row;
            /*컨테이너보다 아이템의 크기가 큰 경우, 아이템 각각의 크기를 줄일 것인 지, 개행 할 것인 지.*/
            flex-wrap: wrap;

            /*flex-flow: row-reverse wrap-reverse;*/

            margin: 10px;
            padding: 15px;
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
            width: 400px;
            height: 280px;

        }

        .gallery-item .hide{
            display: none;
        }
        .gallery-item .show{
            display: block;
            animation: show .5s ease;
        }

        @keyframes show {
            0%{
                opacity: 0;
                transform: scale(0.9);
            }
            100%{
                opacity: 1;
                transform: scale(1);
            }
        }
        .title{
            color: #4584b1;
        }
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


<?php

include_once "DBconnect.php";

if(isset($_POST['submit'])){
    $city=$_POST['city'];
    $number=$_POST['number'];

    echo $city;
    echo $number;
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

    $sql="select count(*) as cnt from gallery order by idGallery desc";
//    $sql="select count(*) as cnt from gallery where city like '%$city%' order by idGallery desc";
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
        $paging .= '<li class="page page_start"><a href="./filtering.php?no=' . $number . '&page=1">처음</a></li>';
//        $paging .= '<li class="page page_start"><a href="./filtering.php?city=' .$city . '&no=' . $number . '&page=1">처음</a></li>';
    }

    //첫 섹션이 아니라면 이전 버튼을 생성
    if($currentSection != 1) {
//        $paging .= '<li class="page page_prev"><a href="./search_result.php?page=' . $prevPage . '">이전</a></li>';
        $paging .= '<li class="page page_prev"><a href="./filtering.php?no=' . $number . '&page=' . $prevPage . '">이전</a></li>';
    }

    for($i = $firstPage; $i <= $lastPage; $i++) {
        if($i == $page) {
            $paging .= '<li class="page current">' . $i . '</li>';
        } else {
//            $paging .= '<li class="page"><a href="./search_result.php?page=' . $i . '">' . $i . '</a></li>';
            $paging .= '<li class="page"><a href="./filtering.php?no=' . $number . '&page='.$i . '">' . $i . '</a></li>';
        }
    }

    //마지막 섹션이 아니라면 다음 버튼을 생성
    if($currentSection != $allSection) {
        $paging .= '<li class="page page_next"><a href="./filtering.php?no=' . $number . '&page=' . $nextPage . '">다음</a></li>';
    }

    //마지막 페이지가 아니라면 끝 버튼을 생성
    if($page != $allPage) {
        $paging .= '<li class="page page_end"><a href="./filtering.php?no=' . $number . '&page=' . $allPage . '">끝</a></li>';
    }

    $paging .= '</ul>';

    /* 페이징 끝 */
    $currentLimit = ($onePage * $page) - $onePage; //몇 번째의 글부터 가져오는지
    $sqlLimit = ' LIMIT ' . $currentLimit . ',' . $onePage; //limit sql 구문



    $sql="SELECT * FROM gallery order by idGallery desc LIMIT " . $currentLimit . ',' . $number;
    $result=mysqli_query($conn,$sql);

    while ($row=mysqli_fetch_assoc($result)){
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

}

?>
<div class="paging">
    <?php echo $paging ?>
</div>
</body>
</html>
