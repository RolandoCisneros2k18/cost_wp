<?php $recent = new WP_Query(array( 'pagename' => 'inicio-eventos' )); while($recent->have_posts()) : $recent->the_post(); ?>
<section class="eventos">
  <h2 class="text-center"><?php the_title(); ?></h2>

  <!--<div class="small-ruler"><div></div></div>-->

  <br /><br />

  <div class="events-list">
    <?php $i = 1; ?>
    <?php
     $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $query = new WP_Query( array(
        'category_name' => 'Eventos-Inicio',
        'paged' => $paged
    ) );
    while( $query->have_posts() ): $query->the_post();

     ?>
      <article class="entrada-eventos entrada-<?php echo $i; ?>">
          <div class="event-image">
            <div class="the-date bg-primary text-center">
              <span class="the-day"><?php echo the_time('d'); ?></span><br />
              <span class="the-month"><?php the_time('M.y'); ?></span>
            </div>

            <?php
              if ( has_post_thumbnail(get_the_ID()) )
              {
                the_post_thumbnail();
                echo "<div class='item-hover'></div>";
              }
              else
              {
                echo "<div class='no-pic'></div><div class='item-hover'></div>";
              }
            ?>
          </div>

          <header class="informacion-entrada clear">
            <div class="titulo-entrada">
              <?php the_title( '<p class="post-title"><b>', '</b></p>' ) ;?>

              <!--<p class="autor text-muted">
                <span class="fa fa-user" aria-hidden="true"></span>&nbsp;<span><!--<?php the_author(); ?></span>
              </p>-->
            </div>

            <div class="contenido-entrada text-justified">
              <?php echo excerpt(25); ?>
              <div class="read-more-link"><a class="text-primary event-permalink" href="<?php the_permalink(); ?>">Leer más...</a></div>
            </div>
          </header>
      </article>
      <?php $i++; ?>
    <?php endwhile; ?>
  </div>

  <br />

  <div class="text-center events-pagination">
    <?php
      echo paginate_links(array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $query->max_num_pages,
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text' => sprintf( '<span>%1$s</span>', __( '<', 'text-domain' ) ),
            'next_text' => sprintf( '<span>%1$s</span>', __( '>', 'text-domain' ) ),
            'add_args'     => false,
           'add_fragment' => '',
      ));
    ?>
  </div>
</section>
<?php endwhile; ?>