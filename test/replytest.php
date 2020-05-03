<!doctype html>
<html>
    <head>
        <script src='https://code.jquery.com/jquery-3.1.0.min.js'></script>
        <script>
            $(function(){
                //수정하기 버튼을 클릭했을 때
                $(document).on('click','#btn',function(){
                // $('#btn').on('click',function(){
                    //editform에 담겨있던 문자를 text변수에 담음
                    var text = $("#editform").text();
                    $("#editform").html("<input type='text' value='"+text+"' id='editDo'>");
                    $("#editbtn").html("<button type='button' id='btnDo'>수정</button>"
                        // + "<button type='button' id='btnCancel'>취소</button>"
                    )

                });

                // $("#btnDo").on('click',function(){
                 $(document).on('click','#btnDo',function(){
                     $("#editform").text($("#editDo").val());
                     $("#editbtn").html("<button type='button' id='editbtn'>수정</button>");

                });
                 // $(document).on('click','#btnCancel',function () {
                 //     $("#editform").text($("#editform").val());
                 //     $("#editbtn").html("<button type='button' id='btn'>수정</button>");
                 // });

            });
        </script>
    </head>
    <body>
        <div id='editform'>이걸 수정하고 싶어</div>
        <div id='editbtn'><button type='button' id='editbtn'>수정</button></div>
    </body>
</html>