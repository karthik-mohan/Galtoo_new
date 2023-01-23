<?php
ob_start() ;?>

    <!--Profile Section-->
    <section class="profile-section">
    	<div class="auto-container">
            <div class="row clearfix">
                <!--Column-->
                <div class="col-md-12 column">
                    <!--Member Info-->
                    <article class="member-info wow fadeInLeft" data-wow-delay="100ms" data-wow-duration="1500ms">
                        <div class="row">
                            <div class="col-md-4 pl-0 pr-0">
                                <figure class="image"><a href="#"><img src="<?php echo wp_get_attachment_url( $image, 'full' ); ?>" alt="<?php esc_html_e('images', 'legalhelp');?>"></a></figure>
                            </div>
                            <div class="col-md-8">                        
                                <div class="member-title">
                                    <h4 class="fs-20"><?php echo wp_kses_post($title);?></h4>
                                    <p><em><?php echo wp_kses_post($text);?></em></p>
                                </div>
                                <ul class="info">
                                    <li><strong><?php esc_html_e('PHONE:', 'legalhelp');?></strong><?php echo wp_kses_post($phone);?></li>
                                    <li><strong><?php esc_html_e('E-MAIL:', 'legalhelp');?></strong>  <a href="#"><?php echo wp_kses_post($email);?></a></li>
                                </ul>
                                <p><?php echo wp_kses_post($text1);?></p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
<?php

	$output = ob_get_contents(); 

   ob_end_clean(); 

   return $output ; ?>

