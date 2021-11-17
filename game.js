var big_src;
var arry = [];
var picSize = 'normal';

//toTop上捲動作
$("#toTop").on("click", "img", gototop)
//window捲動時
$(window).scroll(checkscroll)
//右鍵
$(document).on("click", "#r", rightArrow)
//左鍵
$(document).on("click", "#l", leftArrow)
//變換大圖
$(document).on("click", ".tuku_down img", changebigpic); 
//切換全螢幕看圖
$(document).on("click",".tuku_up img", changeSize);

function gototop() {
    let speed = $(window).scrollTop();
    let set = setInterval(function () {
        $(window).scrollTop(speed);
        if (speed <= 0) {
            clearInterval(set);
        }
        speed -= 17;
    }, 1);
}

function checkscroll() {      
    let show =  ($(this).scrollTop() > 700)?"visible":"hidden";
    $("#toTop").css("visibility", show);
}

function rightArrow(){
    if ($(".tuku_down img").eq(5).attr("class") != "end") { 
    
        //創造<p>填入<img>  再取出<p>裡面<img>的html字串型態
        let clone = $(".tuku_down img").eq(0);
        //append時也會順便移除clone這個節點
        let temp_elm = $("<p>").append(clone).html();
        arry.push(temp_elm);
    }
}

function leftArrow(){
    //第一張圖class不等於star時
    if ($(".tuku_down img").eq(0).attr("class") != "star") {
        let temp_elm = arry.pop();
        $(".tuku_down").prepend(temp_elm);  
    }
}

function changebigpic() {
    big_src = $(this).attr("src"); 
    //大圖src換成小圖的src
    $(".tuku_up>img").prop("src", big_src);
}


function changeSize() {

    big_src = $(this).attr("src"); 

    if (picSize == 'normal') {
        picSize = 'full';
        $(this).removeClass("smallScreen");
        $(this).addClass("fullScreen");
    } else {
        picSize = 'normal';
        $(this).removeClass("fullscreen");
        $(this).addClass("smallScreen");
    }
}
 

//------------------全螢幕控制---------------------------
$("body").keydown(function () {
   
    //'img/ac2/2.jpg'

    let array1 = big_src.split('/');
    
    let fileName = array1.pop();    // array1 = ['img', 'ac2']    // fileName = '2.jpg'
    
    let array2 = fileName.split('.');

    let number = array2.shift() * 1;   // array2 = ['jpg']   // number = 2
    
    //左鍵37    右鍵39

    if (picSize == 'full') {

        if (window.event.keyCode == 37 && number != 1) 
        {
            number--;
        }

        if (window.event.keyCode == 39 && big_src != $(".end").attr("src")) 
        {
            number++; 
        }  
        array2.unshift(String(number));
        fileName = array2.join('.');
        array1.push(fileName);
        big_src = array1.join('/');
        $(".tuku_up>img").prop("src", big_src);
    } 
})



// --------------------載入tuku後都需再跑一遍 loadTuku();--------------------
function loadTuku() {
    var tuku_elm = "";
    var tukuArry = [];
    var childnum = document.getElementById('downini').children.length;
    for (var i = 0; i < childnum; i++) {
        tuku_elm = $("<p>").append($(".tuku_down img").eq(0).clone()).html(); //取<img>元素        
        tukuArry.push(tuku_elm);
        $(".tuku_down img").eq(0).remove();
    }
    for (var i = 0; i < 11; i++) {
        tuku_elm = tukuArry[tukuArry.length - 1]
        $(".tuku_down").prepend(tuku_elm);
        tukuArry.pop();
    }
    $(".tuku_down img").css("margin", "2px");
}

loadTuku();
 
