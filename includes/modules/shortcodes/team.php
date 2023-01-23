<?php  
   $count = 1;
   $query_args = array('post_type' => 'bunch_team' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   $cat = '';
   if( $cat ) $query_args['team_category'] = $cat;
   $query = new WP_Query($query_args) ; 
   
   $layout = wp_kses_post($layout);
   switch ($layout) {
			case '3':
				$column_class = 4;
			break;
			case '2':
				$column_class = 6;
			break;
			default:
				$column_class = 3;
			break;
		};
	$location = wp_kses_post($location);
   switch ($location) {
			case '2':
				$column_class1 = 12;
			break;
			default:
				$column_class1 = 6;
			break;
		};	
   
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>
 
   

	<!--Team Members Section-->
    <section class="team-section">
        <div class="container">
            <?php if(wp_kses_post($title)):?>
			<div class="row">
				<div class="col-md-12 text-center">
                    <h1><?php echo wp_kses_post($title);?></h1>
                    <p class="color-theme mb-50"><?php echo wp_kses_post($sub_title);?></p>
                </div>
            </div>
			<?php endif;?>
            <div class="row clearfix">
                
                <!--Column-->
                <?php while($query->have_posts()): $query->the_post();
						global $post ; 
						$teams_meta = _WSH()->get_meta();
					?>
				<div class="col-md-<?php echo esc_attr( $column_class ); ?> col-sm-6 col-xs-12">
                    <article class="team-area">
                        <div class="row clearfix">
                            <figure class="col-md-<?php echo esc_attr( $column_class1); ?> image"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"> <?php the_post_thumbnail('legalhelp_one', array('class' => 'img-responsive'));?></a></figure>
                            <div class="col-md-<?php echo esc_attr( $column_class1); ?>">
                                <div class="content">
                                    <div class="title-box">
                                        <h4><?php the_title();?></h4>
                                        <p><?php echo wp_kses_post(legalhelp_set($teams_meta, 'designation'));?></p>
                                    </div>
                                    <div class="text">
                                        <p><?php echo wp_kses_post(legalhelp_trim(get_the_excerpt(), $text_limit));?></p>
                                    </div>
                                    <a href="<?php echo esc_url($link);?>" class="btn-thm btn-xs"><?php echo wp_kses_post($btn);?> <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </article>
                  </div>
				 <?php endwhile;?> 
            </div>
        </div>
    </section>
	
<?php endif; ?>
<?php 
	wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>