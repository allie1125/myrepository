<?php session_start(); ?>
<!doctype html>
<html>
    <head>
            <title>Travel Together - 메인</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=divice-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="http://code.jquery.com/ui/1.8.18/themes/base/jquery-ui.css" type="text/css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.8.18/jquery-ui.min.js"></script>
        <!--    lightbox-->
        <link rel="stylesheet" type="text/css" href="lightbox.min.css">
        <script type="text/javascript" src="lightbox-plus-jquery.min.js">    </script>
  <style>

      .gallery-item:hover{
          transform: scale(1.1);
      }
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /*jumbotron*/
    .jumbotron{
        padding: 250px;
        height: 60%;
    }

    .main_jt_searchBox{

    }

    /* 인기게시물 텍스트 */
    .col-sm-3{
        color:#222222;
        order: revert;
        flex-basis: auto;
        float: left;
        text-align: center;
        border-radius: 5px;
        background-size: cover;
        width: 400px;
        height: 280px;
    }
    
    /*popularPost*/
    .popularPost{
        text-align: center;
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
  background-color: #222222;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
  color: white;
  display: none;
  padding: 100px 20px;
  height: 60%;
}
    .gallery-item {
        /*flex item의 배치 순서*/

        order: revert;
        flex-basis: auto;
        float: left;

        color: #fff;
        text-align: center;
        border-radius: 5px;
        background: #fff;
        background-size: cover;
        width: 400px;
        height: 280px;

    }
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
#아시아 {background-color: #f2f2f2;}
#유럽 {background-color: #f2f2f2;}
#북미 {background-color: #f2f2f2;}
#기타지역 {background-color: #f2f2f2;}
  </style>

<!--        <script type="text/javascript">-->
<!--            jQuery(function () {-->
<!--                $.datepicker.setDefaults($.datepicker.regional['ko']);-->
<!--                    $( "#startDate" ).datepicker({-->
<!--                    changeMonth: true,-->
<!--                    changeYear: true,-->
<!--                    nextText: '다음 달',-->
<!--                    prevText: '이전 달',-->
<!--                    dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'],-->
<!--                    dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],-->
<!--                    monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],-->
<!--                    monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],-->
<!--                    dateFormat: "yymmdd",-->
<!--                    minDate: '-0d',                       // 선택할수있는 최소날짜, ( 0 : 오늘 이후 날짜 선택 불가)-->
<!--                    onClose: function( selectedDate ) {-->
<!--                        //시작일(startDate) datepicker가 닫힐때-->
<!--                        //종료일(endDate)의 선택할수있는 최소 날짜(minDate)를 선택한 시작일로 지정-->
<!--                        $("#endDate").datepicker( "option", "minDate", selectedDate );-->
<!--                    }-->
<!---->
<!--                });-->
<!--                $( "#endDate" ).datepicker({-->
<!--                    changeMonth: true,-->
<!--                    changeYear: true,-->
<!--                    nextText: '다음 달',-->
<!--                    prevText: '이전 달',-->
<!--                    dayNames: ['일요일', '월요일', '화요일', '수요일', '목요일', '금요일', '토요일'],-->
<!--                    dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],-->
<!--                    monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],-->
<!--                    monthNames: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],-->
<!--                    dateFormat: "yymmdd",-->
<!--                    //maxDate:0,-->
<!--                    minDate: '-0d',                      // 선택할수있는 최대날짜, ( 0 : 오늘 이후 날짜 선택 불가)-->
<!--                    onClose: function( selectedDate ) {-->
<!--                        // 종료일(endDate) datepicker가 닫힐때-->
<!--                        // 시작일(startDate)의 선택할수있는 최대 날짜(maxDate)를 선택한 시작일로 지정-->
<!--                        $("#startDate").datepicker( "option", "maxDate", selectedDate );-->
<!--                    }-->
<!--                });-->
<!--            });-->
<!--        </script>-->
    </head>
<body>

<?php include_once "upperNav.php"; ?>

<div class="jumbotron" style="background-image: url(https://cdn.pixabay.com/photo/2016/01/13/01/36/bagan-1137015__340.jpg); background-size: 100%">
  <div class="container text-center">
    <h1>Let's Travel Together !</h1>      
    <p><strong>더 넓은 세상을 경험하고, 잊지 못할 순간을 함께 나누세요.</strong></p><br><br>

<!--         <div class="main_jt_searchBox">-->
<!--            <ul>-->
<!--            <div class="sel_input">-->
<!--                <ul>-->
<!---->
<!--                    <strong class="subTitle">함께 여행할 지역</strong>-->
<!--                        <select name="city">-->
<!--                            <option value="Asia">아시아</option>-->
<!--                            <option value="Europe">유럽</option>-->
<!--                            <option value="NorthAmerica">북미</option>-->
<!--                            <option value="otherCity">기타 지역</option>-->
<!--                        </select>-->
<!---->
<!--                    <div class="dateselect">-->
<!--                        <strong class="title">동행 기간</strong>-->
<!--                        <input type="text" id="startDate" placeholder="시작날짜 선택">-->
<!--                    <input type="text" id="endDate" placeholder="종료날짜 선택">-->
<!--                    </div>-->
<!--                        <button type="button" title="검색" class="sel_calendar" onClick="">-->
<!--                            <span class="ir">검색</span>-->
<!--                        </button>-->
<!--                </ul>-->
<!--            </div>-->
<!--            </ul>-->
        </div>
  </div>
