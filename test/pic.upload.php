<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
//파일이 임시폴더에 업로드 되었는지 체크
if (!is_uploaded_file($_FILES['pic']['tmp_name'])){
    echo <<<_DIV_
    <div class="file_err_text">파일이 업로드 되지 않았습니다. 확인 하세요.</div>
<div class="btnZone">
<input type="button" value="확인" onclick="history:go(-1);" class="btnOk btnSmall"/>
</div>
_DIV_;
exit();
}
//동일이름 파일 존재 여부 체크
if (file_exists('./pics/'.$_FILES['pic']['name'])){
    echo <<<_DIV3_
    <div class="file_err_text">동일한 이름을 가진 파일이 있습니다. 다른 파일명을 입력하세요.</div>
<div class="btnZone">
<input type="button" value="확인" onclick="history:go(-1);" class="btnOk btnSmall"/>
</div>
_DIV3_;
    exit();
}
//파일을 임시파일폴더에서 사용자서버 폴더로 복사해서 업로드
//만약 업로드가 되지 않았다면 (임시폴더의 파일을 pics폴더에 사용자가 지정한 이름으로 업로드)
if (!move_uploaded_file($_FILES['pic']['tmp_name'],"./pics/".$_FILES['pic']['name'])){
    echo <<<_DIV2_
    <div class="file_err_text">사진을 복사하지 못했습니다. 관리자에게 문의하세요.</div>
<div class="btnZone">
<input type="button" value="확인" onclick="history:go(-1);" class="btnOk btnSmall"/>
</div>
_DIV2_;
    exit();
}
require_once "DBconnect.php";
$userID = 'ally';
$title = addslashes($_POST['title']);
$pic = $_FILES['pic']['name'];
mysqli_query($conn, "insert into gallery values (null,$userID,$title,$pic)");
mysqli_close($conn);
echo "<script>opener.location.reload();self.close();</script>";
?>