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
		 * retriving categories list from wordpress
		 * @param $args;
		 * $args is to filter category list and customize
		 */
		
		$args=array(
			'title_li'=>'',
			'hierarchical'=>false,
			'show_count'=>$instance['show_count']
		);
		
		/**widget content - the actual output of widget */
		echo wp_list_categories($args) ;
		
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
		
		/** Default value of Title of the widget in adminpanel */
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Categories', 'lc_domain' );

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

		<!-- html for Show post counts -->
		<p>
			<input 
				class="widefat" 
				id="<?php echo esc_attr( $this->get_field_id( 'show_count' ) ); ?>" 
				name="<?php echo esc_attr( $this->get_field_name( 'show_count' ) ); ?>" 
				type="checkbox" <?php checked($instance['show_count'],'on') ; ?>>
			
			<label for="<?php echo esc_attr( $this->get_field_id( 'show_count' ) ); ?>"><?php esc_attr_e( 'Show Posts Count', 'lc_domain' ); ?></label> 
			
		</p>
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

		/** show posts count to be changed when changed in widget area backend */
		$instance['show_count'] = strip_tags( $new_instance['show_count'] );
		
		return $instance;
	}

} 
/** 
 * class ListCategories_Widget
 * next is to register this class to main widget file*/ 