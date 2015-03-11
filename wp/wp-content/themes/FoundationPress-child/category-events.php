<?php get_header(); ?>

<div id="backgroundImage" style="background-image: url(http://localhost:8888/wp/wp-content/uploads/2015/03/Interstellar-1024x665.jpg);">
    </div>
<div class="row">
    <div class="small-12 medium-8 large-8 small-centered columns">
        <div class="panel">
            <?php if ( have_posts() ) : ?>

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content-events', get_post_format() ); ?>
                <?php endwhile; ?>

                <?php else : ?>
                    <?php get_template_part( 'content-events', 'none' ); ?>

            <?php endif; // end have_posts() check ?>

        </div>
    </div>
</div>

<?php get_footer(); ?>




