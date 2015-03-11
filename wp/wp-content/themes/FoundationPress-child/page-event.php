<?php
/*
Template Name: Frontpage
*/
get_header(); ?>
<?php $cat_id = 4; //the certain category ID
    $latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)));
    if( $latest_cat_post->have_posts() ) : while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();  ?>
    <div style="background: url(<?php the_field('background_image'); ?>); height:100vh; width: 100%; background-size: cover; z-index:-1; background-position: center; position: fixed; top: 0;">
    </div>
    <!--<section class="container" role="document">-->
        <div class="row">
            <div class="large-12 columns">
                <div class="trailerIcon"></div>
                <div class="scrollDown"></div>
                <div class="heading">
                    <h1 class="heading__h1"><?php the_title(); ?></h1>
                    <h2 class="heading__h2"><?php  the_field('date'); ?> at <?php  the_field('start_time'); ?> in <?php  the_field('location'); ?></h2>
                </div>
            </div>        
        </div>
        <div class="row">
            <div class="small-12 medium-7 large-6 columns small-centered movieInfo">
                <div class="panel">
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
                     <script type="text/javascript"> 
                        ( function( $ ) {
                            var imdbURL = "<?php  the_field('imdb_url'); ?>";
                            var imdbURL = imdbURL.replace('www.imdb.com/title/','')
                            var imdbURL = imdbURL.replace(imdbURL.substr(imdbURL.lastIndexOf('/')), '');
                            var imdbAPI = "http://www.omdbapi.com/?i="+imdbURL+"&plot=full&r=json";
                            $.getJSON(imdbAPI, function (json) {
                                var rating = json.imdbRating;
                                $('#rating').text(rating);

                                var director = json.Director;
                                $('#director').text(director);

                                var year = json.Year;
                                $('#year').text(year);

                                var startTime = ("<?php  the_field('start_time'); ?>");
                                var duration = json.Runtime;
                                $('#duration').text(duration);
                            }); 
                        } )( jQuery );
                    </script>
                    <dl>
                        <dt>Director: </dt>
                        <dd id="director">test testest</dd>
                        <dt>Running Time: </dt>
                        <dd id="duration">12pm - 14pm</dd>
                        <dt>IMDb rating: </dt>
                        <dd id="rating">1.2</dd>
                        <dt>Year: </dt>
                        <dd id="year">1234</dd>
                    </dl>
                    <ul>
                        <li class="icons">
                            <a href="http://calendar.com" target="_blank"></a>
                            <a href="http://facebook.com" target="_blank"></a>
                        </li>
                    </ul>

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
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="small-12 medium-8 large-8 small-centered columns review">
                <div class="panel">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>

        <!--<video autobuffer controls autoplay style="z-index: 999; position: relative; height: 100vh">
          <source id="mp4" src="<?php the_field('trailer_url'); ?>" type="video/mp4">
        </video>-->
    <!--</section>-->
<?php endwhile; endif; ?>

<?php get_footer(); ?>
