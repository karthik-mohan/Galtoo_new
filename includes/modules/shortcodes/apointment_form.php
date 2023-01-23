<?php  
ob_start() ;?>

<!--Contact Us Section-->
 <!--Appointment Section-->
    <section class="welcome-section pt-40 pb-20 pb-md-60">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Column-->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h1 class="mt-60"><?php echo wp_kses_post($title);?></h1>
                    <p class="color-theme mb-30"><?php echo wp_kses_post($sub_title);?></p>
                    <!-- Appointment Form -->
                    <div class="comment-form appoinment-form wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
						<?php echo do_shortcode(bunch_base_decode($appointment_form));?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php 
   wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>