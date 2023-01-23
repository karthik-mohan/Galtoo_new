<?php  
ob_start() ;?>
 

        <div class="container">
            <div class="row">
				<div class="col-sm-12 col-md-4">
                    <div class="practise-area">
                        <div class="practise-details">
                            <i class="icon <?php echo wp_kses_post($icon);?>"></i>
                            <h4 class="title"><?php echo wp_kses_post($title);?></h4>
                            <p class="details"><?php echo wp_kses_post($text);?></p>
                            <a class="btn-thm btn-xs" href="<?php echo esc_url($link);?>"><?php echo wp_kses_post($btn);?><i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
				
                
            </div>
        </div>
  
<?php 
   wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>