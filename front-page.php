<?php get_header(); ?>
    <main class="container my-3">
        <?php if (have_posts()): ?>
            <?php while (have_posts()): the_post(); ?>
                <h1 class="my-3"><?= the_title(); ?></h1>
                <?php the_content(); ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <div class="contenedor-productos my-3">
            <h2 class="text-center">PRODUCTOS RECIENTES</h2>
            <div class="row">
                <?php
                //Create the arguments for the wp_query object
                $args = array(
                    'post_type' => 'producto',
                    'post_per_page' => 4,
                    'order' => 'DESC',
                    'orderBy' => 'title'
                );
                //Create the object
                $productos = new WP_Query($args);
                ?>

                <?php if ($productos->have_posts()): ?>
                    <?php while ($productos->have_posts()): $productos->the_post(); ?>
                        <div class="col-md-4 my-3">
                            <div class="card">
                                <figure>
                                    <?php the_post_thumbnail('medium'); ?>
                                </figure>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h5 class="text-center my-2">
                                            <a class="text-dark" href="<?= the_permalink(); ?>">
                                                <?= the_title(); ?>
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>


    </main>
<?php get_footer(); ?>