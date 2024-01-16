<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php
		

		$theme = $_COOKIE['t'];

		if(isset($theme))
            {
                            
            if($theme == "dark") 
				{
					$background = "#171717";
					$color = "#fff";
					
				} 

			else 
				{
					$background = "#ffffff";
					$color = "#1b1d1e";
				}
            }

?>