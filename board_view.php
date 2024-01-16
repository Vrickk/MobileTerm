<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8" name="viewport" content="user-scalable=no,initial-scale=1">
		<title><?php 
					$num  = $_GET["num"];
					if(!empty($page))
						$page  = $_GET["page"];
		
					$con = mysqli_connect("localhost", "Steve", "Vrick2956!@", "Term");
					$sql = "select * from board where num=$num";
					$result = mysqli_query($con, $sql);
		
					$row = mysqli_fetch_array($result);
					$subject    = $row["subject"];
					$category   = $row["category"];
					$mallname 	= $row["mallname"];

					echo "게시판 > "."[".$category."] [".$mallname."] ".$subject." - AllDiscounts";
				?></title>
		<link rel="stylesheet" type="text/css" href="./css/common_mobile.css" media="screen and (max-width: 959px)">
		<link rel="stylesheet" type="text/css" href="./css/common.css" media="screen and (min-width: 960px)">
		<link rel="stylesheet" type="text/css" href="./css/board_mobile.css" media="screen and (max-width: 959px)">
		<link rel="stylesheet" type="text/css" href="./css/board.css" media="screen and (min-width: 960px)">
	</head>
	<?php require('dark.php'); ?>
	<body style="background-color: <?php echo $background;?>; color: <?php echo $color;?>"> 
		<header>
    		<?php include "header.php";?>
		</header>  
		<main>
			<!--<div id="main_img_bar">
        		<?php //require('slide.php'); ?>
 			</div>-->
			<div id="board_box"> 
				<h3 class="title">
					게시판 > 내용보기
				</h3>
				<?php

					$id      = $row["id"];
					$name      = $row["name"];
					
					$content    = $row["content"];
					$hit          = $row["hit"];
					
					$deadline = $row["deadline"];
					$regist_day = $row["regist_day"];


					$link = $row["link"];
					$currency = $row["currency"];
					$price = $row["price"];
					$origprice = $row["origprice"];
					$deliverprice = $row["deliverprice"];
					$discount = $row["discount"];
                	$is_still_going = $row["is_still_going"];

                	$file_name = $row["file_name"];



					$content = str_replace(" ", "&nbsp;", $content);
					$content = str_replace("\n", "<br>", $content);
					$content = str_replace("", "<p>", $content);
					$content = str_replace("", "</p>", $content);



					$new_hit = $hit + 1;
					$sql = "update board set hit=$new_hit where num=$num";   
					mysqli_query($con, $sql);
				?>		
	    		<ul id="view_content">
					<li>
						<span class="col1"><b>제목 :</b> <?=$subject?></span>
						<span class="col2"><?=$name?> (<?=$id?>) | <?=date_create_from_format("Y-m-d\TH:i", $regist_day)->format("Y-m-d (H:i)")?></span>
					</li>
					<li>
						<span class="col1"><b>카테고리 :</b> <?=$category?></span>
						<span class="col2"><b>기한 :</b> <?=date_create_from_format("Y-m-d\TH:i", $deadline)->format("Y-m-d (H:i)")?></span>
						<br><br>
						<span class="col1"><b>판매처 :</b> <?=$mallname?></span>
						<span class="col2">
							<b>진행 :</b> 
							<?php if($is_still_going) { ?>
								<input type="checkbox" checked disabled>
							<?php } else { ?>
								<input type="checkbox" disabled>
							<?php }?>
						</span>
						<br><br>
						<span class="col1"> <del><?=$currency?><?=$origprice?></del> → <b><?=$currency?><?=$price?> <u>(<?=$discount?>%)</u></b> + <?=$currency?><?=$deliverprice?> = <?=$currency?><?=$price+$deliverprice?> </span>
					</li>
					<li>
						<span class="col1"><b>링크 :</b> <a href="<?=$link?>"><?=$link?></a></span>
					</li>
					<li>
						<br><h3>기타 사항</h3><br><br>
						<?=$content?>
					</li>
					<li>
						<br><br>
						<img id="image" src="./imageUploaded/<?=$file_name?>">
					</li>		
	    		</ul>
	    		<ul class="buttons">
					<li><button style="border-color: <?php echo $color;?>; background-color: <?php echo $color;?>; color: <?php echo $background;?>" onclick="location.href='board_list.php?page=<?=$page?>'">목록</button></li>
					<li><button style="border-color: <?php echo $color;?>; background-color: <?php echo $color;?>; color: <?php echo $background;?>" onclick="location.href='board_modify_form.php?num=<?=$num?>'">수정</button></li>
					<li><button style="border-color: <?php echo $color;?>; background-color: <?php echo $color;?>; color: <?php echo $background;?>" onclick="location.href='board_delete.php?num=<?=$num?>">삭제</button></li>
					<li><button style="border-color: <?php echo $color;?>; background-color: <?php echo $color;?>; color: <?php echo $background;?>" onclick="location.href='board_form.php'">글쓰기</button></li>
				</ul>
			</div>
		</main> 
		<?php mysqli_close($con); ?>
		<footer>
    		<?php include "footer.php";?>
		</footer>
	</body>
</html>
