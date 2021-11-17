<?php

    include 'info.php';

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

    <link rel='stylesheet' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>

    <link rel="stylesheet" href="css/style.css">

</head>

<body id="body_bg" class="">
    <div id="toTop">
        <img id="toTopimg" src="img/up.png" alt="">
    </div>
    <div id="top">

        <div class="mynav">
            <ul class="ul">
                <li>首頁</li>
                <li>線上遊戲</li>
                <li>PC GAME</li>
                <li>PS4</li>
                <li>NS</li>
            </ul>
        </div>
        <div id="search">
            <input type="text" placeholder="請輸入搜尋" name="" id="">
            <img src="img/sear.jpg" alt="">
            <a href="" id="login" class="login">
                
            </a>
        </div>  
    </div>
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
            if(response == 'success'){
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
