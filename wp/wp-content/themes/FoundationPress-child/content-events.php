<?php
/**
 * The default template for displaying content. Used for both single and index/archive/search.
 *
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */
?>


    
    <?php
        $eventdate = get_field('calendar_data');
        $date = new DateTime($eventdate);
        $now = new DateTime();
        if($date < $now) {
        }else 
            echo '<article class="category-events"><a href="'. get_permalink().'">
                <div>
                    '. get_the_post_thumbnail($post_id, 'large') .'
                    <h3>'. get_the_title() .'</h3>
                    <p>'.  get_field('date') .'</p>
                </div>

               </a></article>';
    ?>
    
    
</article>