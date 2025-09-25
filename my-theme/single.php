<?php get_header(); ?>
<div id="theme-content">
   <main id="primary" class="site-main width-full-width--layout">
      <div class="digital-newspaper-container">
         <div class="row">
            <div class="secondary-left-sidebar">
            </div>
           <div class="primary-content">
                <div class="digital-newspaper-breadcrumb-wrap">
                    <?php if ( function_exists('bcn_display') ) : ?>
                        <div role="navigation" aria-label="Breadcrumbs" class="breadcrumb-trail breadcrumbs" itemprop="breadcrumb">
                            <ul class="trail-items" itemscope itemtype="http://schema.org/BreadcrumbList">
                                <?php bcn_display_list(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="post-inner-wrapper">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemtype="https://schema.org/Article">

                            <div class="post-inner">
                                <header class="entry-header">
                                    <?php
                                    $categories = get_the_category();
                                    if ( $categories ) :
                                    ?>
                                        <ul class="post-categories">
                                            <?php foreach ( $categories as $category ) : ?>
                                                <li><a href="<?php echo esc_url( get_category_link($category->term_id) ); ?>" rel="category tag"><?php echo esc_html($category->name); ?></a></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>

                                    <h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>

                                    <div class="entry-meta">
                                        <span class="byline">
                                            <span class="author vcard">
                                                <a class="url fn n author_name" href="<?php echo esc_url( get_author_posts_url(get_the_author_meta('ID')) ); ?>">
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
                                        <span class="read-time">
                                            <?php
                                            // Example read time (optional)
                                            $words = str_word_count( strip_tags(get_the_content()) );
                                            $minutes = ceil($words / 200);
                                            echo $minutes . ' mins';
                                            ?>
                                        </span>
                                    </div>

                                    <?php if ( has_post_thumbnail() ) : ?>
                                        <div class="post-thumbnail">
                                            <?php the_post_thumbnail('post-thumbnail', ['class' => 'wp-post-image', 'decoding' => 'async']); ?>
                                        </div>
                                    <?php endif; ?>
                                </header>

                                <div itemprop="articleBody" class="entry-content">
                                    <?php the_content(); ?>
                                </div>

                                <footer class="entry-footer">
                                    <?php
                                    // Optional: tags
                                    the_tags('<ul class="post-tags"><li>','</li><li>','</li></ul>');
                                    ?>
                                </footer>

                                <nav class="navigation post-navigation" aria-label="Posts">
                                    <h2 class="screen-reader-text">Post navigation</h2>
                                    <div class="nav-links">
                                        <div class="nav-previous"><?php previous_post_link('%link', '<span class="nav-subtitle"><i class="fas fa-angle-double-left"></i>Previous:</span> <span class="nav-title">%title</span>'); ?></div>
                                        <div class="nav-next"><?php next_post_link('%link', '<span class="nav-subtitle">Next:</span> <span class="nav-title">%title</span>'); ?></div>
                                    </div>
                                </nav>

                                <div id="comments" class="comments-area">
                                    <?php
                                    if ( comments_open() || get_comments_number() ) :
                                        comments_template();
                                    endif;
                                    ?>
                                </div>

                            </div> <!-- .post-inner -->
                        </article>
                    <?php endwhile; ?>
                </div> <!-- .post-inner-wrapper -->
            </div> <!-- .primary-content -->

            <?php get_sidebar();?>
         </div>
      </div>
   </main>
   <!-- #main -->
</div>
<?php get_footer(); ?>