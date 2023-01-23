<?php $options = _WSH()->option();
	get_header(); 
	$settings  = legalhelp_set(legalhelp_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
	$meta = _WSH()->get_meta('_bunch_layout_settings');
	$meta1 = _WSH()->get_meta('_bunch_header_settings');
	$meta2 = _WSH()->get_meta();
	_WSH()->page_settings = $meta;
	if(legalhelp_set($_GET, 'layout_style')) $layout = legalhelp_set($_GET, 'layout_style'); else
	$layout = legalhelp_set( $meta, 'layout', 'full' );
	if( !$layout || $layout == 'full' || legalhelp_set($_GET, 'layout_style')=='full' ) $sidebar = ''; else
	$sidebar = legalhelp_set( $meta, 'sidebar', 'blog-sidebar' );
	$classes = ( !$layout || $layout == 'full' || legalhelp_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	/** Update the post views counter */
	_WSH()->post_views( true );
	$bg = legalhelp_set($meta1, 'header_img');
	$title = legalhelp_set($meta1, 'header_title');
?>
<!--Page Title-->
<section class="page-title" <?php if($bg):?>style="background-image:url('<?php echo esc_attr($bg)?>');"<?php endif;?>>
	<div class="auto-container">
		<div class="text-center">
			<h1><?php if($title) echo wp_kses_post($title); else wp_title('');?></h1>
			<ul class="bread-crumb">
				<?php echo wp_kses_post(legalhelp_get_the_breadcrumb()); ?>
			</ul>
		</div>
	</div>
</section>
<!--Sidebar Page-->
  <div class="sidebar-page pb-0">
    	<div class="auto-container">
        	<div class="row clearfix">
                <!-- sidebar area -->
                <?php if( $layout == 'left' ): ?>
                <?php if ( is_active_sidebar( $sidebar ) ) { ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <aside class="sidebar">	
                        <?php dynamic_sidebar( $sidebar ); ?>
                    </aside>
                </div>
                <?php } ?>
                <?php endif; ?>
                
            <!--Content Side-->	
            <div class="<?php echo esc_attr($classes);?>">
                
                <!--Default Section-->
                 <section class="blog-container blog-detail thm-unit-test">
                     <?php while( have_posts() ): the_post(); 
						$post_meta = _WSH()->get_meta();
					?>    
                        <!--Blog Post-->
		<div class="blog-post">
			<!--Blog Post-->
			<div class="featured-blog-post wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
				<article class="inner-box">
					 <figure class="image">
						<?php the_post_thumbnail();?>
					</figure>
					<div class="post-lower">
						 <div class="post-header">
							<div class="date"><span class="day"><?php echo get_the_date('d');?></span><br><?php echo get_the_date('M');?></div>
						
							<ul class="post-info">
								<li><span class="icon fa fa-user"></span> <a href="#"><?php the_author();?></a></li>
								<li><span class="icon fa fa-tag"></span> <?php the_category(', '); ?></li>
								<li><span class="icon fa fa-comment-o"></span> <a href="#"> <?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></a></li>
								<li><span class="icon fa fa-calendar-o"></span> <a href="#"><?php echo get_the_date();?></a></li>
							</ul>
						</div>
						<div class="post-desc text">
							<?php the_content();?> 
                            <div class="clearfix"></div>
							<?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'legalhelp'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
						</div>
					</div>
				</article>
				
				<!--About Author-->
			<?php if (the_author_meta( 'description', get_the_author_meta('ID'))) : ?>	
				<div class="about-author mt-60 wow fadeIn" data-wow-delay="0ms" data-wow-duration="1500ms">
					<div class="author-desc">
						<div class="author-thumb">
						<?php echo get_avatar('', 84 ); ?>
						</div>
						<div class="author-info"><strong><?php the_author(); ?></strong> <?php esc_html_e('/ ', 'legalhelp');?><?php the_author_posts(); ?> <?php esc_html_e('Blogposts', 'legalhelp');?><?php the_tags(); ?></div>
						<div class="text"><?php echo wp_kses_post(the_author_meta( 'description', get_the_author_meta('ID') ));?></div>
					</div>
				</div>
			<?php endif ; ?>	
				<?php comments_template(); ?>
			</div>
		
		</div>
	 <?php endwhile;?>	
	</section>  
     </div>
            <!--Content Side-->
            
            <!-- sidebar area -->
			<?php if( $layout == 'right' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
			<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">        
				<aside class="sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
				</aside>
            </div>
			<?php } ?>
			<?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>