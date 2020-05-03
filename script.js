
const controls=document.querySelector(".controls");
//갤러리 컨테이너 안의 childrenItems
const galleryItems = document.querySelector(".gallery-container").children;

const prev=document.querySelector(".prev");
const next=document.querySelector(".next");
const page=document.querySelector(".page");
const maxItem=8;
let index=1;

// 섹션 개수 구하기
// 전체 아이템 수에서 maxItem 을 나누고 반올림
const pagination=Math.ceil(galleryItems.length/maxItem);

// prev.addEventListener("click",function () {
//
//     if (index<=1){
//         prev.classList.add("disabled");
//         alert("첫번째 페이지입니다.");
//     }else{
//         index--;
//         check();
//         showItems();
//     }
//  });
//
// //다음 아이템 더 보이기
// next.addEventListener("click",function () {
//     index++;
//     check();
//     showItems();
//  });

// function check() {
//     if(index==pagination){
//        next.classList.add("disabled");
//     }
//     else{
//         next.classList.remove("disabled");
//     }
//
//     if (index==1){
//         prev.classList.add("disabled");
//     }else {
//         prev.classList.remove("disabled");
//     }
// }

// function showItems() {
//     for (let i=0; i<galleryItems.length; i++){
//         galleryItems[i].classList.remove("show");
//         galleryItems[i].classList.add("hide");
//
//         if ( i >= (index*maxItem)-maxItem && i < index*maxItem){
//             // if i greater than and equal to (index*maxItem)-maxItem;
//             // means (1*8)-8=0 if index=2 then (2*8)-8=8
//             galleryItems[i].classList.remove("hide");
//             galleryItems[i].classList.add("show");
//         }
//         page.innerHTML=index;
//     }
// }

//페이징 섹션 숫자
const ul = document.createElement("ul");
for (let j=1; j<=pagination; j++){
    const li=document.createElement("li");
    li.id=j;
    li.innerHTML=j;
    li.setAttribute("onclick","controlSlides(this)");
    ul.appendChild(li);
    if (j==1){
        li.className="active";
    }
}

controls.appendChild(ul);
//섹션 숫자를 클릭할 때

function controlSlides(ele){
    // if there is no value for section clicked
    if (ele.id == undefined){
        //control children ul element를 선택
        const ul=controls.children;
        //ul children 'li' elements 선택
        const li=ul[0].children;
        li[0].className="active";

        // add "hide" attribute to all children(gallery items)
        for (let m=0; m<galleryItems.length; m++){
            galleryItems[m].classList.remove("show");
            galleryItems[m].classList.add("hide");

            if (m<8){
                //add "show" attribute to index number 0~7 children
                galleryItems[m].classList.remove("hide");
                galleryItems[m].classList.add("show");
            }
        }
    }else{
        //control children ul element를 선택
        const ul=controls.children;
        //ul children 'li' elements 선택
        const li=ul[0].children;
        var active;

        for (let i=0; i<li.length; i++){
            if (li[i].className=="active"){
                //어떤것이 active 상태인지 찾기
                active=i;
                //모든 'li' elements 에서 active class 제거
                li[i].className="";
            }
        }
        //현재 페이지에 active 추가
        ele.className="active";
        //console.log(li)
        console.log(ele.id);

        for (let i=0; i<galleryItems.length; i++){
            galleryItems[i].classList.remove("show");
            galleryItems[i].classList.add("hide");

            if ( i >= (ele.id*maxItem)-maxItem && i < ele.id*maxItem){
                // if i greater than and equal to (index*maxItem)-maxItem;
                // means (1*8)-8=0 if index=2 then (2*8)-8=8
                galleryItems[i].classList.remove("hide");
                galleryItems[i].classList.add("show");
            }
            page.innerHTML=index;
        }
    }
}

window.onload=controlSlides(index);
// window.onload=showItems();
// window.onload=function(){
//     showItems();
//     check();
// };