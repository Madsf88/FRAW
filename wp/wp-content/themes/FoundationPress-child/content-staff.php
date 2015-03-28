<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */
?>
<div class="panel">
<article id="authorid<?php the_author_ID(); ?>" <?php post_class(); ?>>
    <div class="row"  data-equalizer>
        <div class="small-12 medium-12 large-6 columns portrait" data-equalizer-watch>
            <div style="background-image: url(<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "large", false )[0]; ?>);"></div>
        </div>
        <div class="small-12 medium-12 large-6 columns text" data-equalizer-watch>
            <h3><?php the_title(); ?></h3>
            <?php the_content(); ?>
            <dl>
                <dt>Favorite Movie:</dt>
                <dd><?php  the_field('favorite_movie'); ?></dd>
            </dl>
            <dl>
                <dt>Recommendations:</dt>
                <dd><?php  the_field('recommendation1'); ?></dd>
                <dd><?php  the_field('recommendation2'); ?></dd>
                <dd><?php  the_field('recommendation3'); ?></dd>
            </dl>
            <a href="#" data-options="align: top" data-dropdown="<?php the_title(); ?>"  class="reviewAnchor icon comments"></span>Reviews</a>
            <ul id="<?php the_title(); ?>" class="f-dropdown" data-dropdown-content>
                <?php
                    $var = 'category=4&author=';
                    $var2 = $post->post_author;
                    $var3= $var.$var2;
                    $lastposts = get_posts($var3);
                    foreach($lastposts as $post) :
                    setup_postdata($post); ?>

                    <li<?php if ( $post->ID == $wp_query->post->ID ) { echo ' class="current"'; } else {} ?>>

                        <a href="<?php the_permalink() ?>"><?php the_title(); ?></a>

                    </li>

                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</article>
</div>