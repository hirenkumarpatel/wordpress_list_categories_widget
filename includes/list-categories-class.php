<?php

/**
 * Adds listcategories_Widget widget.
 */
class ListCategories_Widget extends WP_Widget {

	/**
	 * Register List Categories widget with WordPress.
	 */
	function __construct() {
		
		parent::__construct(
			'listcategories_widget', // Base ID
			esc_html__( 'List Categories', 'lc_domain' ), // Title of the widget displayed in adminpanel
			array( 'description' => esc_html__( 'Add List Categories widget', 'lc_domain' ), ) // Args description
		);
	}

	/**
	 * Front-end display of List Categories widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget']; // you can use anything to display before widget ex. <div>
		
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}
		
		/**
		 * retriving url of the post
		 */
		global $post;
		

		/**widget content - the actual output of widget */
		  echo 'some output here';
		
		echo $args['after_widget']; // you can use anything to display after widget ex. </div>
	}

	/**
	 * Back-end List Categories widget form.
	 * widget form that we can see in admin panel->appearance->widget 
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		/** Title of the widget in adminpanel */
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'List Categories', 'lc_domain' );

		
		
		?>

		<!-- html for Title -->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'lc_domain' ); ?></label> 
			<input 
			class="widefat" 
			id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
			type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		
		<!-- html for  button size -->
		<!-- <p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>"><?php esc_attr_e( 'Widget Size:', 'lc_domain' ); ?></label> 
			<select 
			class="widefat" 
			id="<?php echo esc_attr( $this->get_field_id( 'size' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'size' ) ); ?>" >
			<option value="large" <?php echo ($size=='large') ? 'selected' : '' ?>>Large</option>
			<option value="small" <?php echo ($size=='small') ? 'selected' : '' ?>>Small</option>
			</select>
		</p> -->

		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		/** title to be changed when changed in widget area backend */
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		
		return $instance;
	}

} 
/** 
 * class Youtubesubscribe_Widget
 * next is to register this class to main widget file*/ 