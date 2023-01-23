<?php  
ob_start() ;?>
    <section class="parallax-section" style="background-image:url(<?php echo wp_get_attachment_url( $image, 'full' ); ?>);">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                <h2 class="mb-20"><?php echo wp_kses_post($title);?></h2>
                <p class="fs-16"><?php echo wp_kses_post($text);?></p>
                <div class="color-theme fs-18 mt-20"><?php echo wp_kses_post($text1);?><a class="color-black fw-b text-uppercas" href="<?php echo esc_url($link);?>"><?php echo wp_kses_post($btn);?><span class="fa fa-caret-right"></span></a></div>                
            </div>
        </div>
    </section>
<?php 
   wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>