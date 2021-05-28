<?php
$mazino_options = theme_data_setup();
$mazino_current_options = wp_parse_args(get_option('quality_pro_options', array()), $mazino_options);
get_header();
quality_breadcrumbs();
?>
<section id="section-block" class="news">
    <div class="container">

        <!--Blog Masonry-->
        <div class="row" id="blog-masonry">
            <?php
            $mazino_pagedno = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $mazino_args = array('post_type' => 'post', 'paged' => $mazino_pagedno);
            $mazino_post_type_data = new WP_Query($mazino_args);
            while ($mazino_post_type_data->have_posts()):
                $mazino_post_type_data->the_post();
                ?>
                <div class="item">
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                        <figure class="post-thumbnail">
                            <?php $mazino_defalt_arg = array('class' => "img-responsive"); ?>
                            <?php if (has_post_thumbnail()): ?>
                                <a  href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('', $mazino_defalt_arg); ?>
                                </a>
                            <?php endif; ?>

                        </figure>
                        <div class="post-content">
                            <?php if ($mazino_current_options['home_meta_section_settings'] == '') { ?>
                                <div class="item-meta">
                                    <a class="author-image item-image" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_avatar(get_the_author_meta('user_email'), $size = '40'); ?></a>
                                    <?php echo ' '; ?><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo esc_html(get_the_author()); ?></a>
                                    <br>
                                    <a class="entry-date" href="<?php echo esc_url(get_month_link(get_post_time('Y'), get_post_time('m'))); ?>">
                                        <?php echo esc_html(get_the_date()); ?></a>
                                </div>
                            <?php } ?>
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            </header>
                            <div class="entry-content">
                                <?php
                                 the_content(__('Read More', 'mazino'));?>
                            </div>
                            <?php if ($mazino_current_options['home_meta_section_settings'] == '') { ?>
                                <hr />
                                <div class="entry-meta">
                                    <span class="comment-links"><a href="<?php the_permalink(); ?>"><?php comments_number(esc_html__('No Comments', 'mazino'), esc_html__('One comment', 'mazino'), esc_html__('% comments', 'mazino')); ?></a></span>
                                    <?php
                                    $mazino_cat_list = get_the_category_list();
                                    if (!empty($mazino_cat_list)) {
                                        ?>
                                        <span class="cat-links"><?php esc_html_e('In', 'mazino'); ?><?php the_category(' '); ?></span>
                                    <?php
                                    } ?>

                                </div>
    <?php } ?>
                        </div>
                    </article>
                </div>
<?php

 endwhile;
wp_reset_postdata();
  ?>
            <!--/Blog Content-->
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="paginations">
                    <!-- Pagination -->
                    <?php
                    // Previous/next page navigation.
                    the_posts_pagination(array(
                        'prev_text' => '<i class="fa fa-angle-double-left"></i>',
                        'next_text' => '<i class="fa fa-angle-double-right"></i>',
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
