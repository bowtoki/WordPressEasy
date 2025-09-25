<div class="secondary-sidebar">
    <aside id="secondary" class="widget-area">

        <!-- Banner 1 -->
        <section id="digital_newspaper_banner_ads_widget-6" class="widget widget_digital_newspaper_banner_ads_widget">
            <div class="digital-newspaper-advertisement-block">
                <figure class="inner-ad-block">
                    <a href="<?php echo _opt('sidebar_banner_1_link'); ?>" target="_blank">
                        <img src="<?php echo _opt('sidebar_banner_1'); ?>" alt="Banner 1">
                    </a>
                </figure>
            </div>
        </section>

        <!-- Banner 2 -->
        <section id="digital_newspaper_banner_ads_widget-5" class="widget widget_digital_newspaper_banner_ads_widget">
            <div class="digital-newspaper-advertisement-block">
                <figure class="inner-ad-block">
                    <a href="<?php echo _opt('sidebar_banner_2_link'); ?>" target="_blank">
                        <img src="<?php echo _opt('sidebar_banner_2'); ?>" alt="Banner 2">
                    </a>
                </figure>
            </div>
        </section>

        <!-- Trending News (WordPress Dynamic) -->
        <section id="digital_newspaper_posts_grid_widget-3" class="widget widget_digital_newspaper_posts_grid_widget">
            <h2 class="widget-title"><span>Trending News</span></h2>
            <div class="posts-wrap posts-grid-wrap feature-post-block layout-two">
                <?php
                $trending = new WP_Query(array(
                    'posts_per_page' => 4,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                if($trending->have_posts()) :
                    while($trending->have_posts()) : $trending->the_post(); ?>
                        <div class="post-item format-standard digital-newspaper-category-no-bk">
                            <div class="post_thumb_image post-thumb">
                                <figure class="post-thumb">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php if(has_post_thumbnail()) {
                                            the_post_thumbnail('medium');
                                        } else { ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/images/default-thumbnail.jpg" alt="<?php the_title(); ?>">
                                        <?php } ?>
                                    </a>
                                </figure>
                            </div>
                            <div class="post-content-wrap card__content">
                                <div class="bmm-post-cats-wrap bmm-post-meta-item post-categories">
                                    <?php
                                    $categories = get_the_category();
                                    if($categories){
                                        foreach($categories as $category){
                                            echo '<h5 class="card__content-category cat-item cat-'.$category->term_id.'"><a href="'.get_category_link($category->term_id).'">'.$category->name.'</a></h5>';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="digital-newspaper-post-title card__content-title post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </section>

        <!-- Banner 3 -->
        <section id="digital_newspaper_banner_ads_widget-3" class="widget widget_digital_newspaper_banner_ads_widget">
            <div class="digital-newspaper-advertisement-block">
                <figure class="inner-ad-block">
                    <a href="<?php echo _opt('sidebar_banner_3_link'); ?>" target="_blank">
                        <img src="<?php echo _opt('sidebar_banner_3'); ?>" alt="Banner 3">
                    </a>
                </figure>
            </div>
        </section>

        <!-- Banner 4 Empty -->
        <section id="digital_newspaper_banner_ads_widget-4" class="widget widget_digital_newspaper_banner_ads_widget">
            <div class="digital-newspaper-advertisement-block"></div>
        </section>

        <!-- Banner 5 -->
        <section id="digital_newspaper_banner_ads_widget-7" class="widget widget_digital_newspaper_banner_ads_widget">
            <div class="digital-newspaper-advertisement-block">
                <figure class="inner-ad-block">
                    <a href="<?php echo _opt('sidebar_banner_5_link'); ?>" target="_blank">
                        <img src="<?php echo _opt('sidebar_banner_5'); ?>" alt="Banner 5">
                    </a>
                </figure>
            </div>
        </section>

        <!-- Banner 6 Empty -->
        <section id="digital_newspaper_banner_ads_widget-8" class="widget widget_digital_newspaper_banner_ads_widget">
            <div class="digital-newspaper-advertisement-block"></div>
        </section>

        <!-- Author Info -->
        <section id="digital_newspaper_author_info_widget-3" class="widget widget_digital_newspaper_author_info_widget">
            <h2 class="widget-title"><span>Author Info</span></h2>
            <div class="post-card author-wrap layout-one">
                <div class="bmm-author-thumb-wrap">
                    <figure class="post-thumb post-thumb">
                        <a href="#"><img src="<?php echo _opt('sidebar_author_image'); ?>" alt="<?php echo _opt('sidebar_author_name'); ?>" loading="lazy"></a>
                    </figure>
                </div>
                <div class="author-content-wrap">
                    <h2 class="author-name"><a href="#"><?php echo _opt('sidebar_author_name'); ?></a></h2>
                </div>
            </div>
        </section>

        <!-- Category Collection -->
        <section id="digital_newspaper_category_collection_widget-3" class="widget widget_digital_newspaper_category_collection_widget">
            <h2 class="widget-title"><span>Category Collection</span></h2>
            <div class="categories-wrap layout-two">
                <?php
                $categories = get_categories();
                foreach ($categories as $cat) :
                    // Lấy ảnh category từ term meta
                    $image_id = get_term_meta($cat->term_id, 'category_image_id', true);
                    if ($image_id) {
                        $image_url = wp_get_attachment_url($image_id);
                    } else {
                        $image_url = get_template_directory_uri() . '/assets/images/default-category.jpg';
                    }
                    ?>
                    <div class="post-thumb post-thumb category-item cat-<?php echo $cat->term_id; ?>">
                        <img src="<?php echo esc_url($image_url); ?>" loading="lazy" alt="<?php echo esc_attr($cat->name); ?>">
                        <a class="cat-meta-wrap" href="<?php echo esc_url(get_category_link($cat->term_id)); ?>">
                            <div class="cat-meta digital-newspaper-post-title">
                                <span class="category-name"><?php echo esc_html($cat->name); ?></span>
                                <span class="category-count"><?php echo $cat->count; ?>
                                             <span class="news_text">News</span>
                                          </span>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>


    </aside>
</div>
