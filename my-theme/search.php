<?php
/**
 * Template for displaying Search Results pages
 *
 * @package YourTheme
 */

get_header(); ?>

<div id="theme-content">
    <main id="primary" class="site-main width-boxed--layout">
        <div class="digital-newspaper-container">
            <div class="row">
                <div class="secondary-left-sidebar">
                </div>
                <div class="primary-content">
                    <div class="news-list layout--two">

                        <!-- Breadcrumb -->
                        <div class="digital-newspaper-breadcrumb-wrap">
                            <?php if ( function_exists('bcn_display') ) : ?>
                                <div class="breadcrumb-trail breadcrumbs">
                                    <?php bcn_display(); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Page Header -->
                        <header class="page-header">
                            <h1 class="page-title digital-newspaper-block-title">
                                <?php printf( esc_html__( 'Search Results for: %s', 'yourtheme' ), '<span>' . get_search_query() . '</span>' ); ?>
                            </h1>
                        </header>

                        <!-- Posts Loop -->
                        <div class="post-inner-wrapper">
                            <div class="news-list-post-wrap column--one">
                                <?php if ( have_posts() ) : ?>
                                    <?php while ( have_posts() ) : the_post(); ?>
                                        <article id="post-<?php the_ID(); ?>" <?php post_class('list-item'); ?>>
                                            <div class="blaze_box_wrap">
                                                <figure class="post-thumb-wrap">
                                                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                        <?php the_post_thumbnail('digital-newspaper-list'); ?>
                                                    </a>
                                                    <?php the_category(); ?>
                                                </figure>
                                                <div class="post-element">
                                                    <h2 class="post-title">
                                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </h2>
                                                    <div class="post-meta">
                                                        <span class="post-author"><?php the_author(); ?></span>
                                                        <span class="post-date"><?php the_time( get_option('date_format') ); ?></span>
                                                        <span class="post-comment"><?php comments_number('0', '1', '%'); ?></span>
                                                    </div>
                                                    <div class="post-excerpt">
                                                        <?php the_excerpt(); ?>
                                                    </div>
                                                    <a class="post-link-button" href="<?php the_permalink(); ?>">
                                                        <?php esc_html_e('Read More', 'yourtheme'); ?>
                                                        <i class="fas fa-caret-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </article>
                                    <?php endwhile; ?>

                                    <!-- Pagination -->
                                    <div class="pagination">
                                        <?php the_posts_pagination(); ?>
                                    </div>

                                <?php else : ?>
                                    <p><?php esc_html_e( 'No results found.', 'yourtheme' ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </main>
</div>

<?php get_footer(); ?>
