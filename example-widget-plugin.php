<?php
/**
 * Plugin Name:   Sidebar Testimonial Plugin
 * Plugin URI:    https://toolboxcreative.com
 * Description:   Adds a testimonial widget that displays the site title and tagline in a widget area.
 * Version:       1.0
 * Author:        Shane Miles
 * Author URI:    https://toolboxcreative.com
 */

class tbc_testimonial_widget extends WP_Widget {


  // Set up the widget name and description.
  public function __construct() {
    $widget_options = array( 'classname' => 'testimonial_widget', 'description' => 'This is a testimonial widget' );
    parent::__construct( 'testimonial_widget', 'Testimonial Widget', $widget_options );
  }


  // Create the widget output.
  public function widget( $args, $instance ) {
    $name = apply_filters( 'name', $instance[ 'name' ] );
    $testimonial = apply_filters( 'testimonial', $instance[ 'testimonial' ] );
    $img_url = apply_filters( 'img_url', $instance[ 'img_url' ] ); 
      
?>
<div class="fusion-fullwidth fullwidth-box testimonial-container with-photo nonhundred-percent-fullwidth non-hundred-percent-height-scrolling" style="background-color: rgba(255,255,255,0);background-position: center center;background-repeat: no-repeat;padding-top:30px;padding-right:0px;padding-bottom:30px;padding-left:0px;">
    <div class="fusion-builder-row fusion-row ">
        <div class="fusion-layout-column fusion_builder_column fusion_builder_column_1_1  fusion-one-full fusion-column-first fusion-column-last 1_1" style="margin-top:0px;margin-bottom:20px;">
					<div class="fusion-column-wrapper" style="padding: 0px 0px 0px 0px;background-position:left top;background-repeat:no-repeat;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;" data-bg-url="">
						<div class="fusion-testimonials clean fusion-testimonials-4" data-random="0">
                            <style type="text/css" scoped="scoped">
                                #fusion-testimonials-4 a{border-color:#332754;}#fusion-testimonials-4 a:hover, #fusion-testimonials-4 .activeSlide{background-color: #332754;}.fusion-testimonials.clean.fusion-testimonials-4 .author:after{border-top-color:#f6f6f6 !important;}
                            </style>
                            <div class="reviews">
                                <div class="review avatar-image" style="display: block;">
                                    <div class="testimonial-thumbnail">
                                        <img class="testimonial-image" src="<?php echo $img_url?>" width="200" height="200">
                                    </div>
                                    <blockquote style="background-color:#f6f6f6;">
                                        <q style="background-color:#f6f6f6;color:#332754;" class="fusion-clearfix">
                                            <p><?php echo $testimonial; ?></p>
                                        </q>
                                    </blockquote>
                                    <div class="author" style="color:#332754;">
                                        <span class="company-name"><strong><?php echo $name; ?></strong></span>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-pagination" id="fusion-testimonials-4">
                            </div>
                        </div>
                        <div class="fusion-clearfix">
                        </div>

					</div>
				</div>
    </div>
</div>
    <?php echo $args['after_widget'];
  }

  
  // Create the admin area widget settings form.
  public function form( $instance ) {
      $name = ! empty( $instance['name'] ) ? $instance['name'] : ''; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'name' ); ?>">Name:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'name' ); ?>" name="<?php echo $this->get_field_name( 'name' ); ?>" value="<?php echo esc_attr( $name ); ?>" />
    </p>
<?php
$testimonial = ! empty( $instance['testimonial'] ) ? $instance['testimonial'] : ''; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'testimonial' ); ?>">Testimonial:</label>
      <textarea rows="4" cols="50" class="" id="<?php echo esc_attr( $this->get_field_id( 'testimonial' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'testimonial' ) ); ?>"><?php echo esc_attr( $testimonial ); ?></textarea>
    </p>
<?php 
$img_url = ! empty( $instance['img_url'] ) ? $instance['img_url'] : ''; ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'img_url' ); ?>">Image URL:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'img_url' ); ?>" name="<?php echo $this->get_field_name( 'img_url' ); ?>" value="<?php echo esc_attr( $img_url ); ?>" />
    </p>
<?php       
      
  }


  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'name' ] = strip_tags( $new_instance[ 'name' ] );
    $instance[ 'testimonial' ] = strip_tags( $new_instance[ 'testimonial' ] );
    $instance[ 'img_url' ] = strip_tags( $new_instance[ 'img_url' ] );
    return $instance;
  }

}

// Register the widget.
function tbc_register_testimonial_widget() { 
  register_widget( 'tbc_testimonial_widget' );
}
add_action( 'widgets_init', 'tbc_register_testimonial_widget' );

?>