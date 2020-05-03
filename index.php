<?php
include_once "DBconnect.php";
?>
<!doctype html>
<html>
<head>
    <title></title>
    <?php
    if (isset($_POST['btn_upload'])){
        $filename = $_FILES['file']['name'];
        $target_dir = "upload/";
        if ($filename != ''){

        $target_file = $target_dir.basename($_FILES['file']['name']);

        //File extension
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        //valid file extension
        $extensions_arr = array("jpg","jpeg","png","gif");

        //check extension
        if (in_array($extension,$extensions_arr)){

            //convert to base64
            $image_base64 = base64_encode(file_get_contents($_FILES['file']
            ['tmp_name']));
            $image = "data::image/".$extension.";base64,".$image_base64;

            //store image to 'upload' folder
            if (move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){

                //insert record
                $sql = "INSERT INTO images(name,image) VALUES ('".$filename."','".$image."')";
                mysqli_query($conn,$sql);
            }
        }
        }
    }
    ?>
</head>
<body>
<form method="post" action="" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="btn_upload" value="업로드">


</form>
</body>
</html>
