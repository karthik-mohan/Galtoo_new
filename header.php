<?php $options = _WSH()->option();
	legalhelp_bunch_global_variable();
	$icon_href = (legalhelp_set( $options, 'site_favicon' )) ? legalhelp_set( $options, 'site_favicon' ) : get_template_directory_uri().'/images/favicon.png';
 ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ):?>
<link rel="shortcut icon" href="<?php echo esc_url($icon_href);?>" type="image/x-icon">
<link rel="icon" href="<?php echo esc_url($icon_href);?>" type="image/x-icon">
<?php endif;?>
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="page-wrapper">
    <!-- Preloader -->
<?php if(legalhelp_set($options, 'preloader')):?>
    <!-- pre loader  -->
	<div class="preloader"></div>
<?php endif;?>

    <!-- Main Header -->
    <header class="main-header">
    	<!-- Header Top -->
        <?php if(legalhelp_set($options, 'hide_header_social_iconh')):?>
    	<div class="header-top">
        	<div class="auto-container clearfix">
                <div class="row">
                   
					<div class="col-md-4">
					<?php if(legalhelp_set($options, 'time_schdule') || legalhelp_set($options, 'day_schdule')):?> 
						<div class="color-light-white fs-13 mt-5"><span class="color-white fw-b"><?php echo wp_kses_post(legalhelp_set($options, 'time_title'));?> </span> <?php echo wp_kses_post(legalhelp_set($options, 'time_schdule'));?> <?php echo wp_kses_post(legalhelp_set($options, 'day_schdule'));?></div>
                    	<?php endif;?>
						</div>
			
				<?php if(legalhelp_set($options, 'top_phone') || legalhelp_set($options, 'email')):?>
                    <div class="col-md-8 text-right">
						<div class="header-widget">
                            <ul class="clearfix">
                                <li><a href="#"><span class="fa fa-phone"></span><?php echo wp_kses_post(legalhelp_set($options, 'top_phone'));?></a></li>
                                <li><a href="emailto:<?php echo sanitize_email(legalhelp_set($options, 'email'));?>"><span class="fa fa-envelope-o"></span> <?php echo sanitize_email(legalhelp_set($options, 'email'));?></a></li>
                            </ul>                        
                        </div>
						<?php endif;?>
			<?php if(legalhelp_set($options, 'hide_header_social_iconh')):?>
			<?php if($socials = legalhelp_set(legalhelp_set($options, 'social_mediah'), 'social_mediah')): ?>
						<div class="header-widget social-links">
					<?php foreach($socials as $key => $value):
						if(legalhelp_set($value, 'tocopy')) continue;
                    ?>
                            <a href="<?php echo esc_url(legalhelp_set($value, 'social_linkh'));?>"><i class="fa <?php echo esc_attr(legalhelp_set($value, 'social_iconh'));?>"></i></a>
                         <?php endforeach;?>    
                        </div> 
					<?php endif;?>	
                    </div>
					<?php endif;?>
                </div>
                <!-- Top Right -->
                <div class="top-right">
                </div>
                
            </div>
        </div><!-- Header Top End -->
		<?php endif;?>
        <div class="header-lower">
        	<div class="auto-container clearfix">
                <!--Outer Box-->
                <div class="outer-box">
                    <!-- Logo -->
                    <div class="logo mt-12">
						<?php if(legalhelp_set($options, 'logo_image')):?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" src="<?php echo esc_url(legalhelp_set($options, 'logo_image'));?>" alt="<?php esc_html_e('image', 'legalhelp');?>"></a>
						<?php else:?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img class="img-responsive" src="<?php echo esc_url(get_template_directory_uri().'/images/logo.png');?>" alt="<?php esc_html_e('image', 'legalhelp');?>"></a>
						<?php endif;?>
                     </div>
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-header">
                            <!-- Toggle Button -->    	
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                        </div>
                        
                        <div class="navbar-collapse collapse clearfix">
                            <ul class="navigation">
								   <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
									'container_class'=>'navbar-collapse collapse navbar-right',
									'menu_class'=>'nav navbar-nav',
									'fallback_cb'=>false, 
									'items_wrap' => '%3$s', 
									'container'=>false,
									'walker'=> new Bunch_Bootstrap_walker()  
								) ); ?>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
             
                </div>
            </div>
        </div><!-- Header Lower End-->
        
    </header><!--End Main Header -->
    