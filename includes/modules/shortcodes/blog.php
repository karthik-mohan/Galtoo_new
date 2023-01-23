<?php  
   global $post ;
   $count = 0;
   $query_args = array('post_type' => 'post' , 'showposts' => $num , 'order_by' => $sort , 'order' => $order);
   $cat = '';
   if( $cat ) $query_args['category_name'] = $cat;
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
		
   ob_start() ;?>
   
<?php if($query->have_posts()):  ?>   
<!--Blog Section-->
    <section class="blog-section pt-60 pb-30">
        <div class="auto-container">
            <div class="row">
<?php if(wp_kses_post($title)):?>   
                
<div class="col-md-12 text-center">
                    <h1><?php echo wp_kses_post($title);?></h1>
                    <p class="color-theme mb-50"><?php echo wp_kses_post($sub_title);?></p>
                </div><?php endif;?>
            </div>

            
            <div class="row clearfix">
            
                <?php while($query->have_posts()): $query->the_post();
                global $post ; 
                $post_meta = _WSH()->get_meta();
            ?>
            <?php 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
			?>
				<!--Blog Post-->
                <div class="col-md-<?php echo esc_attr( $column_class ); ?> col-sm-6 col-xs-12 featured-blog-post wow fadeInLeft" data-wow-delay="600ms" data-wow-duration="1500ms">
                    <article class="inner-box hvr-float-shadow">
                        <figure class="image">
                            <a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_post_thumbnail('legalhelp_three', array('class' => 'img-responsive'));?></a>
                        </figure>
                        <div class="post-lower">
                            <div class="post-header">
                                <div class="date"><span class="day"><?php echo get_the_date('d');?></span><br><?php echo get_the_date('M');?></div>
                          
<h3 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                <ul class="post-info fs-13">
                                    <li><span class="icon fa fa-user"></span><?php the_author();?></li>
                                    <li><span class="icon fa fa-tag"></span><?php the_tags(); ?></li>
                                </ul>
                            </div>
                            <div class="post-desc">
                               <?php echo wp_kses_post(legalhelp_trim(get_the_excerpt(), $text_limit));?>
                                <div class="text-right"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="color-theme fs-14"><?php esc_html_e('Read More', 'legalhelp');?></a></div>
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