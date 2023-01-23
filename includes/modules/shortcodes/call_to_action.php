<?php  
ob_start() ;?>

   <!--Fact Counter-->
   <?php if(wp_get_attachment_url( $image, 'full' )):?>
	<section class="fact-counter theme-overlay pb-10 pt-40" style="background:url(<?php echo wp_get_attachment_url( $image, 'full' ); ?>);">
   <?php else:?>
   <section class="fact-counter bg-color-theme pb-10 pt-40">
   <?php endif;?>
	
        <div class="container">
            <div class="row">
                <div class="col-md-6 fact-dialogue sm-text-center">
                    <h1 class="our-dialogue roboto-sans-serif color-white"><?php echo wp_kses_post($title);?></h1>
                    <a href="<?php echo esc_url($link);?>" class="btn-thm btn-white mt-20"><?php echo wp_kses_post($btn);?><i class="fa fa-arrow-circle-right"></i></a>
                </div>
                <div class="col-md-6">
                    <div class="row clearfix mt-sm-40">
                        <!--Column-->
                        <article class="col-md-4 col-sm-4 col-xs-12 column wow fadeIn" data-wow-duration="0ms">
                            <div class="icon-style text-center">
                                <a href="#"><i class="icon icon-bg icon-gray icon-lg style-round fa <?php echo wp_kses_post($icon1);?>"></i></a>
                                <div class="count-outer"><span class="count-text" data-speed="2000" data-stop="<?php echo wp_kses_post($number1);?>"><?php esc_html_e('0', 'legalhelp');?></span></div>
                                <h4><a class="title" href="#"><?php echo wp_kses_post($title1);?></a></h4>
                            </div>
                        </article>
                        
                        <!--Column-->
                        <article class="col-md-4 col-sm-4 col-xs-12 column wow fadeIn" data-wow-duration="0ms">
                            <div class="icon-style text-center">
                                <a href="#"><i class="icon icon-bg icon-gray icon-lg style-round fa <?php echo wp_kses_post($icon2);?>"></i></a>
                                <div class="count-outer"><span class="count-text" data-speed="<?php echo wp_kses_post($number2);?>" data-stop="547"><?php esc_html_e('0', 'legalhelp');?></span></div>
                                <h4><a class="title" href="#"><?php echo wp_kses_post($title3);?></a></h4>
                            </div>
                        </article>
                        
                        <!--Column-->
                        <article class="col-md-4 col-sm-4 col-xs-12 column wow fadeIn" data-wow-duration="0ms">
                            <div class="icon-style text-center">
                                <a href="#"><i class="icon icon-bg icon-gray icon-lg style-round <?php echo wp_kses_post($icon3);?>"></i></a>
                                <div class="count-outer"><span class="count-text" data-speed="<?php echo wp_kses_post($number3);?>" data-stop="2145"><?php esc_html_e('0', 'legalhelp');?></span></div>
                                <h4><a class="title" href="#"><?php echo wp_kses_post($title3);?></a></h4>
                            </div>
                        </article>
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