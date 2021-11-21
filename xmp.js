 
 
xmp(`<p style="border-bottom:2px solid gray;">遊戲搜索欄</p>`, "xmp_frame", obj, "L_content", ["page_id"]);

obj = shuffle(obj);     //洗牌
 
function shuffle(arr) {
    var i, i2, temp;

    for (i = arr.length - 1; i > 0; i--) {
        i2 = Math.floor(Math.random() * (i + 1));
        temp = arr[i];
        arr[i] = arr[i2];
        arr[i2] = temp;
    }
    return arr;
};

function xmp(start_str, frame, obj_data, input_loc, delete_key){
    // 注意keys必須和星號包起的取代處同名
    // start_str = 沒有要用迴圈繞的固定起始字串
    // frame = 要繞的xmp框架
    // obj_data = 取代xmp星號字串的obj檔案
    // input_loc = 繞完後要放入的地方
    // delete_key = xmp沒有要繞的key 先行剔除
    let all_str = start_str;

    let keys = Object.keys(obj_data[0]);

    let delete_array = delete_key;

    delete_array.forEach(element => {
        let delete_key = element;
        keys = keys.filter(key =>
            key!=delete_key
        ); 
    }); 

    obj_data.forEach(obj => {
        let xmp_frame = document.getElementById(frame).innerHTML;
        keys.forEach(key => {
            xmp_frame = xmp_frame.replace('*'+ key +'*', obj[key]);
        });
        all_str += xmp_frame;
    }); 
    document.getElementById(input_loc).innerHTML = all_str;
}

 