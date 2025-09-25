<?php get_header(); ?>
<div class="after-header header-layout-banner-two ticker-news-section--boxed--layout">
   <div class="digital-newspaper-container">
      <div class="row">
         <div class="ticker-news-wrap digital-newspaper-ticker layout--three">
            <!-- Label -->
            <div class="ticker_label_title ticker-title digital-newspaper-ticker-label">
               <span class="icon">
                  <i class="fas fa-fire"></i>
               </span>
               <span class="ticker_label_title_string"><?php esc_html_e('Hot News', 'yourtheme'); ?></span>
            </div>
            <!-- Ticker -->
            <div class="digital-newspaper-ticker-box">
               <ul class="ticker-item-wrap" direction="left" dir="ltr">
                  <div class="js-marquee-wrapper">
                     <div class="js-marquee" style="float: left;">
                        <?php
                        // Lấy 5 bài viết mới nhất trong category "hot-news" (có thể đổi slug tùy bạn)
                        $hot_news = new WP_Query(array(
                           'posts_per_page' => 5,
                           'category_name'  => 'hot-news', // hoặc thay bằng cat ID
                           'post_status'    => 'publish'
                        ));

                        if ($hot_news->have_posts()) :
                           while ($hot_news->have_posts()) : $hot_news->the_post(); ?>
                              <li class="ticker-item">
                                 <figure class="feature_image">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                       <?php
                                       if (has_post_thumbnail()) {
                                          the_post_thumbnail('digital-newspaper-thumb', [
                                             'class' => 'attachment-digital-newspaper-thumb size-digital-newspaper-thumb wp-post-image',
                                             'title' => get_the_title()
                                          ]);
                                       }
                                       ?>
                                    </a>
                                 </figure>
                                 <div class="title-wrap">
                                    <span class="post-date posted-on published">
                                       <a href="<?php the_permalink(); ?>" rel="bookmark">
                                          <time class="entry-date published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                             <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago'); ?>
                                          </time>
                                          <time class="updated" datetime="<?php echo esc_attr(get_the_modified_date('c')); ?>">
                                             <?php echo human_time_diff(get_the_modified_time('U'), current_time('timestamp')) . ' ' . __('ago'); ?>
                                          </time>
                                       </a>
                                    </span>
                                    <h2 class="post-title">
                                       <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                          <?php the_title(); ?>
                                       </a>
                                    </h2>
                                 </div>
                              </li>
                           <?php endwhile;
                           wp_reset_postdata();
                        else: ?>
                           <li class="ticker-item"><?php esc_html_e('No hot news found.', 'yourtheme'); ?></li>
                        <?php endif; ?>
                     </div>
                  </div>
               </ul>
            </div>
            <!-- Controls -->
            <div class="digital-newspaper-ticker-controls">
               <button class="digital-newspaper-ticker-pause"><i class="fas fa-pause"></i></button>
            </div>
         </div>
      </div>
   </div>
