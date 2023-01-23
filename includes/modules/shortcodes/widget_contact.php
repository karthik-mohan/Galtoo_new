<?php  
ob_start() ;?>

<!--Contact Us Section-->
  <aside class="sidebar">
	<!-- Contact Information -->
	<div class="widget contact-info">
		<div class="sidebar-title"><h3><?php echo wp_kses_post($title);?></h3></div>
		<div class="text"><?php echo wp_kses_post($text);?></div>
		<ul class="info">
			<li><strong><?php esc_html_e('Email', 'legalhelp');?></strong> <?php echo wp_kses_post($email);?></li>
			<li><strong><?php esc_html_e('Phone', 'legalhelp');?></strong><?php echo wp_kses_post($phone);?></li>
			<li><strong><?php esc_html_e('Fax', 'legalhelp');?></strong><?php echo wp_kses_post($fax);?></li>
			<li><strong><?php esc_html_e('Website', 'legalhelp');?></strong> <?php echo wp_kses_post($web);?></li>
		</ul>
	</div>
</aside>
<?php 
   wp_reset_postdata();
   $output = ob_get_contents(); 
   ob_end_clean(); 
   return $output ; ?>