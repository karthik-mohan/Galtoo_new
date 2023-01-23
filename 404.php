<?php legalhelp_bunch_global_variable();
	$options = _WSH()->option();
	get_header(); 
	$settings  = _WSH()->option();
	if(legalhelp_set($_GET, 'layout_style')) $layout = legalhelp_set($_GET, 'layout_style'); else
	$layout = legalhelp_set( $settings, 'archive_page_layout', 'right' );
	if( !$layout || $layout == 'full' || legalhelp_set($_GET, 'layout_style')=='full' ) $sidebar = ''; else
	$sidebar = legalhelp_set( $settings, 'archive_page_sidebar', 'blog-sidebar' );
	_WSH()->page_settings = array('layout'=>$layout, 'sidebar'=>$sidebar);
	$classes = ( !$layout || $layout == 'full' || legalhelp_set($_GET, 'layout_style')=='full' ) ? ' col-lg-12 col-md-12 col-sm-12 col-xs-12 ' : ' col-lg-9 col-md-8 col-sm-12 col-xs-12 ' ;
	$bg = legalhelp_set($settings, '404_page_header_img');
	$title = legalhelp_set($settings, '404_page_header_title');
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

<div class="error_page container">
    <div class="row">
		<div class="col-md-10 col-sm-12 col-xs-12 shop_aside pull-right">  <!-- /.shop aside use for styling input search box -->
            </br></br></br>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="transition-ease"><i class="fa fa-angle-double-left"></i><?php esc_html_e('Back to Home', 'legalhelp')?> </a>
			</br> 
			<?php if(legalhelp_set($settings, '404_text')):?>
				<h3><?php echo wp_kses_post(legalhelp_set($settings, '404_text')); ?></h3>
			<?php else :?>
				<h3><?php esc_html_e( 'OOPS!! Its look like something went Wrong!!!', 'legalhelp' ); ?></h3>
			<?php endif;?>
				</br>
			<?php if(legalhelp_set($settings, '404_page_bg')):?>
				<img src="<?php echo esc_url(legalhelp_set($settings, '404_page_bg'));?>" alt="<?php esc_html_e('images', 'legalhelp');?>" class="img-responsive">
			<?php else :?>
				<img src="<?php echo esc_url(get_template_directory_uri().'/images/404.png');?>" alt="<?php esc_html_e('images', 'legalhelp');?>" class="img-responsive">
			<?php endif;?>	
			</br> </br> </br>
        </div>
		<div class="col-md-2"></div>
    </div> <!-- /row -->
</div> <!-- /error_page --> 		
<?php get_footer(); ?>