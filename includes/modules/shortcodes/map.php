<?php   
ob_start();
?>
	<!-- Google map Hafizur************************ -->
<section class="map-section">
	  <div class="row clearfix">
		<div class="column map-column col-md-12 col-xs-12">
			<article class="inner-box">
				<!--Map Container-->
				<div class="map-container" id="google-map-area">
					<!--Map Canvas-->
					<div class="google-map-home" id="google-map"><?php echo do_shortcode( bunch_base_decode( $g_map ) );?></div>
				</div>
			</article>
		</div>
    </div>
 </section>

<?php return ob_get_clean();?>	
