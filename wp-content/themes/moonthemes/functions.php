<?php

function moon_setup_theme(){

// FOR THEME SUPPORT
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 825, 510, true );

// text domain load
load_theme_textdomain( 'moontheme', TEMPLATEPATH.'/languages' );
// REGISTER MENU
$args = array(
	'main_menu'   => 'Main Menu',
	'footer_menu' => 'Footer Menu' );

register_nav_menus($args);

}

add_action( 'after_setup_theme','moon_setup_theme' );

//ENQUEUE CSS AND JS
function moon_css_js_enqueue(){
	wp_register_style( 'bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css' );
	wp_register_style( 'font-awesome', get_template_directory_uri().'/assets/css/font-awesome.min.css' );
	wp_register_style( 'style', get_template_directory_uri().'/assets/css/style.css' );
	wp_register_style( 'animation', get_template_directory_uri().'/assets/css/default-animation.css' );
	wp_register_style( 'flaticon', get_template_directory_uri().'/assets/fonts/flaticon/flaticon.css' );
	wp_register_style( 'range', get_template_directory_uri().'/assets/css/range-slider.css' );
	wp_register_style( 'color', get_template_directory_uri().'/assets/css/color.css' );
	wp_register_style( 'responsive', get_template_directory_uri().'/assets/css/responsive.css' );
	wp_register_style( 'loader', get_template_directory_uri().'/assets/css/loader.css' );
	wp_register_style( 'custom', get_template_directory_uri().'/assets/css/custom.css' );

	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'font-awesome' );
	wp_enqueue_style( 'style' );
	wp_enqueue_style( 'animation' );
	wp_enqueue_style( 'flaticon' );
	wp_enqueue_style( 'range' );
	wp_enqueue_style( 'color' );
	wp_enqueue_style( 'responsive' );
	wp_enqueue_style( 'loader' );
	wp_enqueue_style( 'custom' );

	//wp_register_script( 'jq', get_template_directory_uri().'/assets/js/jquery.min.js' );
	wp_register_script( 'bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js' );
	wp_register_script( 'YouTubePopUp', get_template_directory_uri().'/assets/js/YouTubePopUp.jquery.js' );
	wp_register_script( 'fancybox', get_template_directory_uri().'/assets/js/jquery.fancybox.pack.js' );
	wp_register_script( 'media', get_template_directory_uri().'/assets/js/jquery.fancybox-media.js' );
	wp_register_script( 'owl', get_template_directory_uri().'/assets/js/owl.js' );
	wp_register_script( 'mixitup', get_template_directory_uri().'/assets/js/mixitup.js' );
	wp_register_script( 'validate', get_template_directory_uri().'/assets/js/validate.js' );
	wp_register_script( 'wow', get_template_directory_uri().'/assets/js/wow.js' );
	wp_register_script( 'custom', get_template_directory_uri().'/assets/js/custom.js' );


	wp_enqueue_script( 'jquery' );
	//wp_enqueue_script( 'jq' );
	wp_enqueue_script( 'bootstrap' );
	wp_enqueue_script( 'YouTubePopUp' );
	wp_enqueue_script( 'fancybox' );
	wp_enqueue_script( 'media' );
	wp_enqueue_script( 'owl' );
	wp_enqueue_script( 'mixitup' );
	wp_enqueue_script( 'validate' );
	wp_enqueue_script( 'wow' );
	wp_enqueue_script( 'custom' );
}

add_action( 'wp_enqueue_scripts', 'moon_css_js_enqueue' );

// REGISTER CUSTOM POST
register_post_type( 'services', array(
	'labels' => array(
		'name' => 'Services',
		'add_new_item' =>'Add New Service' ),
	'public'   => true,
	'supports' => array('title','editor','thumbnail')
	));

register_post_type( 'project', array(
	'labels' => array(
		'name' => 'Projects',
		'add_new_item' =>'Add New Projects' ),
	'public'   => true,
	'supports' => array('title','editor','thumbnail')
	));

register_post_type( 'faq', array(
	'labels' => array(
		'name' => 'FAQ',
		'add_new_item' =>'Add New FAQ' ),
	'public'   => true,
	'supports' => array('title','editor')
	));


register_post_type( 'partner', array(
	'labels'   => array(
		'name' 			=>'Partner',
		'add_new_item'  =>'Add New Partner',
		'menu_icon' 	=>get_stylesheet_directory_uri() . '/assets/images/user.png'
	),
	'public'   => true,
	'supports' => array('title','thumbnail')
	));


// REGISTER SIDEBAR
function register_moontheme_sidebar(){

	register_sidebar( array(
		'name'			=> 'Footer Widget',
		'id'			=> 'footer_sidebar',
		'descriptin'	=>'You can add widget option from here',
		'before_widget' => '<div class="widget-content">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'	=> '</h3>',
		) );
	
		flush_rewrite_rules();
}
add_action( 'widgets_init', 'register_moontheme_sidebar' );

// FOR READ MORE 

function moontheme_read_more( $limit ){
        $post_content = explode(" ", get_the_content());
        $less_content = array_slice( $post_content, 0, $limit );
        echo implode(" ", $less_content);
    }

//FOR BREADCRUM
function breadcrumbs($id = null){
?>
<ul class="banner-nav pull-right">
    <li><a href="<?php bloginfo('url'); ?>">Home</a></li> >
    <?php if(!empty($id)): ?>
    <li><a href="<?php echo get_permalink( $id ); ?>" ><?php echo get_the_title( $id ); ?></a></li> >
    <?php endif; ?>
    <li><?php the_title(); ?><li>
</ul>
<?php }  

 // EMAIL SEND USING AJAX

add_action( 'wp_ajax_custom_action', 'custom_action' );
add_action( 'wp_ajax_nopriv_custom_action', 'custom_action' );

function custom_action() {
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message']; 
        
    $to = "editor@panasian1.com";
    $headers = '';
	$headers .= 'From: '.$name.'  <'.$email.'>' . "\r\n";
	$headers .= "Reply-To: ".$email."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    mail($to, $subject, $message, $headers);
    
    echo 'Your message has been send successfully';
    
     die();
}   

// CUSTOM DASHBOARD TEXT
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
 
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Polution Solutions BD', 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo '<h2>Welcome to Polution Solutions BD Admin Panel.</h2>';
}

// for DASHBOARD COLUMN
function wpse126301_dashboard_columns() {
    add_screen_option(
        'layout_columns',
        array(
            'max'     => 2,
            'default' => 1
        )
    );
}
add_action( 'admin_head-index.php', 'wpse126301_dashboard_columns' );

// FILTER ADMIN LOGIN ERROR MESSAGE
add_filter('login_errors','login_error_message');

function login_error_message($error){
    //check if that's the error you are looking for
    $pos = strpos($error, 'incorrect');
    if (is_int($pos)) {
        //its the right error so you can overwrite it
        $error = "Oops! You enter wrong information.";
    }
    return $error;
}

// moon plugin 
include_once 'inc/moonplugin.php';

// redux framework 
include_once 'lib/ReduxCore/framework.php';
include_once 'lib/sample/config.php';