</div>
<section id="main-banner-section" class="digital-newspaper-section banner-layout--five grid_slider--banner_slider--list_posts width-boxed--layout">
   <div class="digital-newspaper-container">
      <div class="row">
          <div class="main-banner-list-posts">
              <h2 class="section-title"><?php esc_html_e('Popular News', 'yourtheme'); ?></h2>
              <div class="list-posts-wrap">
                  <?php
                  $popular_posts = new WP_Query(array(
                      'posts_per_page' => 4,
                      'post_status'    => 'publish',
                  ));

                  if ($popular_posts->have_posts()) :
                      $i = 0;
                      while ($popular_posts->have_posts()) : $popular_posts->the_post();
                          $i++;
                          ?>
                          <article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>

                              <?php if ($i === 1 && has_post_thumbnail()) : // Chỉ hiển thị ảnh bài đầu ?>
                                  <figure class="post-thumb">
                                      <a href="<?php the_permalink(); ?>">
                                          <?php the_post_thumbnail('medium'); ?>
                                      </a>
                                  </figure>
                              <?php endif; ?>

                              <div class="post-element">
                                  <ul class="post-categories">
                                      <?php
                                      $categories = get_the_category();
                                      if ($categories) :
                                          foreach ($categories as $category) :
                                              printf(
                                                  '<li class="cat-item cat-%1$s"><a href="%2$s" rel="category tag">%3$s</a></li>',
                                                  esc_attr($category->term_id),
                                                  esc_url(get_category_link($category->term_id)),
                                                  esc_html($category->name)
                                              );
                                          endforeach;
                                      endif;
                                      ?>
                                  </ul>

                                  <h2 class="post-title">
                                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                  </h2>
                              </div>

                              <div class="post-meta">
                        <span class="byline">
                            <span class="author vcard">
                                <a class="url fn n author_name" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                    <?php the_author(); ?>
                                </a>
                            </span>
                        </span>

                                  <span class="post-date posted-on published">
                            <a href="<?php the_permalink(); ?>" rel="bookmark">
                                <time class="entry-date published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ' . __('ago'); ?>
                                </time>
                                <time class="updated" datetime="<?php echo esc_attr(get_the_modified_date('c')); ?>">
                                    <?php echo human_time_diff(get_the_modified_time('U'), current_time('timestamp')) . ' ' . __('ago'); ?>
                                </time>
                            </a>
                        </span>
                              </div>
                          </article>
                      <?php
                      endwhile;
                      wp_reset_postdata();
                  else : ?>
                      <p><?php esc_html_e('No popular news found.', 'yourtheme'); ?></p>
                  <?php endif; ?>
              </div>
          </div>

          <div class="main-banner-wrap">
            <div class="main-banner-slider slick-slider slick-dotted">
               <?php
               // Lấy 3 bài viết mới nhất
               $args = array(
                     'posts_per_page' => 3,
                     'post_status'    => 'publish'
               );
               $query = new WP_Query($args);

               if ($query->have_posts()) :
                     $i = 0;
                     while ($query->have_posts()) : $query->the_post();
                        $i++;
                        ?>
                        <article class="slide-item slick-slide <?php echo $i === 1 ? 'slick-current slick-active' : ''; ?>"
                           data-slick-index="<?php echo $i - 1; ?>"
                           role="tabpanel"
                           id="slick-slide<?php echo $i; ?>">

                           <figure class="post-thumb">
                                 <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php
                                    if (has_post_thumbnail()) {
                                       the_post_thumbnail('digital-newspaper-featured', [
                                             'class' => 'attachment-digital-newspaper-featured size-digital-newspaper-featured wp-post-image',
                                             'alt'   => get_the_title(),
                                             'title' => get_the_title()
                                       ]);
                                    }
                                    ?>
                                 </a>
                           </figure>

                           <div class="post-element">
                                 <div class="post-meta">
                                    <ul class="post-categories">
                                       <?php the_category(); ?>
                                    </ul>
                                    <span class="post-date posted-on published">
                                       <a href="<?php the_permalink(); ?>" rel="bookmark">
                                             <time class="entry-date published" datetime="<?php echo get_the_date('c'); ?>">
                                                <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                                             </time>
                                             <time class="updated" datetime="<?php echo get_the_modified_date('c'); ?>">
                                                <?php echo human_time_diff(get_the_modified_time('U'), current_time('timestamp')) . ' ago'; ?>
                                             </time>
                                       </a>
                                    </span>
                                 </div>

                                 <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                       <?php the_title(); ?>
                                    </a>
                                 </h2>

                                 <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                 </div>

                                 <div class="main-banner-related-posts-section-wrap">
                                    <ul class="related-posts-wrap">
                                       <?php
                                       // Gợi ý bài viết liên quan cùng category
                                       $related = get_posts(array(
                                             'category__in' => wp_get_post_categories(get_the_ID()),
                                             'numberposts'  => 3,
                                             'post__not_in' => array(get_the_ID())
                                       ));
                                       foreach ($related as $post) :
                                             setup_postdata($post); ?>
                                             <li class="post-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                             </li>
                                       <?php endforeach;
                                       wp_reset_postdata();
                                       ?>
                                    </ul>
                                 </div>
                           </div>
                        </article>
                     <?php
                     endwhile;
                     wp_reset_postdata();
               endif;
               ?>
            </div>
         </div>

        <div class="main-banner-grid-posts digital_newspaper_vertical_slider">
            <h2 class="section-title"><?php esc_html_e('Latest News', 'yourtheme'); ?></h2>

            <div class="grid-posts-wrap slick-slider slick-vertical" data-vertical="true">
               <?php
               // Query lấy 10 bài viết mới nhất
               $latest_posts = new WP_Query(array(
                     'posts_per_page' => 3,
                     'post_status'    => 'publish'
               ));

               if ($latest_posts->have_posts()) :
                     $i = 0;
                     while ($latest_posts->have_posts()) : $latest_posts->the_post();
                        $i++;
                        ?>
                        <article <?php post_class('post-item digital-newspaper-category-no-bk slick-slide'); ?>
                           data-slick-index="<?php echo $i; ?>"
                           aria-hidden="false"
                           style="width:220px;"
                           tabindex="0">

                           <figure class="post-thumb">
                                 <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    <?php
                                    if (has_post_thumbnail()) {
                                       the_post_thumbnail('medium', array(
                                             'alt'   => get_the_title(),
                                             'title' => get_the_title(),
                                       ));
                                    } else {
                                       echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/no-thumb.jpg') . '" alt="' . esc_attr(get_the_title()) . '">';
                                    }
                                    ?>
                                 </a>
                           </figure>

                           <div class="post-element">
                                 <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                       <?php the_title(); ?>
                                    </a>
                                 </h2>
                           </div>
                        </article>
                     <?php
                     endwhile;
                     wp_reset_postdata();
               else :
                     echo '<p>' . esc_html__('No latest news found.', 'yourtheme') . '</p>';
               endif;
               ?>
            </div>
         </div>

       </div>
   </div>
