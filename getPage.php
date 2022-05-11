<?php   
 
$game_id = $_GET['gameID'];
 

switch ($game_id) {
    case 1:
        include "game_page/wow.html";
        break;
    case 2:
        include "game_page/etw.html";
        break;
    case 3:
        include "game_page/ac2.html";
        break;
    case 4:
        include "game_page/ttw.html";
        break;
    case 5:
        include "game_page/bio2.html";
        break;
    case 6:
        include "game_page/d3.html";
        break;
    case 7:
        include "game_page/dmc5.html";
        break;
    case 8:
        include "game_page/spm.html";
        break;
    case 9:
        include "game_page/dragon11.html";
        break;
    case 10:
        include "game_page/mh.html";
        break;
    case 11:
        include "game_page/witch3.html";
        break;
    case 12:
        include "game_page/pokemon.html";
        break;
    case 13:
        include "game_page/zelda.html";
        break;
    case 14:
        include "game_page/peria.html";
        break;
    case 15:
        include "game_page/dora.html";
        break; 
    
    default:
        # code...
        break;
}

 

?>