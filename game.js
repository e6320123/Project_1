var big_src;
var arry = [];
var picSize = 'normal';

//toTop上捲動作
$("#toTop").on("click", "img", gototop)
//window捲動時
$(window).scroll(checkscroll) 
//點右鍵圖
$(document).on("click", "#r", rightArrow)
//點左鍵圖
$(document).on("click", "#l", leftArrow)
//變換大圖
$(document).on("click", ".tuku_down img", changebigpic); 
//切換全螢幕看圖
$(document).on("click",".tuku_up img", changeSize);
//全螢幕按鍵
$("body").keydown(function () {
    //左右切圖
    bigPicCtl(window.event.keyCode);
    //enter搜索
    if (window.event.keyCode == 13){
        searchKeyWord();
    }
})
//搜索欄
$("#search>img").click(searchKeyWord)
//導覽列
$("ul>li").click(function () {
    let id = $(this).attr('id');
    navShowL(id);
}) 

// 載入tuku後都需再跑一遍 loadTuku();
loadTuku();

// AJAX取網頁資料
$("#L_content").on("click","img", function () {

    let idx = $(this).attr('id').replace('game_','')*1+1;
    let ajax = new XMLHttpRequest();
    ajax.onload = function(){
        let htmlstr = ajax.responseText;
        console.log(htmlstr);
        $("#R_content").html(htmlstr);
        loadTuku();
    }
    ajax.open("get","getPage.php?gameID=" + idx, true);
    ajax.send(); 

})

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
 

function bigPicCtl(keyCode) {

    //'img/ac2/2.jpg'
    if (keyCode != 37 && keyCode != 39) return;
    if (picSize != 'full') return;
    let array1 = big_src.split('/');
    let fileName = array1.pop();    // array1 = ['img', 'ac2']    // fileName = '2.jpg'
    let array2 = fileName.split('.');
    let number = array2.shift() * 1;   // array2 = ['jpg']   // number = 2
    
    //左鍵37    右鍵39
    if (keyCode == 37 && number != 1) 
    {
        number--;
    }

    if (keyCode == 39 && big_src != $(".end").attr("src")) 
    {
        number++; 
    }  
    array2.unshift(String(number));
    fileName = array2.join('.');
    array1.push(fileName);
    big_src = array1.join('/');
    $(".tuku_up>img").prop("src", big_src);
}


function loadTuku() {
    var tuku_elm = "";
    var tukuArry = [];
    var childnum = document.getElementById('downini').children.length;
    if(childnum == 0) return;
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

function searchKeyWord() {

    let keyWord = $("#search>input").val();
    let filter_obj = [];
    if(keyWord.trim() == '')
    {
        alert('請輸入關鍵字');
    }
    else
    { 
        obj.forEach(oneObj => {
            if(oneObj['name'].indexOf(keyWord) != -1)
            {
                filter_obj.push(oneObj);
            }
        });
        if(filter_obj.length == 0) 
        {
            alert('沒有搜尋到結果');
        }
        else
        {
            xmp(`<p style="border-bottom:2px solid gray;">遊戲搜索欄</p>`, "xmp_frame", filter_obj, "L_content", ["page_id"]);
        }
    }
}


function navShowL(platform){
    let filter_obj = []; 
    obj.forEach(oneObj => {
        if(oneObj['platform'].indexOf(platform) != -1)
        {
            filter_obj.push(oneObj);
        }
    }); 
    xmp(`<p style="border-bottom:2px solid gray;">遊戲搜索欄</p>`, "xmp_frame", filter_obj, "L_content", ["page_id"]);
}

