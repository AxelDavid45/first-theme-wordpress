<?php get_header(); ?>
    <main class="container my-3">
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <h1 class="my-3"><?= the_title(); ?></h1>
                <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </main>
<?php get_footer(); ?>