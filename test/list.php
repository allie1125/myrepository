

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>나의갤러리</title>
    <script>
        function PicUpload(){
            var w=430;
            var h=230;

            var x=(screen.width - w)/2;
            var y=(screen.height - h)/2;
            window.open('pic.upload.html','picUpload','left='+x+',top='+y+',width='+w+',height='+h);
        }
        </script>
</head>
<body>
<div class="comBox">
    <h1 class="tit">갤러리</h1>
    <div class="btnZone AlignRight">
        <a href="javascript:void(0);" onclick="PicUpload();" class="btnUp">사진업로드</a>
        <a href="javascript:void(0);" onclick="SlideShow();" class="btnSli">슬라이드쇼</a>
    </div>
</div>
<!---->
<?php
//현재접속 페이지 체크
$page = isset($_GET['page']) ? $_GET['page']:1;
$pics_per_page="4"; //리스트 갯수

//DB접속 및 갤러리리스트 전체갯수 구하기
require_once "DBconnect.php";
$result=mysqli_query($conn,"select count(idGallery) from gallery");
$row=mysqli_fetch_row($result);
$total=$row[0];

//전체 페이지 갯수
$total_page = ceil($total/$pics_per_page);
?>
<!---->
<div class="inBox MAT20">
<div class="right">총<span class="fRedfontBold"><?=$total ?></span>개[<span class="fontBold"><?=$page?></span> / <?=$total_page ?> ]</div>
</div>
<ul class="imglist">
<!--    리스트 반복  -->
    <?php
    if ($total > 0){
        $start=($page -1)*$pics_per_page;
        $result=mysqli_query($conn,"select * from gallery order by idGallery desc limit $start,$pics_per_page");
        //나머지 출력갯수 맞추기
        $rest=$pics_per_page;
        while($row=mysqli_fetch_array($result)){
            $rest--;
            echo <<<_li_
<li>
<a href="show.pic.html?page=$page&num={$row['idGallery']}">
<div><img src="./test/pics/{$row['imgFullNameGallery ']}"></div>
<div class="con">
<div class="tit">{$row['titleGallery']}</div>
</div>
</a>
</li>
_li_;
        }
        //이미지 없을 때 처리
        while($rest--){
            echo <<<_li2_
<li>
<div class="no_img">No_img</div>
</li>
_li2_;

        }
    }
    else{
        //초기자료 미입력시 출력되는 부분
        echo "<li class='listNo'>입력된 자료가 없습니다.</li>";
    }
    ?>
//    리스트 반복
</ul>
//페이징
<div class="paging">
    <ul>
        <?php
        $page_print=10;
        $block=ceil($page / $page_print);
        $sp=($block-1)*$page_print+1;
        $ep=($block*$page_print > $total_page)?$total_page:$block*$page_print;
        //이전
        if ($block > 1){
            echo "<li><a href='list.html?page=".($sp-1)."'><이전</a><li>";
        }
        //페이지 출력
        for ($p=$sp; $p <= $ep; $p++){
            if ($p==$page){
                echo "<li class='on'><a href='javascript:void(0);'>$p</a></li>";
            }else{
                echo "<li><a href='list.html?page=$p'>$p</a></li>";
            }
        }
        //다음
        if ($total_page > $ep){
            echo "<li><a href='list.html?page=".($ep+1)."'>다음</a></li>";
        }
        ?>
    </ul>
</div>
<!--페이징-->
</body>
</html>