<?php echo '<div class="panel">
                <article class="category-events">
                    <a href="'. get_permalink().'">
                        <figure>'. get_the_post_thumbnail() .'</figure>
                        <h3>'. get_the_title() .'</h3>
                        <p>'.  get_field('date') .'</p>
                    </a>
                </article>
            </div>'; ?>