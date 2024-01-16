<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8" name="viewport" content="user-scalable=no,initial-scale=1">
<title>로그인 - AllDiscounts</title>
<link rel="stylesheet" type="text/css" href="./css/common_mobile.css" media="screen and (max-width: 959px)">
<link rel="stylesheet" type="text/css" href="./css/common.css" media="screen and (min-width: 960px)">
<link rel="stylesheet" type="text/css" href="./css/login_mobile.css" media="screen and (max-width: 959px)">
<link rel="stylesheet" type="text/css" href="./css/login.css" media="screen and (min-width: 960px)">
<script type="text/javascript" src="./js/login.js"></script>
</head>
<?php require('dark.php'); ?>
<body style="background-color: <?php echo $background;?>; color: <?php echo $color;?>"> 
	<header>
    	<?php include "header.php";?>
    </header>
	<main>
		<div id="main_img_bar">
            <?php require('slide.php'); ?>
        </div>
        <div id="main_content">
      		<div id="login_box">
	    		<div id="login_title">
		    		<span>로그인</span>
	    		</div>
	    		<div id="login_form">
					<form  name="login_form" method="post" action="login.php">		       	
						<ul>
						<li><input type="text" name="id" placeholder="아이디" ></li>
						<li><input type="password" id="pass" name="pass" placeholder="비밀번호" ></li>
						</ul>
						<div id="login_btn">
							<button id="button" type="button"  style="color :<?=$background?>; background-color :<?=$color?>;" onclick="check_input()">Log In</button>
						</div>
					</form>
        		</div> 
    		</div> 
        </div> 
	</main> 
	<footer>
    	<?php include "footer.php";?>
    </footer>
</body>
</html>

