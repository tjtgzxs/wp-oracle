<?php
    $mazino_recommendactions = $this->recommended_actions;
    $mazino_actions_todo = get_option('mazino_recommended_actions', false);
?>
<div id="recommended_actions" class="mazino-tab-pane panel-close">
<div class="action-list">
	<?php if ($mazino_recommendactions): foreach ($mazino_recommendactions as $key => $value): ?>
	<div class="action" id="<?php echo esc_attr($value['id']); ?>">
		<div class="action-watch">
		<?php if (!$value['is_done']): ?>
			<?php if (!isset($mazino_actions_todo[$value['id']]) || !$mazino_actions_todo[$value['id']]): ?>
				<span class="dashicons dashicons-visibility"></span>
			<?php else: ?>
				<span class="dashicons dashicons-hidden"></span>
			<?php endif; ?>
		<?php else: ?>
			<span class="dashicons dashicons-yes"></span>
		<?php endif; ?>
		</div>
		<div class="action-inner">
			<h3 class="action-title"><?php echo esc_html($value['title']); ?></h3>
			<div class="action-desc"><?php echo esc_html($value['desc']); ?></div>
			<?php echo wp_kses_post($value['link']); ?>
		</div>
	</div>
	<?php endforeach; endif; ?>
</div>
</div>
