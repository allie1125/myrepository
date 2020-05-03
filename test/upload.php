<html>
<head>
    <title>
        image upload
    </title>
</head>
<body>
<form name="imgupload" action="upload.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="MAX_FILE_SIZE" value="25242880"/>
        <input type="file" name="upload"/>
        <input type="submit" value="업로드"/>
</form>
</body>
</html>