<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_faqs' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   $cat = '';
   if( $cat ) $query_args['faqs_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   ob_start() ;?>
<?php if($query->have_posts()):  ?>
 
   
  <!--Featured Section-->
   <section class="about-section pt-60 pb-20">
        <div class="auto-container">            
            <div class="row clearfix">              
                
                <!--Accordion Column-->
                <article class="col-md-12 column">

                    <!--Accordion Box-->
                    <ul class="accordion-box style-two">
					<?php $active = 1; while($query->have_posts()): $query->the_post();
							global $post ; 
							$faqs_meta = _WSH()->get_meta();
					?>
                        <!--Block-->
                        <li class="block"> 
                            <div class="acc-btn <?php if($active == 1) echo "active";?>"><div class="icon-outer"><span class="icon fa icon-minus flaticon-minus-sign2"></span> <span class="icon icon-plus flaticon-plussign22"></span></div><?php the_title();?></div>
                            <div class="acc-content <?php if($active == 1) echo "current";?>">
                                <div class="content">
                                    <p><?php echo wp_kses_post(legalhelp_trim(get_the_excerpt(), $text_limit));?></p>
                                </div>
                            </div>
                        </li>
						 
                     <?php $active++; endwhile;?> 
                    </ul>
                    
                </article>
   
            </div>
  	
        </div>
    </section>
<?php endif; ?>
<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>