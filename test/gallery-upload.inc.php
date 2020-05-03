<?php

if (isset($_POST['submit'])){

    $newFileName = $_POST['filename'];
    //파일이름이 없을 때
    if (empty($newFileName)){
        //디폴트 파일이름 설정
        $newFileName = "gallery";
    }else{
        //파일이름의 공백을 -로 변경하고, 대문자를 소문자로 바꿈
        $newFileName = strtolower(str_replace(" ","-",$newFileName));
    }
    $imageTitle = $_POST['filetitle'];
    $imageDesc = $_POST['filedesc'];

    $file = $_FILES['file'];

    //에러 핸들링
    $fileName = $file["name"];
    $fileType = $file["type"];
    $fileTempName = $file["tmp_name"];
    $fileError = $file["error"];
    $fileSize = $file["size"];

    //업로드 된 file의 extention 얻기
    // 1 .이후의 마지막부분(extension)의 값 얻기 (ex. 123.png 에서 png부분)
    // 2 extension부분 소문자로 받아오기
    $fileExt = explode(".",$fileName);
    $fileActualExt = strtolower(end($fileExt));

    //허용되는 파일 타입
    $allowed = array("jpg","jpeg","png","gif");

    //에러핸들러

    //업로드하는 파일 형식 확인
    if (in_array($fileActualExt,$allowed)){
        if ($fileError === 0){
            if ($fileSize < 2000000){
                $imageFullName = $newFileName . "." . uniqid("",true) . "." . $fileActualExt;
                $fileDestination = "../test/pics/" . $imageFullName;

                //데이터베이스에 저장
                include_once "DBconnect.php";

                //이미지 제목이나 설명이 빈칸이면
                if (empty($imageTitle) || empty($imageDesc)){
                    header("Location: ../test/travelgallery.php?upload=empty");
                    exit();
                }else{
                    $sql = "SELECT * FROM gallery;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo "SQL statement failed";
                    }else{
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $rowCount = mysqli_num_rows($result);
                        $setImageOrder = $rowCount + 1;

                        $sql = "INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES(?,?,?,?);";
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo "SQL statement failed";
                        }else{
                            //value넣기
                            mysqli_stmt_bind_param($stmt,"ssss",$imageTitle, $imageDesc, $imageFullName, $setImageOrder);
                            mysqli_stmt_execute($stmt);

                            move_uploaded_file($fileTempName,$fileDestination);

                            header("Location: ../test/travelgallery.php?upload=success");
                        }

                    }
                }
            }else{
                echo " 파일 용량 초과!";
                exit();
            }
        }else{
            echo "업로드 실패!";
            exit();
        }
    }else{
        echo " jpg,jpeg,png 타입의 파일만 업로드 할 수 있습니다.";
        exit();
    }
}
