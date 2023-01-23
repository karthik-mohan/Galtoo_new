<?php legalhelp_bunch_global_variable();
	$options = _WSH()->option();
	get_header(); 
	$settings  = _WSH()->option(); 
	if(legalhelp_set($_GET, 'layout_style')) $layout = legalhelp_set($_GET, 'layout_style'); else
	$layout = legalhelp_set( $settings, 'search_page_layout', 'right' );
	$sidebar = legalhelp_set( $settings, 'search_page_sidebar', 'blog-sidebar' );
	$view = legalhelp_set( $settings, 'search_page_view', 'list' );
	_WSH()->page_settings = array('layout'=>$layout, 'sidebar'=>$sidebar);
	$classes = ( !$layout || $layout == 'full' || legalhelp_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-9 col-sm-12 col-xs-12 ' ;
	$bg = legalhelp_set($settings, 'search_page_header_img');
	$title = legalhelp_set($settings, 'search_page_header_title');
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
                
                <?php if(have_posts()):?>
            <!-- .blog-content -->
            <div class="<?php echo esc_attr($classes);?>">
                <!--Start single blog post item-->
                <?php while( have_posts() ): the_post();?>
						<!-- blog post item -->
						<!-- Post -->
						<div id="post-<?php the_ID(); ?>" <?php post_class();?>>
							<?php get_template_part( 'blog' ); ?>
						<!-- blog post item -->
						</div><!-- End Post -->
				<?php endwhile;?> 
				<!-- Pagination -->
				
                <div class="post-pagination blog-left-pagination">
                    <?php legalhelp_the_pagination(); ?>
                </div>
            </div> <!-- /.blog-content -->
            <?php else : ?>
            <div class="<?php echo esc_attr($classes);?> blog_post_area eco-search">
					
					<?php if(legalhelp_set($options, 'search_image')):?>
					<img src="<?php echo esc_url(legalhelp_set($options, 'search_image'));?>" alt="<?php esc_html_e('images', 'legalhelp');?>" class="img-responsive">
					<?php else :?>
					<img src="<?php echo esc_url(get_template_directory_uri().'/images/search.png');?>" alt="<?php esc_html_e('images', 'legalhelp');?>" class="img-responsive">
					<?php endif;?>
					<?php if(legalhelp_set($settings, 'search_text')):?>
					<h2><?php echo wp_kses_post(legalhelp_set($settings, 'search_text')); ?></h2>
					<?php else :?>
					<h2><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'legalhelp' ); ?></h2>
					<?php endif;?>
					<?php get_search_form(); ?>
				</div>
                
			<?php endif; ?>
                
                <!--Sidebar-->	
                <!-- sidebar area -->
                <?php if( $layout == 'right' ): ?>
                <?php if ( is_active_sidebar( $sidebar ) ) { ?>
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <aside class="sidebar">	
                        <?php dynamic_sidebar( $sidebar ); ?>
                    </aside>
                </div>
                <?php } ?>
                <?php endif; ?>
                <!--Sidebar-->
            </div>
        </div>
    </div>
<?php get_footer(); ?>