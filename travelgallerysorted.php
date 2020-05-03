<?php session_start(); ?>

<!doctype html>
<html>

<head>
    <title>여행갤러리</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=divice-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="flexbox.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!--    lightbox-->
    <link rel="stylesheet" type="text/css" href="lightbox.min.css">
    <script type="text/javascript" src="lightbox-plus-jquery.min.js">    </script>

    <!--    Font Awesome 4.7.0      -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <style>

        .imagePreview{
            width: :300px;
            min-height: 100px;
            border: 2px; solid #dddddd;
            margin-top: 15px;
            display: flex;
            /*align-items: center;*/
            /*justify-content: center;*/
            font-weight: bold;
            color: #cccccc;
        }

        .image-preview__image{
            display: none;
        }

        .gallery-upload{
            width: 800px;
            border: 3px solid #ff7b17;
            border-radius: 5px;
            margin-bottom: 1em;
            margin-left: 1em;
            padding: 15px;
        }

    </style>
</head>

<body>

<?php include_once "upperNav.php"?>

<!--<section class="gallery">-->
<section class="cases-links" >

    <div class="wrapper" align="center">
        <h2>여행갤러리</h2>

        <table width="1200" align="center" border="0">
            <td align="center">
                <!--        <br>-->
                - 여행지에서 찍은 멋진 사진을 공유해 보세요.<br>
            </td>
        </table>
        <br>

        <table align="right">
            <form action="travelgallerysorted.php" method="get" >
                <select id="city" name="city" onchange="getSelectValue()">
                    <option value="">전체지역</option>
                    <option value="아시아">아시아</option>
                    <option value="유럽">유럽</option>
                    <option value="북미">북미</option>
                    <option value="기타지역">기타지역</option>
                </select>

                <script type="text/javascript">
                    document.getElementById('city').value = "<?php echo $_GET['city'];?>";
                </script>

                <select id="number" name="number" onchange="getSelectValue2()">
                    <option value="8">8장씩 보기</option>
                    <option value="16">16장씩 보기</option>
                    <option value="24">24장씩 보기</option>
                    <option value="32">32장씩 보기</option>
                </select>

                <script type="text/javascript">
                    document.getElementById('number').value = "<?php echo $_GET['number'];?>";
                </script>

                <button type="submit" name="submit">정렬</button>

            </form>
        </table>
        <div class="gallery-container">

            <?php
            include_once "DBconnect.php";

