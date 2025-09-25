<?php
function my_theme_enqueue_assets() {
    // CSS chính
    wp_enqueue_style('my-theme-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
    //CSS Phụ
    wp_enqueue_style(
        'my-theme-extra',
        get_template_directory_uri() . '/assets/css/extra.css',
        array('my-theme-style'), // phụ thuộc vào style.css
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style(
        'my-theme-custom',
        get_template_directory_uri() . '/assets/css/custom.css',
        array('my-theme-style'),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style(
        'my-theme-reponsive',
        get_template_directory_uri() . '/assets/css/reponsive.css',
        array('my-theme-style'),
        wp_get_theme()->get('Version')
    );
    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css', array(), '6.5.2');

    wp_enqueue_script('jquery');

    // Slick Slider JS
    wp_enqueue_script('slick-js', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true);

    // Script custom của theme
    wp_enqueue_script('theme-index-js', get_template_directory_uri() . '/index.js', array('jquery','slick-js'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_assets');

function my_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('carousel-thumb', 263, 180, true);
    register_nav_menus(array('primary' => __('Main Menu', 'my-theme')));
}
add_action('after_setup_theme', 'my_theme_setup');

function my_category_image_field($term) {
    $image_id = $term ? get_term_meta($term->term_id, 'category_image_id', true) : '';
    $image_url = $image_id ? wp_get_attachment_url($image_id) : '';
    ?>
    <tr class="form-field term-group-wrap">
        <th scope="row"><label for="category-image-id"><?php _e('Category Image', 'my-theme'); ?></label></th>
        <td>
            <input type="hidden" id="category-image-id" name="category_image_id" value="<?php echo esc_attr($image_id); ?>">
            <img id="category-image-preview" src="<?php echo esc_url($image_url); ?>" style="max-width:150px; display:block; margin-bottom:10px;">
            <button type="button" class="upload-category-image button"><?php _e('Upload/Add Image', 'my-theme'); ?></button>
            <button type="button" class="remove-category-image button"><?php _e('Remove Image', 'my-theme'); ?></button>
        </td>
    </tr>
    <?php
}
add_action('category_add_form_fields', 'my_category_image_field', 10, 2);
add_action('category_edit_form_fields', 'my_category_image_field');

function my_save_category_image($term_id){
    if(isset($_POST['category_image_id'])){
        update_term_meta($term_id, 'category_image_id', intval($_POST['category_image_id']));
    }
}
add_action('create_category', 'my_save_category_image', 10, 2);
add_action('edited_category', 'my_save_category_image', 10, 2);

function my_enqueue_category_media_scripts($hook) {
    if ($hook === 'edit-tags.php' || $hook === 'term.php') {
        wp_enqueue_media();
        wp_enqueue_script(
            'my-category-media',
            get_template_directory_uri() . '/index.js',
            array('jquery'),
            '1.0',
            true
        );
    }
}
add_action('admin_enqueue_scripts', 'my_enqueue_category_media_scripts');
require get_template_directory() . '/theme-options.php';
