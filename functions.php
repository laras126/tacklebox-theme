<?php


if (!class_exists('Timber')){
	add_action( 'admin_notices', function(){
		echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . admin_url('plugins.php#timber') . '">' . admin_url('plugins.php') . '</a></p></div>';
	});
	return;
}

class StarterSite extends TimberSite {

	function __construct(){
		add_theme_support('post-formats');
		add_theme_support('post-thumbnails');
		add_theme_support('menus');
		add_filter('timber_context', array($this, 'add_to_context'));
		add_filter('get_twig', array($this, 'add_to_twig'));
		add_action('init', array($this, 'register_post_types'));
		add_action('init', array($this, 'register_taxonomies'));
		add_action('init', array($this, 'tbx_acf_utils'));
		add_action('widgets_init', array($this, 'tbx_widgets'));
		parent::__construct();
	}


	// Note that the following included files only need to contain the taxonomy/CPT/Menu arguments and register_whatever function. They are initialized here.
	// http://generatewp.com is nice
	
	function register_post_types(){
		require('lib/custom-types.php');
	}

	function register_taxonomies(){
		require('lib/taxonomies.php');
	}

	function register_menus() {
		require('lib/menus.php');
	}

	function tbx_acf_utils() {
		require('lib/acf-utils.php');
	}

	function tbx_widgets() {
		require('lib/widgets.php');
	}



	function add_to_context($context){
		$context['notes'] = 'These values are available everytime you call Timber::get_context();';
		$context['menu'] = new TimberMenu();
		$context['site'] = $this;
		$context['user'] = new TimberUser(get_current_user_id());

		// Restrict Content Plugin
		$context['access'] = rcp_is_active();

		// Site-wide Settings
		$context['site_callout_bool'] = get_field('site_callout_bool', 'options');
		$context['site_callout_text'] = get_field('site_callout_text', 'options');
		$context['site_footer_copyright'] = get_field('site_footer_copyright', 'options');
		$context['site_footer_credits'] = get_field('site_footer_credits', 'options');
		
		return $context;
	}

	function add_to_twig($twig){
		/* this is where you can add your own fuctions to twig */
		$twig->addExtension(new Twig_Extension_StringLoader());
		// $twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));
		return $twig;
	}

}

new StarterSite();


/* 
 **************************
 * Custom Theme Functions *
 **************************
 */ 



// Mark lessons completed button
// https://tommcfarlin.com/sending-data-post/

function tsk_mark_complete() {
	$lesson_args = array(
		'post_type' => 'lesson',
		'posts_per_page' => '-1'
	);

	$lesson_arr = get_posts($lesson_args);
	
	// Is there a better way to do this?
	foreach ($lesson_arr as $lesson) { 
		if ( isset( $_POST['_lesson_'.$lesson->ID.'_complete'] ) ) {
			$new_state = $_POST['_lesson_'.$lesson->ID.'_complete'];
			$user_id = get_current_user_id();

			update_user_meta( $user_id, '_lesson_'.$lesson->ID.'_complete', $new_state ); 

			if ( is_wp_error( $user_id ) ) {
				// There was an error, probably that user doesn't exist.
			} else {
				// Success!
			}
		}
	}

}
add_action( 'wp', 'tsk_mark_complete' );





// Custom user fields to indicate completed lessons
// justintadlock.com/archives/2009/09/10/adding-and-using-custom-user-profile-fields

add_action( 'show_user_profile', 'tsk_add_lesson_state_fields_to_admin' );
add_action( 'edit_user_profile', 'tsk_add_lesson_state_fields_to_admin' );

function tsk_add_lesson_state_fields_to_admin( $user ) { 

	$lesson_args = array(
		'post_type' => 'lesson',
		'posts_per_page' => '-1'
	);

	$lesson_arr = get_posts($lesson_args);
	
	?>

	<h3>Completed Lessons</h3>

	<table class="form-table">

	<?php foreach ($lesson_arr as $lesson) { 

		$field = '_lesson_'. $lesson->ID . '_complete';
		$value = get_the_author_meta( '_lesson_'.$lesson->ID.'_complete', $user->ID );

		?>
		<tr>
			<td>
				<input type="checkbox" name="<? echo $field ?>" id="<?php echo $field ?>" <?php if($value == 'true'){ echo 'checked'; } ?> />
				<label for="<?php echo $field ?>"><?php echo get_the_title($lesson->ID) ?></label>
			</td>
		</tr>

	<?php } ?>

	</table>
<?php }


// Update completed lesson options in database
add_action( 'personal_options_update', 'tsk_save_lesson_state_in_admin' );
add_action( 'edit_user_profile_update', 'tsk_save_lesson_state_in_admin' );