</section>
<div id="theme-content">
   <main id="primary" class="site-main width-boxed--layout">
      <div class="digital-newspaper-container">
         <div class="row">
            <div class="secondary-left-sidebar">
            </div>
            <div class="primary-content">
               <div class="news-list-wrap">
                  <?php if ( have_posts() ) : ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                           <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                              <div class="blaze_box_wrap">
                                    <figure class="post-thumb-wrap">
                                       <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                          <?php
                                          if ( has_post_thumbnail() ) {
                                                the_post_thumbnail('digital-newspaper-list', [
                                                   'class' => 'attachment-digital-newspaper-list size-digital-newspaper-list wp-post-image',
                                                   'alt' => get_the_title(),
                                                   'title' => get_the_title(),
                                                   'loading' => 'lazy'
                                                ]);
                                          }
                                          ?>
                                       </a>
                                       <ul class="post-categories">
                                          <?php
                                          $categories = get_the_category();
                                          if ( ! empty( $categories ) ) {
                                                foreach ( $categories as $category ) {
                                                   echo '<li class="cat-item cat-' . esc_attr($category->term_id) . '"><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" rel="category tag">' . esc_html( $category->name ) . '</a></li>';
                                                }
                                          }
                                          ?>
                                       </ul>
                                    </figure>
                                    <div class="post-element">
                                       <h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                                       <div class="post-meta">
                                          <span class="byline">
                                                <span class="author vcard">
                                                   <a class="url fn n author_name" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta('ID') ) ); ?>">
                                                      <?php the_author(); ?>
                                                   </a>
                                                </span>
                                          </span>
                                          <span class="post-date posted-on published">
                                                <a href="<?php the_permalink(); ?>" rel="bookmark">
                                                   <time class="entry-date published" datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
                                                   <time class="updated" datetime="<?php echo get_the_modified_date('c'); ?>"><?php echo get_the_modified_date(); ?></time>
                                                </a>
                                          </span>
                                          <span class="post-comment"><?php comments_number('0', '1', '%'); ?></span>
                                          <span class="read-time"><?php echo ceil(str_word_count(get_the_content()) / 200); ?> mins</span>
                                       </div>
                                       <div class="post-excerpt">
                                          <?php the_excerpt(); ?>
                                       </div>
                                       <a class="post-link-button" href="<?php the_permalink(); ?>">Read More<i class="fas fa-caret-right"></i></a>
                                    </div>
                              </div>
                           </article>
                        <?php endwhile; ?>
                  <?php else : ?>
                        <p>No posts found.</p>
                  <?php endif; ?>
               </div>

               <div class="pagination">
                  <?php
                  the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => '<i class="fas fa-chevron-left"></i>',
                        'next_text' => '<i class="fas fa-chevron-right"></i>',
                  ));
                  ?>
               </div>
            </div>
            <div class="secondary-sidebar">
               <aside id="secondary" class="widget-area">

                   <!-- Banner Ads 1 -->
                   <section id="digital_newspaper_banner_ads_widget-6" class="widget widget_digital_newspaper_banner_ads_widget">
                       <div class="digital-newspaper-advertisement-block">
                           <figure class="inner-ad-block">
                               <a href="<?php echo _opt('banner_1_link'); ?>" target="_blank">
                                   <img src="<?php echo _opt('banner_1_image'); ?>" alt="Meshy AI Reviews">
                               </a>
                           </figure>
                       </div>
                   </section>

                   <!-- Banner Ads 2 -->
                   <section id="digital_newspaper_banner_ads_widget-5" class="widget widget_digital_newspaper_banner_ads_widget">
                       <div class="digital-newspaper-advertisement-block">
                           <figure class="inner-ad-block">
                               <a href="<?php echo _opt('banner_2_link'); ?>" target="_blank">
                                   <img src="<?php echo _opt('banner_2_image'); ?>" alt="Firelies Review 2025">
                               </a>
                           </figure>
                       </div>
                   </section>

                   <!-- Trending News -->
                  <section id="digital_newspaper_posts_grid_widget-3" class="widget widget_digital_newspaper_posts_grid_widget">
                        <h2 class="widget-title"><span>Trending News</span></h2>
                        <div class="posts-wrap posts-grid-wrap feature-post-block layout-two">
                           <?php
                           $trending_posts = new WP_Query(array(
                              'posts_per_page' => 4,
                              'orderby' => 'date',
                              'order' => 'DESC'
                           ));
                           if ($trending_posts->have_posts()) :
                              while ($trending_posts->have_posts()) : $trending_posts->the_post(); ?>
                                    <div class="post-item format-standard digital-newspaper-category-no-bk">
                                       <div class="post_thumb_image post-thumb">
                                          <figure class="post-thumb">
                                                <a href="<?php the_permalink(); ?>">
                                                   <?php if (has_post_thumbnail()) : ?>
                                                      <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy">
                                                   <?php else : ?>
                                                      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-thumb.jpg" alt="No image" loading="lazy">
                                                   <?php endif; ?>
                                                </a>
                                          </figure>
                                       </div>
                                       <div class="post-content-wrap card__content">
                                          <div class="bmm-post-cats-wrap bmm-post-meta-item post-categories">
                                                <?php
                                                $categories = get_the_category();
                                                if (!empty($categories)) :
                                                   foreach ($categories as $category) : ?>
                                                      <h5 class="card__content-category cat-item">
                                                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                                                               <?php echo esc_html($category->name); ?>
                                                            </a>
                                                      </h5>
                                                   <?php endforeach;
                                                endif; ?>
                                          </div>
                                          <div class="digital-newspaper-post-title card__content-title post-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                          </div>
                                       </div>
                                    </div>
                           <?php
                              endwhile;
                              wp_reset_postdata();
                           endif;
                           ?>
                        </div>
                  </section>

                   <!-- Banner Ads 3 -->
                   <section id="digital_newspaper_banner_ads_widget-3" class="widget widget_digital_newspaper_banner_ads_widget">
                       <div class="digital-newspaper-advertisement-block">
                           <figure class="inner-ad-block">
                               <a href="<?php echo _opt('banner_3_link'); ?>" target="_blank">
                                   <img src="<?php echo _opt('banner_3_image'); ?>" alt="Autoshort AI Reviews">
                               </a>
                           </figure>
                       </div>
                   </section>

                   <!-- Banner Ads 4 -->
                   <section id="digital_newspaper_banner_ads_widget-4" class="widget widget_digital_newspaper_banner_ads_widget">
                       <div class="digital-newspaper-advertisement-block">
                           <?php if(_opt('banner_4_image') && _opt('banner_4_link')): ?>
                               <figure class="inner-ad-block">
                                   <a href="<?php echo _opt('banner_4_link'); ?>" target="_blank">
                                       <img src="<?php echo _opt('banner_4_image'); ?>" alt="Banner 4">
                                   </a>
                               </figure>
                           <?php endif; ?>
                       </div>
                   </section>

                   <!-- Banner Ads 5 -->
                   <section id="digital_newspaper_banner_ads_widget-7" class="widget widget_digital_newspaper_banner_ads_widget">
                       <div class="digital-newspaper-advertisement-block">
                           <figure class="inner-ad-block">
                               <a href="<?php echo _opt('banner_5_link'); ?>" target="_blank">
                                   <img src="<?php echo _opt('banner_5_image'); ?>" alt="Notion Reviews">
                               </a>
                           </figure>
                       </div>
                   </section>

                   <!-- Social Icons -->
                   <section id="digital_newspaper_social_icons_widget-3" class="widget widget_digital_newspaper_social_icons_widget">
                       <h2 class="widget-title"><span>Find Me On</span></h2>
                       <div class="social-block-widget global-color-icon">
                           <div class="social-icons">
                               <a class="social-icon" href="<?php echo _opt('social_facebook'); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                               <a class="social-icon" href="<?php echo _opt('social_instagram'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                               <a class="social-icon" href="<?php echo _opt('social_x'); ?>" target="_blank"><i class="fa-brands fa-x-twitter selected"></i></a>
                               <a class="social-icon" href="<?php echo _opt('social_youtube'); ?>" target="_blank"><i class="fab fa-youtube"></i></a>
                           </div>
                       </div>
                   </section>
                  <!-- Empty Banner -->
                  <section id="digital_newspaper_banner_ads_widget-8" class="widget widget_digital_newspaper_banner_ads_widget">
                        <div class="digital-newspaper-advertisement-block"></div>
                  </section>

                  <!-- Author Info -->
                  <section id="digital_newspaper_author_info_widget-3" class="widget widget_digital_newspaper_author_info_widget">
                        <h2 class="widget-title"><span>Author Info</span></h2>
                        <div class="post-card author-wrap layout-one">
                           <div class="bmm-author-thumb-wrap">
                              <figure class="post-thumb post-thumb">
                                    <?php $author_id = get_the_author_meta('ID'); ?>
                                    <a href="<?php echo get_author_posts_url($author_id); ?>">
                                       <?php echo get_avatar($author_id, 96); ?>
                                    </a>
                              </figure>
                           </div>
                           <div class="author-content-wrap">
                              <h2 class="author-name">
                                    <a href="<?php echo get_author_posts_url($author_id); ?>"><?php the_author(); ?></a>
                              </h2>
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
                  <!-- #secondary -->
            </div>
         </div>
      </div>
      <!-- digital-newspaper-container end -->
   </main>
   <!-- #main -->
</div>
<section id="bottom-full-width-section" class="digital-newspaper-section bottom-full-width-section width-boxed--layout">
    <div class="digital-newspaper-container">
        <div class="row">
            <div class="news-carousel layout--two">
                <h2 class="digital-newspaper-block-title"><span>You May Have Missed</span></h2>

                <div class="news-carousel-post-wrap">
                  <div class="carousel-slider">
                     <?php
                     $latest_posts = new WP_Query(array(
                           'posts_per_page' => 8,
                           'post_status'    => 'publish',
                           'orderby'        => 'date',
                           'order'          => 'DESC',
                     ));

                     if ($latest_posts->have_posts()) :
                           while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                              <article class="carousel-item">
                                 <figure class="post-thumb-wrap">
                                       <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                          <?php if (has_post_thumbnail()) : ?>
                                             <?php the_post_thumbnail('medium', ['class'=>'wp-post-image','alt'=>get_the_title()]); ?>
                                          <?php else : ?>
                                             <img src="<?php echo get_template_directory_uri(); ?>/assets/images/default-thumb.jpg" alt="No Image">
                                          <?php endif; ?>
                                          <div class="thumb-overlay"></div>
                                       </a>
                                       <div class="post-element">
                                          <ul class="post-categories">
                                             <?php
                                             $categories = get_the_category();
                                             if (!empty($categories)) :
                                                   foreach ($categories as $category) : ?>
                                                      <li class="cat-item cat-<?php echo $category->term_id; ?>">
                                                         <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" rel="category tag">
                                                               <?php echo esc_html($category->name); ?>
                                                         </a>
                                                      </li>
                                                   <?php endforeach;
                                             endif; ?>
                                          </ul>
                                          <div class="post-element-inner">
                                             <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                             <div class="post-meta">
                                                   <span class="byline"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a></span>
                                                   <span class="post-date"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></span>
                                             </div>
                                          </div>
                                       </div>
                                 </figure>
                              </article>
                           <?php endwhile;
                           wp_reset_postdata();
                     endif; ?>
                  </div>
               </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>