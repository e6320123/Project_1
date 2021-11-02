 
 
function shuffle(arr) {
    var i, j, temp;

    for (i = arr.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        temp = arr[i];
        arr[i] = arr[j];
        arr[j] = temp;
    }
    return arr;
};

obj = shuffle(obj);


var all_str = `<p style="border-bottom:2px solid gray;">遊戲搜索欄</p>`;

for (let i = 0; i < obj.length; i++) {

    var xmp_frame = document.getElementById("xmp_frame").innerHTML;
    xmp_frame = xmp_frame.replace('*id*',obj[i].id);
    xmp_frame = xmp_frame.replace('*platform*',obj[i].platform);
    xmp_frame = xmp_frame.replace('*name*',obj[i].name);
    xmp_frame = xmp_frame.replace('*imgsrc*',obj[i].imgsrc);
    xmp_frame = xmp_frame.replace('*imgsize*',obj[i].imgsize);
    all_str += xmp_frame;
    
}


document.getElementById("L_content").innerHTML = all_str;


