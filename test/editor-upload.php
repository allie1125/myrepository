<?php
if ($_FILES['file']['name']) {
    if (!$_FILES['file']['error']) {
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = round(microtime(true)).'.'.end($temp);
        $destinationFilePath = '../img/gallery/'.$newfilename;
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $destinationFilePath)) {
        }
        else{
            echo $destinationFilePath;
        }
    }
    else {
        echo  $message = '파일 에러 발생!: ' . $_FILES['file']['error'];
    }
}
?>