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

//write에서 글번호를 변수$no로 받는 부분.
// $_GET['no']이 있을 때만 $no 선언
if(isset($_GET['no'])){
    //url뒤의 no값을 변수에 입력
    $no=$_GET['no'];
}

//$no이 선언되었을 때에만 db를 이용해서 값을 가져옴
if (isset($no)){
    //no값을 이용하여 하나의 데이터 지정
    //no은 primary key이기 때문에 중복값이 없으며, 단 하나의 게시물을 출력한다.
    $sql = 'select title, content, date, hit, id_string, 1stCitySelection, 2ndCitySelection 
            from board_findDonghaeng where no = ' . $no;
    //쿼리 보내고 데이터 받기
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
}
?>


<!doctype html>
<html>

<head>
    <title>게시판 - 동행 구하기</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- include libraries(jQuery, bootstrap) -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

    <!-- include libraries(jQuery, bootstrap) -->


    <style>
        .box_input{
            align:center;
        }
        .input_title{
            width: 90%;
        }
        .inner_input{
            width: 1100px;
        }
        .note{
            margin: 20px;
            padding: 20px;
        }
        .title_box{
            align:left;
        }
        .submitBtn{
            margin: 10px;
            padding: 10px
        }
    </style>

</head>
<body>
<div class="box_input" align="center">
    <div class="inner_input">
        <div class="title_box" align="left">
            <form id="formWrite" name="formWrite" method="post" action="selectboxprocess.php">
                <?php
                if (isset($no)){
                    //form을 submit할 때 현재의 no를 함께 전송하기 위함.
                    //게시판 번호가 있어야 어떤 글인지 알 수 있다.
                    echo '<input type="hidden" name="no" value="' .$no .'">';
                }
                ?>

                <ul class = "subject">
                    <li>
                        <label class = "item" for ="boardCategory">동행지역 선택</label>
                        <div id="citySelection">

                            <select class="select1" name="firstSelect" id="firstSelect" onChange="changeFirstSelect();">
                                <option value="">지역을 선택하세요.</option>
                            </select>

                        </div>
                    </li>

                </ul>
        </div>

        <script>

            // 대분류
            var firstList = new Array("아시아","유럽","북미","기타지역");


            // 페이지 로딩시 자동 실행
            window.onload = function(){
                var firstSelection = document.getElementById("firstSelect"); // SELECT TAG

                for (i =0 ; i<firstList.length; i++){// 0 ~ 3
                    // 새로운 <option value=''>값</option> 태그 생성
                    var optionEl = document.createElement("option");

                    // option태그에 value 속성 값으로 저장
                    optionEl.value = firstList[i];

                    // text 문자열을 새로 생성한 <option> 태그의 값으로 추가
                    optionEl.appendChild (document.createTextNode(firstList[i]));

                    // 만들어진 option 태그를 <select>태그에 추가
                    firstSelection.appendChild(optionEl);
                }

            }

        </script>

        <div class="submitBtn">
            <button type="submit">
                <?php echo isset($no)?'수정':'확인'?>
            </button>
        </div>

        </form>
    </div>
</div>
</body>
</html>

