<?php
/*
Plugin Name: Custom Contact Form Plugin
Description: WordPress AJAX Contact Form Plugin - Practical Task.
Version: 1.0
Author: Rohit Nakrani
*/

// Register custom post type
function ccfp_register_post_type() {
    register_post_type('contact_entries', array(
        'labels' => array(
            'name' => __('Contact Entries'),
            'singular_name' => __('Contact Entry')
        ),
        'public' => false,
        'show_ui' => true,
        'supports' => array('title', 'editor', 'custom-fields')
    ));
}
add_action('init', 'ccfp_register_post_type');

// Enqueue scripts and styles
function ccfp_enqueue_scripts() {
    wp_enqueue_style('ccfp-style', plugin_dir_url(__FILE__) . 'assets/css/style.css');
    wp_enqueue_script('ccfp-script', plugin_dir_url(__FILE__) . 'assets/js/script.js', array('jquery'), null, true);
    wp_localize_script('ccfp-script', 'ccfp_ajax_obj', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('ccfp_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'ccfp_enqueue_scripts');

// Shortcode to display form
function ccfp_display_form() {
    $current_user = wp_get_current_user();
    ob_start(); ?>

<!-- display form -->

    <head><link rel="stylesheet" href="style.css" /></head>
<body>
    <div class="container">
        <div class="left">
            <div class="collage">
                <img src="http://localhost/Figma-Design/wp-content/uploads/2025/05/right_hand.png" alt="Hand Left" class="hand-left" />
                <div class="circle-text">
                    <svg viewBox="0 0 200 200">
                        <defs>
                            <path id="circlePath" d="M 100, 100 m -75, 0 a 75,75 0 1,1 150,0 a 75,75 0 1,1 -150,0"/>
                        </defs>
                </svg>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="top-right">
                <div class="row"><div class="col-sm-12">
                <span style=" color: red; margin-left: 10px;font-weight: 500 !important; "><strong>FOLLOW ME  &nbsp;</strong></span></div></div>
                <div class="menu-icon">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div class="form-box">
                <b><b style=" color: #ef401f; ">You can find me </b>in my studio if you want to <br> take a look at my sculptures, address is via <br> sacra 69, Toulouse, France. 
                 <br>   <a href="#" style=" color: #ef401f; "><b>View on map</a></p>
                <form id="ccfp-contact-form">
                    <input type="text" name="name" placeholder="Name" value="" required>
                    <input type="email" name="email" placeholder="Email Id" value="" required>
                    <textarea name="message" placeholder="Message" required></textarea>
                    <input type="hidden" name="action" value="ccfp_submit_form">
                    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('ccfp_nonce'); ?>">
                    <button type="submit">Let’s talk! →</button>
                    <div id="ccfp-response"></div>
                </form>
            </div>
        </div>
    </div>
</body>

    <?php
    return ob_get_clean();
}
add_shortcode('custom_contact_form', 'ccfp_display_form');

// AJAX handler
function ccfp_handle_form_submission() {
    check_ajax_referer('ccfp_nonce', 'nonce');

    $name    = sanitize_text_field($_POST['name']);
    $email   = sanitize_email($_POST['email']);
    $message = sanitize_textarea_field($_POST['message']);

    $post_id = wp_insert_post(array(
        'post_type'   => 'contact_entries',
        'post_title'  => $name,
        'post_content'=> $message,
        'post_status' => 'publish',
        'meta_input'  => array(
            'email' => $email,
            'submitted_on' => current_time('mysql')
        )
    ));

    if ($post_id) {
        wp_send_json_success("Thanks! Your message has been sent.");
    } else {
        wp_send_json_error("Failed to send message.");
    }
}
add_action('wp_ajax_ccfp_submit_form', 'ccfp_handle_form_submission');
add_action('wp_ajax_nopriv_ccfp_submit_form', 'ccfp_handle_form_submission');
?>
