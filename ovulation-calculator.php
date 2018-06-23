<?php
/*
 * Plugin Name: Ovulation Calculator
 * Plugin URI: 
 * Description: This ovulation calculator will calculate your period, fertile and most ovulation dates.
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
			
			add_action('wp_head', array($this, 'ovulation_calculator_color'));
			
		}
		public static function activate()
        {
            // Do nothing
        } // END public static function activate
    
             
        public static function deactivate()
        {
            // Do nothing
        } // END public static function deactivate
        
        
        function ovulation_calculator_color(){
			$options = get_option('ovulationcalculator-group');?>
			<style>
				.oc_title, 
				.oc_subtitle,
				.calculator_table h2, 
				.single .calculator_table h2,
				.calculator_table p,
				.icon-calendar3:before{
					color: <?php echo $options['oc-base-color']?>;
				}
				.fertile a,
				.calculateagain input[type=button],
				.subscription-option label, 
				.email-box p, 
				.email-message p,
				.subscription-option label{
					color: <?php echo $options['oc-email-box-text']?>;
				}
				
				/*Period Dates + Selected day*/

				.ui-state-default.ui-state-highlight.ui-state-active, 
				.ui-datepicker-current-day .ui-state-default.ui-state-active,
				.ll-skin-melon td .ui-state-hover,

				td.periodDay a.ui-state-default, 
				td.periodDay span.ui-state-default,
