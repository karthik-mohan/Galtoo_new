<?php  

ob_start() ;?>
    <!--Welcome Section-->
    <section class="welcome-section">
            <div class="row clearfix">
				<div class="col-xs-12 col-sm-12">
					<div class="icon-style text-center">
						<a href="<?php echo esc_url($link);?>"><i class="<?php echo wp_kses_post($icon);?> icon-bg style-round "></i></a>
						<h4><a class="title" href="<?php echo esc_url($link);?>"><?php echo wp_kses_post($title);?></a></h4>
					</div>
				</div>
            
        </div>
    </section>
<?php 
   wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>