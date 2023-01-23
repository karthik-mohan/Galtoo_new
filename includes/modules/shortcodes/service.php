<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_services' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   
   if( $cat ) $query_args['services_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
<?php if($query->have_posts()):  ?>
 
   

	<!--Practic Areas-->
    <section class="pt-60 pb-50">
    	<div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1><?php echo wp_kses_post($title);?></h1>
                    <p class="color-theme mb-50"><?php echo wp_kses_post($sub_title);?></p>
                </div>
            </div>
        	<div class="row">
                <?php while($query->have_posts()): $query->the_post();
					global $post ; 
					$services_meta = _WSH()->get_meta();
			?>
				
				<div class="col-sm-6 col-md-4"> 
                    <div class="practise-area">
                        
						<div class="thumb">
                            <?php the_post_thumbnail('legalhelp_one', array('class' => 'img-responsive'));?>
                            <div class="round-style"></div>
                        </div>
                        <div class="practise-details">
                            <i class="<?php echo wp_kses_post(legalhelp_set($services_meta, 'fontawesome'));?>"></i>
                            <h4 class="title"><?php the_title();?></h4>
                            <p class="details"><?php echo wp_kses_post(legalhelp_trim(get_the_excerpt(), $text_limit));?></p>
                            <a class="btn-thm btn-xs" href="<?php echo wp_kses_post(legalhelp_set($services_meta, 'ext_url'));?>"><?php esc_html_e('Read More', 'legalhelp');?><i class="fa fa-arrow-circle-right"></i></a>
                        </div>
						 
                    </div>  
                </div><?php endwhile;?>
             
            </div>
        </div>
    </section>
<?php endif; ?>
<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>