
<!--boardviewcontents 의 끝에 include 됨 -->
<!--dap_to comt_edit=editform-->
<!---->


<div class="replyView" align="left">
    <h3>댓글목록</h3>
    <div class="reply_box">
    <?php
    //reply table에서 게시판 번호가 받아온 변수 $no와 일치하는 데이터를 cno 오름차순으로 정렬하여 가져오는 쿼리
    $sql3 = "select * from reply where bno='".$no."' order by cno asc";
    $result = mysqli_query($conn,$sql3);
    while($row=mysqli_fetch_array($result)){
        ?>
        <div class="dap_lo">
            <div><b><?php echo $row['id_string'];?> </b></div>
            <form action="replyprocess.php" method="post">
            <input type="hidden" name="cno" value="<?php echo $row['cno']; ?>">
            <div class="dap_to comt_edit" id="editform" name="editform"><?php echo nl2br($row['content']); ?></div>
            </form>
            <div class="rep_me dap_to"><?php echo $row['date']; ?></div>

            <!--세션 is_login이 true이고, 세션id와 댓글입력id가 동일하면, 수정과 삭제버튼 보이기-->
            <?php if (isset($_SESSION['is_login']) && (($_SESSION['id_string']) === ($row['id_string']))){?>
                <div class="rep_me rep_menu">
                    <div id="dat_btn">
                        <button class="dat_edit_bt" id="editbtn" <?php echo $row['cno']?>">수정</button>
                    </div>

                </div>
            <?php }  ?>
        </div>
    <?php } ?>
    </div>

<!--    <script>-->
<!--        var jbResult = prompt( '쪽지내용입력', '' );-->
<!--        document.write( jbResult );-->
<!--    </script>-->

    <!--- 댓글 입력 폼 -->
    <form id="reply" method="post" action="replyprocess.php">
        <div class="dap_ins">
            <input type="hidden" name="bno" class="bno" value="<?php echo $no; ?>">
            <?php if(isset($_SESSION['is_login'])){?>
                <input type="hidden" name="dat_user" id="dat_user" class="dat_user" value="<?php echo $_SESSION['id_string']?>">
            <?php } ?>
            <div style="margin-top:10px; ">
                <textarea name="content" class="reply_content" id="re_content" value=""></textarea>
                <button type="submit" id="rep_bt" class="re_bt">댓글달기</button>
            </div>
        </div>
    </form>

<!--    댓글 수정   -->
    <script type="text/javascript" src=https://code.jquery.com/jquery-3.1.0.min.js></script>
    <script>
        $(function(){
            //수정하기 버튼을 클릭했을 때
            $(document).on('click','#editbtn',function(){
                //editform에 담겨있던 문자를 text변수에 담음
                var text = $("#editform").text();
                $("#editform").html("<input type='text' value='"+text+"' id='editDo'>");
                $("#dat_btn").html("<button type='button' id='btnDo'>수정</button>"
                )
            });

            $(document).on('click','#btnDo',function(){
                $("#editform").text($("#editDo").val());
                $("#dat_btn").html("<button type='button' id='editbtn'>수정</button>&nbsp;" + "<button type='button' id='deletebtn'>삭제</button>");

                // var data = $("#editform").text($("#editDo").val());
                //
                // $.ajax({
                //     url: "replyprocess.php",
                //     type:"POST",
                //     data: data,
                //     success:function (response) {
                //
                //     },
                //     error:function (jqXHR, textStatus,errorThrown) {
                //         console.log(textStatus,errorThrown);
                //     }
                // });

            });
        });

    </script>
</div>