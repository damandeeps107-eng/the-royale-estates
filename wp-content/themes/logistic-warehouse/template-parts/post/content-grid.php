<?php
/**
 * @package Logistic Warehouse
 */
?>

<?php
    $logistic_warehouse_post_date = esc_html(get_the_date());
    $logistic_warehouse_year = esc_html(get_the_date('Y'));
    $logistic_warehouse_month = esc_html(get_the_date('m'));

    $logistic_warehouse_author_id = esc_attr(get_the_author_meta('ID'));
    $logistic_warehouse_author_link = esc_url(get_author_posts_url($logistic_warehouse_author_id));
    $logistic_warehouse_author_name = esc_html(get_the_author());

    $logistic_warehouse_show_date     = get_theme_mod('logistic_warehouse_metafields_date', true);
    $logistic_warehouse_show_comments = get_theme_mod('logistic_warehouse_metafields_comments', true);
    $logistic_warehouse_show_author   = get_theme_mod('logistic_warehouse_metafields_author', true);
    $logistic_warehouse_show_time     = get_theme_mod('logistic_warehouse_metafields_time', true);
?>

<div class="col-lg-4 col-md-6 postsec-list">
    <article class="wow zoomIn" data-wow-duration="2s" id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
    <div class="listarticle">
        <?php if (has_post_thumbnail() ){ ?>
            <div class="post-thumb">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            </div>
        <?php } ?>
        <header class="entry-header">
            <h2 class="single_title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            <?php if ('post' == get_post_type()) : ?>
                <?php if ( $logistic_warehouse_show_date || $logistic_warehouse_show_comments || $logistic_warehouse_show_author || $logistic_warehouse_show_time ) : ?>
                    <div class="postmeta">
                        <?php if ($logistic_warehouse_show_date) : ?>
                            <div class="post-date">
                                <a href="<?php echo esc_url(get_month_link($logistic_warehouse_year, $logistic_warehouse_month)); ?>">
                            <i class="fas fa-calendar-alt"></i> &nbsp;<?php echo esc_html($logistic_warehouse_post_date); ?>
                                    <span class="screen-reader-text"><?php echo esc_html($logistic_warehouse_post_date); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>  
                        <?php if ($logistic_warehouse_show_comments) : ?>  
                            <div class="post-comment">&nbsp; &nbsp;
                                <a href="<?php echo esc_url(get_comments_link()); ?>">
                                <span><?php echo esc_html(get_theme_mod('logistic_warehouse_metabox_seperator', '|'));?></span><i class="fa fa-comment"></i> &nbsp; <?php comments_number(); ?>
                                    <span class="screen-reader-text"><?php comments_number(); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if ($logistic_warehouse_show_author) : ?>
                            <div class="post-author">&nbsp; &nbsp;
                                <a href="<?php echo $logistic_warehouse_author_link; ?>">
                                <span><?php echo esc_html(get_theme_mod('logistic_warehouse_metabox_seperator', '|'));?></span><i class="fas fa-user"></i> &nbsp; <?php echo esc_html($logistic_warehouse_author_name); ?>
                                    <span class="screen-reader-text"><?php echo esc_html($logistic_warehouse_author_name); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if ($logistic_warehouse_show_time) : ?>
                            <div class="post-time">&nbsp; &nbsp;
                                <a href="#">
                                <span><?php echo esc_html(get_theme_mod('logistic_warehouse_metabox_seperator', '|'));?></span><i class="fas fa-clock"></i> &nbsp; <?php echo esc_html(get_the_time()); ?>
                                    <span class="screen-reader-text"><?php echo esc_html(get_the_time()); ?></span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </header>
            <div class="entry-summary">
            <?php if(get_theme_mod('logistic_warehouse_blog_post_description_option') == 'Full Content'){ ?>
                <div class="entry-content"><?php
                    $logistic_warehouse_content = get_the_content(); ?>
                    <p><?php echo wpautop($logistic_warehouse_content); ?></p>  
                </div>
             <?php }
            if(get_theme_mod('logistic_warehouse_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
                <?php if(get_the_excerpt()) { ?>
                    <div class="entry-content"> 
                        <p><?php $logistic_warehouse_excerpt = get_the_excerpt(); echo esc_html($logistic_warehouse_excerpt); ?></p>
                    </div>
                <?php }?>
            <?php }?> 
            </div>
        <div class="clearfix"></div>
    </div>
</article>
</div>
