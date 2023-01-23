<?php $options = get_option('wp-legalhelp'.'_theme_options');?> 
   <?php if(!(legalhelp_set($options, 'hide_whole_footer'))):?>
   <!--Main Footer-->
    <footer class="main-footer">
        <?php if(!(legalhelp_set($options, 'hide_upper_footer'))):?>
		<!--Footer Upper-->
    	<div class="footer-upper xs-width4-center">
        		<?php if ( is_active_sidebar( 'footer-sidebar' ) ) { ?>
                <div class="auto-container">
                    <div class="row clearfix">
                        <?php dynamic_sidebar( 'footer-sidebar' ); ?>
                    </div>
                </div>
            <?php } ?>   
        </div>
         <?php endif;?>
        
		<!--Footer bootom-->
		<?php if(!(legalhelp_set($options, 'hide_bottom_footer'))):?>
        <div class="footer-bottom">
        	<div class="auto-container fs-13">
                <?php if(legalhelp_set($options, 'copyright')):?>
				<p class="mb-0"><?php echo wp_kses_post(legalhelp_set($options, 'copyright'));?></p>
				<?php endif;?>
            </div>
        </div>
       <?php endif;?>
    </footer>
    <?php endif;?>
</div>
<!--End pagewrapper-->
<!--Scroll to top-->
<div class="scroll-to-top"><span class="fa fa-arrow-up"></span></div>
<?php wp_footer(); ?>
</body>
</html>