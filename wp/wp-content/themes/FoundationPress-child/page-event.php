<?php
/*
Template Name: Frontpage
*/
get_header(); ?>
<?php $cat_id = 4; //the certain category ID
    $latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));
    if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();
?>

<?php get_template_part( 'post-template', get_post_format() ); ?>

<?php endwhile; endif; ?>

<?php get_footer(); ?>
