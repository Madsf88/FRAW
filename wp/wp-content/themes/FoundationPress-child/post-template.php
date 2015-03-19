<div id="backgroundImage" class="<?php the_field('readability'); ?>" data-bg-large="<?php echo wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), "large", false )[0]; ?>" data-bg-full="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>" style="background-position: <?php the_field('background_image_position_horizontal'); ?>% <?php the_field('background_image_position_vertical'); ?>%;">
    <div class="icon menu header"></div>
    <a class="logo ituFilm header" href="../index.php">ITU.film</a>
    <div class="icon trailer header"></div>    
    <div class="icon scrollDown header"></div>
    <div class="row">
        <div class="large-12 columns">
            <div id="title" class="fullHeight">
                <div class="heading">
                    <h1 class="heading__h1"><?php the_title(); ?></h1>
                    <p class="heading__p"><?php the_field('date'); ?> at <?php  the_field('start_time'); ?> in <?php  the_field('location'); ?></p>
                </div>
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="small-12 medium-6 large-5 columns small-centered movieInfo removePadding">
            <div class="panel">                
                 <script type="text/javascript"> 
                    ( function( $ ) {
                        var imdbURL = "<?php the_field('imdb_url'); ?>";
                        var imdbURL = imdbURL.replace('http://','').replace('www.imdb.com/title/','').replace(imdbURL.substr(imdbURL.lastIndexOf('/')), '');
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
                            var duration = duration.replace(' min','');
                            var timePrase = addMinutes(startTime, duration);
                            $('#duration').text(startTime+" - "+timePrase);
                            var htmlString = $( ".atc_date_start" ).html();                            
                            var firstPart = htmlString.substring(0, htmlString.length-8);
                            var Full = firstPart+timePrase+":00";
                            $( ".atc_date_end" ).html(Full);

                        }); 
                        function addMinutes(time, minsToAdd) {
                          function D(J){ return (J<10? '0':'') + J};

                          var piece = time.split(':');

                          var mins = piece[0]*60 + +piece[1] + +minsToAdd;

                          return D(mins%(24*60)/60 | 0) + ':' + D(mins%60);  
                        }  

                    } )( jQuery );
                </script>
                <?php
                    if(get_field('imdb_url'))
                    {
                        echo '<dl>
                            <dt>Director: </dt>
                            <dd id="director"></dd>
                            <dt>Running Time: </dt>
                            <dd id="duration"></dd>
                            <dt>IMDb rating: </dt>
                            <dd id="rating" class="icon star"></dd>
                            <dt>Year: </dt>
                            <dd id="year"></dd>
                        </dl>';
                    }
                ?>
               
                <ul>
                    <li class="icons">
                        <script type="text/javascript">(function () {
                                if (window.addtocalendar)if(typeof window.addtocalendar.start == "function")return;
                                if (window.ifaddtocalendar == undefined) { window.ifaddtocalendar = 1;
                                    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                                    s.type = 'text/javascript';s.charset = 'UTF-8';s.async = true;
                                    s.src = ('https:' == window.location.protocol ? 'https' : 'http')+'://addtocalendar.com/atc/1.5/atc.min.js';
                                    var h = d[g]('body')[0];h.appendChild(s); }})();
                        </script>
                        <span class="addtocalendar atc-style-menu-wb">
                            <var class="atc_event">
                                <var class="atc_date_start"><?php the_field('calendar_data'); ?> <?php  the_field('start_time'); ?>:00</var>
                                <var class="atc_date_end"><?php the_field('calendar_data'); ?> <?php  the_field('start_time'); ?>:00</var>
                                <var class="atc_timezone">Europe/Copenhagen</var>
                                <var class="atc_title">ITU.film: <?php the_title(); ?></var>
                                <var class="atc_description">Movie screening</var>
                                <var class="atc_location"><?php  the_field('location'); ?></var>
                                <var class="atc_organizer">ITU.film</var>
                                <var class="atc_organizer_email">film@itu.dk</var>
                            </var>
                            <a class="atcb-link" id="" tabindex="1"><span class="icon cal"></span></a>
                        </span>
                    </li>
                    <li class="icons">
                        <a href="<?php the_field('facebook_event_link'); ?>" target="_blank"><span class="icon facebook"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 medium-8 large-8 small-centered columns review removePadding">
            <div class="panel">
                <h1 class="review__h1"><?php the_field('review_title'); ?></h1>
                <?php the_content(); ?>
                <p class="author">
                    This review was brought to you by <a href="../wp/archives/category/staff#authorid<?php the_author_ID(); ?>"><?php the_author(); ?></a>
                </p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="small-12 medium-8 large-8 small-centered columns trailerWrapper removePadding">
            <?php
                if(get_field('trailer_url'))
                {
                    echo '<div class="trailerContainer flex-video" id="popupVid" data-url="' . get_field('trailer_url') . '"></div>';
                }

            ?>
        </div>
    </div>
</div>