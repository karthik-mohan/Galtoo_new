<?php  

ob_start() ;?>
    <section class="welcome-section">
            <div class="row">
                <!--Column-->
					<div class="col-sm-12">
						<div class="feature-box">
							<h4 class="title"><?php echo wp_kses_post($title);?><i class="<?php echo wp_kses_post($icon)?> pull-right"></i></h4>
							<p class="details"><?php echo wp_kses_post($text);?></p>
						</div>
				   </div>
            </div>
    </section>
<?php 
   wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>