<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package blog light
 */

?>

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


?>
<article id="post-<?php the_ID(); ?>"class="post type-post status-publish has-post-thumbnail hentry" <?php post_class(); ?>>


    <figure>
        <div class="view hm-zoom">
            <a href="<?php the_permalink(); ?>">
                <header class="entry-header">
                    <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
                </header>
                <?php
                if (has_post_thumbnail()) {
                    the_post_thumbnail('full', array('class' => 'img-fluid'));
                }
                ?>

                <div class="mask flex-center">
                </div>
            </a>
        </div>
    </figure>
    <div class="entry-meta">
									<span class="posted-on">
										<a href="">
                                            <i class="fa fa-calendar"></i>
                                            <time class="enty-date posted-date"
                                                  datetime=""><?php echo get_the_date(); ?></time>
                                        </a>
									</span>
									<span class="posted-by">
										<a href="">
                                            <i class="fa fa-user"></i>
                                            <?php the_author(); ?>
                                        </a>
									</span>
									<span class="category-tag">

											<i class="fa fa-folder"></i>
										<a href="">
                                            <?php blog_light_entry_footer(); ?>
                                        </a>

									</span>
    </div>

    <div class="entry-content">
        <?php
        echo "<p>";
        if ($description_from == 'content') {
            echo esc_html(wp_trim_words(get_the_content(), $description_length));
        } else {
            echo esc_html(wp_trim_words(get_the_excerpt(), $description_length));
        }
        echo "</p>";
        ?>
        <a href="<?php the_permalink(); ?>"
           class="article-readmore"><?php esc_html_e('Continue Reading', 'blog-light'); ?><span
                class="arrow-continue"><?php  esc_html_e('→','blog-light');?></span></a>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->







