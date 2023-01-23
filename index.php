<?php legalhelp_bunch_global_variable(); 
	$options = _WSH()->option();
	get_header(); 
	if( $wp_query->is_posts_page ) {
		$meta = _WSH()->get_meta('_bunch_layout_settings', get_queried_object()->ID);
		$meta1 = _WSH()->get_meta('_bunch_header_settings', get_queried_object()->ID);
		if(legalhelp_set($_GET, 'layout_style')) $layout = legalhelp_set($_GET, 'layout_style'); else
		$layout = legalhelp_set( $meta, 'layout', 'full' );
		$sidebar = legalhelp_set( $meta, 'sidebar', 'default-sidebar' );
		$view = legalhelp_set( $meta, 'view', 'grid' );
		$bg = legalhelp_set($meta1, 'header_img');
		$title = legalhelp_set($meta1, 'header_title');
	} else {
		$settings  = _WSH()->option(); 
		if(legalhelp_set($_GET, 'layout_style')) $layout = legalhelp_set($_GET, 'layout_style'); else
		$layout = legalhelp_set( $settings, 'blog_page_layout', 'full' );
		$sidebar = legalhelp_set( $settings, 'blog_page_sidebar', 'default-sidebar' );
		$view = legalhelp_set( $settings, 'blog_page_view', 'list' );
		$bg = legalhelp_set($settings, 'blog_page_header_img');
		$title = legalhelp_set($settings, 'blog_page_header_title');
	}
	$layout = legalhelp_set( $_GET, 'layout' ) ? legalhelp_set( $_GET, 'layout' ) : $layout;
	$view = legalhelp_set( $_GET, 'view' ) ? legalhelp_set( $_GET, 'view' ) : $view;
	$sidebar = ( $sidebar ) ? $sidebar : 'default-sidebar';
	_WSH()->page_settings = array('layout'=>'right', 'sidebar'=>$sidebar);
	$classes = ( !$layout || $layout == 'full' || legalhelp_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	?>
	<!--Page Title-->
    <section class="page-title" <?php if($bg):?>style="background-image:url('<?php echo esc_attr($bg)?>');"<?php endif;?>>
    	<div class="auto-container">
        	<div class="text-center">
                <h1><?php if($title) echo wp_kses_post($title); else esc_html_e('Blog', 'legalhelp');?></h1>
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
					<section class="default-section blog-section pt-0 pb-0 thm-unit-test">
                        <!--Blog Post-->
                        <?php while( have_posts() ): the_post();?>
                            <!-- blog post item -->
                            <!-- Post -->
                            <div id="post-<?php the_ID(); ?>" <?php post_class();?>>
                                <?php get_template_part( 'blog' ); ?>
                            <!-- blog post item -->
                            </div><!-- End Post -->
                        <?php endwhile;?>
                        
                        <br><br>
                        <!--Pagination-->
                        <div class="pager-outer clearfix">
                            <div class="pagination text-right">
                                <?php legalhelp_the_pagination(); ?>
                            </div>
                        </div>
                    </section>
                </div>
                <!--Content Side-->
                
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