<?php
$options = array(
    array("namePanel" => "Cấu hình Header"),

    array("nameSection" => "Header Social & Buttons"),

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
    array(
        "name"        => "newsletter_link",
        "label"       => "Newsletter Link",
        "description" => "Link đăng ký Newsletter",
        "default"     => "#",
        "partial"     => ".newsletter-element",
        "type"        => "text"
    ),
    array(
        "name"        => "random_news_link",
        "label"       => "Random News Link",
        "description" => "Link bài viết ngẫu nhiên",
        "default"     => "", // Nếu muốn, có thể lấy dynamic bằng PHP
        "partial"     => ".random-news-element",
        "type"        => "text"
    ),
    array("nameSection" => "Header Branding"),

    array(
        "name"        => "branding_logo",
        "label"       => "Logo Website",
        "description" => "Upload logo chính",
        "default"     => "https://blogsoftwares.com/wp-content/uploads/2025/03/cropped-cropped-Blog-Software.png",
        "partial"     => ".site-branding .custom-logo",
        "type"        => "image"
    ),
    array(
        "name"        => "branding_title",
        "label"       => "Site Title",
        "description" => "Tên website",
        "default"     => "Blog Softwares",
        "partial"     => ".site-branding .site-title",
        "type"        => "text"
    ),
    array(
        "name"        => "branding_description",
        "label"       => "Site Description",
        "description" => "Mô tả ngắn website",
        "default"     => "Reviews & Digital Marketing",
        "partial"     => ".site-branding .site-description",
        "type"        => "text"
    ),
);
?>
