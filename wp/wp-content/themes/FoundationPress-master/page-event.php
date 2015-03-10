<?php
/*
Template Name: Frontpage
*/
get_header(); ?>
<?php $cat_id = 4; //the certain category ID
    $latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));
    if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  ?>
    <div style="background: url(<?php the_field('background_image'); ?>); height:100vh; width: 100%; background-size: cover;  background-position: center; position: fixed; top: 0;">
    </div>
    <section class="container" role="document" style="">
        <div class="row">
            <div class="small-12 columns" style="text-align: center; margin-top: 150px "><h1 style="border: 6px solid white; color:white; padding: 22px; display: inline-block; text-align: center; margin: 0 auto; margin-bottom: 100px;" >
                <?php the_title(); ?></h1>
            </div>        
        </div>
        <div class="row">
            <div class="small-12 medium-8 large-8 small-centered columns" style="background: white; padding: 30px;">
             <link href="http://addtocalendar.com/atc/1.5/atc-style-blue.css" rel="stylesheet" type="text/css">
            <!-- 2. Include script -->
                <script type="text/javascript">(function () {
                        if (window.addtocalendar)if(typeof window.addtocalendar.start == "function")return;
                        if (window.ifaddtocalendar == undefined) { window.ifaddtocalendar = 1;
                            var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                            s.type = 'text/javascript';s.charset = 'UTF-8';s.async = true;
                            s.src = ('https:' == window.location.protocol ? 'https' : 'http')+'://addtocalendar.com/atc/1.5/atc.min.js';
                            var h = d[g]('body')[0];h.appendChild(s); }})();
                </script>

                <!-- 3. Place event data -->
                <span class="addtocalendar atc-style-icon atc-style-menu-wb">
                    <var class="atc_event">
                        <var class="atc_date_start">2015-05-04 12:00:00</var>
                        <var class="atc_date_end">2015-05-04 18:00:00</var>
                        <var class="atc_timezone">Europe/London</var>
                        <var class="atc_title">Star Wars Day Party</var>
                        <var class="atc_description">May the force be with you</var>
                        <var class="atc_location">Tatooine</var>
                        <var class="atc_organizer">Luke Skywalker</var>
                        <var class="atc_organizer_email">luke@starwars.com</var>
                    </var>
                </span>
            <?php the_content(); ?>
            </div>
        </div>
        <video autobuffer controls autoplay style="z-index: 999; position: relative; height: 100vh">
          <source id="mp4" src="<?php the_field('trailer_url'); ?>" type="video/mp4">
        </video>
    </section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>
