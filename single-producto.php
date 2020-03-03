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
                                <div class="col">
                                    <h4>Envianos tus dudas</h4>
                                    <?= do_shortcode('[contact-form-7 id="56" title="Formulario
                                    de contacto"]')?>
                                </div> 
                                <button class="btn btn-warning">
                                    <i class="fas fa-cash-register"></i>
                                    Comprar
                                </button>
                                <button class="btn btn-primary">
                                    <i class="fas fa-shopping-cart"></i>
                                    Agregar al carrito
                                </button>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <h3>Productos Relacionados:</h3>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <?php
                        // Getting the taxonomies terms
                        $taxonomy = get_the_terms(get_the_ID(), 'categoria-productos');
                        //Array only with slugs
                        $taxonomyTerms = array();
                        // Creating an array only with the slugs
                        foreach ($taxonomy as $t):
                            array_push($taxonomyTerms, $t->slug);
                        endforeach;

                        //Creating the arguments for custom loop
                        $args = array(
                            'post_type' => 'producto',
                            'posts_per_page' => 3,
                            'order' => 'DESC',
                            'orderBy' => 'title',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'categoria-productos',
                                    'field' => 'slug',
                                    'terms' => $taxonomyTerms
                                )
                            )
                        );
                        //Create the object
                        $producto = new WP_Query($args);
                        ?>
                        <?php if ($producto->have_posts()):
                            while ($producto->have_posts()):
                                $producto->the_post(); ?>
                                <div class="col-md-2  text-center">
                                    <a href="<?php the_permalink(); ?>">
                                        <picture>
                                            <?php the_post_thumbnail('thumbnail'); ?>
                                        </picture>
                                        <h5><?php the_title(); ?></h5>
                                    </a>
                                </div>

                            <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                    <?php
                    //Adding the navigation part
                    get_template_part('template-parts/post', 'navigation');
                    ?>
                </div>


            <?php endwhile; ?>
        <?php endif; ?>


    </main>
<?php get_footer(); ?>