<?php

// slider 
function zwsristosplace_custom_post_slide()
{
    $labels = array(
        'name' => _x('', 'post type general name'),
        'singular_name' => _x('slide', 'post type singular name'),
        'add_new' => _x('Add New', 'slide'),
        'add_new_item' => __('Add New Slide'),
        'edit_item' => __('Edit Slide'),
        'new_item' => __('New Slide'),
        'all_items' => __('All Slides'),
        'view_item' => __('View Slide'),
        'search_items' => __('Search Slide'),
        'not_found' => __('No slide found'),
        'not_found_in_trash' => __('No slide found in the trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Slides'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'This is all about slider',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'thumbnail'),
        'has_archive' => true,
    );

    register_post_type('slide', $args);
}

// Add slide as a custom post type so that user can update it from admin panel
add_action('init', 'zwsristosplace_custom_post_slide');

function zwsristosplace_slider_image_size_setup()
{

    add_image_size('slide', 1400, 420, true); // (cropped)
}

add_action('after_setup_theme', 'zwsristosplace_slider_image_size_setup');

//slider meta box
function zwsristosplace_slide_meta_box_add()
{
    add_meta_box('my-meta-box-id', 'Slider Content', 'zwsristosplace_slide_meta_box_details', 'slide', 'normal', 'high');
}

add_action('add_meta_boxes', 'zwsristosplace_slide_meta_box_add');

function zwsristosplace_slide_meta_box_details()
{
// $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom($post->ID);

    $text_slide_dexcription = isset($values['slider_description_text']) ? $values['slider_description_text'] : '';
    $level_text_slider_button = isset($values['slider_button_text']) ? $values['slider_button_text'] : '';
    $text_slider_start_now_url = isset($values['slider_button_text_url']) ? $values['slider_button_text_url'] : '';
    ?>
    <div id="wpbody-content" aria-label="Main content" tabindex="0">
        <table class="form-table">

            <tr class="form-field form-required">
                <th scope="row">
                    <label for="slider_description_text">Slider Description</label>
                </th>
                <td>
                    <textarea name="slider_description_text" id="slider_description_text" cols="20"><?php
                        if ($values == NULL || $values == '') {
                            echo '';
                        } else {
                            echo $text_slide_dexcription[0];
                        }
                        ?>
                    </textarea>
                </td>
            </tr>
            <tr class="form-field form-required">
                <th scope="row">
                    <label for="slider_button_text">Slider Button Text</label>
                </th>
                <td>
                    <input type="text" name="slider_button_text" id="slider_button_text" value="<?php
                    if ($values == NULL || $values == '') {
                        echo '';
                    } else {
                        echo $level_text_slider_button[0];
                    }
                    ?>"/>
                </td>
            </tr>
            <tr class="form-field form-required">
                <th scope="row">
                    <label for="slider_button_text_url">Slider Button URL</label>
                </th>
                <td>
                    <input type="text" name="slider_button_text_url" id="slider_button_text_url" value="<?php
                    if ($values == NULL || $values == '') {
                        echo '';
                    } else {
                        echo $text_slider_start_now_url[0];
                    }
                    ?>"/>
                </td>
            </tr>
        </table>
    </div>

    <?php
}

//Save user porovided data to database using action hook "save_post"
add_action('save_post', 'zwsristosplace_slider_meta_box_save');

