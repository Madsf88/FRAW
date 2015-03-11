<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php 
            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                the_post_thumbnail('large');
            } 
        ?>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <p><?php  the_field('date'); ?></p>
</article>
