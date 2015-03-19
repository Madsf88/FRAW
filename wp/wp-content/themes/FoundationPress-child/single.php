<?php
/*
Template Name: Frontpage
*/
get_header(); ?>
<?php while (have_posts()) : the_post(); ?>

<?php get_template_part( 'post-template', get_post_format() ); ?>

<?php endwhile;?>

<?php get_footer(); ?>
