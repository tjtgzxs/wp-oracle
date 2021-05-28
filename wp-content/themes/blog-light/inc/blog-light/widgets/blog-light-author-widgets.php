<?php
if (!class_exists('Blog_Light_Author_Widget')) {
	class Blog_Light_Author_Widget extends WP_Widget
	{
		private function defaults()
		{
			$defaults = array(
				'title' => '',

				'autor_img' => '',
				'des' => '',
			);
			return $defaults;
		}

		public function __construct()
		{
			parent::__construct(
				'blog-light-Author-widget',
				esc_html__('Blog Light Author Widget', 'blog-light'),
				array('description' => esc_html__(' Author Widgets', 'blog-light'))
			);
		}

		public function form($instance)
		{
			$instance = wp_parse_args((array )$instance, $this->defaults());
			$title = esc_attr($instance['title']);
			$des = esc_attr($instance['des']);

			$autor_img = esc_url($instance['autor_img']);
			?>

			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
					<?php esc_html_e('Title', 'blog-light'); ?>
				</label><br/>
				<input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" class="widefat"
					   id="<?php echo esc_attr($this->get_field_id('title')); ?>" value="<?php echo esc_attr($title); ?>">
			</p>



			<p>
				<label for="<?php echo esc_attr($this->get_field_id('autor_img')); ?>">
					<?php _e('Select Author Image', 'blog-light'); ?>:
				</label>
                <span class="img-preview-wrap" <?php if (empty($autor_img)) { ?> style="display:none;" <?php } ?>>
                    <img class="widefat" src="<?php echo esc_url($autor_img); ?>"
						 alt="<?php esc_attr_e('Image preview', 'blog-light'); ?>"/>
                </span><!-- .img-preview-wrap -->
				<input type="text" class="widefat" name="<?php echo esc_attr($this->get_field_name('autor_img')); ?>"
					   id="<?php echo esc_attr($this->get_field_id('autor_img')); ?>"
					   value="<?php echo esc_url($autor_img); ?>"/>
				<input type="button" id="custom_media_button"
					   value="<?php esc_attr_e('Upload Image', 'blog-light'); ?>" class="button media-image-upload"
					   data-title="<?php esc_attr_e('Select Author Image', 'blog-light'); ?>"
					   data-button="<?php esc_attr_e('Select Author Image', 'blog-light'); ?>"/>
				<input type="button" id="remove_media_button"
					   value="<?php esc_attr_e('Remove Image', 'blog-light'); ?>"
					   class="button media-image-remove"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('des')); ?>">
					<?php esc_html_e('About Author', 'blog-light'); ?>
				</label><br/>
				<input type="text" name="<?php echo esc_attr($this->get_field_name('des')); ?>" class="widefat"
					   id="<?php echo esc_attr($this->get_field_id('des')); ?>" value="<?php echo esc_attr($des); ?>">
			</p>




			<p>
				<label
					for="<?php echo esc_attr($this->get_field_id('facebook')); ?>"><?php _e('Facebook', 'blog-light'); ?></label><br/>
				<input type="text" name="<?php echo esc_attr($this->get_field_name('facebook')); ?>"
					   id="<?php echo esc_attr($this->get_field_id('facebook')); ?>" value="<?php
				if (isset($instance['facebook']) && $instance['facebook'] != '') :
					echo esc_attr($instance['facebook']);
				endif;

				?>" class="widefat"/>
			</p>

			<p>
				<label
					for="<?php echo esc_attr($this->get_field_id('twitter')); ?>"><?php _e('Twitter', 'blog-light'); ?></label><br/>
				<input type="text" name="<?php echo esc_attr($this->get_field_name('twitter')); ?>"
					   id="<?php echo esc_attr($this->get_field_id('twitter')); ?>" value="<?php
				if (isset($instance['twitter']) && $instance['twitter'] != '') :
					echo esc_attr($instance['twitter']);
				endif;

				?>" class="widefat"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr($this->get_field_id('instagram')); ?>"><?php _e('Google Plus', 'blog-light'); ?></label><br/>
				<input type="text" name="<?php echo esc_attr($this->get_field_name('instagram')); ?>"
					   id="<?php echo esc_attr($this->get_field_id('instagram')); ?>" value="<?php
				if (isset($instance['instagram']) && $instance['instagram'] != '') :
					echo esc_attr($instance['instagram']);
				endif;

				?>" class="widefat"/>
			</p>


			<p>
				<label
					for="<?php echo esc_attr($this->get_field_id('linkedin')); ?>"><?php _e('Linkedin', 'blog-light'); ?></label><br/>
				<input type="text" name="<?php echo esc_attr($this->get_field_name('linkedin')); ?>"
					   id="<?php echo esc_attr($this->get_field_id('linkedin')); ?>" value="<?php
				if (isset($instance['linkedin']) && $instance['linkedin'] != '') :
					echo esc_attr($instance['linkedin']);
				endif;

				?>" class="widefat"/>
			</p>
			<p>
				<label
					for="<?php echo esc_attr($this->get_field_id('youtube')); ?>"><?php _e('Youtube', 'blog-light'); ?></label><br/>
				<input type="text" name="<?php echo esc_attr($this->get_field_name('youtube')); ?>"
					   id="<?php echo esc_attr($this->get_field_id('youtube')); ?>" value="<?php
				if (isset($instance['youtube']) && $instance['youtube'] != '') :
					echo esc_attr($instance['youtube']);
				endif;

				?>" class="widefat"/>
			</p>
			<hr>
			<?php
		}

		public function update($new_instance, $old_instance)
		{
			$instance = $old_instance;
			$instance['title'] = sanitize_text_field($new_instance['title']);
			$instance['des'] = sanitize_text_field($new_instance['des']);
			$instance['autor_img'] = esc_url_raw($new_instance['autor_img']);
			$instance['facebook'] = esc_url_raw($new_instance['facebook']);
			$instance['twitter'] = esc_url_raw($new_instance['twitter']);
			$instance['instagram'] = esc_url_raw($new_instance['instagram']);
			$instance['linkedin'] = esc_url_raw($new_instance['linkedin']);
			$instance['youtube'] = esc_url_raw($new_instance['youtube']);
			return $instance;
		}

		public function widget($args, $instance)
		{

			if (!empty($instance)) {
				$instance = wp_parse_args((array )$instance, $this->defaults());
				$title = apply_filters('widget_title', !empty($instance['title']) ? esc_html($instance['title']) : '', $instance, $this->id_base);
				$autor_img = esc_url($instance['autor_img']);
				$dis = esc_html($instance['des']);
				$facebook = $instance['facebook'];
				$twitter = $instance['twitter'];
				$instagram = $instance['instagram'];
				$linkedin = $instance['linkedin'];
				$youtube = $instance['youtube'];

				echo $args['before_widget']; ?>

				<div class="blog-light-author-profile">

					<?php

					if ($title) {
						echo $args['before_title'] . esc_html( $title ) . $args['after_title'];
					} ?>

					<div class="profile-wrapper authur">

						<figure class="author">
							<img src="<?php echo esc_url($autor_img); ?>">
						</figure>


						<p><?php if (!empty($dis)) {
								echo esc_html($dis);
							} ?></p>



					</div>
					<!-- .profile-wrapper -->
					<ul class="social-icon">
						<?php
						if (!empty($facebook)) { ?>
							<li>
								<a class="img-circle" href="<?php echo esc_url($facebook); ?>" data-title="<?php esc_attr__('Facebook','blog-light');?>"><i class="fa fa-facebook-f"></i></a>
							</li>
						<?php }
						if (!empty($twitter)) { ?>
							<li>
								<a class="img-circle" href="<?php echo esc_url($twitter); ?>" data-title="<?php esc_attr__('Twitter','blog-light');?>"
								><i class="fa fa-twitter"></i></a>
							</li>
						<?php }
						if (!empty($linkedin)) {
							?>
							<li>
								<a class="img-circle" href="<?php echo esc_url($linkedin); ?>" data-title="<?php esc_attr__('Linkedin','blog-light');?>"
								><i class="fa fa-linkedin-in"></i></a>
							</li>
							<?php
						}

						if (!empty($youtube)) { ?>
							<li>
								<a class="img-circle" href="<?php echo esc_url($youtube); ?>" data-title="<?php esc_attr__('Youtube','blog-light');?>"
								><i class="fa fa-youtube"></i></a>
							</li>
							<?php
						}
						if (!empty($instagram)) {
							?>
							<li>
								<a class="img-circle" href="<?php echo esc_url($instagram); ?>"
								   data-title="<?php esc_attr__('Google Plus','blog-light');?>"
								><i class="fa fa-google-plus-g"></i></a>
							</li>
							<?php
						}
						?>

					</ul>
				</div><!-- .author-profile -->


				<?php

				echo $args['after_widget'];

			}
		}
	}
}
add_action('widgets_init', 'blog_light_author_widget');
function blog_light_author_widget()
{
	register_widget('Blog_Light_Author_Widget');

}