function tsk_save_lesson_state_in_admin( $user_id ) {

	$lesson_args = array(
		'post_type' => 'lesson',
		'posts_per_page' => '-1'
	);

	$lesson_arr = get_posts($lesson_args);

	foreach ($lesson_arr as $lesson) {
		$field = '_lesson_'. $lesson->ID . '_complete';
		if ( !current_user_can( 'edit_user', $user_id ) )
			return false;

		update_user_meta( $user_id, $field, isset( $_POST[$field] ) ? 'true' : 'false');
	}
}



// Enqueue scripts
function tbx_scripts() {

	// Use jQuery from CDN, enqueue in footer
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', array(), null, true);
		wp_enqueue_script('jquery');
	}

	// Enqueue stylesheet and scripts. Use minified for production.
	// NOTE: will need to change this to get_stylesheet_directory_uri() to allow for child themes later.
	if( WP_ENV == 'production' ) {
		wp_enqueue_style( 'tbx-styles', get_stylesheet_directory_uri() . '/assets/css/main.min.css', 1.0);
		wp_enqueue_script( 'tbx-js', get_stylesheet_directory_uri() . '/assets/js/build/scripts.min.js', array('jquery'), '1.0.0', true );
	} else {
		wp_enqueue_style( 'tbx-styles', get_stylesheet_directory_uri() . '/assets/css/main.css', 1.0);
		wp_enqueue_script( 'tbx-js', get_stylesheet_directory_uri() . '/assets/js/build/scripts.js', array('jquery'), '1.0.0', true );
	}

}
add_action( 'wp_enqueue_scripts', 'tbx_scripts' );


 

/* 
 * 
 * Nice to Haves
 *
 */


// Change Title field placeholders for Custom Post Types
// (You'll need to register the types, of course)

function tbx_title_placeholder_text ( $title ) {
	if ( get_post_type() == 'lesson' ) {
		$title = __( 'Lesson Name' );
	} else if ( get_post_type() == 'source' ) {
        $title = __( 'Resource Name' );
	};
	return $title;
} 
add_filter( 'enter_title_here', 'tbx_title_placeholder_text' );



// Customize the editor style
// It's just the Bootstrap typography, but I like it. Got the idea from Roots.io.

function tbx_editor_styles() {
	add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'tbx_editor_styles' );



// Add excerpts to pages
function tbx_add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'tbx_add_excerpts_to_pages' );



// Remove inline gallery styles
add_filter( 'use_default_gallery_style', '__return_false' );





/*
 * 
 * Plugin Helpers
 *
 */


// Load Gravity Forms JS in the footer...really? Sheesh.
// https://bjornjohansen.no/load-gravity-forms-js-in-footer

function nl_wrap_gform_cdata_open( $content = '' ) {
	$content = 'document.addEventListener( "DOMContentLoaded", function() { ';
	return $content;
}
add_filter( 'gform_cdata_open', 'nl_wrap_gform_cdata_open' );

function nl_wrap_gform_cdata_close( $content = '' ) {
	$content = ' }, false );';
	return $content;
}
add_filter( 'gform_cdata_close', 'nl_wrap_gform_cdata_close' );




// Make custom fields work with Yoast SEO (only impacts the light, but helpful!)
// https://imperativeideas.com/making-custom-fields-work-yoast-wordpress-seo/

if ( is_admin() ) { // check to make sure we aren't on the front end
	add_filter('wpseo_pre_analysis_post_content', 'tbx_add_custom_to_yoast');

	function nl_add_custom_to_yoast( $content ) {
		global $post;
		$pid = $post->ID;
		
		$custom = get_post_custom($pid);
		unset($custom['_yoast_wpseo_focuskw']); // Don't count the keyword in the Yoast field!

		foreach( $custom as $key => $value ) {
			if( substr( $key, 0, 1 ) != '_' && substr( $value[0], -1) != '}' && !is_array($value[0]) && !empty($value[0])) {
			  $custom_content .= $value[0] . ' ';
			}
		}

		$content = $content . ' ' . $custom_content;
		return $content;

		remove_filter('wpseo_pre_analysis_post_content', 'tbx_add_custom_to_yoast'); // don't let WP execute this twice
	}
}



// Google Analytics snippet from HTML5 Boilerplate
// Cookie domain is 'auto' configured. See: http://goo.gl/VUCHKM

define('GOOGLE_ANALYTICS_ID', 'UA-12198561-5');
function tbx_google_analytics() { ?>
<script>
  <?php if (WP_ENV === 'production') : ?>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
    function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
    e=o.createElement(i);r=o.getElementsByTagName(i)[0];
    e.src='//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
  <?php else : ?>
    function ga() {
      console.log('GoogleAnalytics: ' + [].slice.call(arguments));
    }
  <?php endif; ?>
  ga('create','<?php echo GOOGLE_ANALYTICS_ID; ?>','auto');ga('send','pageview');
</script>

<?php }

if (GOOGLE_ANALYTICS_ID && (WP_ENV !== 'production' || !current_user_can('manage_options'))) {
  add_action('wp_footer', 'tbx_google_analytics', 20);
}


// Include custom types in search

function tbx_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'lesson', 'source'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'tbx_add_custom_types' );

?>