<!DOCTYPE html>
<head>
<meta charset="utf-8" name="viewport" content="user-scalable=no,initial-scale=1">
<style>
h3 {
   padding-left: 5px;
   border-left: solid 5px #5E5E5E;
}
#close {
   margin:20px 0 0 80px;
   cursor:pointer;
}
</style>
</head>
<?php require('dark.php'); ?>
<body style="background-color: <?php echo $background;?>; color: <?php echo $color;?>"> 
<h3>아이디 중복체크</h3>
<p>
<?php
   $id = $_GET["id"];

   if(!$id) 
   {
      echo("아이디를 입력해 주세요!");
   }
   else
   {
      $con = mysqli_connect("localhost", "Steve", "Vrick2956!@", "Term");

 
      $sql = "select * from members where id='$id'";
      $result = mysqli_query($con, $sql);

      $num_record = mysqli_num_rows($result);

      if ($num_record)
      {
         echo $id." - 이 아이디는 이미 존재합니다.";
         echo "다른 아이디를 사용해 주세요!";
      }
      else
      {
         echo $id." - 이 아이디는 사용 가능합니다.";
      }
    
      mysqli_close($con);
   }
?>
</p>
<div id="close">
   <button style="border-color: <?php echo $color;?>; background-color: <?php echo $color;?>; color: <?php echo $background;?>" id="closebutten" type="button" onclick="javascript:self.close()">Close</button>
</div>
</body>
</html>

