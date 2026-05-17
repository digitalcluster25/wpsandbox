<?php get_header(); ?>
<main>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="container section">
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
    </div>
  <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
