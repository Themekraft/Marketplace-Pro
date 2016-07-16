<?php

// Add the metabox with the page options
add_action("add_meta_boxes", "tk_add_page_options");
function tk_add_page_options() {
    add_meta_box("tk-page-options", "Page Options - Marketplace Pro", "tk_page_options_meta_box", "page", "normal", "high", null);
}


// The page options
function tk_page_options_meta_box() {

  wp_nonce_field(basename(__FILE__), "meta-box-nonce");

      ?>
      <div>
        <p>
          <label for="meta-box-checkbox">
            <?php

                $checkbox_value = get_post_meta( $object->ID, "meta-box-checkbox", true );

                if( $checkbox_value == "" ) {
                    ?>
                      <input name="meta-box-checkbox" type="checkbox" value="true">
                    <?php
                }
                else if( $checkbox_value == "true" ) {
                    ?>
                      <input name="meta-box-checkbox" type="checkbox" value="true" checked>
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
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $slug = "post";
    if($slug != $post->post_type)
        return $post_id;

    $meta_box_checkbox_value = "";

    if(isset($_POST["meta-box-checkbox"])) {
        $meta_box_checkbox_value = $_POST["meta-box-checkbox"];
    }
    update_post_meta($post_id, "meta-box-checkbox", $meta_box_checkbox_value);
}

?>
