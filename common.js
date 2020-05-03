//페이지 전체 로딩 후 동작
$(document).ready(function(){
    //re_bt클래스 클릭시 post형식으로 reply_php에 데이터를 전송
    $("#rep_bt").click(function(){
        //bno클래스와 dat_user,dat_pw,reply_content 클래스의 value값을 가져온다.
        $.post("replyprocess.php",{
                bno:$(".bno").val(),
                dat_user:$(".dat_user").val(),
                content:$(".reply_content").val(),
            },
            //date와 success를 함수로 success가 success와 같으면 html형식으로 data를 추가하고 alert 창을 띄움
            //ajax로 실시간으로 데이터를 전송하지만 form태그를 사용했기 때문에 새로고침이 동작
            function(data,success){
                if(success=="success"){
                    $(".reply_view").html(data);
                    alert("댓글이 작성되었습니다");
                }else{
                    alert("댓글작성이 실패되었습니다");
                }
            });
    });

});