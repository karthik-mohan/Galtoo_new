<?php
///----Blog widgets---

/// Recent Posts 
class Bunch_Recent_Post extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Recent_Post', /* Name */esc_html__('Legal Help Recent Posts','legalhelp'), array( 'description' => esc_html__('Show the recent posts', 'legalhelp' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        
		<!-- Recent Posts -->
        <div class="widget recent-posts wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
		
			<?php $query_string = 'posts_per_page='.$instance['number'];
            if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
            query_posts( $query_string ); 
            
            $this->posts();
            wp_reset_query();
            ?>
            
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Latest News', 'legalhelp');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'legalhelp'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'legalhelp'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'legalhelp'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'legalhelp'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts()
	{
		
		if( have_posts() ):?>
        
           	<?php while( have_posts() ): the_post(); ?>
                 <div class="post">
					<div class="post-thumb"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>">
					<?php the_post_thumbnail('80x65', array('class' => 'img-responsive'));?>
					</a></div>
					<h4><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php echo wp_kses_post(legalhelp_trim(get_the_title(), 8));?></a></h4>
					<div class="post-info text-right"><?php echo get_the_date('F d, Y')?></div>
				</div>
                <?php endwhile; ?>
        <?php endif;
    }
}

///----footer widgets---
//About Us
class Bunch_About_us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_About_us', /* Name */__('Legal Help About Us','legalhelp'), array( 'description' => esc_html__('Show the information about company', 'legalhelp' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			
			<!--Footer Column-->
           <div class="footer-widget links-widget mb-sm-20 mb-xs-30">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                 <p class="color-light-gray"><?php echo wp_kses_post($instance['content']); ?></p>
				  <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-thm btn-xs mb-10 mt-10"> <?php esc_html_e('Read more', 'legalhelp');?><i class="fa fa-arrow-circle-right"></i></a>
                  <br>
                
                <?php if( $instance['show'] ): ?>
                 <div class="social-links list-inline mt-15 ml-0">
                    <?php echo wp_kses_post(legalhelp_get_social_icons()); ?>
				</div>
				<?php endif; ?>
            </div>
            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['show'] = $new_instance['show'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'About Us';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$show = ( $instance ) ? esc_attr($instance['show']) : '';?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'legalhelp'); ?></label>
            <input placeholder="<?php esc_html_e('About Us', 'legalhelp');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'legalhelp'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'legalhelp'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>        
                
		<?php 
	}
	
}

