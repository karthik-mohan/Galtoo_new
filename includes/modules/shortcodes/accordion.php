<?php 
$prt = array();
		$prt['layout'] = wp_kses_post($layout);
		$prt['prt_title1'] = wp_kses_post($title1);
		$prt['prt_title2'] = wp_kses_post($title2);
		$prt['prt_title3'] = wp_kses_post($title3);
		$prt['prt_title4'] = wp_kses_post($title4);
		$prt['prt_title5'] = wp_kses_post($title5);
		$prt['prt_title6'] = wp_kses_post($title6);
		
		$prt['prt_number1'] = wp_kses_post($number1);
		$prt['prt_number2'] = wp_kses_post($number2);
		$prt['prt_number3'] = wp_kses_post($number3);
		$prt['prt_number4'] = wp_kses_post($number4);
		$prt['prt_number5'] = wp_kses_post($number5);
		$prt['prt_number6'] = wp_kses_post($number6);
		
		

   ob_start() ;?>

    <!--Featured Section-->
    <section class="about-section">
            <div class="row clearfix">
                <!--Accordion Column-->
                <article class="col-md-12 col-sm-12 col-xs-12 column">
                    <?php if(wp_kses_post($title)):?>
					<h4 class="sec-title title-bottom"><?php echo wp_kses_post($title);?></h4>
					<?php endif;?>
                    <!--Accordion Box-->
                    <ul class="accordion-box">
                        <!--Block-->
                    <?php $active = 1;for($i=1; $i <= $layout ; $i++) { ?>    
			<li class="block">
                            <div class="acc-btn <?php if($active == 1) echo "active";?>"><div class="icon-outer"><span class="icon fa icon-minus flaticon-minus-sign2"></span> <span class="icon icon-plus flaticon-plussign22"></span></div> <?php echo stripslashes($prt['prt_title'.$i]); ?></div>
                            <div class="acc-content <?php if($active == 1) echo "current";?>">
                                <div class="content"><?php echo stripslashes($prt['prt_number'.$i]); ?></div>
                            </div>
                        </li>
			<?php $active++;  }?> 	
                    </ul>
                </article>
            </div>
    </section>
<?php 

	wp_reset_postdata();

   $output = ob_get_contents(); 

   ob_end_clean(); 

   return $output ; ?>