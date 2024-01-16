<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";

    if(!isset($_COOKIE['t'])) setcookie("t", "light");

    $theme = $_COOKIE['t']; 

?>	
	
<div id="float_bar">
        <div id="top" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
            <h3 style="margin:3px 0 0 10px;">
                <a href="index.php"><?php
                if ($theme == 'dark')
                    echo "<img src='title_dark.png'>";
                    
                else {
                    echo "<img src='title_white.png'>";
                    }
                 ?></a>
            </h3>
            
            <ul id="top_menu" align="right">  
                
                <?php
                    if(!$userid) {
                ?>                
                <li><a style="color :<?=$color?>;" href="member_form.php">회원가입</a> </li>
                <li> | </li>
                <li><a style="color :<?=$color?>;"  href="login_form.php">로그인 | </a></li>
                <?php
                    } else {
                        $logged = $username."(".$userid.")님<br>  [Level : ".$userlevel.", Point : ".$userpoint."]<br> ";
                ?>
                <li><?=$logged?> </li>
                <li><a style="color :<?=$color?>;" href="logout.php">로그아웃</a> </li>
                <li> | </li>
                <li><a style="color :<?=$color?>;" href="member_modify_form.php">사용자 정보</a></li>
                <li> | </li>
                
                <?php
                    }
                ?>

                <li>
                    <label class="switch">
                        <input type="checkbox" id="toggleTheme" <?php if($theme == 'dark') {echo "checked";}?>>
                    </label>
                    다크 모드 | </a>
                </li>
                
                <?php
                    if($userlevel==0) {
                ?>
                <li><a style="color :<?=$color?>" href="admin.php">관리자 모드</a></li>
                <?php
                    }
                ?>
            </ul>

            <ul id="top_menu2" align="right">  
                    
                    <?php
                        if(!$userid) {
                    ?>                
                    <li><a style="color :<?=$color?>;" href="member_form.php">회원가입</a> </li>
                    <li> | </li>
                    <li><a style="color :<?=$color?>;" href="login_form.php">로그인 | </a></li>
                    <?php
                        } else {
                            $logged = $username."(".$userid.")님<br>  [Level : ".$userlevel.", Point : ".$userpoint."]<br> ";
                    ?>
                    <li><?=$logged?> </li>
                    <li><a style="color :<?=$color?>;" href="logout.php">로그아웃</a> </li>
                    <li> | </li>
                    <li><a style="color :<?=$color?>;" href="member_modify_form.php">사용자 정보</a></li>
                    <li> | </li><br>
                    
                    <?php
                        }
                    ?>

                    <li>
                        <label class="switch">
                            <input type="checkbox" id="toggleTheme" <?php if($theme == 'dark') {echo "checked";}?>>
                        </label>
                        다크 모드 | 
                    </li>
                    
                    <?php
                        if($userlevel==0) {
                    ?>
                    <li><a style="color :<?=$color?>" href="admin.php">관리자 모드</a></li>
                    <?php
                        }
                    ?>
            </ul>
        </div>

        <div id="menu_bar" style="background-color: <?php echo $background;?>; color: <?php echo $color;?>">
            <ul>  
                <li><a style="background-color: <?php echo $background;?>; color: <?php echo $color;?>" href="index.php">홈</a></li>
                <li><a style="background-color: <?php echo $background;?>; color: <?php echo $color;?>" href="board_list.php">특가 게시판</a></li>
                <li><a style="background-color: <?php echo $background;?>; color: <?php echo $color;?>" href="board_form.php">바로 글쓰기</a></li>
            </ul>
        </div>

        <style>
            a:hover {
                background-color: lightgray;
                color: lightgray;
            }
        </style>

        

        <script>
			$("#toggleTheme").on('change', function() {
				if($(this).is(':checked')) {
					$(this).attr('value', 'true');
					document.cookie = "t=dark";
					location.reload();
				} else {
					$(this).attr('value', 'false');
					document.cookie = 't=light';
					location.reload();
				}
			});
		</script>

</div>