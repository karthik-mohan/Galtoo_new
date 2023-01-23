<?php  
ob_start() ;?>
    
	 <!--Parallax Section-->
    <section class="parallax-section" style="background-image:url(<?php echo wp_get_attachment_url( $image, 'full' ); ?>);">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                <h2 class="mb-10"><em><?php echo wp_kses_post($title);?></em></h2>
                <h3 class="fs-36 color-theme mb-20"><?php echo wp_kses_post($text);?></h3>
                <a class="btn-thm mt-5 mb-10" href="<?php echo esc_url($link);?>"><?php echo wp_kses_post($btn);?><i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </section> 
	 
<?php 
   wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>