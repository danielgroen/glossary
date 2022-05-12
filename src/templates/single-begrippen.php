<?php
get_header();
if (have_posts()) : while (have_posts()) : the_post();
    $fields = get_fields(get_the_ID());
?>

    <main role="main" id="post-<?php the_ID(); ?>">
      <?php
      $categories = wp_get_object_terms(get_the_ID(), 'category');
      ?>
      <?php if (!empty($categories)) : ?>
        <span class='category'><?php echo esc_html($categories[0]->name); ?> </span>
      <?php endif; ?>

      <h1 class="page_title"><?php the_title(); ?></h1>
    </main>
<?php endwhile;
endif; ?>

<!-- TODO:: blogitems en paginas moeten ook mee kunnen doen! -->
<!-- Get all begrippen by category -->
<ul>
  <?php

  $myposts = get_posts([
    'posts_per_page' => 5,
    'offset' => 1,
    'category' => 1
  ]);

  foreach ($myposts as $post) : setup_postdata($post); ?>
    <li>
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </li>
  <?php endforeach;
  wp_reset_postdata(); ?>


</ul>

<!-- end -->

<?php
get_footer();
