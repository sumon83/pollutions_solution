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

//================ ADD METABOX FOR PAGE =========================

function add_breadcrum_meta_box() {
    add_meta_box(
        'breadcrum_image', // $id
        'Breadcrum Image', // $title
        'show_breadcrum_meta_box', // $callback
        'page', // $screen
        'normal', // $context
        'high' // $priority
    );
}
add_action( 'add_meta_boxes', 'add_breadcrum_meta_box' );

function show_breadcrum_meta_box() {
    global $post;  
    $meta = get_post_meta( $post->ID, 'breadcrum_image_fields', true ); ?>

  <input type="hidden" name="breadcrum_image_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
  
  <p>
    <label for="breadcrum_image_fields[image]">Image Upload</label><br>
    <input type="text" name="breadcrum_image_fields[image]" id="breadcrum_image_fields[image]" class="meta-image regular-text" value="<?php echo @$meta['image']; ?>">
    <input type="button" class="button image-upload" value="Browse">
  </p>
  <div class="image-preview"><img src="<?php echo @$meta['image']; ?>" style="max-width: 250px;"></div>


  <script>
    jQuery(document).ready(function ($) {
      // Instantiates the variable that holds the media library frame.
      var meta_image_frame;
      // Runs when the image button is clicked.
      $('.image-upload').click(function (e) {
        // Get preview pane
        var meta_image_preview = $(this).parent().parent().children('.image-preview');
        // Prevents the default action from occuring.
        e.preventDefault();
        var meta_image = $(this).parent().children('.meta-image');
        // If the frame already exists, re-open it.
        if (meta_image_frame) {
          meta_image_frame.open();
          return;
        }
        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
          title: meta_image.title,
          button: {
            text: meta_image.button
          }
        });
        // Runs when an image is selected.
        meta_image_frame.on('select', function () {
          // Grabs the attachment selection and creates a JSON representation of the model.
          var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
          // Sends the attachment URL to our custom image input field.
          meta_image.val(media_attachment.url);
          meta_image_preview.children('img').attr('src', media_attachment.url);
        });
        // Opens the media library frame.
        meta_image_frame.open();
      });
    });
  </script>

  <?php }
  function save_breadcrum_image_fields_meta( $post_id ) {   
    // verify nonce
    if ( !wp_verify_nonce( $_POST['breadcrum_image_meta_box_nonce'], basename(__FILE__) ) ) {
        return $post_id; 
    }
    // check autosave
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
    // check permissions
    if ( 'page' === $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        } elseif ( !current_user_can( 'edit_post', $post_id ) ) {
            return $post_id;
        }  
    }
    
    $old = get_post_meta( $post_id, 'breadcrum_image_fields', true );
    $new = $_POST['breadcrum_image_fields'];
    if ( $new && $new !== $old ) {
        update_post_meta( $post_id, 'breadcrum_image_fields', $new );
    } elseif ( '' === $new && $old ) {
        delete_post_meta( $post_id, 'breadcrum_image_fields', $old );
    }
}
add_action( 'save_post', 'save_breadcrum_image_fields_meta' );




// REGISTER SIDEBAR
function register_moontheme_sidebar(){

	register_sidebar( array(
		'name'			    => 'Footer Widget',
		'id'			      => 'footer_sidebar',
		'descriptin'	  =>'You can add widget option from here',
		'before_widget' => '<div class="col-lg-4 col-sm-4"><div class="footer-widget">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'	  => '</h3>',
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
    <li><a href="<?php bloginfo('url'); ?>">Home ></a></li> 
    <?php if(!empty($id)): ?>
    <li><a href="<?php echo get_permalink( $id ); ?>" ><?php echo get_the_title( $id ); ?>></a></li> 
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

// custom post type  
include_once 'inc/services.php';
include_once 'inc/projects.php';

// redux framework 
include_once 'lib/ReduxCore/framework.php';
include_once 'lib/sample/config.php';