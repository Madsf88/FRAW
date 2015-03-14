<?php get_header(); ?>
<div id="backgroundImage" style="background-image: url(http://filmgarb.com/wp-content/uploads/film-napoleon_dynamite-2004-napoleon_dynamite-jonheder-tshirts-ricks_college_tshirt.jpg);">
    <div class="row">
        <div class="large-12 columns">
            <div id="title">
                <div class="heading">
                    <h1 class="heading__h1">
                    <?php
                        $category = get_the_category(); 
                        echo $category[0]->cat_name;
                    ?>
                    </h1>
                </div>
            </div>
        </div>        
    </div>

    <div class="row">
        <div class="small-12 medium-8 large-8 small-centered columns removePadding">
            <div class="panel">
                <?php $id=113; $post = get_page($id); echo $post->post_content;  ?>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-12 columns">
            <div id="title">
                <div class="heading">
                    <h2 class="heading__h2">
                    Crew
                    </h2>
                </div>
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="small-12 medium-8 large-8 small-centered columns removePadding">
            <div class="panel">
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
</div>

<?php get_footer(); ?>