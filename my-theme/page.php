<?php get_header(); ?>

<div class="container">
    <div class="main-content">
        <main class="content">
            <?php while (have_posts()) : the_post(); ?>
                <article>
                    <h1><?php the_title(); ?></h1>
                    <div><?php the_content(); ?></div>
                </article>
            <?php endwhile; ?>
        </main>
    </div>
</div>

<?php get_footer(); ?>