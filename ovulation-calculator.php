<?php
/**
 * Plugin Name: Ovulation Calculator
 * Plugin URI: 
 * Description: This ovulation calculator will calculate your most fertile days.
 * Version: 1.0.0
 * Author: Zakir Sajib
 * Text Domain: ovulation-calculator
 * License: GPLv2 or later

 * WC requires at least: 2.5.5
 * WC tested up to: 3.3

 * Copyright: © 2018 Zakir Sajib.
 * License: GNU General Public License v3.0
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
*/

if ( ! defined( 'ABSPATH' ) ) { 
	exit; // Exit if accessed directly
}

if (!class_exists("OvulationCalculator")){
	class OvulationCalculator {
		function __construct(){
			add_action('admin_init', array($this, 'register_settings'));
			add_action('admin_enqueue_scripts', array($this,'admin_ovulation_calculator_enqueue') );
			add_action(	'admin_menu', array($this, 'ovulation_calculator') );
			
			add_action('wp_enqueue_scripts', array($this,'ovulation_calculator_enqueue') );
			
			add_action('init', array($this, 'ovulation_calculator_shortcodes_init') );
			
		}
		public static function activate()
        {
            // Do nothing
        } // END public static function activate
    
             
        public static function deactivate()
        {
            // Do nothing
        } // END public static function deactivate
        
        # Wordpress internal registration
		function register_settings(){
        
        }
        
        // Admin Style and JS
        function admin_ovulation_calculator_enqueue(){
	       	 wp_enqueue_style( 'oc_jquery_ui_admin', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );
	       	 //wp_register_script( 'oc_jquery_ui_admin', '//code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), false, false );
	        //wp_enqueue_script( 'oc_jquery_ui_admin' );
	       	 wp_enqueue_script('jquery-ui-tabs');
		   	 wp_register_script('oc-admin-tab', plugins_url( '/js/ovulation_calculator.js' , __FILE__ ), array('jquery'), false, false );
		   	 wp_enqueue_script('oc-admin-tab');
	     }   
	     
	     
	    // Front-end Style and JS   
	    function ovulation_calculator_enqueue(){ 
		    wp_enqueue_style( 'oc_jquery_ui', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );  
	        wp_enqueue_style( 'oc_custom_datepicker', plugins_url( '/css/melon.datepicker.css' , __FILE__ ) );
	        wp_enqueue_style( 'oc-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0' );
	        wp_enqueue_style( 'oc-main', plugins_url( '/css/ovulation-calculator.css' , __FILE__ ) );
	        //wp_register_script( 'oc_jquery', '//code.jquery.com/jquery-1.12.4.js', false, false );
	        wp_register_script( 'oc_jquery_ui', '//code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), false, false );
	        wp_enqueue_script( 'oc_jquery_ui' );
	        wp_register_script( 'oc-front', plugins_url( '/js/ovulation_calculator_front.js' , __FILE__ ), array('jquery'), false, false );
		   	wp_enqueue_script( 'oc-front' );
	    }
	    
	    function ovulation_calculator(){
		    $page_title = 'Ovulation Calculator';
			$menu_title = 'Ovulation Calculator';
			$capability = 'manage_options';
			$menu_slug  = 'ovulation-calculator-menu';
			$function   = array($this, 'ovulation_calculator_menu');
			$icon_url   = 'dashicons-media-code';
			$position   = 59;
			
			add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
	
		}
		function ovulation_calculator_menu(){?>
			<div class="wrap">
				<h1><?php _e('Ovulation Calculator', 'ovulation-calculator'); ?></h1>
				<?php $this->show_navigation();?>
			</div>
		<?php }
			
		function show_navigation(){
			$tabs = array(
	        	'first'   => __( 'General', 'ovulation-calculator' ), 
				'second'  => __( 'Translation', 'ovulation-calculator' ),
			);
		    echo '<div id="tabs">';
			    $html = '<ul>';
			    foreach( $tabs as $tab => $name ){
			        $html .= '<li><a href="#' . $tab . '">' . $name . '</li></a>';
			    }
			    $html .= '</ul>';
				echo $html;
		    	$this->show_navigation_contents();
			echo '</div>';
		}
		function show_navigation_contents(){?>
			<form method="post" id="ovulationcalculator" action="options.php">
			   	<?php settings_fields('ovulationcalculator-group'); ?>
			   	<?php do_settings_sections('ovulationcalculator-group'); ?>
			   	<?php settings_errors(); ?>
			   	<?php $options = get_option('ovulationcalculator-group'); ?>
			   	
			   	<div id="first"> 
				   <?php include( plugin_dir_path( __FILE__ ) . 'include/general.php');?>
				</div>
				<div id="second">
					<?php include( plugin_dir_path( __FILE__ ) . 'include/translation.php');?>
				</div>
			   	
			   	<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes', 'allinonewoo') ?>" /></p>
			</form>
		<?php }
			
		// Ovulation Calculator Shortcode
		function ovulation_calculator_shortcodes_init(){
		    function ovulation_calculator_shortcode($atts = [], $content = null){
		        // do something to $content
				include( plugin_dir_path( __FILE__ ) . 'include/oc_shortcode.php');
				
		        // always return
		        return $content;
		    }
		    add_shortcode('ovulationcalculator', 'ovulation_calculator_shortcode');
		}
		
	}// end class
}// end if

# Object Creation here: Important
if (class_exists("OvulationCalculator")){	
	// Installation and uninstallation hooks
	register_activation_hook(__FILE__, array('WP_Plugin_Template', 'activate'));
	register_deactivation_hook(__FILE__, array('WP_Plugin_Template', 'deactivate'));
	$ovulation_calculator = new OvulationCalculator();
}