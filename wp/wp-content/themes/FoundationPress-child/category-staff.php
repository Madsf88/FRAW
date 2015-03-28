<?php get_header(); ?>
<div class="interfaceWhite <?php the_field('readability'); ?>"> <!-- interfaceWhite is hardcoded right now. Should be changed -->
    <div id="backgroundImage" style="background-image: url(http://localhost:8888/wp/wp-content/uploads/2015/03/moonrisekingdom3.jpg);"></div>
    <div class="icon menu header"></div>
    <a class="logo ituFilm header" href="../index.php">ITU.film</a>
    <div class="row">
        <div class="large-12 columns">
            <div id="title">
                <div class="heading">
                    <h1 class="heading__h1">
                        <?php $category = get_the_category(); echo $category[0]->cat_name; ?>
                    </h1>
                </div>
            </div>
        </div>        
    </div>

    <div class="row">
        <div class="small-12 medium-8 large-8 small-centered columns removePadding aboutItufilm">
            <div class="panel">
                <p>
                    <?php $id=113; $post = get_page($id); echo $post->post_content; ?>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <div id="titleSecondary">
                <div class="heading">
                    <h2 class="heading__h2">Crew</h2>
                </div>
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="small-12 medium-8 large-8 small-centered columns removePadding crewList">
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