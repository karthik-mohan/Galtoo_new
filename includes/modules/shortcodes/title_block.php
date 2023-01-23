<?php  
ob_start() ;?>
    <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><?php echo wp_kses_post($title);?></h1>
                    <p class="color-theme mb-50"><?php echo wp_kses_post($sub_title);?></p>
                </div>
		</div>     
	  </div>
<?php 
   wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>