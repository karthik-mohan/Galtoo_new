<?php  

ob_start() ;?>
 <!--Welcome Section-->
    <section class="welcome-section pb-20 pb-md-60">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="col-md-12 col-sm-12 col-xs-12 sm-text-center">
                   <?php if(wp_kses_post($title)):?> <h1 class="mt-30"><?php echo wp_kses_post($title);?></h1>
				   <?php endif;?>
                    <?php if(wp_kses_post($sub_title)):?> <p class="color-theme"><?php echo wp_kses_post($sub_title);?></p>
					<?php endif;?>
                    <div class="thumb mt-30"><img src="<?php echo wp_get_attachment_url( $image, 'full' ); ?>" alt="<?php esc_html_e('images', 'legalhelp');?>"></div>
                </div>
            </div>
        </div>
    </section>  
   


<?php 
   wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>