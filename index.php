<?php 


include 'info.php';

session_start();

$reg = "登入";
$login = "會員註冊";
$reg_url = "login.php";
$login_url = "reg.php";
$json;

if(isset($_SESSION['login']))
{
    if($_SESSION['login'] == 'yes')
    {
        $login = "";
        $reg = "";
        $login_url = "";
        $reg_url ="";
    }
}

if(isset($_SESSION['user']))
{
    $login = "您好  ".$_SESSION['user'];
    $reg = "登出";
    $reg_url = "logout.php";
}

$var_ary = ['json', 'json2', 'json3'];
$sql_ary = [
    "SELECT * FROM games;",
    "SELECT * FROM news WHERE area_id = 1;",
    "SELECT * FROM news WHERE area_id = 2;"
];
 
// #撈出遊戲資料
try {
    $db = new PDO($PDO_host,$PDO_user,$PDO_pwd);
    for ($i=0; $i <3 ; $i++) { 
        $statement = $db->query($sql_ary[$i]); 
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        $varname = $var_ary[$i];
        $$varname = json_encode($results, JSON_UNESCAPED_UNICODE);
    } 
}
catch (PDOException $e) {
  echo $e->getMessage();
  die();
}
  
// echo $json;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game</title>
    <link rel="icon" href="img/d_icon.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="c.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <script>
        var obj = <?php echo $json;?>; 
        var news_obj = <?php echo $json2;?>; 
        var news_obj2 = <?php echo $json3;?>; 
 
        //調整id值
        for (let i = 0; i < obj.length; i++) {
            obj[i].id = i+"";
        } 
    </script>

</head> 

<body id="body_bg" class="cntbgcolor">

    <div id="toTop">
        <img id="toTopimg" src="img/up.png" alt="">
    </div>

    <div id="top" class="d-flex align-items-end justify-content-between">
                   
            <div id="navbar" style="width: 500px;" class="d-flex flex-row bd-highligh">
                <div class=" bd-highlight p-2">
                    <!-- &emsp; -->
                </div>
                <div class=" bd-highlight p-2">
                    <a id="Home" href="http://<?php echo $host;?>">
                        首頁
                    </a>
                </div>
                <div id="Online" class=" bd-highlight p-2 ">
                    線上遊戲
                </div>
                <div id="PC" class=" bd-highlight p-2">
                    PC GAME
                </div>
                <div id="PS4" class=" bd-highlight p-2">
                    PS4
                </div>
                <div id="NS" class=" bd-highlight p-2">
                    NS
                </div>
            </div>

            <div style="width:500px;" class="d-flex flex-row bd-highligh">
                <div class=" bd-highlight p-2">
                    <input id="inputsearch" onclick="inputsearch()" style="border: gray solid 1px;border-radius:15px;" type="text" placeholder="">
                    <i id="searchbtn"style="cursor: pointer; color:white;" class="fa fa-search" aria-hidden="true"></i>
                </div>
                <div class=" bd-highlight p-2">
                    <a href="<?php echo $login_url;?>" id="login" class="login">
                        <?php echo $login;?>
                    </a>
                </div>
                <div class=" bd-highlight p-2">
                    <a href="<?php echo $reg_url;?>" id="reg" class="reg">
                        <?php echo $reg;?>
                    </a>
                </div> 
            </div>

    </div>  <!-- <div id="top"> -->

    <div id="content" class="cntbgcolor">
        
        <div id="L_content" class="cntbgcolor"> </div>
         
        <div id="R_content" class="cntbgcolor">

            <h6 style="color:rgb(255, 138, 5);">
                最新消息
            </h6>

            <hr style="border: black solid 1px;">

            <div id="news_row" class="d-flex"> </div>

            <div id="news_row2" class="d-flex "> </div>

            <div id="news_row3"> </div>

        </div><!--R content -->

        <xmp id="xmp_frame" style="display: none;">
            <table class="smallFrame">
                <tr>
                    <td>
                        <img id="game_*id*"class="img_*imgsize*" src="img/*imgsrc*" alt="">
                    </td>
                    <td>
                        <span>*platform*</span> *name*
                    </td>
                </tr>
            </table>
        </xmp>

        <xmp id="xmp_news_row" style="display: none;">
            <div class="p-2 flex-fill">
                <img id="news_row_*id*" style="width: 100%;cursor: pointer;" src="img/*imgsrc*" alt=""> 
            </div>
        </xmp>

        <xmp id="xmp_news_row2" style="display: none;">
            <div style="width:25%;" class="p-1">
                <p style="font-size: 17px;">
                    <a href="#" id="news_row2_*id*" style="color: grey;">
                        *title*
                    </a>
                </p>
            </div>
        </xmp>

        <xmp id="xmp_news_row3" style="display: none;">
            <div class="rowframe">
                <table>
                    <tr>
                        <td>
                            <img id="news_row3_*id*" class="rowimg" src="img/*imgsrc*" alt="" style="cursor: pointer;">
                        </td>
                        <td>
                            <h6>
                                <a href="#" id="news_row3t_*id*">
                                    *title*
                                </a>
                            </h6>
                            <p class="rowp">
                                *content*
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </xmp>  


        <div id="downini"></div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
 


     <script src="xmp.js"></script>
     <script src="game.js"></script>
     <script src="cnt.js"></script>
</body>
</html>


