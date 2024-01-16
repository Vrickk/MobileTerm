<?php

    


    $num = $_GET["num"];
    $page = $_GET["page"];

    $con = mysqli_connect("localhost", "Steve", "Vrick2956!@", "Term");
    $sql = "select * from board where num=$num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);


    $subject = $_POST["subject"];
    $category = $_POST["category"];
	$mallname = $_POST["mallname"];
	$deadline = $_POST["deadline"];



	$link = $_POST["link"];
	$currency = $_POST["currency"];
	$price = $_POST["price"];
	$origprice = $_POST["origprice"];
	$deliverprice = $_POST["deliverprice"];

	$discount = ($origprice - $price) / $origprice * 100;

    $content = $_POST["content"];

    $upload_name	 = $_FILES["uploadimage"]["name"];
	$upload_tmp_name = $_FILES["uploadimage"]["tmp_name"];
    $upload_type     = ".".explode(".", $upload_name)[1];
	$upload_size     = $_FILES["uploadimage"]["size"];
	$upload_error    = $_FILES["uploadimage"]["error"];

	if ($upload_name && !$upload_error)
	{
		$file_name = rand().$upload_type;
		$temp_name = $_FILES["uploadimage"]["tmp_name"];
		$folder = "./imageUploaded/".$file_name;

        if( $upload_size  > 100000000 ) {
			echo("
			<script>
				alert('업로드 이미지 크기가 지정된 용량(100MB)을 초과합니다!<br>파일 크기를 체크해주세요! ');
				history.go(-1)
			</script>
			");
			exit;
		}
		
		if (!move_uploaded_file($upload_tmp_name, $folder) )
		{
				echo("
					<script>
					alert('파일을 지정한 디렉토리에 복사하는데 실패했습니다.');
					history.go(-1)
					</script>
				");
				exit;
		}
	}
    else
    {
        $file_name = $row["file_name"];
    }

    date_default_timezone_set('Asia/Seoul');

    if ($deadline > date('Y-m-d\TH:i'))
		$is_still_going = true;
	else
		$is_still_going = false;
          
    $sql = "update board set subject='$subject', 
    content='$content',  
    category='$category', 
    mallname='$mallname', 
    deadline='$deadline', 
    link='$link', 
    currency='$currency', 
    price='$price', 
    origprice='$origprice', 
    deliverprice='$deliverprice',
    is_still_going='$is_still_going',
    discount='$discount',
    file_name='$file_name' where num=$num ";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'board_list.php?page=$page';
	      </script>
	  ";
?>

   
