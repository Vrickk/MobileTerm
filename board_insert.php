<meta charset="utf-8" name="viewport" content="user-scalable=no,initial-scale=1">
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";

    if ( !$userid )
    {
        echo("
                    <script>
                    alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
                    history.go(-1)
                    </script>
        ");
                exit;
    }

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

	

	date_default_timezone_set('Asia/Seoul');
	$regist_day = date('Y-m-d\TH:i');

	if ($deadline > $regist_day)
		$is_still_going = true;
	else
		$is_still_going = false;

	
	$con = mysqli_connect("localhost", "Steve", "Vrick2956!@", "Term");

	$sql = "insert into board (id, name, subject, content, regist_day, hit, file_name, category, mallname, deadline, link, currency, price, origprice, deliverprice, discount, is_still_going) ";
	$sql .= "values('$userid', '$username', '$subject', '$content', '$regist_day', 0, '$file_name', '$category', '$mallname', '$deadline', '$link', '$currency', '$price', '$origprice', '$deliverprice', '$discount', '$is_still_going')";
	mysqli_query($con, $sql); 


  	$point_up = 100;

	$sql = "select point from members where id='$userid'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$new_point = $row["point"] + $point_up;
	
	$sql = "update members set point=$new_point where id='$userid'";
	mysqli_query($con, $sql);

	mysqli_close($con);             

	echo "
	   <script>
	    location.href = 'board_list.php';
	   </script>
	";
?>

  
