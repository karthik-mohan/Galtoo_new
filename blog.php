<!--Blog Post-->
<div class="featured-blog-post wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
    <article class="inner-box hvr-float-shadow">
        <figure class="image">
            <a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_post_thumbnail();?></a>
        </figure>
        <div class="post-lower">
            <div class="post-header">
                <div class="date"><span class="day"><?php echo get_the_date('d');?></span><br><?php echo get_the_date('M');?></div>
                <h3><a href="<?php echo esc_url(get_permalink(get_the_id()));?>"><?php the_title();?></a></h3>
                <ul class="post-info">
                    <li><span class="icon fa fa-user"></span> <a href="#"><?php the_author();?></a></li>
                    <li><span class="icon fa fa-tag"></span> <?php the_category(', '); ?></li>
                    <li><span class="icon fa fa-comment-o"></span> <a href="#"> <?php comments_number(); ?></a></li>
                    <li><span class="icon fa fa-calendar-o"></span> <a href="#"><?php echo get_the_date();?></a></li>
                </ul>
            </div>
            <div class="post-desc">
                <?php the_excerpt();?>
                <div class="text-right"><a href="<?php echo esc_url(get_permalink(get_the_id()));?>" class="theme-btn"><?php esc_html_e('Read More  ', 'legalhelp');?><span class="flaticon-right11"></span></a></div>
            </div>
        </div>
    </article>
</div>