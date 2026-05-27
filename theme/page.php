<?php get_header(); ?>

<main class="page-content" id="main" tabindex="-1">
  <div class="container">
    <?php
    while ( have_posts() ) :
      the_post();
      the_content();
    endwhile;
    ?>
  </div>
</main>

<?php get_footer(); ?>
