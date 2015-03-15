<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php
        $eventdate = get_field('calendar_data');
        $date = new DateTime($eventdate);
        $now = new DateTime();
        if($date < $now) {
        }else 
            echo '<a href="'. get_permalink().'">
                <div>
                    '. the_post_thumbnail('large') .'
                    <h3>'. get_the_title() .'</h3>
                    <p>'.  get_field('date') .'</p>
                </div>

               </a>';
    ?>
    
    
</article>