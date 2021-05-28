<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Bussiness Epic
 */

$hide_show_feature_image = blog_light_get_option('blog_light_show_feature_image_single_option');
$show_cat= blog_light_get_option('blog_light_show_categories_option1');
$show_date= blog_light_get_option('blog_light_show_date_option');
$show_author= blog_light_get_option('blog_light_show_author_option');


?>
<article id="post-<?php the_ID(); ?>"
         class="post type-post status-publish has-post-thumbnail hentry" <?php post_class(); ?>>


    <figure>
        <div class="view hm-zoom">
            <a href="<?php the_permalink(); ?>">
                <?php

                if (has_post_thumbnail() && $hide_show_feature_image == 'show') {
                    the_post_thumbnail('large', array('class' => 'img-fluid'));
                }
                ?>

                <div class="mask flex-center">

                </div>
            </a>
        </div>
    </figure>
    <header class="entry-header">
        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    </header>
    <div class="entry-meta">
        <?php if($show_date=='1'){?>
        <span class="posted-on">
            <a href=""><i class="fa fa-calendar"></i><time class="enty-date posted-date" datetime=""><?php echo get_the_date(); ?></time></a>
        </span>
        <?php } if($show_author=='1'){ ?>
        <span class="posted-by">
            <a href="">
                <i class="fa fa-user"></i>
                <?php the_author(); ?>
            </a>
        </span>
        <?php } if($show_cat=='1'){?>
        <span class="category-tag">
           <i class="fa fa-folder"></i>
										<a href="<?php the_permalink(); ?>">
                                            <?php blog_light_entry_footer(); ?>
                                        </a>
        </span>
        <?php }?>
    </div>

    <div class="entry-content">
        <?php


        the_content();

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'blog-light'),
            'after' => '</div>',
        ));

        ?>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->


