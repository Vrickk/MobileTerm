<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8" name="viewport" content="user-scalable=no,initial-scale=1">
		<title>게시판 > 글 목록 - AllDiscounts</title>
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
			<div id="main_img_bar">
				<?php require('slide.php'); ?>
			</div>
			<div id="board_box">
				<h3>
					게시판 > 목록보기
				</h3>
				<ul id="board_list">
						<li>
							<span class="col1">번호</span>
							<span class="col2" style="text-align: center;">제목</span>
							<span class="col3">글쓴이</span>
							<span class="col4">진행</span>
							<span class="col5">등록일</span>
							<span class="col6">조회</span>
						</li>
				<?php
					if (isset($_GET["page"])) $page = $_GET["page"];
					else $page = 1;

					$con = mysqli_connect("localhost", "Steve", "Vrick2956!@", "Term");
					$sql = "select * from board order by num desc";
					$result = mysqli_query($con, $sql);
					$total_record = mysqli_num_rows($result); 

					$scale = 10;


					if ($total_record % $scale == 0) $total_page = floor($total_record/$scale);      
					else $total_page = floor($total_record/$scale) + 1; 
				
				
					$start = ($page - 1) * $scale;      

					$number = $total_record - $start;

					for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
					{
						mysqli_data_seek($result, $i);     
						$row = mysqli_fetch_array($result);


						$num         = $row["num"];
						$id          = $row["id"];
						$name        = $row["name"];
						$subject     = $row["subject"];
						$category = $row["category"];
						$mallname = $row["mallname"];
						$regist_day  = $row["regist_day"];
						$deadline = $row["deadline"];
						$hit         = $row["hit"];
	                	$is_still_going = $row["is_still_going"];
						$currency = $row["currency"];
						$price = $row["price"];
						$origprice = $row["origprice"];
						$deliverprice = $row["deliverprice"];
						$discount = $row["discount"];
	                	$file_name = $row["file_name"];


						?>
						<li>
							<span class="col1"><?=$number?></span>
							<span class="col2">
								<span>
									<a style="color :<?=$color?>"  href="board_view.php?num=<?=$num?>&page=<?=$page?>"> <img style="width:100px; height:100px; object-fit:contain;" src="./imageUploaded/<?=$file_name?>" onerror="this.src='./not_found.jpg';"></a>
								</span>
								<span>
									<a style="color :<?=$color?>"  href="board_view.php?num=<?=$num?>&page=<?=$page?>">[<?=$category?>] [<?=$mallname?>] <?=$subject?></a>
								</span>
								<br><br>
								<del><?=$currency?><?=$origprice?></del> → <b><?=$currency?><?=$price?> <u>(<?=$discount?>%)</u></b> + <?=$currency?><?=$deliverprice?> = <?=$currency?><?=$price+$deliverprice?>
								<br><br>
								<?=date_create_from_format("Y-m-d\TH:i", $deadline)->format("Y-m-d (H:i)")?> 까지
							</span>
							<span class="col3"><?=$name?></span>
							<span class="col4">
								<?php if($is_still_going) { ?>
									<input type="checkbox" checked disabled>
								<?php } else { ?>
									<input type="checkbox" disabled>
								<?php }?>
							</span>
							<span class="col5"><?=date_create_from_format("Y-m-d\TH:i", $regist_day)->format("Y-m-d (H:i)")?></span>
							<span class="col6"><?=$hit?></span>
							

						</li>	
						<?php
							$number--;
					}
					mysqli_close($con);

					?>
				</ul>
				<ul id="page_num"> 	
					<?php
						if ($total_page>=2 && $page >= 2)	
						{
							$new_page = $page-1;
							echo "<li><a href='board_list.php?page=$new_page'>◀ 이전</a> </li>";
						}		
						else 
							echo "<li>&nbsp;</li>";


						for ($i=1; $i<=$total_page; $i++)
						{
							if ($page == $i)     
							{
								echo "<li><b> $i </b></li>";
							}
							else
							{
								echo "<li><a href='board_list.php?page=$i'> $i </a><li>";
							}
						}
						if ($total_page>=2 && $page != $total_page)		
						{
							$new_page = $page+1;	
							echo "<li> <a href='board_list.php?page=$new_page'>다음 ▶</a> </li>";
						}
						else 
							echo "<li>&nbsp;</li>";
					?>
				</ul> 	    	
				<ul class="buttons">
					<li><button style="border-color: <?php echo $color;?>; background-color: <?php echo $color;?>; color: <?php echo $background;?>" onclick="location.href='board_list.php'">목록</button></li>
					<li>
						<?php 
							if($userid) {
						?>
											<button style="border-color: <?php echo $color;?>; background-color: <?php echo $color;?>; color: <?php echo $background;?>" onclick="location.href='board_form.php'">글쓰기</button>
						<?php
							} else {
						?>
											<a href="javascript:alert('로그인 후 이용해 주세요!')"><button style="border-color: <?php echo $color;?>; background-color: <?php echo $color;?>; color: <?php echo $background;?>">글쓰기</button></a>
						<?php
							}
						?>
					</li>
				</ul>
			</div> 
		</main> 
		<footer>
			<?php include "footer.php";?>
		</footer>
	</body>
</html>
