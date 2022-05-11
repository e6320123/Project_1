<?php   


$news_id = $_GET['newsID'];


switch ($news_id) {
    case 1:
        include "news_page/ps4.html";
        break;
    case 2:
        include "news_page/xb.html";
        break;
    case 3:
        include "news_page/pirate.html";
        break;
    case 4:
        include "news_page/gta5.html";
        break;
    case 5:
        include "news_page/dxi.html";
        break;
    case 6:
        include "news_page/zinyu.html";
        break;
    case 7:
        include "news_page/bee.html";
        break;
    case 8:
        include "news_page/cod.html";
        break;
    case 9:
        include "news_page/wc3.html";
        break;
    case 10:
        include "news_page/cadin.html";
        break; 
    
    default:
        # code...
        break;
}


?>