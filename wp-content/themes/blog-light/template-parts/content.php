<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blog light
 */
$description_from = blog_light_get_option('blog_light_blog_excerpt_option');
$description_length = blog_light_get_option('blog_light_description_length_option');
$author = blog_light_get_option('blog_light_blog_show_author_option');
$date = blog_light_get_option('blog_light_blog_show_date_option');
$category_blog = blog_light_get_option('blog_light_blog_show_cats_option');
$display_image_size=(blog_light_get_option( 'blog_light_image_display_option'));
$read_more=(blog_light_get_option( 'blog_light_read_more_text_blog_archive_option'));



?>
<article id="post-<?php the_ID(); ?>"
         class="post type-post status-publish has-post-thumbnail hentry" <?php post_class(); ?>>

    <div class="row">
        <?php
        if (has_post_thumbnail()) {
            ?>
            <div class='col-sm-6'>
                <figure>
                    <div class="view hm-zoom">
                        <a href="<?php the_permalink(); ?>">
                            <?php


                            the_post_thumbnail('blog-light-single', array('class' => 'img-fluid'));


                            ?>
                            <div class="mask flex-center">

                            </div>
                        </a>
                    </div>
                </figure>
            </div>
            <?php
        }
        if (has_post_thumbnail()) {
            ?>
        <div class='col-sm-6'>


        <?php
        }else{
            ?>
            <div class='col-sm-12'>
            <?php
        }
        ?>

            <div class="padding">
            <header class="entry-header">
                  <h2 class="entry-categ"><?php blog_light_get_category(get_the_ID()); ?></h2>
                <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();

                ?></a></h3>
            </header>
            <div class="entry-meta">
                <?php if (!empty($date)) { ?>
                    <span class="posted-on">


                                            <i class="fa fa-calendar"></i>
                                            <?php blog_light_posted_on();?>
                                       
									</span>

                <?php }
                if (!empty($author)) { ?>
                    <span class="posted-by">
										<a href="<?php the_permalink(); ?>">
                                            <i class="fa fa-user"></i>
                                            <?php the_author(); ?>
                                        </a>
									</span>
                <?php }
                ?>
            </div>

            <div class="entry-content">
                <?php
                echo "<p>";
                if ($description_from == 'content') {
                    echo esc_html(wp_trim_words(get_the_content(), $description_length));
                } else {
                    echo esc_html(wp_trim_words(get_the_excerpt(), $description_length));
                }
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'blog-light'),
                    'after' => '</div>',
                ));

                echo "</p>";
                ?>
                <a href="<?php the_permalink(); ?>"
                   class="article-readmore"><?php echo esc_html($read_more);?><span
                        class="arrow-continue"><?php  esc_html_e('→', 'blog-light'); ?></span></a>

                <?php
                global $post_id;
                blog_light_social_sharing($post_id); ?>
            </div>
        </div>
        </div>
    </div>


</article><!-- #post-<?php the_ID(); ?> -->


