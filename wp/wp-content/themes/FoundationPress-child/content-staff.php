<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */
?>

<article id="authorid<?php the_author_ID(); ?>" <?php post_class(); ?>>
        <div class="row"  data-equalizer>
            <div class="small-12 medium-6 columns" data-equalizer-watch>
                <?php 
                    if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                        the_post_thumbnail('large');
                    } 
                ?>
            </div>
            <div class="small-12 medium-6 columns" style="padding-bottom: 40px;" data-equalizer-watch>
                <h3><?php the_title(); ?></h3>
                <?php the_content(); ?>
                <dl>
                    <dt>Favorite Movies:</dt>
                    <dd><?php  the_field('1movie'); ?></dd>
                    <dd><?php  the_field('2movie'); ?></dd>
                    <dd><?php  the_field('3movie'); ?></dd>
                </dl>
                <a class="reviewAnchor">Reviews</a>
            </div>
        </div>
</article>
