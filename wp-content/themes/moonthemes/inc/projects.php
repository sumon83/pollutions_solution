<?php
register_post_type( 'project', array(
	'labels' => array(
		'name' => 'Projects',
		'add_new_item' =>'Add New Projects' ),
	'public'   => true,
	'supports' => array('title','editor','thumbnail')
	));

function add_project_icon_meta_box() {
    add_meta_box(
        'project_icon', // $id
        'Project Icon', // $title
        'show_project_meta_box', // $callback
        'project', // $screen
        'normal', // $context
        'high' // $priority
    );
}
add_action( 'add_meta_boxes', 'add_project_icon_meta_box' );

function show_project_meta_box() {
    global $post;  
    $meta = get_post_meta( $post->ID, 'project_icon_fields', true ); ?>

  <input type="hidden" name="project_icon_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
  
  <p>
    <label for="project_icon_fields[image]">Image Upload</label><br>
    <input type="text" name="project_icon_fields[image]" id="project_icon_fields[image]" class="meta-image regular-text" value="<?php echo @$meta['image']; ?>">
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
  function save_project_icon_fields_meta( $post_id ) {   
    // verify nonce
    if ( !wp_verify_nonce( $_POST['project_icon_meta_box_nonce'], basename(__FILE__) ) ) {
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
    
    $old = get_post_meta( $post_id, 'project_icon_fields', true );
    $new = $_POST['project_icon_fields'];
    if ( $new && $new !== $old ) {
        update_post_meta( $post_id, 'project_icon_fields', $new );
    } elseif ( '' === $new && $old ) {
        delete_post_meta( $post_id, 'project_icon_fields', $old );
    }
}
add_action( 'save_post', 'save_project_icon_fields_meta' );