</div>

<div class="popularPost">
<h3><strong>지역별 최근 게시물</strong></h3><br>

</div>
            <button class="tablink" onclick="openPage('아시아', this, '#222222')" id="defaultOpen">아시아</button>
            <button class="tablink" onclick="openPage('유럽', this, '#222222')">유럽</button>
            <button class="tablink" onclick="openPage('북미', this, '#222222')">북미</button>
            <button class="tablink" onclick="openPage('기타지역', this, '#222222')">기타지역</button>

<div id="아시아" class="tabcontent">
    <div class="container-fluid bg-3 text-center">
        <div class="row">

            <?php

            include_once "DBconnect.php";
            $sql="select * from gallery where city ='아시아' order by idGallery desc limit 4";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt,$sql)){
                echo "SQL stmt failed";
            }else{
                mysqli_stmt_execute($stmt);
                $result=mysqli_stmt_get_result($stmt);

                while($row=mysqli_fetch_assoc($result)){
                    echo '
                
                        <div class="col-sm-3">
                        <a href="./img/gallery/'.$row["imgFullNameGallery"].'" data-lightbox="travelgallery" data-title="'.$row["titleGallery"].'">

                        <div class="gallery-item" style="background-image: url(img/gallery/'.$row["imgFullNameGallery"].'); width: 100%" alt="Image"></div>
                        </a>
                        <strong>'.$row["titleGallery"].'</strong>
                        <p>'.$row["descGallery"].'</p>
                        </div>
            ';
                }
            }
            ?>

        </div>
    </div><br>
</div>

            <div id="유럽" class="tabcontent">
                <div class="container-fluid bg-3 text-center">
                    <div class="row">

                        <?php

                        include_once "DBconnect.php";
                        $sql="select * from gallery where city ='유럽' order by idGallery desc limit 4";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt,$sql)){
                            echo "SQL stmt failed";
                        }else{
                            mysqli_stmt_execute($stmt);
                            $result=mysqli_stmt_get_result($stmt);

                            while($row=mysqli_fetch_assoc($result)){
                                echo '
                
                        <div class="col-sm-3">
                        <a href="./img/gallery/'.$row["imgFullNameGallery"].'" data-lightbox="travelgallery" data-title="'.$row["titleGallery"].'">

                        <div class="gallery-item" style="background-image: url(img/gallery/'.$row["imgFullNameGallery"].'); width: 100%" alt="Image"></div>
                        </a>
                        <strong>'.$row["titleGallery"].'</strong>
                        <p>'.$row["descGallery"].'</p>
                        </div>
            ';
                            }
                        }
                        ?>

                    </div>
                </div><br>
            </div>

            <div id="북미" class="tabcontent">
                <div class="container-fluid bg-3 text-center">
                    <div class="row">

                        <?php

                        include_once "DBconnect.php";
                        $sql="select * from gallery where city ='북미' order by idGallery desc limit 4";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt,$sql)){
                            echo "SQL stmt failed";
                        }else{
                            mysqli_stmt_execute($stmt);
                            $result=mysqli_stmt_get_result($stmt);

                            while($row=mysqli_fetch_assoc($result)){
                                echo '
                
                        <div class="col-sm-3">
                                                 <a href="./img/gallery/'.$row["imgFullNameGallery"].'" data-lightbox="travelgallery" data-title="'.$row["titleGallery"].'">

                        <div class="gallery-item" style="background-image: url(img/gallery/'.$row["imgFullNameGallery"].'); width: 100%" alt="Image"></div>
</a>
                        <strong>'.$row["titleGallery"].'</strong>
                        <p>'.$row["descGallery"].'</p>
                        </div>
            ';
                            }
                        }
                        ?>

                    </div>
                </div><br>
            </div>

            <div id="기타지역" class="tabcontent">
                <div class="container-fluid bg-3 text-center">
                    <div class="row">

                        <?php

                        include_once "DBconnect.php";
                        $sql="select * from gallery where city ='기타지역' order by idGallery desc limit 4";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt,$sql)){
                            echo "SQL stmt failed";
                        }else{
                            mysqli_stmt_execute($stmt);
                            $result=mysqli_stmt_get_result($stmt);

                            while($row=mysqli_fetch_assoc($result)){
                                echo '
                
                        <div class="col-sm-3">
                                                <a href="./img/gallery/'.$row["imgFullNameGallery"].'" data-lightbox="travelgallery" data-title="'.$row["titleGallery"].'">

                        <div class="gallery-item" style="background-image: url(img/gallery/'.$row["imgFullNameGallery"].'); width: 100%" alt="Image"></div>
</a>
                        <strong>'.$row["titleGallery"].'</strong>
                        <p>'.$row["descGallery"].'</p>
                        </div>
            ';
                            }
                        }
                        ?>

                    </div>
                </div><br>
            </div>


<footer class="container-fluid text-center">
  <p>Footer Text</p>
</footer>


<script language="javascript">
    function openPage(pageName,elmnt,color) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }
        document.getElementById(pageName).style.display = "block";
        elmnt.style.backgroundColor = color;
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    jQuery(function () {
        lightbox.option({
            'alwaysShowNavOnTouchDevices':true,
            'resizeDuration' :100,
            'imageFadeDuration':100
        })
    });
</script>
        </body>
</html>