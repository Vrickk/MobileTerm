<?php
    $countdb = new mysqli('localhost', 'Steve', 'Vrick2956!@', 'Term');
    
    date_default_timezone_set('Asia/Seoul');
    $currdt = date('Y-m-d H:i:s');
    $userip = $_SERVER['REMOTE_ADDR'];

    if(isset($_SERVER['HTTP_REFERER'])) $referer = $_SERVER['HTTP_REFERER'];
    else $referer = "";

    if($countdb) 
    {
        if(!isset($_SESSION['visit']))
        {
            $_SESSION['visit'] = '1';
            $query = "insert into tb_stat_visit (regdate, regip, referer) values('$currdt','$userip','$referer')";			
            $result = $countdb->query($query);				
        }		
    
        $query = "select count(*) as count from tb_stat_visit where DATE(regdate) = DATE('$currdt')";		
        $data = $countdb->query($query)->fetch_array();		
        $today_visit_count = $data['count'];			
        
        $query = "select count(*) as count from tb_stat_visit";		
        $data = $countdb->query($query)->fetch_array();		
        $total_visit_count = $data['count'];

    }
?>