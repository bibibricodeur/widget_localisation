<?php
/*
Plugin Name: Widget localisation
Plugin URI: https://github.com/bibibricodeur
Description:
Version: 00.1
Author: bibibricodeur
Author URI: https://thiweb.fr
License: WTFPL
*/

// https://codex.wordpress.org/Widgets_API

class Widget_Localisation extends WP_Widget {

	/**
	 * Configure le nom des widgets, etc.
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_localisation',
			'description' => 'Afficher la localisation au travers d\'une api',
		);
		parent::__construct( 'widget_localisation', 'Widget Localisation', $widget_ops );
	}

	/**
	 * Affiche le contenu du widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		// affiche le contenu du widget
		echo $args['before_widget'];
		
		//if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', 'Votre localisation' ) . $args['after_title'];
		//}
		//echo esc_html__( 'Hello, Widget_Localisation!', 'text_domain' );
		
		?>
		    <ul style="list-style: none; padding-left: 1.2em;">
                <li id="ip"></li>
                <li id="patelin"></li>                
                <li id="pays"></li>
            </ul>
        <?php
        
		echo $args['after_widget'];
	}

	/**
	 * Affiche le formulaire d'options sur admin
	 *
	 * @param array $instance The widget options
	 */
	//public function form( $instance ) {
		// affiche le formulaire d'options sur admin
	//}

	/**
	 * Traitement des options du widget lors de l'enregistrement
	 *
	 * @param array $new_instance Les nouvelles options
	 * @param array $old_instance Les options précédentes
	 *
	 * @return array
	 */
	//public function update( $new_instance, $old_instance ) {
		// traite les options du widget à enregistrer
	//}
}

// Cet exemple de widget peut ensuite être enregistré dans le hook 'widgets_init':

// register widget_localisation
function register_widget_localisation() {
    register_widget( 'Widget_Localisation' );
    wp_enqueue_script('widget_localisation', plugin_dir_url(__FILE__) . 'widget_localisation.js');
 
}
add_action( 'widgets_init', 'register_widget_localisation' );

// fin
