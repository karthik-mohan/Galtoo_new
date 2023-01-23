<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_testimonials' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   if( $cat ) $query_args['testimonials_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   $display_style = '';
   $client_meta = '';
   $display_style = ($display_style == 'red')? 'theme-two' : '';
   ob_start() ;?>


<?php if($query->have_posts()):  ?>   

  <section class="about-section">
        <div class="auto-container">
         <div class="row clearfix">       
		<div class="col-md-12">
                    <h4 class="sec-title title-bottom"><?php echo wp_kses_post($title);?></h4>
                    <div class="owl-carousel client-testimonial-carousel owl-theme">
                    <?php while($query->have_posts()): $query->the_post();
				
					global $post ;
					
					$testimonials_meta = _WSH()->get_meta();
				    ?>
						<div class="item">
                            <article class="client-testimonial text-center">
                                <figure class="thumb-img"> <?php the_post_thumbnail('legalhelp_two', array('class' => 'img-circle'));?></figure>
                                <div class="content">
                                    <p class="text"><?php echo wp_kses_post(legalhelp_trim(get_the_excerpt(), $text_limit));?></p>
                                    <h4 class="author"><?php the_title();?></h4>
                                    <h6 class="occupation"><?php echo wp_kses_post(legalhelp_set($client_meta, 'designation'));?></h6>
                                </div>       
                            </article>
                        </div>
                <?php endwhile; ?>     
                    </div>
                </div>
			 </div>
            </div>
		 </section>	
<?php endif; ?>
<?php 

	wp_reset_postdata();

   $output = ob_get_contents(); 

   ob_end_clean(); 

   return $output ; ?>