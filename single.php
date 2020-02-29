<?php get_header(); ?>
    <main class="container my-3">
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>

                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-6">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h2 class="card-title"><?= the_title(); ?></h2>
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                //Adding the navigation part
                get_template_part('template-parts/post', 'navigation');
                ?>

            <?php endwhile; ?>
        <?php endif; ?>


    </main>
<?php get_footer(); ?>