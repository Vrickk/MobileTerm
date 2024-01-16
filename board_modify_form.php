<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8" name="viewport" content="user-scalable=no,initial-scale=1">
<?php
	$num  = $_GET["num"];
	$page = $_GET["page"];
	
	$con = mysqli_connect("localhost", "Steve", "Vrick2956!@", "Term");
	$sql = "select * from board where num=$num";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$name       = $row["name"];
	$subject    = $row["subject"];
	$category   = $row["category"];
	$mallname 	= $row["mallname"];
	$content    = $row["content"];
	$hit          = $row["hit"];
					
	$deadline = new DateTime($row["deadline"]);


	$link = $row["link"];
	$currency = $row["currency"];
	$price = $row["price"];
	$origprice = $row["origprice"];
	$deliverprice = $row["deliverprice"];
	$discount = $row["discount"];

	$file_name = $row["file_name"];
?>

<title>게시판 > 글 수정 (<?php echo "[".$category."] [".$mallname."] ".$subject;?>) - AllDiscounts</title>
<link rel="stylesheet" type="text/css" href="./css/common_mobile.css" media="screen and (max-width: 959px)">
<link rel="stylesheet" type="text/css" href="./css/common.css" media="screen and (min-width: 960px)">
<link rel="stylesheet" type="text/css" href="./css/board_mobile.css" media="screen and (max-width: 959px)">
<link rel="stylesheet" type="text/css" href="./css/board.css" media="screen and (min-width: 960px)">

<script>
  function check_input() {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
	  if (!document.board_form.category.value)
      {
          alert("머리말을 입력하세요!");    
          document.board_form.category.focus();
          return;
      }
	  if (!document.board_form.mallname.value)
      {
          alert("판매처를 입력하세요!");    
          document.board_form.mallname.focus();
          return;
      }
	  if (!document.board_form.deadline.value)
      {
          alert("기한을 입력하세요!");    
          document.board_form.deadline.focus();
          return;
      }
      if (!document.board_form.link.value)
      {
          alert("링크를 입력하세요!");    
          document.board_form.link.focus();
          return;
      }
	  if (!document.board_form.price.value)
      {
          alert("가격을 입력하세요!");    
          document.board_form.price.focus();
          return;
      }
	  if (!document.board_form.origprice.value)
      {
          alert("원가를 입력하세요!");    
          document.board_form.origprice.focus();
          return;
      }
	  if (!document.board_form.deliverprice.value)
      {
          alert("배송비를 입력하세요!");    
          document.board_form.deliverprice.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<?php require('dark.php'); ?>
<body style="background-color: <?php echo $background;?>; color: <?php echo $color;?>"> 
<header>
    <?php include "header.php";?>
</header>  

<main>
   	<div id="board_box">
	    <h3 id="board_title">
	    		게시판 > 글 수정 (<?php echo "[".$category."] [".$mallname."] ".$subject;?>)
		</h3>

	    <form id="EditorForm" name="board_form" method="post" action="board_modify.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data">
		<ul id="board_form" style="vertical-align:middle;">
				<div>
					<li>
						<span class="col1">이름 : </span>
						<span class="col2"><?=$username?></span>
					</li>		
					<li>
						<span class="col1">제목 : </span>
						<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
					</li>	 
					<li>
						<span class="col1">카테고리 : </span>
						<span class="col2"><input name="category" type="text" value="<?=$category?>"></span>
					</li>
					<li>
						<span class="col1">판매처 : </span>
						<span class="col2"><input name="mallname" type="text" value="<?=$mallname?>"></span>
					</li>   	
					<li>
						<span class="col1">기한 : </span>
						<span class="col2"><input name="deadline" type="datetime-local" value="<?=$deadline->format('Y-m-d\TH:i')?>"></span>
					</li>
					<li>
						<span class="col1">링크 : </span>
						<span class="col2"><input name="link" type="text" value="<?=$link?>"></span>
					</li>
				</div>
				<div>
					<li>
						<span class="col1">통화 : </span>
						<span class="col2">
							<select name="currency">
								<option value="<?=$currency?>" selected><?=$currency?> (선택 화폐)</option>
								<option value="₩">₩ (한국 원)</option>
                                <option value="$">$ (미국 달러)</option>
                                <option value="€">€ (유로)</option>
                                <option value="£">£ (영국 파운드)</option>
                                <option value="¥">¥ (일본 엔, 중국 위안)</option>
                                <option value="₹">₹ (인도 루피)</option>
                                <option value="₱">₱ (페소)</option>
                                <option value="₺">₺ (튀르키예 리라)</option>
                                <option value="₽">₽ (러시아 루블)</option>
                                <option value="¢">¢ (센트)</option>
                                <option value="฿">฿ (태국 바트)</option>
                                <option value="₫">₫ (베트남 동)</option>
                                <option value="₴">₴ (우크라이나 흐리우냐)</option>
                                <option value="₿">₿ (비트코인)</option>
							</select>
						</span>
					</li>
					<li>
						<span class="col1">가격 : </span>
						<span class="col2"><input name="price" type="text" value="<?=$price?>"></span>
					</li>
					<li>
						<span class="col1">원가 : </span>
						<span class="col2"><input name="origprice" type="text" value="<?=$origprice?>"></span>
					</li>
					<li>
						<span class="col1">배송비 : </span>
						<span class="col2"><input name="deliverprice" type="text" value="<?=$deliverprice?>"></span>
					</li>
				</div>
				<li id="text_area">	
					기타 내용 : <br><br>
					<textarea id="content" name="content"><?=$content?></textarea>
				</li>
				<li>
					<span class="col1">이미지 : </span>
					<span class="col2"><input name="uploadimage" type="file" value="./imageUploaded/<?=$file_name?>"></span>
				</li>
	    	</ul>
	    	<ul class="buttons">
				<li><button type="button" style="border-color: <?php echo $color;?>; background-color: <?php echo $color;?>; color: <?php echo $background;?>" onclick="check_input()">완료</button></li>
				<li><button type="button" style="border-color: <?php echo $color;?>; background-color: <?php echo $color;?>; color: <?php echo $background;?>" onclick="location.href='board_list.php'">목록</button></li>
			</ul>
	    </form>
	</div>
</main> 
<footer>
    <?php include "footer.php";?>
</footer>
</body>
</html>
