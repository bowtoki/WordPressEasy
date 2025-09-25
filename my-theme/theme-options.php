<?php
if (!function_exists('theme_customize_register_options')) :

function theme_customize_register_options($wp_customize) {

    $option_files = glob(get_template_directory() . '/options/*_opt_*.php');
    $all_options = array();

    foreach ($option_files as $file) {
        include $file;
        if (isset($options) && is_array($options)) {
            $all_options = array_merge($all_options, $options);
        }
    }

    $panels_added = array();
    $sections_added = array();
    $current_panel_id = '';
    $current_section_id = '';

    foreach ($all_options as $opt) {

        if (isset($opt['namePanel'])) {
            $current_panel_id = sanitize_title($opt['namePanel']);
            if (!isset($panels_added[$current_panel_id])) {
                $wp_customize->add_panel($current_panel_id, array(
                    'title' => $opt['namePanel'],
                    'priority' => 10
                ));
                $panels_added[$current_panel_id] = true;
            }
        }

        if (isset($opt['nameSection'])) {
            $current_section_id = sanitize_title($opt['nameSection']);
            if (!isset($sections_added[$current_section_id])) {
                $wp_customize->add_section($current_section_id, array(
                    'title' => $opt['nameSection'],
                    'panel' => $current_panel_id ?: null,
                    'priority' => 10
                ));
                $sections_added[$current_section_id] = true;
            }
        }

        if (isset($opt['name'])) {
            $setting_id = $opt['name'];
            $section = $current_section_id ?: null;

            switch ($opt['type'] ?? 'text') {
                case 'checkbox': $sanitize_cb = 'theme_sanitize_checkbox'; break;
                case 'image': $sanitize_cb = 'esc_url_raw'; break;
                case 'textarea': $sanitize_cb = 'sanitize_textarea_field'; break;
                default: $sanitize_cb = 'sanitize_text_field';
            }

            $wp_customize->add_setting($setting_id, array(
                'default' => $opt['default'] ?? '',
                'sanitize_callback' => $sanitize_cb,
                'transport' => isset($opt['partial']) ? 'postMessage' : 'refresh'
            ));

            if ($opt['type'] == 'image') {
                $wp_customize->add_control(
                    new WP_Customize_Image_Control($wp_customize, $setting_id, array(
                        'label' => $opt['label'],
                        'section' => $section,
                        'settings' => $setting_id
                    ))
                );
            } else {
                $wp_customize->add_control($setting_id, array(
                    'label' => $opt['label'],
                    'description' => $opt['description'] ?? '',
                    'section' => $section,
                    'type' => $opt['type'] ?? 'text'
                ));
            }

            if (isset($opt['partial'])) {
                $wp_customize->selective_refresh->add_partial($setting_id, array(
                    'selector' => $opt['partial'],
                    'render_callback' => function() use ($setting_id) {
                        return get_theme_mod($setting_id);
                    }
                ));
            }
        }
    }
}

add_action('customize_register', 'theme_customize_register_options');

//if (!function_exists('_opt')) {
//    function _opt($key, $default = '') {
//        $val = get_theme_mod($key);
//        return $val !== '' ? $val : $default;
//    }
//}

if (!function_exists('theme_sanitize_checkbox')) {
    function theme_sanitize_checkbox($checked) {
        return ($checked === true || $checked === '1') ? true : false;
    }
}
    if (!function_exists('_opt')) {
        function _opt($key, $default = '') {
            $val = get_theme_mod($key, null);
            if ($val === null || $val === '') {
                // Lấy default từ file options
                $default_val = theme_get_option_default($key);
                return $default_val !== null ? $default_val : $default;
            }
            return $val;
        }
    }

    if (!function_exists('theme_get_option_default')) {
        function theme_get_option_default($key) {
            static $defaults = null;
            if ($defaults === null) {
                $defaults = array();
                $option_files = glob(get_template_directory() . '/options/*_opt_*.php');
                foreach ($option_files as $file) {
                    include $file;
                    if (isset($options) && is_array($options)) {
                        foreach ($options as $opt) {
                            if (isset($opt['name']) && isset($opt['default'])) {
                                $defaults[$opt['name']] = $opt['default'];
                            }
                        }
                    }
                }
            }
            return $defaults[$key] ?? null;
        }
    }
endif;
