<?php  
ob_start() ;?>
	
	<!--Practic Areas-->
    <section class=" pb-50">
    	<div class="container">
        	<div class="row">
                <div class="col-sm-6 col-md-3 four_col">
                    <div class="practise-area">
                        <div class="thumb">
                            <img src="<?php echo wp_get_attachment_url( $image, 'full' ); ?>" alt="<?php esc_html_e('images', 'legalhelp');?>">
                        </div>
                        <div class="practise-details">
                            <div class="round-style"></div>
                            <i class="icon <?php echo wp_kses_post($icon);?>"></i>
                             <h4 class="title"><?php echo wp_kses_post($title);?></h4>
                            <p class="details"><?php echo wp_kses_post($text);?></p>
                             <a class="btn-thm btn-xs" href="<?php echo esc_url($link);?>"><?php echo wp_kses_post($btn);?>  <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
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