//            if (!isset($_GET['number'])){

                if (!isset($_GET['city'])){
                    $city=" * ";
                }else{
                    $city = $_GET['city'];
                }

            if (!isset($_GET['number'])){
                $number=8;
            }else{
                $number = $_GET['number'];
            }


                /*페이징 시작*/
                //페이지 get변수가 있다면 받아오고, 없다면 1페이지를 보여준다.
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    //주소창에서 주소값으로 직접 접근하면 $_GET['page']의 값이 없기 때문에 page 에 직접 1을 넣어줌.
                    $page = 1;
                }
                //전체 게시물의 수 구하기
                //board_findDonghaeng 내의 모든 행의 개수를 가져온다.(행=게시글의 수)
                $city=$_GET['city'];

                $sql = "select count(*) as cnt from gallery where city like '%$city%' order by idGallery desc";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result);

                $allPost = $row['cnt']; //전체 게시글의 수
                $onePage = $number; //한 페이지에 보여줄 게시글의 수
                //ceil: 올림,반올림,내림에서 올림을 나타냅.
                $allPage = ceil($allPost / $onePage);    //전체 페이지의 수

                //페이지가 1페이지보다 작거나 allPage 보다 큰 지 확인해서 해당되면 경고로 알리고 이전 페이지로 돌려보냄.
                if ($page < 1 || ($allPage && $page > $allPage)) {

                    ?>
                    <script>
                        alert("존재하지 않는 페이지입니다.");
                        history.back();
                    </script>
                    <?php
                    exit;
                }
                $oneSection = 10;   //한번에 보여줄 총 페이지 개수 (1~10, 11~20...)
                $currentSection = ceil($page / $oneSection);  //현재섹션
                $allSection = ceil($allPage / $oneSection);  //전체 섹션의 수

                $firstPage = ($currentSection * $oneSection) - ($oneSection - 1);   //현재 섹션의 처음 페이지

                if ($currentSection == $allSection) {
                    $lastPage = $allPage; //현재 섹션이 마지막 섹션이라면 $allPage가 마지막 페이지가 된다.
                } else {
                    $lastPage = $currentSection * $oneSection; //현재 섹션의 마지막 페이지
                }

                $prevPage = (($currentSection - 1) * $oneSection); //이전 페이지, 11~20일 때 이전을 누르면 10 페이지로 이동.
                $nextPage = (($currentSection + 1) * $oneSection) - ($oneSection - 1); //다음 페이지, 11~20일 때 다음을 누르면 21 페이지로 이동.
                $paging = '<ul>'; // 페이징을 저장할 변수


                //첫 페이지가 아니라면 처음 버튼을 생성
                if ($page != 1) {
                    $paging .= '<li class="page page_start"><a href="./travelgallerysorted.php?city=' . $city . '&number=' . $number . '&page=1">처음</a></li>';
                }

                //첫 섹션이 아니라면 이전 버튼을 생성
                if ($currentSection != 1) {
//        $paging .= '<li class="page page_prev"><a href="./search_result.php?page=' . $prevPage . '">이전</a></li>';
                    $paging .= '<li class="page page_prev"><a href="./travelgallerysorted.php?city=' . $city . '&number=' . $number . '&page=' . $prevPage . '">이전</a></li>';
                }

                for ($i = $firstPage; $i <= $lastPage; $i++) {
                    if ($i == $page) {
                        $paging .= '<li class="page current">' . $i . '</li>';
                    } else {
//            $paging .= '<li class="page"><a href="./search_result.php?page=' . $i . '">' . $i . '</a></li>';
                        $paging .= '<li class="page"><a href="./travelgallerysorted.php?city=' . $city . '&number=' . $number . '&page=' . $i . '">' . $i . '</a></li>';
                    }
                }

                //마지막 섹션이 아니라면 다음 버튼을 생성
                if ($currentSection != $allSection) {
                    $paging .= '<li class="page page_next"><a href="./travelgallerysorted.php?city=' . $city . '&number=' . $number . '&page=' . $nextPage . '">다음</a></li>';
                }

                //마지막 페이지가 아니라면 끝 버튼을 생성
                if ($page != $allPage) {
                    $paging .= '<li class="page page_end"><a href="./travelgallerysorted.php?city=' . $city . '&number=' . $number . '&page=' . $allPage . '">끝</a></li>';
                }

                $paging .= '</ul>';

                /* 페이징 끝 */
                $currentLimit = ($onePage * $page) - $onePage; //몇 번째의 글부터 가져오는지
                $sqlLimit = ' LIMIT ' . $currentLimit . ',' . $onePage; //limit sql 구문

                $sql = "SELECT * FROM gallery where city like '%$city%' order by idGallery desc LIMIT " . $currentLimit . ',' . $number;
                $result = mysqli_query($conn, $sql);

                //        $stmt = mysqli_stmt_init($conn);
                //        if (!mysqli_stmt_prepare($stmt,$sql)){
                //            echo "SQL stmt failed";
                //        }else{
                //            mysqli_stmt_execute($stmt);
                //            $result = mysqli_stmt_get_result($stmt);

                while ($row = mysqli_fetch_assoc($result)) {

                    echo '
            <div class="gallery-items" >
                <a href="./img/gallery/' . $row["imgFullNameGallery"] . '" data-lightbox="travelgallery" data-title="' . $row["titleGallery"] . '">
                <div class="gallery-item" style="background-image: url(img/gallery/' . $row["imgFullNameGallery"] . ');" >
                </div>
                </a>
                
                <div class="title"><strong>' . $row["titleGallery"] . '</strong></div>
                <div class="desc">' . $row["descGallery"] . '</div>
<!--                
                <div>
                <a href="#" class="like">
                <i class="fa fa-heart" aria-hidden="true"></i>
                </a>
                <i class="likeCount">1</i>
                </div>
-->
            </div>
                ';

                }
             ?>
            <table>
                <div class="controls">
                    <?php echo $paging ?>
                </div>
            </table>
        </div>

        <!--        <div class="pagination">-->
        <!--            <div class="prev">이전</div>-->
        <!--            <div class="page">페이지<span class="page"></span></div>-->
        <!--            <div class="next">다음</div>-->
        <!--        </div>-->

    </div>

</section>

<?php
if (isset($_SESSION['is_login'])) {
    echo '
<div class="gallery-upload">
    <form action="includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data" >
   <select class="select1" name="firstSelect" id="firstSelect" onChange="changeFirstSelect();">
   <option value="">지역을 선택하세요.</option>
   </select>           
        <input type="text" name="filetitle" placeholder="Image title">
        <input type="text" name="filedesc" placeholder="Image desc">
        <input type="file" name="file" accept="image/*" id="inpFile">
        <input type="hidden" name="id" value="'.$_SESSION['id_string'].'">
        <button type="submit" name="submit">업로드</button>

        <div class="imagePreview" id="imagePreview">
        <img src="" alt="Image Preview" class="image-preview__image" weight="120" height="100">
        <span class="imagePreviewDefaultText">Image Preview</span>
</div>

    </form>
</div> 

';
}

$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if(strpos($fullUrl, "upload=empty") == true) {

    echo "
                    <script>alert('주어진 칸을 모두 입력하세요.');
                    history.back();</script> 
                  ";

    exit;

    exit();
}
?>
<!--<script src="script.js"></script>-->

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
<script>
    jQuery(function () {
        lightbox.option({
            'alwaysShowNavOnTouchDevices':true,
            'resizeDuration' :100,
            'imageFadeDuration':100
        })
    });

    jQuery(function () {
        $(".like").on("click",function () {
            $(this).toggleClass("heart");
        });
    });

    //파일 업로드시 이미지 리뷰
    const inpFile=document.getElementById("inpFile");
    const previewContainer=document.getElementById("imagePreview");
    const previewImage = previewContainer.querySelector(".image-preview__image");
    const imagePreviewDefaultText = previewContainer.querySelector(".imagePreviewDefaultText");

    inpFile.addEventListener("change", function () {
        const file = this.files[0];
        if (file){
            const reader = new FileReader();

            imagePreviewDefaultText.style.display="none";
            previewImage.style.display="block";

            reader.addEventListener("load",function () {
                previewImage.setAttribute("src",this.result);
            });
            reader.readAsDataURL(file);
        }else{
            imagePreviewDefaultText.style.display=null;
            previewImage.style.display=null;
            previewImage.setAttribute("src","");
        }
    });
</script>


</body>

</html>