/// Recent Posts 
class Bunch_gallery extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_gallery', /* Name */esc_html__('Legal Help Gallery Widget','legalhelp'), array( 'description' => esc_html__('Show the Gallery images', 'legalhelp' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
		 <div class="widget recent-gallery">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            
			<?php 
				$args = array('post_type' => 'bunch_gallery', 'showposts'=>$instance['number']);
				if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'gallery_category','field' => 'id','terms' => (array)$instance['cat']));
				query_posts($args); 
					
					$this->posts();
					wp_reset_query();
				?>
            
        </div>
        
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Gallery Widget', 'legalhelp');
		$number = ( $instance ) ? esc_attr($instance['number']) : 8;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'legalhelp'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'legalhelp'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'legalhelp'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'legalhelp'), 'selected'=>$cat, 'taxonomy' => 'gallery_category', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts()
	{
		
		if( have_posts() ):?>
        
           	<!-- Title -->
				<div class="clearfix">
				<?php while( have_posts() ): the_post(); ?>
				<?php 
					$post_thumbnail_id = get_post_thumbnail_id($post->ID);
					$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
				?>
					<figure class="image"><a href="<?php echo esc_url($post_thumbnail_url);?>" class="lightbox-image"><?php the_post_thumbnail('80x65');?></a></figure>
                <?php endwhile; ?>
                </div>
        <?php endif;
    }
}
//Footer Contact US
class Bunch_Footer_contact extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Bunch_Footer_contact', /* Name */__('Legal Footer Contact','legalhelp'), array( 'description' => esc_html__('Show the Footer Contact Information', 'legalhelp' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
		<div class="footer-widget links-widget">
			<?php echo wp_kses_post($before_title.$title.$after_title); ?>
			<ul>
				<li class="pull-left"><i class="fa fa-map-marker color-white fs-20 mr-15 mt-5"></i></li>
				<li class="color-light-gray mb-10"><?php echo wp_kses_post($instance['address']); ?></li>
			</ul>
			<ul>
				<li class="mb-12"><a class="color-light-gray no-before pl-0" href="#"><i class="fa fa-phone color-white fs-16 mr-10"></i><?php echo wp_kses_post($instance['mobile']); ?></a></li>
				<li class="mb-0"><a class="color-light-gray no-before pl-0" href="#"><i class="fa fa-envelope-o color-white fs-14 mr-10"></i><?php echo wp_kses_post($instance['email']); ?></a></li>
			</ul>
			<ul>
				<li class="pull-left"><i class="fa fa-clock-o color-white fs-16 mr-10"></i></li>                                
				<li class="color-light-gray mt-15"><?php echo wp_kses_post($instance['openday']); ?><br><?php echo wp_kses_post($instance['closeday']); ?><span class="color-theme"><?php echo wp_kses_post($instance['text']); ?></span></li>
			</ul>
		</div>

		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['address'] = $new_instance['address'];
		$instance['mobile'] = $new_instance['mobile'];
		$instance['email'] = $new_instance['email'];
		$instance['openday'] = $new_instance['openday'];
		$instance['closeday'] = $new_instance['closeday'];
		$instance['text'] = $new_instance['text'];

		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'About Us';
		$address = ($instance) ? esc_attr($instance['address']) : '';
		$mobile = ($instance) ? esc_attr($instance['mobile']) : '';
		$email = ($instance) ? esc_attr($instance['email']) : '';
		$openday = ($instance) ? esc_attr($instance['openday']) : '';
		$closeday = ($instance) ? esc_attr($instance['closeday']) : '';
		$text = ($instance) ? esc_attr($instance['text']) : '';
	
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'legalhelp'); ?></label>
            <input placeholder="<?php esc_html_e('Title', 'legalhelp');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'legalhelp'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo wp_kses_post($address); ?></textarea>
        </p>
		 <p>
            <label for="<?php echo esc_attr($this->get_field_id('mobile')); ?>"><?php esc_html_e('Mobile', 'legalhelp'); ?></label>
            <input placeholder="<?php esc_html_e('Mobile', 'legalhelp');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('mobile')); ?>" name="<?php echo esc_attr($this->get_field_name('mobile')); ?>" type="text" value="<?php echo esc_attr($mobile); ?>" />
        </p>
		 <p>
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email:', 'legalhelp'); ?></label>
            <input placeholder="<?php esc_html_e('Email', 'legalhelp');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
        </p>
		<p>
            <label for="<?php echo esc_attr($this->get_field_id('openday')); ?>"><?php esc_html_e('Open Day:', 'legalhelp'); ?></label>
            <input placeholder="<?php esc_html_e('Open Day', 'legalhelp');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('openday')); ?>" name="<?php echo esc_attr($this->get_field_name('openday')); ?>" type="text" value="<?php echo esc_attr($openday); ?>" />
        </p>
		 <p>
            <label for="<?php echo esc_attr($this->get_field_id('closeday')); ?>"><?php esc_html_e('Close Day:', 'legalhelp'); ?></label>
            <input placeholder="<?php esc_html_e('Close Day', 'legalhelp');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('closeday')); ?>" name="<?php echo esc_attr($this->get_field_name('closeday')); ?>" type="text" value="<?php echo esc_attr($closeday); ?>" />
        </p>
		 <p>
            <label for="<?php echo esc_attr($this->get_field_id('text')); ?>"><?php esc_html_e('Close Text:', 'legalhelp'); ?></label>
            <input placeholder="<?php esc_html_e('Close Text', 'legalhelp');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>" type="text" value="<?php echo esc_attr($text); ?>" />
        </p>
              
                
		<?php 
	}
	
}

