<!DOCTYPE html>

<html lang="ko">

<head>

    <meta charset="UTF-8">
    <title>Document</title>
    <script>
        /*
            엘리먼트의 속성을 추가/변경/삭제/조회하기
                - 속성의 추가 : 엘리먼트에 새로운 속성과 속성값을 추가한다.
                    el.setAttribute(속성명, 속성값);
                - 속성의 변경 : 엘리먼트에 지정된 속성명을 새로운 속성값으로 바꾼다.
                    el.setAttribute(속성명, 속성값);
                - 속성의 삭제 : 엘리먼트에서 지정된 송성명과 일치하는 속성을 삭제한다.
                    el.removeAttribute(속성명);
                - 속성값 조회 : 엘리먼트에서 지정된 속성명의 속성값을 가져간다.
                    el.getAttribute(속성명);
        */

        function disaledInput(){
            var input = document.getElementById("id value");
            // input엘리먼트에 disbled="disabled" 속성 추가한다.
            input.setAttribute("disabled", "disabled");
        }

        function enabledInput() {
            var input = document.getElementById("id value");
            // input엘리먼트에서 "disabled"라는 이름의 속성 삭제
            input.removeAttribute("disabled");

        }

        function getNameAttr() {
            var input = document.getElementById("id value");
            var attValue = input.getAttribute("name");
            alert(attValue);
        }

        function getIdAttr(){
            var input = document.getElementById("id value");
            var attValue = input.getAttribute("id");
            alert(attValue);
        }

    </script>
</head>

<body>

<form>
    <input type="text" name="name value" id="id value" />
</form>

<!-- input, select, textarea, button에 disabled="disabled" 속성을 추가하면 해당 엘리먼트는 비활성화 된다.-->
<button onclick="enabledInput();">활성화</button>
<button onclick="disaledInput();">비활성화</button>

<button onclick="getNameAttr();">name 속성값 읽어오기</button>
<button onclick="getIdAttr();">id 속성값 읽어오기</button>

</body>
</html>
