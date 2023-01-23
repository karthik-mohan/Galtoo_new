<?php legalhelp_bunch_global_variable();
	$options = _WSH()->option();
	get_header(); 
	$meta = _WSH()->get_term_meta( '_bunch_category_settings' );
	_WSH()->page_settings = $meta; 
	if(legalhelp_set($_GET, 'layout_style')) $layout = legalhelp_set($_GET, 'layout_style'); else
	$layout = legalhelp_set( $meta, 'layout', 'right' );
	$sidebar = legalhelp_set( $meta, 'sidebar', 'blog-sidebar' );
	$view = legalhelp_set( $meta, 'view', 'list' );
	$view = legalhelp_set( $_GET, 'view' ) ? legalhelp_set( $_GET, 'view' ) : $view;
	$classes = ( !$layout || $layout == 'full' || legalhelp_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	$bg = legalhelp_set($meta, 'header_img');
	$title = legalhelp_set($meta, 'header_title');
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
					<section class="default-section blog-section pt-0 pb-0">
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