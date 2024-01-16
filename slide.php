
<link rel="stylesheet" type="text/css" href="./css/slide.css">

  <?php
  $con = mysqli_connect("localhost", "Steve", "Vrick2956!@", "Term");
	$sql = "select * from board order by num desc limit 0, 6";			
  $result = mysqli_query($con, $sql);

  $slides = array(6);
  $images = array(6);

  for ($i = 0; $i < 6; $i++) {
    mysqli_data_seek($result, $i);
    $row = mysqli_fetch_array($result);

    if (!empty($row["num"]) && !empty($row["file_name"])) {
      $num = $row["num"];
      $file_name = $row["file_name"];
    }

    else {
      $num = false;
      $file_name = false;
    }

    $slides[$i] = $num;
    $images[$i] = $file_name;

  }

  mysqli_close($con);


  ?>


<ul class="slides">
    <input type="radio" name="radio-btn" id="img-1" checked />
    <li class="slide-container">
      <div class="slide">
          <?php if(!empty($images[0])) { ?><a href="board_view.php?num=<?=$slides[0]?>"><img src="./imageUploaded/<?=$images[0]?>"></a>
          <?php } else { ?> <img src=./img/img1.png> <?php } ?>
      </div>
      <div class="nav">
      <label for="img-6" class="prev">&#x2039;</label>
      <label for="img-2" class="next">&#x203a;</label>
      </div>
    </li>

    <input type="radio" name="radio-btn" id="img-2" />
    <li class="slide-container" >
        <div class="slide">
          <?php if(!empty($images[1])) { ?><a href="board_view.php?num=<?=$slides[1]?>"><img src="./imageUploaded/<?=$images[1]?>"></a>
          <?php } else { ?> <img src=./img/img2.png> <?php } ?>
        </div>
  <div class="nav">
   <label for="img-1" class="prev">&#x2039;</label>
   <label for="img-3" class="next">&#x203a;</label>
  </div>
    </li>

    <input type="radio" name="radio-btn" id="img-3" />
    <li class="slide-container">
        <div class="slide">
          <?php if(!empty($images[2])) { ?><a href="board_view.php?num=<?=$slides[2]?>"><img src="./imageUploaded/<?=$images[2]?>"></a>
          <?php } else { ?> <img src=./img/img3.png> <?php } ?>
        </div>
  <div class="nav">
   <label for="img-2" class="prev">&#x2039;</label>
   <label for="img-4" class="next">&#x203a;</label>
  </div>
    </li>

    <input type="radio" name="radio-btn" id="img-4" />
    <li class="slide-container">
        <div class="slide">
          <?php if(!empty($images[3])) { ?><a href="board_view.php?num=<?=$slides[3]?>"><img src="./imageUploaded/<?=$images[3]?>"></a>
          <?php } else { ?> <img src=./img/img4.png> <?php } ?>
        </div>
  <div class="nav">
   <label for="img-3" class="prev">&#x2039;</label>
   <label for="img-5" class="next">&#x203a;</label>
  </div>
    </li>

    <input type="radio" name="radio-btn" id="img-5" />
    <li class="slide-container">
        <div class="slide">
          <?php if(!empty($images[4])) { ?><a href="board_view.php?num=<?=$slides[4]?>"><img src="./imageUploaded/<?=$images[4]?>"></a>
          <?php } else { ?> <img src=./img/img5.png> <?php } ?>
        </div>
  <div class="nav">
   <label for="img-4" class="prev">&#x2039;</label>
   <label for="img-6" class="next">&#x203a;</label>
  </div>
    </li>

    <input type="radio" name="radio-btn" id="img-6" />
    <li class="slide-container">
        <div class="slide">
          <?php if(!empty($images[5])) { ?><a href="board_view.php?num=<?=$slides[5]?>"><img src="./imageUploaded/<?=$images[5]?>"></a>
          <?php } else { ?> <img src=./img/img6.png> <?php } ?>
        </div>
  <div class="nav">
   <label for="img-5" class="prev">&#x2039;</label>
   <label for="img-1" class="next">&#x203a;</label>
  </div>
    </li>

    <li class="nav-dots">
      <label for="img-1" class="nav-dot" id="img-dot-1"></label>
      <label for="img-2" class="nav-dot" id="img-dot-2"></label>
      <label for="img-3" class="nav-dot" id="img-dot-3"></label>
      <label for="img-4" class="nav-dot" id="img-dot-4"></label>
      <label for="img-5" class="nav-dot" id="img-dot-5"></label>
      <label for="img-6" class="nav-dot" id="img-dot-6"></label>
    </li>
</ul>


