<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8" name="viewport" content="user-scalable=no,initial-scale=1">
<title>관리자 모드 > 회원 관리 - AllDiscounts</title>
<?php require('dark.php'); ?>
<link rel="stylesheet" type="text/css" href="./css/common_mobile.css" media="screen and (max-width: 959px)">
<link rel="stylesheet" type="text/css" href="./css/common.css" media="screen and (min-width: 960px)">
<link rel="stylesheet" type="text/css" href="./css/admin_mobile.css" media="screen and (max-width: 959px)">
<link rel="stylesheet" type="text/css" href="./css/admin.css" media="screen and (min-width: 960px)">
<link rel="stylesheet" href="styles.css" />
</head>
<body style="background-color: <?php echo $background;?>; color: <?php echo $color;?>"> 
<header>
    <?php include "header.php";?>
</header>  
<main>
   	<div id="admin_box">
	    <h3 id="member_title">
	    	관리자 모드 > 회원 관리
		</h3>
	    <ul id="member_list">
				<li style="background-color: <?php echo $background;?>" >
					<span class="col1">번호</span>
					<span class="col2">아이디</span>
					<span class="col3">이름</span>
					<span class="col4">레벨</span>
					<span class="col5">포인트</span>
					<span class="col6">가입일</span>
					<span class="col8">수정</span>
					<span class="col9">삭제</span>
				</li>
			<?php
				$con = mysqli_connect("localhost", "Steve", "Vrick2956!@", "Term");
				$sql = "select * from members order by num desc";
				$result = mysqli_query($con, $sql);
				$total_record = mysqli_num_rows($result); 

				$number = $total_record;

			while ($row = mysqli_fetch_array($result))
			{
				$num         = $row["num"];
				$id          = $row["id"];
				$name        = $row["name"];
				$level       = $row["level"];
				$point       = $row["point"];
				$regist_day  = $row["regist_day"];
			?>
						
					<li>
					<form method="post" action="admin_member_update.php?num=<?=$num?>">
						<span class="col1"><?=$number?></span>
						<span class="col2"><?=$id?></a></span>
						<span class="col3"><?=$name?></span>
						<span class="col4"><input type="text" name="level" value="<?=$level?>"></span>
						<span class="col5"><input type="text" name="point" value="<?=$point?>"></span>
						<span class="col6"><?=$regist_day?></span>
						<span class="col7"><button type="submit">수정</button></span>
						<span class="col8"><button type="button" onclick="location.href='admin_member_delete.php?num=<?=$num?>'">삭제</button></span>
					</form>
					</li>	
						
			<?php
				$number--;
			}
			?>
					</ul>
					<h3 id="member_title">
						관리자 모드 > 게시판 관리
					</h3>
					<ul id="board_list">
						<li style="background-color: <?php echo $background;?>"  class="title">
							<span class="col1">선택</span>
							<span class="col2">번호</span>
							<span class="col3">이름</span>
							<span class="col4">제목</span>
							<span class="col5">특가 진행 여부</span>
							<span class="col6">작성일</span>
						</li>
					<form method="post" action="admin_board_delete.php">
						<?php
							$sql = "select * from board order by num desc";
							$result = mysqli_query($con, $sql);
							$total_record = mysqli_num_rows($result);

							$number = $total_record;

						while ($row = mysqli_fetch_array($result))
						{
							$num         = $row["num"];
							$name        = $row["name"];
							$subject     = $row["subject"];
							$regist_day  = $row["regist_day"];
	                        $regist_day = substr($regist_day, 0, 10);
							$is_still_going = $row["is_still_going"];
						?>
						<ul id="board_list">
								<li>
									<span class="col1"><input type="checkbox" name="item[]" value="<?=$num?>"></span>
									<span class="col2"><?=$number?></span>
									<span class="col3"><?=$name?></span>
									<span class="col4"><?=$subject?></span>
									<span class="col5">
										<?php if($is_still_going) { ?>
											<input type="checkbox" checked disabled>
										<?php } else { ?>
											<input type="checkbox" disabled>
										<?php }?>
									</span>
									<span class="col6"><?=$regist_day?></span>
								</li>
						</ul>	
						<?php
							$number--;
						}

						?>
										<button type="submit">선택된 글 삭제</button>
									</form>
								</ul>

						<?php
						mysqli_close($con);
						?>
	</main> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
