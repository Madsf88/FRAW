<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */
?>

<article id="authorid<?php the_author_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
            <div class="small-6 columns">
                <?php 
                    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                        the_post_thumbnail('large');
                    } 
                ?>
            </div>
            <div class="small-6 columns">
                <h3><?php the_title(); ?></h3>
                <?php the_content(); ?>
                <p>Favorite Movies</p>
                <p><?php  the_field('1movie'); ?></p>
                <p><?php  the_field('2movie'); ?></p>
                <p><?php  the_field('3movie'); ?></p>
            </div>
        </div>
</article>
