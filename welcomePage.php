<!doctype html>

<html>

<script type="text/javascript">

    // 대분류
    var firstList = new Array("동남아/대만/서남아","중국/홍콩/극동러시아","일본","남태평양","유럽","아프리카","미주/하와이","중남미");

    // 중분류
    var secondList1 = new Array("보라카이","세부","방콕","타이페이","하노이","다낭","푸켓","싱가포르","코타키나발루","라오스(방비엥)","마닐라"
                                ,"보홀","나트랑","호치민","쿠알라룸프르","인도(델리)","치앙마이","팔라완","끄라비","캄보디아(씨엠립)","인도네시아(발리)");
    var secondList2 = new Array("북경","상해","홍콩","마카오","하이난(싼야)","하이난(해구)","장가계","황산","태항산","계림","곤명","귀주(귀양)"
                                ,"칭다오","서안","백두산","중경","성도/구채구","몽골","하문","실크로드(우루무치)","블라디보스톡","이르쿠츠크","하바로프스크");
    var secondList3 = new Array("오사카","도쿄","후쿠오카","삿포로","오키나와","나고야","아오모리","시즈오카","도야마","요나고","다카마츠","히로시마"
                                ,"기타큐슈","이시가키","나가사키","가고시마","오카야마","후라노","이바라키","야마가타","대마도","시모노세키");
    var secondList4 = new Array("괌","팔라우","피지(난디)","시드니","케언즈","크라이스트처치","로토루아","브리즈번","골드코스트","멜버른"
                                ,"에어즈락","마리아나(사이판)","타히티(보라보라섬)","오클랜드(뉴질랜드)","퀸스타운");
    var secondList5 = new Array("런던","파리","루체른","로마","브뤼셀","프라하","비엔나","부다페스트","두브로브니크","오슬로","바르셀로나"
                                ,"리스본","이스탄불","아테네","두바이","요르단(와디럼)","모스크바","베네치아","에스토니아(탈린)","프랑크푸르트","암스테르담","트빌리시","블라디보스톡","하바로프스크"
                                ,"이르쿠츠크");
    var secondList6 = new Array("케이프타운","빅토리아폭포","나이로비","이집트(카이로)","모로코(카사블랑카)");
    var secondList7 = new Array("시애틀","샌프란시스코","로스엔젤레스","라스베이거스","그랜드캐년","뉴욕","워싱턴","마이애미","보스턴","밴쿠버"
                                ,"로키(캘거리)","옐로나이프","퀘백","토론토","호놀룰루","마우이","빅아일랜드","카우아이","앵커리지","나이아가라");
    var secondList8 = new Array("멕시코시티","칸쿤","페루(마추픽추)","페루(나스카)","쿠아(아바나)","브라질(이과수)","칠레(산티아고)","볼리비아(우유니)","브라질(리우 데 자네이루"
                                ,"부에노스 아이레스");

    // 페이지 로딩시 자동 실행
    window.onload = function(){
        var firstSelection = document.getElementById("firstSelect"); // SELECT TAG

        for (i =0 ; i<firstList.length; i++){// 0 ~ 3
            // 새로운 <option value=''>값</option> 태그 생성
            var optionEl = document.createElement("option");

            // option태그에 value 속성 값으로 저장
            optionEl.value = firstList[i];

            // text 문자열을 새로 생성한 <option> 태그의 값으로 추가
            optionEl.appendChild (document.createTextNode(firstList[i]));

            // 만들어진 option 태그를 <select>태그에 추가
            firstSelection.appendChild(optionEl);
        }

        var secondSelection = document.getElementById("secondSelect"); // SELECT TAG
        secondSelection.style.display = "none";  // 태그 감추기

    }

    // 대분류 선택시
    function changeFirstSelect(){
        var firstSelection = document.getElementById("firstSelect"); // SELECT TAG
        var idx = firstSelection.options.selectedIndex;     // 선택값 0 ~ 3


        if (idx < 1 && idx > 8){
            return;
        }


        secondSelectFill(idx);   // 중분류 생성
    }


    function secondSelectFill(idx) {
        var secondSelection = document.getElementById("secondSelect"); // SELECT TAG

        var data = null;

        if (idx == 0) {
            secondSelection.style.display = "none";  // 중분류 태그 감추기
            return;
        }

        if (idx == 1) {
            data = secondList1

        }
        if (idx == 2) {
            data = secondList2

        }
        if (idx == 3) {
            data = secondList3

        }
        if (idx == 4) {
            data = secondList4

        }
        if (idx == 5) {
            data = secondList5

        }
        if (idx == 6) {
            data = secondList6

        }
        if (idx == 7) {
            data = secondList7

        }
        if (idx == 8) {
            data = secondList8

        }
        secondSelection.innerHTML = "";  // 태그 출력

        for (i = 0; i < data.length; i++) {
            // 새로운 <option value=''>값</option> 태그 생성
            var optionEl = document.createElement("option");

            // value 속성 태그에 저장
            optionEl.value = data[i];

            // text 문자열을 새로 생성한 <option> 태그에 추가
            optionEl.appendChild(document.createTextNode(data[i]));

            // 만들어진 option 태그를 <select>태그에 추가
            secondSelection.appendChild(optionEl);
        }

        secondSelection.style.display = ""; // 중분류 태그 출력

    }


</script>
<body>
<div id="citySelection">
    <select id="firstSelect" onChange="changeFirstSelect();">
        <option value="">대분류를 선택하세요.</option>
    </select>

    <select id="secondSelect" >
        <option value="">중분류 선택하세요.</option>
    </select>
</div>
</body>
</html>
<!--<html>-->
<!--    <body>-->
<!---->
<!--    환영합니다.-->
<!--    로그인 하시고 지금 바로 Travel Together 에서 멋진 여행 동반자를 만나보세요!-->
<!--    <a href="login.php">로그인하</a>-->
<!---->
<!---->
<!--    <ul>-->
<!--        <il>1</il>-->
<!--        <il>2</il>-->
<!--    </ul>-->
<!---->
<!--    </body>-->
<!--</html>-->

<?php