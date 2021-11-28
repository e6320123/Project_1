<?php

    include 'info.php';

    $reg = "登入";
    $login = "會員註冊";
    $reg_url = "login.php";
    $login_url = "reg.php";

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
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"><!--font awesome icon-->

    <!--登入模板-->
    <!-- <link rel='stylesheet' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'> -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body id="body_bg" class="">
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







    <div id="content" class="">

        <div class="wrapper">
            <form id="myForm" class="form-signin" action="http://<?php echo $host;?>/index.php" method="post">       
              <h2 class="form-signin-heading">Please login</h2>
              <input id="username" type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="" />
              <input id="password" type="password" class="form-control" name="password" placeholder="Password" required=""/>      
              <label class="checkbox">
                <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
              </label>
              <button class="btn btn-lg btn-primary btn-block" type="button" onclick="checkData()">Login</button>   
            </form>
          </div>
 
    </div>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>


<script>

    function checkData(){
        let username = document.getElementById("username").value;
        let password = document.getElementById("password").value;

        let response = "";

        var ajax = new XMLHttpRequest();
        
        ajax.onload = function() {

            response = ajax.responseText;
            
            console.log(response);
            if(response == 'success')
            {
                alert("登入成功");
                document.getElementById("myForm").submit()
            }
            else if(response == 'user wrong')
            {
                alert("沒有此帳號");
            }
            else if(response == 'pwd wrong')
            {
                alert("密碼錯誤");
            }
            else
            {
                alert("error");
            }
        }


        ajax.open("GET", "http://<?php echo $host;?>/check.php?username="+ username +"&password="+ password,true);
        ajax.send();

        
    }


</script>
         
</body>

</html>
