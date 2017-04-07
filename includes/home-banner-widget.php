<?php

/* Home Banner Widget Class
--------------------------------------------- */
class SF_Home_Banner_Widget extends WP_Widget 
{
	//* Holds widget settings defaults, populated in constructor.
	protected $defaults;

	private $slug;

	//* Constructor. Set the default widget options and create widget.
	function __construct() 
	{
		$widget_title = __( 'Home Banner', 'spelflix' );

		$widget_ops = array(
			'classname'   => 'home-banner-widget',
			'description' => __( 'Banner Text and next gamenight', 'spelflix' ),
		);

		$control_ops = array(
			'id_base' => 'home-banner-widget'
		);

		parent::__construct( 'home-banner-widget', $widget_title, $widget_ops, $control_ops );
	}

	//* Echo the widget content.
	function widget( $args, $instance ) 
	{
		/* Create default widget values */
		$defaults = array(
			'title'					=> '',
			'text'					=> '',
			'next_night' 			=> '',
		);

		/* Parse stored variables with defaults */
		$instance = wp_parse_args( $instance, $defaults );

		// This filter is documented in wp-includes/default-widgets.php
		$instance['title'] = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base );

		?>
		<div class="home-banner">
			<div class="wrap">
		
				<div class="info">
					<h1 class="title"><?= $instance['title']; ?></h1>
					<div class="content"><?= apply_filters('the_content', $instance['text']); ?></div>
				</div>

				<div class="next-night">
					<div class="content"><?= $instance['next_night']; ?></div>
				</div>

			</div>		
		</div>
		<?php 
	}

	//* Echo the settings update form.
	function form( $instance ) 
	{
		/* Create default widget values */
		$defaults = array(
			'title'					=> '',
			'text'					=> '',
			'next_night' 			=> '',
		);

		/* Parse stored variables with defaults */
		$instance = wp_parse_args( $instance, $defaults );

		?>
		<p>
			<label for="<?= $this->get_field_id('title'); ?>">Title:</label>
			<input type="text" class="widefat" id="<?= $this->get_field_id('title'); ?>" name="<?= $this->get_field_name('title'); ?>" value="<?= esc_attr($instance['title']); ?>" />
		</p>
		<p>
			<label for="<?= $this->get_field_id('text'); ?>">Text:</label>
			<textarea class="widefat" id="<?= $this->get_field_id('text'); ?>" name="<?= $this->get_field_name('text'); ?>"><?= esc_attr($instance['text']); ?></textarea>
		</p>
		<p>
			<label for="<?= $this->get_field_id('next_night'); ?>">Text:</label>
			<textarea class="widefat" id="<?= $this->get_field_id('next_night'); ?>" name="<?= $this->get_field_name('next_night'); ?>"><?= esc_attr($instance['next_night']); ?></textarea>
		</p>

		<?php
	}

	//* Update a particular instance.
	function update( $new_instance, $old_instance ) 
	{
		//* Store new title
		$instance['title'] = 		(! empty( $new_instance['title'] )) ? strip_tags($new_instance['title']) : '';

		//* Store new text
		$instance['text'] = 		(! empty( $new_instance['text'] )) ? strip_tags($new_instance['text']) : '';

		//* Store new next_night
		$instance['next_night'] = 		(! empty( $new_instance['next_night'] )) ? strip_tags($new_instance['next_night']) : '';

		//* Save
		return $instance;
	}
}
?>