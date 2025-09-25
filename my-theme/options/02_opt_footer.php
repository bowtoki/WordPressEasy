<?php
$options = array(
    array("namePanel" => "Cấu hình Footer"),

    array("nameSection" => "Footer Social & Info"),

    // Social Media
    array(
        "name"        => "social_facebook",
        "label"       => "Facebook URL",
        "description" => "Link Facebook",
        "default"     => "https://www.facebook.com/Blogsoftwares",
        "partial"     => ".social-icons",
        "type"        => "text"
    ),
    array(
        "name"        => "social_instagram",
        "label"       => "Instagram URL",
        "description" => "Link Instagram",
        "default"     => "https://www.instagram.com/blogsoftwares/",
        "partial"     => ".social-icons",
        "type"        => "text"
    ),
    array(
        "name"        => "social_x",
        "label"       => "X / Twitter URL",
        "description" => "Link X / Twitter",
        "default"     => "https://x.com/Blogsoftwares1",
        "partial"     => ".social-icons",
        "type"        => "text"
    ),
    array(
        "name"        => "social_youtube",
        "label"       => "YouTube URL",
        "description" => "Link YouTube",
        "default"     => "https://www.youtube.com/@Blogsoftwares",
        "partial"     => ".social-icons",
        "type"        => "text"
    ),

    // Footer Info
    array(
        "name"        => "footer_text",
        "label"       => "Footer Text",
        "description" => "Nội dung hiển thị ở footer",
        "default"     => "Blog Software - Reviews & Digital Marketing 2025. Powered By <a href='https://blazethemes.com/'>BlazeThemes</a>.",
        "partial"     => ".site-info",
        "type"        => "textarea"
    ),
);
?>
