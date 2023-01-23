<?php /* Template Name: VC Page */
	get_header() ;
	$meta = _WSH()->get_meta('_bunch_header_settings');
	$bg = legalhelp_set($meta, 'header_img');
	$title = legalhelp_set($meta, 'header_title');
?>
<?php if(legalhelp_set($meta, 'breadcrumb')):?>
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
<?php endif;?>
<?php while( have_posts() ): the_post(); ?>
    <?php the_content(); ?>
<?php endwhile;  ?>
<?php get_footer() ; ?>