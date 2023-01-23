<?php $options = _WSH()->option();
	get_header();
	$settings  = legalhelp_set(legalhelp_set(get_post_meta(get_the_ID(), 'bunch_page_meta', true) , 'bunch_page_options') , 0);
	$meta = _WSH()->get_meta('_bunch_layout_settings');
	$meta1 = _WSH()->get_meta('_bunch_header_settings');
	if(legalhelp_set($_GET, 'layout_style')) $layout = legalhelp_set($_GET, 'layout_style'); else
	$layout = legalhelp_set( $meta, 'layout', 'full' );
	$sidebar = legalhelp_set( $meta, 'sidebar', 'blog-sidebar' );
	$classes = ( !$layout || $layout == 'full' || legalhelp_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-9 col-sm-12 col-xs-12 ' ;
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
<div class="sidebar-page no-padd-top">
    <div class="auto-container">
        <div class="row clearfix">
            <!-- sidebar area -->
			<?php if( $layout == 'left' ): ?>
			<?php if ( is_active_sidebar( $sidebar ) ) { ?>
			<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">        
				<aside class="sidebar">
					<?php dynamic_sidebar( $sidebar ); ?>
				</aside>
            </div>
			<?php } ?>
			<?php endif; ?>
            
            <!--Content Side-->	
            <div class="<?php echo esc_attr($classes);?>">
                <!--Default Section-->
                <section class="default-section thm-unit-test blog-section no-padd-top no-padd-bottom">
                    <!--Blog Post-->
                    <?php while( have_posts() ): the_post();?>
                        <!-- blog post item -->
                        <div class="text">
							<?php the_content(); ?>
                            <div class="clearfix"></div>
                            <?php wp_link_pages(array('before'=>'<div class="paginate-links">'.esc_html__('Pages: ', 'legalhelp'), 'after' => '</div>', 'link_before'=>'<span>', 'link_after'=>'</span>')); ?>
                        </div>
					<!--Pagination-->
                    <div class="pager-outer clearfix">
                        <div class="pagination text-right">
                            <?php legalhelp_the_pagination(); ?>
                        </div>
                    </div>	
                    <?php comments_template(); ?><!-- end comments -->
                    <?php endwhile;?>
                    
                  
                </section>
            </div>
            <!--Content Side-->
            
            <!--Sidebar-->	
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
            <!--Sidebar-->
        </div>
    </div>
</div>

<?php get_footer(); ?>