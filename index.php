<?php 


include 'info.php';

session_start();


$login = "Login";
$reg = "Register";
$login_url = "login.php";
$reg_url = "reg.php";
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
    $reg = $_SESSION['user'];
    $login = "Logout";
    $login_url = "logout.php";
}


// #撈出遊戲資料
try {
	$db = new PDO($PDO_host,$PDO_user,$PDO_pwd);
	$sql = "SELECT * FROM games;";
	$statement = $db->query($sql); 
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results, JSON_UNESCAPED_UNICODE);
}
catch (PDOException $e) {
  echo "<br>";
  echo $e->getMessage();
  die();
}
  
 
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
    <!-- <link href="bootstrap.min.css" rel="stylesheet"> -->

    <link rel="stylesheet" href="c.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">

    <script>
        var obj = <?php echo $json;?>; 
 
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
    <div id="top">

        <div class="mynav">
            <ul class="ul">
                <li>
                    <a href="http://<?php echo $host;?>">
                        首頁
                    </a>
                </li>
                <li id="Online">線上遊戲</li>
                <li id="PC">PC GAME</li>
                <li id="PS4">PS4</li>
                <li id="NS">NS</li>
            </ul>
        </div>
        <div id="search">
            <input id="inputsearch" onclick="inputsearch()" style="border: gray solid 1px;border-radius:15px;" type="text" placeholder="  請輸入搜尋">
            <i style="color:white;" class="fa fa-search" aria-hidden="true"></i>

            <a href="<?php echo $login_url;?>" id="login" class="login">
                <?php echo $login;?>
            </a>
            <a href="<?php echo $reg_url;?>" id="reg" class="reg">
                <?php echo $reg;?>
            </a>
        </div>  
    </div>
    <div id="content" class="cntbgcolor">
        
        <div id="L_content" class="cntbgcolor">
            
        </div>
         

        <div id="R_content" class="cntbgcolor"><!--R content -->

            
        <h5 style="color:rgb(255, 138, 5);">
                最新消息
            </h5>

            <hr style="border: black solid 1px;">
            <div class="d-flex">
                <div  class="p-2 flex-fill">
                    <img style="width: 100%;" src="img/ps4/1.jpg" alt=""> 
                </div>
                <div  class="p-2 flex-fill">
                    <img style="width: 100%;" src="img/xb/xb1.jpg " alt="">
                </div>
                <div  class="p-2 flex-fill">
                    <img style="width: 100%;" src=" img/pirate/pirate1.jpg" alt="">
                </div>
                <div  class="p-2 flex-fill">
                    <img style="width: 100%;" src="img/gta5/gta5.jpg " alt="">
                </div>
            </div>

            <div class="d-flex ">
                <div style="width:25%;" class="p-1">
                    <p style="font-size: 16px;color: grey;">
                        <a>
                            《魔物獵人世界：Iceborne》將推出PS4 主機上蓋、控制器及穿戴式揚聲器等相關產品
                        </a>
                    </p>
                </div>
                <div style="width:25%;" class="p-1">
                    <p style="font-size: 16px;color: grey;">
                        <a>
                            《戰爭機器 5》將推出特別款式 Xbox One X 主機同捆組 伴隨凱特揭露以血束縛的真相
                        </a>
                    </p>
                </div>
                <div style="width:25%;" class="p-1">
                    <p style="font-size: 16px;color: grey;">
                        <a>
                            由迪士尼正版授權，西山居遊戲推出的《神鬼奇航 榮耀之海 》（iOS / Android）日前於 ChinaJoy 2019 中亮相。
                        </a>
                    </p>
                </div>
                <div style="width:25%;" class="p-1">
                    <p style="font-size: 16px;color: grey;">
                        <a>
                            《俠盜獵車手 5》線上模式「鑽石賭場度假村」發放開幕參與者獎勵
                        </a>
                    </p>
                </div>
            </div>


            <!-- ------- ---------小欄位------------------------------------------------- -->
            <div class="rowframe">
                <table>
                    <tr>
                        <td>
                            <a href="link/dxi.html"><img class="rowimg" src="img/dxi/1.jpg" alt=""></a>
                        </td>
                        <td>
                            <h6>
                                <a href="link/dxi.html">
                                    《勇者鬥惡龍XI S》體驗版近期公開！《魔導少年》真島浩設計服裝同步發表
                                </a>
                            </h6>
                            <p class="rowp">
                                日本 Square Enix 預定於 2019 年 9 月 27日在 Nintendo Switch 主機上推出，將之前在 PS4／N3DS 等平台推出的人氣
                                RPG《DQXI》重新加強移植的《勇者鬥惡龍XI S 尋覓逝去的時光 Definitive Edition》（ドラゴンクエストXI
                                過ぎ去りし時を求めてS），宣布將於近期推出遊戲體驗版讓玩家們搶先試玩！本作為一款將之前於 PS4／N3DS 主機上推出的《DQXI》給重新移植到 Switch
                                主機上重新推出，並追加角色語...
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="rowframe">
                <table>
                    <tr>
                        <td>
                            <a href="link/zinyu.html"><img class="rowimg" src="img/zinyu/2.jpg" alt=""></a>
                        </td>
                        <td>
                            <h6>
                                <a href="link/zinyu.html">
                                    【評測】與其奔波勞碌廝殺拚命，不如回《神鵰俠侶2》做比翼雙飛
                                </a>
                            </h6>
                            <p class="rowp">
                                由中國完美時空出品的重大IP製作《神鵰俠侶2》，歷經近一年的封測與調校，於7月底正式開啟內地全平台公測。
                                細緻畫質任君選擇與之前版本不同的，主要在於畫面細膩度與3D視角的自由移動。目前大多數的手遊雖然已經可以自由切換 ...
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="rowframe">
                <table>
                    <tr>
                        <td>
                            <a href="link/bee.html"><img class="rowimg" src=" img/bee.jpg" alt=""></a>
                        </td>
                        <td>
                            <h6>
                                <a href="link/bee.html">
                                    人氣PC圖像益智猜謎問答手機移植版《Koongya Catch
                                    Mind》8月8日韓國雙平台同步推出
                                </a>
                            </h6>
                            <p style="color:rgb(115, 126, 126);">
                                韓國 Netmarble（網石遊戲）預定於 2019 年在韓國手機平台上推出的圖像益智猜謎問答遊戲《Koongya Catch Mind》（쿵야 캐치마인드），正式宣布將決定於
                                8 月 8 日起在韓國 App Store／Google Play 推出上架！本作為一款將 200....
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="rowframe">
                <table>
                    <tr>
                        <td>
                            <a href="link/cod.html"><img class="rowimg" src="img/cod/1.jpg" alt=""></a>
                        </td>
                        <td>
                            <h6> 
                                <a href="link/cod.html">
                                    《決勝時刻：現代戰爭》多人對戰宣傳預告曝光！跨平台連線公測日期同步公布
                                </a>
                            </h6>
                            <p style="color:rgb(115, 126, 126);">
                                由 Infinity Ward 所開發的《決勝時刻：現代戰爭》在今年 5 月首次曝光後便獲得了不小的關注，而隨著正式的發售日期已確立為 10 月 25
                                日後，更是讓不少系列粉絲更為期待。而官方近期也釋出了新的遊戲展示預告，讓玩家一窺該作的多...
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="rowframe">
                <table>
                    <tr>
                        <td>
                            <a href="link/wc3.html"><img class="rowimg" src="img/wc3/wc3.jpg" alt=""></a>
                        </td>
                        <td>
                            <h6>
                                <a href="link/wc3.html">
                                    《魔獸爭霸 3》重製版新資訊曝光！索爾、泰蘭妲及多個單位高畫質遊戲模組亮相
                                </a>
                            </h6>
                            <p style="color:rgb(115, 126, 126);">《魔獸爭霸 3》重製版在 2018 年的 Blizzcon
                                上曝光後，不少死忠玩家便都在等待該款作品再次以高品質的重製再次登場，不過官方至今依然沒有給出明確的上市日期，僅表示遊戲預計於今年正式登場，想必是讓不少人等的相當痛苦吧？...
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="rowframe">
                <table>
                    <tr>
                        <td>
                            <a href="link/cadin.html"><img class="rowimg" src="img/cadin/2.jpg" alt=""></a>
                        </td>
                        <td>
                            <h6>
                                <a href="link/cadin.html">
                                    《跑跑卡丁車》世界爭霸賽國家代表決賽 4名國家代表將赴韓爭奪世界冠軍
                                </a>
                            </h6>
                            <p style="color:rgb(115, 126, 126);">
                                遊戲橘子今年首度舉辦的《跑跑卡丁車》世界爭霸賽，於昨（4）日在世貿漫畫博覽會現場舉行
                                2019《跑跑卡丁車》世界爭霸賽國家代表最終戰，來自各方實力強勁的代表隊在經過一連串精采絕倫的賽事後，最終由「爆哥」、「睏平」...
                            </p>
                        </td>
                    </tr>
                </table>
            </div>

        </div><!--R content -->


      

        <div id="xmp_frame" style="display: none;">
            <table class="smallFrame">
                <tbody>
                    <tr>
                        <td>
                            <img id="game_*id*"class="img_*imgsize*" src="img/*imgsrc*" alt="">
                        </td>
                        <td>
                            <span>*platform*</span> *name*
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


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

        <!-- <script src="jquery.js"></script>
      <script src="bootstrap.min.js"></script>
     -->






     <script src="xmp.js"></script>
     <script src="game.js"></script>
</body>
</html>


