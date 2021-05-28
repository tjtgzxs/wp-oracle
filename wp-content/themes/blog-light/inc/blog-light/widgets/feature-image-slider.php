<?php
/**
 * Created by PhpStorm.
 * User: arjun
 * Date: 7/12/2017
 * Time: 8:43 AM
 */
if (!class_exists('blog_light_clients_Widget')) {
    class blog_light_clients_Widget extends WP_Widget
    {

        private function defaults()
        {

            $defaults = array(
                'cat_id' => 0,
                'image' => ''
            );
            return $defaults;
        }

        public function __construct()
        {
            parent::__construct(
                'blog-our-clients-widget',
                esc_html__('Blog Light Feature image slider', 'blog-light'),
                array('description' => esc_html__('blog-light Feature image slider sidebar-widgets', 'blog-light'))
            );
        }

        public function form($instance)
        {
            $instance = wp_parse_args((array )$instance, $this->defaults());
            $catid = absint($instance['cat_id']);




            ?>





            <p>
                <label for="<?php echo esc_attr($this->get_field_id('cat_id')); ?>">
                    <?php esc_html_e('Select Category', 'blog-light'); ?>
                </label><br/>
                <?php
                $blog_dropown_cat = array(
                    'show_option_none' => esc_html__('Select Category', 'blog-light'),
                    'orderby' => 'name',
                    'order' => 'asc',
                    'show_count' => 1,
                    'hide_empty' => 1,
                    'echo' => 1,
                    'selected' => $catid,
                    'hierarchical' => 1,
                    'name' => esc_attr($this->get_field_name('cat_id')),
                    'id' => esc_attr($this->get_field_name('cat_id')),
                    'class' => 'widefat',
                    'taxonomy' => 'category',
                    'hide_if_empty' => false,
                );
                wp_dropdown_categories($blog_dropown_cat);
                ?>
            </p>
            <hr>

            <?php
        }

        public function update($new_instance, $old_instance)
        {
            $instance = $old_instance;
            $instance['cat_id'] = (isset($new_instance['cat_id'])) ? absint($new_instance['cat_id']) : '';


            return $instance;

        }

        public function widget($args, $instance)
        {
            if (!empty($instance)) {
                $instance = wp_parse_args((array)$instance, $this->defaults());
                $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html($instance['title']) : '', $instance, $this->id_base);
                $catid = absint($instance['cat_id']);
                echo $args['before_widget'];
                ?>
                <section id="make-blog-theme-client" class="widget widget-make-blog-theme-client">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 " data-wow-duration="2s">
                                <div class="feature-content ">

                                    <div class="client-list">
                                        <div id="owl-demo3" class="owl-carousel owl-theme">

                                            <?php

                                            if (!empty($catid)) {
                                                $i = 0;
                                                $sticky = get_option('sticky_posts');
                                                $home_clients_section = array(
                                                    'cat' => $catid,
                                                    'ignore_sticky_posts' => true,
                                                    'post__not_in' => $sticky,
                                                    'order' => 'ASC'
                                                );
                                                $home_clients_section_query = new WP_Query($home_clients_section);
                                                if ($home_clients_section_query->have_posts()) {
                                                    while ($home_clients_section_query->have_posts()) {
                                                        $home_clients_section_query->the_post();

                                                        ?>


                                                        <div class="item">
                                                            <div class=" client-log">
                                                                <div class="workoverlay">
                                                                    <div class="workdetails">
                                                                        <div class="border-hover">
                                                                            <h5 class="work-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <a href="<?php the_permalink(); ?>">
                                                                    <?php
                                                                    if (has_post_thumbnail()) {
                                                                        $image_id = get_post_thumbnail_id();
                                                                        $image_url = wp_get_attachment_image_src($image_id, 'blog-light-single', true);
                                                                        ?>
                                                                        <img
                                                                            src="<?php echo esc_url($image_url[0]); ?>?"
                                                                            alt="" class="img-responsive">
                                                                    <?php } ?>

                                                                </a>
                                                                <div class="slider blog-details">
                                                                    <header class="entry-header">
                                                                        <h4 class="entry-title"><a
                                                                                href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                                                                    </header>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <?php
                                                        $i++;
                                                    }
                                                    wp_reset_postdata();
                                                }
                                            } ?>


                                        </div>
                                    </div>

                                </div>
                            </div>
                </section>
                <!-- End feature Area -->
                <?php
                echo $args['after_widget'];
            }
        }

    }
}
add_action('widgets_init', 'blog_light_clients_widget');
function blog_light_clients_widget()
{
    register_widget('blog_light_clients_Widget');

}

?>
