<?php 
   ob_start() ;?>
     <!--Featured Section-->
<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>