<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<!-- Button to Open the Modal -->
<a href="#" id="test" data-content="쪽지보내기" >사용자 아이디</a>
<div id="result"></div>

<div class="container">

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">쪽지 보내기</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <label for="sendingMsg">받는 사람: </label>
                        <input type="text" class="form-control" id="sendingMsg"
                               aria-describedby="emailHelp" placeholder="내용을 입력하세요.">
                        <small id="emailHelp" class="form-text text-muted">불순한 의도로 동행접근 및 금전적 요구 적발시 강퇴처리합니다.</small>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" id="buttonCloseId" data-dismiss="modal">보내기</button>
                </div>

            </div>
        </div>
    </div>

</div>

<script type="text/javascript">

    jQuery(function () {
        $('a#test').on("click",function () {
            $('a#test').popover({
                trigger: 'manual',
                placement: 'bottom',
                // content: '쪽지보내기',
                trigger: 'focus'
            });
            $('a#test').popover("show");

            //쪽지 보내기 클릭 시
            $('.popover-content').on("click",function () {
                //메시지창 빈칸으로 초기화
                $('#sendingMsg').val('');
                //모달창 띄우기
                $('#myModal').show();
            });
        });
    });

    jQuery(function () {
        $('#buttonCloseId').on('click',function () {
            var databack = $("#myModal #sendingMsg").val().trim();
            $('#result').html(databack);
            $('#myModal').hide();
        });
    });
</script>

</body>
</html>