function zwsristosplace_slider_meta_box_save($post_id)
{
// now we can actually save the data
    $allowed = array(
        'a' => array(// on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
// Make sure your data is set before trying to save it

    if (isset($_POST['slider_description_text'])) {
        update_post_meta($post_id, 'slider_description_text', wp_kses($_POST['slider_description_text'], $allowed));
    }
    if (isset($_POST['slider_button_text_url'])) {
        update_post_meta($post_id, 'slider_button_text_url', wp_kses($_POST['slider_button_text_url'], $allowed));
    }
    if (isset($_POST['slider_button_text'])) {
        update_post_meta($post_id, 'slider_button_text', wp_kses($_POST['slider_button_text'], $allowed));
    }
}

// end of slider
// ----------- Weekly Items --------------
// Add Weekly special items as a custom post type so that user can update it from admin panel and use action hook "init"
add_action('init', 'zws_ristosplace_weekly_items_post');

function zws_ristosplace_weekly_items_post()
{
    $labels = array(
        'name' => _x('Weekly Special Items', 'post type general name', 'textdomain'),
        'singular_name' => _x('Weekly Special Item', 'post type singular name', 'textdomain'),
        'add_new' => _x('Add New', 'weekly_item', 'textdomain'),
        'add_new_item' => __('Add New Item', 'textdomain'),
        'edit_item' => __('Edit Item', 'textdomain'),
        'new_item' => __('New Item', 'textdomain'),
        'all_items' => __('All Items', 'textdomain'),
        'view_item' => __('View Item', 'textdomain'),
        'search_items' => __('Search Items', 'textdomain'),
        'not_found' => __('No item found', 'textdomain'),
        'not_found_in_trash' => __('No item found in the trash', 'textdomain'),
        'parent_item_colon' => '',
        'menu_name' => 'Weekly Items'
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'description' => 'This is all about featured items of front page',
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'thumbnail', 'editor'),
        'has_archive' => true,
    );
    register_taxonomy('weekly_special', array('weekly_items'), $args);
    register_post_type('weekly_items', $args);
}

// Setup image size for featured area
add_action('after_setup_theme', 'zws_ristosplace_special_image_size_setup');

function zws_ristosplace_special_image_size_setup()
{

    add_image_size('weekly_items', 180, 180, true); // (cropped)
}

//Featured items meta box
function zws_ristosplace_special_item_meta_box_add()
{
    add_meta_box('special-item-meta-box-id', 'Special Item Contents', 'zws_ristosplace_special_item_meta_box_details', 'weekly_items', 'normal', 'high');
}

add_action('add_meta_boxes', 'zws_ristosplace_special_item_meta_box_add');

function zws_ristosplace_special_item_meta_box_details()
{
// $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom($post->ID);

    $item_name = isset($values['item_name']) ? $values['item_name'] : '';
    $item_ingredient_details = isset($values['item_ingredient_details']) ? $values['item_ingredient_details'] : '';
    $feature_heading = isset($values['feature_heading']) ? $values['feature_heading'] : '';
    ?>
    <div id="wpbody-content" aria-label="Main content" tabindex="0">
        <table class="form-table">
    <!--            <tr class="form-field form-required">
                <th scope="row">
                    <label for="feature_heading">Feature Heading</label>
                </th>
                <td>
                    <input type="text" name="feature_heading" id="feature_heading" value="<?php
            //if ($values == NULL || $values == '') {
            // echo '';
            // } else {
            //echo $feature_heading[0];
            //}
            ?>"/>
                </td>
            </tr>-->
            <tr class="form-field form-required">
                <th scope="row">
                    <label for="item_name">Special Item Name</label>
                </th>
                <td>
                    <input type="text" name="item_name" id="item_name" value="<?php
                    if ($values == NULL || $values == '') {
                        echo '';
                    } else {
                        echo $item_name[0];
                    }
                    ?>"/>
                </td>
            </tr>
            <tr class="form-field form-required">
                <th scope="row">
                    <label for="item_ingredient_details">Special Item Ingredient Details</label>
                </th>
                <td>
                    <textarea name="item_ingredient_details" id="item_ingredient_details" cols="20"><?php
                        if ($values == NULL || $values == '') {
                            echo '';
                        } else {
                            echo $item_ingredient_details[0];
                        }
                        ?>
                    </textarea>
                </td>
            </tr>
        </table>
    </div>
    <?php
}

//Save user porovided data to database using action hook "save_post"
add_action('save_post', 'zws_ristosplace_special_item_meta_box_save');

function zws_ristosplace_special_item_meta_box_save($post_id)
{
// now we can actually save the data
    $allowed = array(
        'a' => array(// on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
// Make sure your data is set before trying to save it

    if (isset($_POST['item_name'])) {
        update_post_meta($post_id, 'item_name', wp_kses($_POST['item_name'], $allowed));
    }
    if (isset($_POST['item_ingredient_details'])) {
        update_post_meta($post_id, 'item_ingredient_details', wp_kses($_POST['item_ingredient_details'], $allowed));
    }
    if (isset($_POST['feature_heading'])) {
        update_post_meta($post_id, 'feature_heading', wp_kses($_POST['feature_heading'], $allowed));
    }
}

// end of Weekly special item

//add phone numbers to header using action hook
add_action('init', 'zws_reservation_contact');

function zws_reservation_contact()
{
    $labels = array(
        'name' => __('Hot Line Information', 'post type general name', 'ristosplace'),
        'singular_name' => _x('Hot Line Information', 'post type singular name', 'ristosplace'),
        'add_new' => _x('Add New', 'hotline', 'ristosplace'),
        'add_new_item' => __('Add New Item', 'ristosplace'),
        'edit_item' => __('Edit Item', 'ristosplace'),
        'new_item' => __('New Item', 'ristosplace'),
        'all_items' => __('All Items', 'ristosplace'),
        'view_item' => __('View Item', 'ristosplace'),
        'search_items' => __('Search Items', 'ristosplace'),
        'not_found' => __('No hot line information found', 'ristosplace'),
        'not_found_in_trash' => __('No item found in the trash', 'ristosplace'),
        'parent_item_colon' => '',
        'menu_name' => 'Hot Line'
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'description' => 'This is all about hot line contact information of front page',
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title'),
        'has_archive' => true,
    );
    register_post_type('hotline', $args);
}
// Add meta boxes in admin panel for Hot line informations
add_action('add_meta_boxes', 'zws_reservation_contact_meta_box');
function zws_reservation_contact_meta_box(){
    add_meta_box('hotline-meta-box-id', 'Hotline contact information', 'zws_reservation_contact_meta_box_details', 'hotline', 'normal', 'high');
}
function zws_reservation_contact_meta_box_details()
{
// $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom($post->ID);

    //$contact_type = isset($values['contact_type']) ? $values['contact_type'] : '';
    $contact_number = isset($values['contact_number']) ? $values['contact_number'] : '';
    ?>
    <div id="wpbody-content" aria-label="Main content" tabindex="0">
        <table class="form-table">
            <tr class="form-field form-required">
                <th scope="row">
                    <label for="contact_number">Contact Number</label>
                </th>
                <td>
                    <input type="text" name="contact_number" id="contact_number" value="<?php
                        if ($values == NULL || $values == '') {
                            echo '';
                        } else {
                            echo $contact_number[0];
                        }
                        ?>
                    "/>
                </td>
            </tr>
        </table>
    </div>
    <?php
}

//Save user porovided data to database using action hook "save_post"
add_action('save_post', 'zws_reservation_contact_meta_box_save');

function zws_reservation_contact_meta_box_save($post_id)
{
// Make sure your data is set before trying to save it
    $allowed = array();
    if (isset($_POST['contact_number'])) {
        update_post_meta($post_id, 'contact_number', wp_kses($_POST['contact_number'], $allowed));
    }
}

//
//add Social media links to header using action hook
add_action('init', 'zws_social_media_links');

function zws_social_media_links()
{
    $labels = array(
        'name' => __('Social Media Links', 'post type general name', 'ristosplace'),
        'singular_name' => _x('Social Media Link', 'post type singular name', 'ristosplace'),
        'add_new' => _x('Add New', 'social', 'ristosplace'),
        'add_new_item' => __('Add New Item', 'ristosplace'),
        'edit_item' => __('Edit Item', 'ristosplace'),
        'new_item' => __('New Item', 'ristosplace'),
        'all_items' => __('All Items', 'ristosplace'),
        'view_item' => __('View Item', 'ristosplace'),
        'search_items' => __('Search Items', 'ristosplace'),
        'not_found' => __('No hot line information found', 'ristosplace'),
        'not_found_in_trash' => __('No item found in the trash', 'ristosplace'),
        'parent_item_colon' => '',
        'menu_name' => 'Social Media'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'This is all about hot line contact information of front page',
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'thumbnail'),
        'has_archive' => true,
    );
    register_post_type('social', $args);
}
// Add meta boxes in admin panel for Hot line informations
add_action('add_meta_boxes', 'zws_social_media_meta_box');
function zws_social_media_meta_box(){
    add_meta_box('social-media-meta-box-id', 'Social Media Link', 'zws_social_media_meta_box_details', 'social', 'normal', 'high');
}
function zws_social_media_meta_box_details()
{
// $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom($post->ID);

    $social_media_name = isset($values['social_media_name']) ? $values['social_media_name'] : '';
    $link_url = isset($values['link_url']) ? $values['link_url'] : '';
    ?>
    <div id="wpbody-content" aria-label="Main content" tabindex="0">
        <table class="form-table">
            <tr class="form-field form-required">
                <th scope="row">
                    <label for="social_media_name">Social Media Name</label>
                </th>
                <td>
                    <input type="text" name="social_media_name" id="social_media_name" value="<?php
                        if ($values == NULL || $values == '') {
                            echo '';
                        } else {
                            echo $social_media_name[0];
                        }
                        ?>
                    "/>
                </td>
            </tr>
            <tr class="form-field form-required">
                <th scope="row">
                    <label for="link_url">Social Media Address</label>
                </th>
                <td>
                    <input type="text" name="link_url" id="link_url" value="<?php
                        if ($values == NULL || $values == '') {
                            echo '';
                        } else {
                            echo $link_url[0];
                        }
                        ?>
                    "/>
                </td>
            </tr>
        </table>
    </div>
    <?php
}

//Save user porovided data to database using action hook "save_post"
add_action('save_post', 'zws_social_media_meta_box_save');

function zws_social_media_meta_box_save($post_id)
{
// Make sure your data is set before trying to save it
    $allowed = array();
    if (isset($_POST['social_media_name'])) {
        update_post_meta($post_id, 'social_media_name', wp_kses($_POST['social_media_name'], $allowed));
    }
    if (isset($_POST['link_url'])) {
        update_post_meta($post_id, 'link_url', wp_kses($_POST['link_url'], $allowed));
    }
}

// ----------- Specialty Drinks Custom Post --------------
// Add specialty Drink items as a custom post type so that user can update it from admin panel and use action hook "init"
add_action('init', 'zws_ristosplace_specialty_drinks_post');

function zws_ristosplace_specialty_drinks_post()
{
    $labels = array(
        'name' => _x('Special Drinks', 'post type general name', 'ristossplace'),
        'singular_name' => _x('Special Drink', 'post type singular name', 'ristosplace'),
        'add_new' => _x('Add New', 'specialty_drink', 'ristosplace'),
        'add_new_item' => __('Add New Drink', 'ristosplace'),
        'edit_item' => __('Edit Drink', 'ristosplace'),
        'new_item' => __('New Drink', 'ristosplace'),
        'all_items' => __('All Drinks', 'ristosplace'),
        'view_item' => __('View Drinks', 'ristosplace'),
        'search_items' => __('Search Drinks', 'ristosplace'),
        'not_found' => __('No Drinks found', 'ristosplace'),
        'not_found_in_trash' => __('No Drinks found in the trash', 'ristosplace'),
        'parent_item_colon' => '',
        'menu_name' => 'Specialty Drinks'
    );
    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'description' => 'This is all about featured items of front page',
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'thumbnail'),
        'has_archive' => true,
    );
    register_taxonomy('special_drinks', array('special_drinks'), $args);
    register_post_type('special_drinks', $args);
}

