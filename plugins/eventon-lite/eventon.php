<?php
/**
 * Plugin Name: EventON Lite
 * Plugin URI: http://www.myeventon.com/lite
 * Description: A beautifully crafted minimal calendar experience - Lite Version
 * Version: 1.0.4
 * Author: Ashan Jay
 * Author URI: http://www.ashanjay.com
 * Requires at least: 5.0
 * Tested up to: 5.9.2
 * 
 * Text Domain: eventon
 * Domain Path: /lang/languages/
 * 
 * @package EventON
 * @category Core
 * @author AJDE
 * 
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// main eventon class
if ( ! class_exists( 'EventON' ) ) {

class EventON {

	// defines
		public $version = '1.0.4';
		
		public $evo_generator;	
		
		public $template_url;
		public $print_scripts=false;
		public $full_link = 'https://myeventon.com/lite';

		public $lang = 'L1';

	// setup one instance of eventon
		protected static $_instance = null;
		public static function instance(){
			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;
		}
		

	/** Constructor. */
		public function __construct() {

			// Define constants
			$this->define_constants();	
			
			// Installation
			register_activation_hook( __FILE__, array( $this, 'activate' ) );

			// Include required files
			$this->includes();
					
			// Hooks
			add_action( 'init', array( $this, 'init' ), 0 );
			add_action( 'widgets_init', array( $this, 'register_widgets' ) );
			add_action( 'after_setup_theme', array( $this, 'setup_environment' ) );
			
			// Deactivation
			register_deactivation_hook( AJDE_EVCAL_FILE, array($this,'deactivate'));
		}

	/** Define eventon Constants	 */
		public function define_constants() {
			if(!defined('EVO_VERSION'))
				define('EVO_VERSION', $this->version);

			define( "AJDE_EVCAL_DIR", WP_PLUGIN_DIR ); //E:\xampp\htdocs\WP/wp-content/plugins
			define( "AJDE_EVCAL_PATH", dirname( __FILE__ ) );// E:\xampp\htdocs\WP/wp-content/plugins/eventON
			define( "AJDE_EVCAL_FILE", ( __FILE__ ) ); 
				//E:\xampp\htdocs\WP\wp-content\plugins\eventON\eventon.php
			define( "AJDE_EVCAL_URL", path_join(plugins_url(), basename(dirname(__FILE__))) );
			define( "AJDE_EVCAL_BASENAME", plugin_basename(__FILE__) ); //eventON/eventon.php
			define( "EVENTON_BASE", basename(dirname(__FILE__)) ); //eventON
			define( "EVENTON_BACKEND_URL", get_bloginfo('url').'/wp-admin/' ); 
			$this->assets_path = str_replace(array('http:','https:'), '',AJDE_EVCAL_URL).'/assets/';
			
		}

	public function plugin_path(){		return AJDE_EVCAL_PATH;	}
	public function template_path(){	return $this->template_url;		}
	public function get_current_version(){	return $this->version;	}	
		
	/**
	 * Include required files
	 * 
	 * @access private
	 * @return void
	 * @since  0.1
	 */
	private function includes(){		

		// post types
		include_once( 'includes/class-evo-post-types.php' );
		include_once( 'includes/class-search.php' );
		include_once( 'includes/class-evo-datetime.php' );
		include_once( 'includes/class-evo-helper.php' );
		include_once( 'includes/class-evo-install.php' );	
		include_once( 'includes/class-templates.php' );		
		include_once( 'includes/class-rest-api.php' );	
		include_once( 'includes/calendar/class-data-store.php' );	
		
		include_once( 'includes/elements/class-elements-main.php' );	
		include_once( 'includes/elements/class-shortcode_generator.php' );	
		include_once( 'includes/elements/class-lightboxes.php' );	
			
		include_once( 'includes/eventon-core-functions.php' );
		include_once( 'includes/class-event.php' );
		include_once( 'includes/class-frontend.php' );	
		
		include_once( 'includes/calendar/class-calendar-now.php' );
		include_once( 'includes/calendar/class-calendar-schedule.php' );
		include_once( 'includes/calendar/class-calendar-helper.php' );
		include_once( 'includes/calendar/class-calendar_generator.php' );
		include_once( 'includes/calendar/class-calendar_gen.php' );
		include_once( 'includes/calendar/views/eventcard_virtual.php' );

		//include_once( 'includes/class-deprecations.php' );	
		
		include_once( 'includes/integration/class-intergration-general.php' );
		include_once( 'includes/integration/class-intergration-gutenberg.php' );
		include_once( 'includes/integration/class-intergration-visualcomposer.php' );	
		include_once( 'includes/integration/elementor/class-elementor-init.php' );
		//include_once( 'includes/integration/zoom/class-zoom.php' );

		include_once( 'includes/class-evo-shortcodes.php' );

		include_once( 'includes/class-evo-ajax.php' );
			
		if ( is_admin() ){	
			include_once('includes/admin/class-forms.php' );	
			include_once('includes/admin/eventon-admin-functions.php' );
			include_once('includes/admin/eventon-admin-taxonomies.php' );
			include_once('includes/admin/post_types/ajde_events.php' );
			include_once('includes/admin/welcome.php' );		
			include_once('includes/admin/class-evo-admin.php' );						
			include_once('includes/admin/class-evo-errors.php' );					
		}
		if ( ! is_admin() || defined('DOING_AJAX') ){
			include_once( 'includes/class-evo-template-loader.php' );
		}	
	}	
	
	/** Init eventON when WordPress Initialises.	 */
	public function init() {

		if( class_exists('ajde')) $this->ajde = $GLOBALS['ajde'] = new ajde();
		
		// Set up localisation
		$this->load_plugin_textdomain();
		
		$this->template_url = apply_filters('eventon_template_url','eventon/');

		if( !class_exists('EVO_Cal_Gen')) return;
		
		$this->cal 				= new EVO_Cal_Gen();
		$this->evo_generator	= $this->calendar = new EVO_generator();	
		$this->frontend			= new evo_frontend();
		$this->temp 			= new EVO_Temp();
		$this->shortcodes		= new EVO_Shortcodes();	
		$this->ajax 			= new evo_ajax();
		
		$this->rest				= new EVO_Rest_API();

		$this->elements			= new EVO_General_Elements();
		$this->shortcode_gen	= new EVO_Shortcode_Generator();
		$this->lightbox 		= new EVO_Lightboxes();	

		$this->gen_int 			= new EVO_Int_General(); 
		$this->evosv 			= new Evo_Cal_Schedule(); 


		$GLOBALS['evo_shortcode_box'] = $this->shortcode_gen;
		//$this->helper			= new evo_helper();

		// Classes/actions loaded for the frontend and for ajax requests
		if ( ! is_admin() || defined('DOING_AJAX') ) {
			
		}
		if(is_admin()){
			if( class_exists('evo_admin')) $this->evo_admin 	= new evo_admin();
			if( class_exists('eventon_taxonomies') ) $this->taxonomies	= new eventon_taxonomies();	
		}

		
		// roles and capabilities
		eventon_init_caps();
				
		// Init action
		do_action( 'eventon_init' );

	}


	/** register_widgets function. */
		function register_widgets() {
			include_once( 'includes/class-evo-wp-widgets.php' );
		}		
		
	/** Activate function to store version.	 */
		public function activate(){
			set_transient( '_evo_activation_redirect', 1, 60 * 60 );		
			do_action('eventon_activate');
		}	
		

	// deactivate eventon
		public function deactivate(){	
			do_action('eventon_deactivate');
		}
	
	/** Ensure theme and server variable compatibility and setup image sizes.. */
		public function setup_environment() {
			// Post thumbnail support
			if ( ! current_theme_supports( 'post-thumbnails', 'ajde_events' ) ) {
				add_theme_support( 'post-thumbnails' );
				remove_post_type_support( 'post', 'thumbnail' );
				remove_post_type_support( 'page', 'thumbnail' );
			} else {
				add_post_type_support( 'ajde_events', 'thumbnail' );
			}
		}
		
	/** LOAD Backender UI and functionalities for settings. */
	// Legacy
		public function load_ajde_backender(){			
			include_once(  'includes/admin/settings/class-settings.php' );
			$this->settings = new EVO_Settings();
		}	
		public function register_backender_scripts(){
			$this->settings->register_ss();		
		}
		public function enqueue_backender_styles(){
			$this->settings->load_styles_scripts();	
		}
		
		
	/**
	 * Load Localisation files.
	 *
	 * Note: the first-loaded translation file overrides any following ones if the same translation is present
	 * Admin Locale. Looks in:
	 * - WP_LANG_DIR/eventon/eventon-admin-LOCALE.mo
	 * - WP_LANG_DIR/plugins/eventon-admin-LOCALE.mo
	 *
	 * @access public
	 * @return void
	 */
	public function load_plugin_textdomain() {
		$locale = is_admin() && function_exists( 'get_user_locale' ) ? get_user_locale() : get_locale();
		$locale = apply_filters( 'plugin_locale', $locale, 'eventon' );
		
		load_textdomain( 'eventon', WP_LANG_DIR . "/eventon/eventon-admin-".$locale.".mo" );
		load_textdomain( 'eventon', WP_LANG_DIR . "/plugins/eventon-admin-".$locale.".mo" );		
		
		if ( is_admin() ) {
			load_plugin_textdomain( 'eventon', false, plugin_basename( dirname( __FILE__ ) ) . "/lang" );
		}

		// frontend - translations are controlled by myeventon settings> language	
	}
	
	// template locator function to use for addons
		function template_locator($file, $default_locations, $append='', $args=''){
			$childThemePath = get_stylesheet_directory();

			// Paths to check
			$paths = apply_filters('evo_file_template_paths', array(
				1=>TEMPLATEPATH.'/'.$this->template_url. $append, // TEMPLATEPATH/eventon/--append--
				2=>$childThemePath.'/',
				3=>$childThemePath.'/'.$this->template_url. $append,
			));

			$location = $default_locations .$file;
			// FILE Exist
			if ( $file ) {			
				// each path
				foreach($paths as $path){				
					if(file_exists($path.$file) ){	
						$location = $path.$file;	
						break;
					}
				}
			}

			return $location;
		}

	// Events archive page content
		function archive_page(){
			$archive_page_id = evo_get_event_page_id();

			// check whether archieve post id passed
			if($archive_page_id){

				$archive_page  = get_page($archive_page_id);	
				
				echo "<div class='wrapper evo_archive_page'>";

				do_action('evo_event_archive_page_before_content');

				echo apply_filters('the_content', $archive_page->post_content);

				do_action('evo_event_archive_page_after_content');

				echo "</div>";

			}else{
				echo "<p>ERROR: Please select a event archive page in eventON Settings > Events Paging > Select Events Page</p>";
			}
		}	
}

}// class exists

// initiate eventon functions and globals
	function EVO(){	return EventON::instance();}
	
	$GLOBALS['eventon'] = EVO();	


// thank you
?>