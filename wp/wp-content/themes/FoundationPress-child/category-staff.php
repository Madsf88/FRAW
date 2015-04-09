<?php get_header(); ?>
<?php $pageid=113; ?>
<div class="<?php the_field('readability', $pageid); ?>">
    <div id="backgroundImage" data-bg-large="<?php $large = wp_get_attachment_image_src( get_post_thumbnail_id($pageid), "large", false ); echo $large[0]; ?>" data-bg-full="<?php $full = wp_get_attachment_image_src( get_post_thumbnail_id($pageid), "full", false ); echo $full[0]; ?>" style="background-position: <?php the_field('background_image_position_horizontal', $pageid); ?>% <?php the_field('background_image_position_vertical', $pageid); ?>%;"></div>
    <div class="icon menu header"></div>
    <a class="logo ituFilm header" href="../index.php">ITU.film</a>
    <div class="icon scrollDown header"></div>
    <div class="row">
        <div class="small-11 small-centered columns">
            <div id="title">
                <div class="heading">
                    <h1 class="heading__h1">
                        <?php echo get_the_title($pageid); ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 medium-8 small-centered columns removePadding aboutItufilm">
            <div class="panel">
                <p>
                    <?php $post = get_page($pageid); echo $post->post_content; ?>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-11 small-centered columns">
            <div id="titleSecondary">
                <div class="heading">
                    <h2 class="heading__h2"><?php the_field('secondary_title', $pageid); ?></h2>
                </div>
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="small-12 medium-8 small-centered columns removePadding crewList">
            <?php if ( have_posts() ) : ?>

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'content-staff', get_post_format() ); ?>
                <?php endwhile; ?>

                <?php else : ?>
                    <?php get_template_part( 'content-staff', 'none' ); ?>

            <?php endif; // end have_posts() check ?>
        </div>
    </div>
</div>
<div class="overlay"></div>
<?php get_footer(); ?>