// Setup image size for featured area
add_action('after_setup_theme', 'zws_ristosplace_special_drinks_image_size_setup');

function zws_ristosplace_special_drinks_image_size_setup()
{

    add_image_size('special_drinks', 150, 94, true); // (cropped)
}

//Featured items meta box
function zws_ristosplace_special_drinks_meta_box_add()
{
    add_meta_box('special-drinks-meta-box-id', 'Special Drinks Contents', 'zws_ristosplace_special_drinks_meta_box_details', 'special_drinks', 'normal', 'high');
}

add_action('add_meta_boxes', 'zws_ristosplace_special_drinks_meta_box_add');

function zws_ristosplace_special_drinks_meta_box_details()
{
// $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom($post->ID);

    $drink_details = isset($values['drink_details']) ? $values['drink_details'] : '';
    $drink_price = isset($values['drink_price']) ? $values['drink_price'] : '';
    //$drink_name= isset($values['drink_name']) ? $values['drink_name'] : '';
    ?>
    <div id="wpbody-content" aria-label="Main content" tabindex="0">
        <table class="form-table">
            <tr class="form-field form-required">
                <th scope="row">
                    <label for="drink_details">Specialty Drink Details</label>
                </th>
                <td>
                    <textarea name="drink_details" id="drink_details" cols="20"><?php
                        if ($values == NULL || $values == '') {
                            echo '';
                        } else {
                            echo $drink_details[0];
                        }
                        ?>
                    </textarea>
                </td>
            </tr>
            <tr class="form-field form-required">
                <th scope="row">
                    <label for="drink_price">Drink Price</label>
                </th>
                <td>
                    <input type="text" name="drink_price" id="drink_price" value="<?php
            if ($values == NULL || $values == '') {
             echo '';
             } else {
            echo $drink_price[0];
            }
            ?>"/>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="#" id="insert-my-media" class="button">Add Drink Image</a>
                </td>
            </tr>
        </table>
    </div>
    <?php
           
        }
 
//Save user porovided data to database using action hook "save_post"
add_action('save_post', 'zws_ristosplace_special_drink_meta_box_save');

function zws_ristosplace_special_drink_meta_box_save($post_id)
{
// now we can actually save the data
    $allowed = array(
        'a' => array(// on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
// Make sure your data is set before trying to save it

    if (isset($_POST['drink_name'])) {
        update_post_meta($post_id, 'drink_name', wp_kses($_POST['drink_name'], $allowed));
    }
    if (isset($_POST['drink_details'])) {
        update_post_meta($post_id, 'drink_details', wp_kses($_POST['drink_details'], $allowed));
    }
    if (isset($_POST['drink_price'])) {
        update_post_meta($post_id, 'drink_price', wp_kses($_POST['drink_price'], $allowed));
    }
}
add_action('wp_enqueue_media', 'include_media_button_js_file');
function include_media_button_js_file(){
    wp_enqueue_script('media_button', get_template_directory_uri() . '/assets/js/zws_wp_custom.js', array('jquery'), '1.0', true);
}
// end of Specialty Drinks item
