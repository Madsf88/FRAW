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
            get_template_part( 'event_list-template', get_post_format() );
        } else {}
                
    ?>