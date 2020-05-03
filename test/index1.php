<!DOCTYPE html>
<html>
<head>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
</head>
<body>
<div class="container">
    <form>
        <textarea id="summernote"></textarea>
    </form>
</div>
<script>
    $(document).ready(function() {
        $("#summernote").summernote({
            placeholder:'place image here.',
            height:300,
            callbacks: {
                onImageUpload:function(files, editor, welEditable){
                    for(var i = files.length - 1;i>=0;i--){
                        sendFile(files[i], this);
                    }
                }
            }
        });
    });

    function sendFile(file, el, welEditable){
        var form_data = new FormData();
        form_data.append('file', file);
        $.ajax({
            data:form_data,
            type:"POST",
            url:'./editor-upload.php',
            cache:false,
            contentType:false,
            processData:false,
            success:function(url){
                $(el).summernote('editor.insertImage', $.trim(url));
            },
            error: function(data) {
                console.log(data);
            }
        });
    }
</script>
</body>
</html>
