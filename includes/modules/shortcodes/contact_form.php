<?php  
ob_start() ;?>
<!--Contact Us Section-->
    <div class="sidebar-page">
    	<div class="auto-container">
            <div class="row clearfix">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <section class="contact-section">
                        <!--Sec Title-->
						<?php if(wp_kses_post($title)):?>
						<div class="sec-title clearfix">
                            <div class="em-text"><?php echo wp_kses_post($title);?></div>
                            <h2 class="heading-text"><?php echo wp_kses_post($sub_title);?></h2>
                        </div>
						<?php endif;?>
                        <div class="form">
                         <?php echo do_shortcode(bunch_base_decode($contact_form));?>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
<?php 
   wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>