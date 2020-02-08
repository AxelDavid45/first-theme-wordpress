<?php get_header(); ?>
    <main class="container my-3">
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <h1 class="my-3"><?= the_title(); ?></h1>
                <div class="row">
                    <div class="col-md-6">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                    <div class="col-md-4">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>


    </main>
<?php get_footer(); ?>