<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8" name="viewport" content="user-scalable=no,initial-scale=1">
<?php if(!isset($_COOKIE['t'])) setcookie("t", "light"); 
require('dark.php'); require('counter.php'); ?>



<title><?php echo "AllDiscounts - 세상 모든 특가 정보" ?></title>

<link rel="stylesheet" type="text/css" href="./css/common_mobile.css" media="screen and (max-width: 959px)">
<link rel="stylesheet" type="text/css" href="./css/common.css" media="screen and (min-width: 960px)">
<link rel="stylesheet" type="text/css" href="./css/main.css" media="screen and (min-width: 960px)">
<link rel="stylesheet" type="text/css" href="./css/main_mobile.css" media="screen and (max-width:959px)">
<link rel="stylesheet" href="styles.css" />

</head>
 



<body style="background-color: <?php echo $background;?>; color: <?php echo $color;?>"> 
	<header>
		<?php include "header.php";?>
	</header>
	<main id="main">
	    <?php include "main.php";?>
	</main> 
	<footer >
    	<?php include "footer.php";?>
    </footer>
</body>
</html>
