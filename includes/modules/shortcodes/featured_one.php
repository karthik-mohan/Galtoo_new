<?php  

ob_start() ;?>
    <section class="welcome-section">
            <div class="row clearfix">
                <!--Column-->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3 class="title-bottom mt-30 mb-40"><?php echo wp_kses_post($title);?></h3>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="feature-box">
                                <h4 class="title"><?php echo wp_kses_post($title1);?><i class="<?php echo wp_kses_post($icon1)?> pull-right"></i></h4>
                                <p class="details"><?php echo wp_kses_post($text1);?></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="feature-box">
                                <h4 class="title"><?php echo wp_kses_post($title2);?><i class="<?php echo wp_kses_post($icon2)?> pull-right"></i></h4>
                                <p class="details"><?php echo wp_kses_post($text2);?></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="feature-box">
                                <h4 class="title"><?php echo wp_kses_post($title3);?><i class="<?php echo wp_kses_post($icon3)?> pull-right"></i></h4>
                                <p class="details"><?php echo wp_kses_post($text3);?></p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="feature-box">
                                <h4 class="title"><?php echo wp_kses_post($title4);?><i class="<?php echo wp_kses_post($icon4)?> pull-right"></i></h4>
                                <p class="details"><?php echo wp_kses_post($text4);?></p>
                            </div>
                        </div>
                    </div>
                    <?php if(wp_kses_post($btn)):?>
					<a class="btn-thm" href="<?php echo esc_url($link);?>"><?php echo wp_kses_post($btn);?><i class="fa fa-arrow-circle-right"></i></a>
					<?php endif;?>
                </div>
            </div>
    </section>
<?php 
   wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>