/* 				.ll-skin-melon td .ui-state-default.ui-state-hover, */
				.period-indicator{
					background-color: <?php echo $options['oc-period-color']?>;
					color: <?php echo $options['oc-cal-active-color']?>;
				}
				
				/*Fertile Dates*/
				td.fertileDay a.ui-state-default, 
				td.fertileDay span.ui-state-default{
					background-color: <?php echo $options['oc-fertile-dates']?>;
				}
				
				/*Submit/Send background color*/
				.calculator_table .submit-btn input[type=submit]{
					background-color: <?php echo $options['oc-send-bg']?>;
				}
				
				/*Submit/Send background hover+focus color*/
				.calculator_table .submit-btn input[type=submit]:focus, 
				.calculator_table .submit-btn input[type=submit]:hover{
					background-color: <?php echo $options['oc-send-bg']?>;
				}
				
				/*Submit/Send color*/
				.calculator_table .icon-angle-right,
				.calculator_table .submit-btn input[type=submit]{
					color: <?php echo $options['oc-send-text']?>;
				}
				
				/* Calendar Year color*/
				.ll-skin-melon .ui-datepicker .ui-datepicker-title{
					color: <?php echo $options['oc-year-color']?>;
				}
				/* Calendar Days/Week color*/
				.ll-skin-melon .ui-datepicker th{
					color: <?php echo $options['oc-days-color']?>;
				}
				/* Calendar Background color*/
				#ovulationCalculatorForm,
				.calendar-area{
					background-color: <?php echo $options['oc-bg-color']?>;
				}
				/* Calendar Cell Background color*/
				.ll-skin-melon td .ui-state-default{
					background: <?php echo $options['oc-cal-bgcolor']?>;
				}
				/* Calendar disabled Cell text color*/
				.ll-skin-melon .ui-state-disabled .ui-state-default{
					color: <?php echo $options['oc-cal-color']?>;
				}
				/* Calendar selected day text color*/
				.ll-skin-melon td .ui-state-default.ui-state-active{
					color: <?php echo $options['oc-cal-active-color']?>;
				}
				/* Calendar default day text color*/
				.ll-skin-melon td .ui-state-default{
					color: <?php echo $options['oc-cal-default-color']?>;
				}
				
				/* Email subscription background color*/
				.email-area{
					background-color: <?php echo $options['oc-email-box-bg']?>;
				}
				
				/* Fertile tick color*/
				td.fertileDay a.ui-state-default::after{
					color: <?php echo $options['oc-fertile-tick']?>;
				}
				.fertileTick{
					fill: <?php echo $options['oc-fertile-tick']?>;
				}
				/* Expected Ovulation color*/
				
				td.fertileDay-4 a.ui-state-default::after,
				td.fertileDay-10 a.ui-state-default::after{
					color: <?php echo $options['oc-ovulation-dates']?>!important;
				}
				.expected-ovulation{
					fill: <?php echo $options['oc-ovulation-dates']?>;
				}
			</style>
			<?php if(!empty($_POST['days'])):
				if($_POST['days'] == 20):?>
				<style>
					td.fertileDay-2 span::after,
					td.fertileDay-2 a.ui-state-default::after,
					td.fertileDay-6 span::after,
					td.fertileDay-6 a.ui-state-default::after{
						color: <?php echo $options['oc-ovulation-dates']?>;
					}
					td.fertileDay-4 span::after,
					td.fertileDay-4::after,
					td.fertileDay-4 a.ui-state-default::after{
						color: <?php echo $options['oc-fertile-tick']?>!important;
					}
				</style>
				<?php elseif($_POST['days'] == 21):?>
				<style>
					td.fertileDay-3 span::after,
					td.fertileDay-3 a.ui-state-default::after,
					td.fertileDay-8 span::after,
					td.fertileDay-8 a.ui-state-default::after{
						color: <?php echo $options['oc-ovulation-dates']?>;
					}
					td.fertileDay-4 span::after,
					td.fertileDay-4::after,
					td.fertileDay-4 a.ui-state-default::after{
						color: <?php echo $options['oc-fertile-tick']?>!important;
					}
				</style>
			<?php endif; endif;?>
		<?php }
        
        # Wordpress internal registration
		function register_settings(){
        	# set defaults
			$options = array(
				'oc-mailchimp-api'	=>	'70b4872ba9f1a1cc3731c62a791a63e6-us16',
				'oc-mailchimp-list-id'	=>	'db51e935cd',
				'calculate-ovulation'	=> 'Calculate ovulation',
				'first-day-last-period'	=>	'First day of your last period',
				'select-date'	=>	'Select date',
				'length-cycle'	=>	'Length of your cycle',
				'oc-submit'		=>	'Submit',
				'oc-dates'	=>	'Your ovulation dates',
				'oc-next-month-results'	=>	'Press the arrow to see next month(s) result',
				'oc-expected-ovulation'	=>	'Days of expected ovulation',
				'oc-fertile'	=>	'Fertile',
				'oc-start-ovulation'	=>	'Start of new cycle',
				'oc-change-date'	=>	'Change date',
				'oc-calendar-email'	=>	'Send ovulation calendar by email',
				'oc-send-dates-email'	=>	'Enter your email and we will send you your ovulation dates for the next 6 months',
				'oc-enter-email'	=>	'Enter your email',
				'oc-download-message'	=>	'Type Message in your own language',
				'oc-terms-message'	=>	'Terms & Conditions',
				'oc-email-send'	=>	'Send',
				'oc-email-logo'	=>	'Upload Email Logo',
				'oc-email-header-image'	=>	'E-mail Header Image',
				'oc-email-footer-title'	=>	'Title',
				'oc-email-footer-subtitle'	=>	'SubTitle',
				'oc-email-footer-tel'	=>	'Telephone',
				'oc-email-footer-email'	=>	'E-mail',
				'oc-email-person-image'	=>	'Upload Person Image',
				'oc-email-footer-logo'	=>	'Upload Footer Logo',
				'oc-email-footer-copyright'	=>	'Copyright Text',
				'oc-email-footer-bottom'	=>	'Footer Bottom Texts',
				'oc-email-header-title'	=>	'Thanks for using the Babyplan Ovulation Calculator',
				'oc-email-header-ovulation-dates'	=>	'Here is your 6 month ovulation calendar:',
				'oc-email-header-ovulation-text'	=>	'Ovulation',
				'oc-email-guide'	=>	'Get a copy of the Babyplan Guide to Pregnancy here:',
				'oc-email-download'	=>	'Download e-book',
				'oc-email-download-url'	=>	'',
				'oc-email-sent-msg'	=>	'E-mail is Sent.',
				'email-lang'	=> 'english',
				'oc-january'	=>	'January',
				'oc-feb'	=>	'February',
				'oc-mar'	=>	'March',
				'oc-apr'	=>	'April',
				'oc-may'	=>	'May',
				'oc-jun'	=>	'June',
				'oc-jul'	=>	'July',
				'oc-aug'	=>	'August',
				'oc-sep'	=>	'September',
				'oc-oct'	=>	'October',
				'oc-nov'	=>	'November',
				'oc-dec'	=>	'December',
				'oc-mon'	=>	'Mon',
				'oc-tue'	=>	'Tue',
				'oc-wed'	=>	'Wed',
				'oc-thu'	=>	'Thu',
				'oc-fri'	=>	'Fri',
				'oc-sat'	=>	'Sat',
				'oc-sun'	=>	'Sun',
				'oc-fertile-tick'	=>	'#1A9F1F',
				'oc-ovulation-dates'	=> '#1A9F1F'
			);
			add_option('ovulationcalculator-group', $options, '', 'yes'); // autoload yes. Why?
			register_setting('ovulationcalculator-group', 'ovulationcalculator-group', $options);
        }
        
        // Admin Style and JS
        function admin_ovulation_calculator_enqueue(){
	       	 $screen = get_current_screen();
		   	 if ( $screen->id === 'toplevel_page_ovulation-calculator-menu'){
			   	 	       	 
	       	 wp_register_style( 'oc-admin-custom', plugins_url( '/include/admin/css/ovulation-calculator-admin.css' , __FILE__ ) );
	       	 wp_enqueue_style( 'oc-admin-custom' );
	       	 
	       	 // Tabs
	       	 wp_register_style( 'oc-admin-tab', plugins_url( '/include/admin/css/tabs.css' , __FILE__ ) );
	       	 wp_enqueue_style( 'oc-admin-tab' );
	       	 wp_register_style( 'oc-admin-tabstyle', plugins_url( '/include/admin/css/tabstyles.css' , __FILE__ ) );
	       	 wp_enqueue_style( 'oc-admin-tabstyle' );
	       	 
		   	 wp_register_script('oc-modernizr.custom', plugins_url( '/include/admin/js/modernizr.custom.js' , __FILE__ ), array('jquery'), false, false );
		   	 wp_enqueue_script('oc-modernizr.custom');	
		   	 
		   	 wp_register_script('oc-cbpFWTabs', plugins_url( '/include/admin/js/cbpFWTabs.js' , __FILE__ ), array('jquery'), false, true );
		   	 wp_enqueue_script('oc-cbpFWTabs');	
		   	 
		   	 wp_register_script('oc-custom', plugins_url( '/js/ovulation_calculator.js' , __FILE__ ), array('jquery'), false, true );
		   	 wp_enqueue_script('oc-custom');
		   	 
		   	 wp_register_script('oc-loader', plugins_url( '/include/admin/js/loader.js' , __FILE__ ), array('jquery'), false, true );
		   	 wp_enqueue_script('oc-loader');
		   	
		   	 wp_enqueue_media();
		   	 wp_register_script( 'oc-media-lib-uploader-js', plugins_url( '/include/admin/js/media-lib-uploader.js' , __FILE__ ), array('jquery') );
		 	wp_enqueue_script( 'oc-media-lib-uploader-js' );
		 	
		 	wp_enqueue_style( 'wp-color-picker' );
		 	wp_enqueue_script( 'wp-color-picker-script', plugins_url('/include/admin/js/wp-color-picker-script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		 	 }
	     }   
	     
	     
	    // Front-end Style and JS   
	    function ovulation_calculator_enqueue(){ 
		    wp_enqueue_style( 'oc_jquery_ui', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );  
	        wp_enqueue_style( 'oc_custom_datepicker', plugins_url( '/css/melon.datepicker.css' , __FILE__ ) );
	        
	        wp_enqueue_style( 'oc-main', plugins_url( '/css/ovulation-calculator.css' , __FILE__ ) );
	        //wp_register_script( 'oc_jquery', '//code.jquery.com/jquery-1.12.4.js', false, false );
	        wp_register_script( 'oc_jquery_ui', '//code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), false, false );
	        wp_enqueue_script( 'oc_jquery_ui' );
	        	        
	        wp_register_script( 'oc-front', plugins_url( '/js/ovulation_calculator_front.js' , __FILE__ ), array('jquery'), false, true );
		   	wp_enqueue_script( 'oc-front' );
		   	
		   	
	    }
	    
	    function ovulation_calculator(){
		    $page_title = 'Ovulation Calculator';
			$menu_title = 'Ovulation Calculator';
			$capability = 'manage_options';
			$menu_slug  = 'ovulation-calculator-menu';
			$function   = array($this, 'ovulation_calculator_menu');
			$icon_url   = plugins_url( '/include/img/ovulationmini.svg' , __FILE__ );
			$position   = 59;
			
			add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);
	
		}
		function ovulation_calculator_menu(){?>
			<div class="wrap" id="OvulationCalculator">
				<h1 class="oc_admin_heading"><img class="ovulation-icon" src="<?php echo plugins_url( '/include/img/ovulation.svg' , __FILE__ )?>" alt="Ovulation"><?php _e('Ovulation Calculator', 'ovulation-calculator'); ?></h1>
				<?php $this->show_navigation();?>
			</div>
		<?php }
			
		function show_navigation(){
			$tabs = array(
	        	'first'   => __( 'General', 'ovulation-calculator' ), 
				'second'  => __( 'Calendar Translation', 'ovulation-calculator' ),
				'third'  => __( 'Email Template Translation', 'ovulation-calculator' ),
				'fourth'  => __( 'Calendar Month Translation', 'ovulation-calculator' ),
				'fifth'  => __( 'Calendar Days Translation', 'ovulation-calculator' ),
				'sixth'  => __( 'Color Scheme', 'ovulation-calculator' )
			);
		    echo '<div class="tabs tabs-style-topline" id="tabs">';
			    $html = '<nav>';
			    $html .= '<ul>';
			    foreach( $tabs as $tab => $name ){
			        $html .= '<li><a href="#' . $tab . '" class="icon icon-'.$tab.'"><span>' . $name . '</span></li></a>';
			    }
			    $html .= '</ul>';
			    $html .= '</nav>';
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
			   	
			   	<div class="content-wrap">
				   	<div class="loader"></div>
				   	<section id="first"> 
					   <?php include( plugin_dir_path( __FILE__ ) . 'include/admin/mailchimp.php');?>
					</section>
					<section id="second">
						<?php include( plugin_dir_path( __FILE__ ) . 'include/admin/translation.php');?>
					</section>
					<section id="third">
						<?php include( plugin_dir_path( __FILE__ ) . 'include/admin/emailtranslation.php');?>
					</section>
					<section id="fourth">
						<?php include( plugin_dir_path( __FILE__ ) . 'include/admin/calendarmonth.php');?>
					</section>
					<section id="fifth">
						<?php include( plugin_dir_path( __FILE__ ) . 'include/admin/calendardays.php');?>
					</section>
					<section id="sixth">
						<?php include( plugin_dir_path( __FILE__ ) . 'include/admin/color.php');?>
					</section>
			   	</div>
			   	
			   	<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes', 'ovulation-calculator') ?>" /></p>
			</form>
		<?php }
			
		// Ovulation Calculator Shortcode
		function ovulation_calculator_shortcodes_init(){
		    function ovulation_calculator_shortcode($atts = [], $content = null){
		        // do something to $content
				ob_start();
				include( plugin_dir_path( __FILE__ ) . 'include/oc_shortcode.php');
				$output = ob_get_clean();
		        // always return
		        return $output;
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