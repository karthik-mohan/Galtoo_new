<?php 
   
  <section class="fact-counter bg-color-theme pb-10 pt-40">
<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>