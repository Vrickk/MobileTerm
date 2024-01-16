     <?php require('counter.php'); ?>
        <hr>
        <div id="footer_content">
            <ul id="bottom_menu">
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
            <p id="footer_logo">Copyright@ AllDiscounts by Steve Moon (문승벽) | <span><br>2018180042 CSE Mobile Term Project 2022</span></p>
            <ul id="counter">
                <li>Today : <?= $today_visit_count ?></li>
                <li>Total : <?= $total_visit_count ?></li>
            </ul>
            <ul id="author">
                <li>문의사항</li>
                <li>- 제작자 메일 주소 : msb2956@naver.com</li>
            </ul>
            
        </div>