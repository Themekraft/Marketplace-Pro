<?php

// Add the metabox with the page options
add_action("add_meta_boxes", "tk_add_page_options");
function tk_add_page_options() {
    add_meta_box("tk-page-options", "Page Options - Marketplace Pro", "tk_page_options_meta_box", "page", "normal", "high", null);
}


// The page options
function tk_page_options_meta_box() {

  wp_nonce_field(basename(__FILE__), "meta_box_nonce");

      ?>
      <div>
        <p>
          <label for="tk-hide-page-title">
            <?php

                $checkbox_value = get_post_meta( $object->ID, "tk-hide-page-title", true );

                if( $checkbox_value == "" ) {
                    ?>
                      <input id="tk-hide-page-title" name="tk-hide-page-title" type="checkbox" value="true">
                    <?php
                }
                else if( $checkbox_value == "true" ) {
                    ?>
                      <input id="tk-hide-page-title" name="tk-hide-page-title" type="checkbox" value="true" checked>
                    <?php
                }
            ?>
            Hide the page title?
          </label>
        </p>
      </div>
     <?php
}

// Save the page options
add_action("save_post", "tk_page_options_save_meta_box", 10, 3);
function tk_page_options_save_meta_box( $post_id, $post, $update ) {
    if (!isset($_POST["meta_box_nonce"]) || !wp_verify_nonce($_POST["meta_box_nonce"], basename(__FILE__)))
        return;

    if(!current_user_can("edit_post", $post_id))
        return;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return;

    // $slug = "post";
    // if($slug != $post->post_type)
    //     return;

    $meta_box_checkbox_value = "";

    if(isset($_POST["tk-hide-page-title"])) {
        $meta_box_checkbox_value = $_POST["tk-hide-page-title"];
    }
    update_post_meta($post_id, "tk-hide-page-title", $meta_box_checkbox_value);
}

?>
