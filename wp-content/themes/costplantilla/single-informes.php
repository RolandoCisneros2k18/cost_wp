<?php get_header(); ?>

  <?php while(have_posts()): the_post(); ?>

      <div class="contenido-hero single-header informes">
        <div class="texto-hero">
          <?php // the_title('<h1>','</h1>'); ?>
        </div>
      </div>
      <a href="/cost_wp/index.php/informes/" class="no-text-transform">ANTERIOR</a>
    <div class="principal contenedor-pdf">
      <?php the_content(); ?>
    </div>
  <?php endwhile; ?>

<?php get_footer();?>
