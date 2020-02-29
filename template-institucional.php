<?php
//Template Name: Pagina Institucional
get_header();
//Get the custom fields from Advanced custom fields plugin
$fields = get_fields();
?>
<main class="container">
    <?php if (have_posts()): ?>
        <?php while (have_posts()): ?>
            <?php the_post(); ?>
            <h1 class="my-3"><?= $fields['titulo']?></h1>
            <img src="<?= $fields['imagen'] ?>" alt="">
            <?php the_content(); ?>
        <?php endwhile; ?>

    <?php endif; ?>


</main>
<?php get_footer(); ?>

