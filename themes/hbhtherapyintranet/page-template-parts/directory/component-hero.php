<?php
$args = array(
    'meta_key' => 'last_name',
    'orderby' => 'meta_value',
    'order' => 'ASC'
);

$user_query = new WP_User_Query( $args ); ?> 

<div style="display: flex; flex-wrap: wrap;">

<?php if ( ! empty( $user_query->results ) ) {
    foreach ( $user_query->results as $author ) {
        // Line below display the author data. 
        // Use print_r($author); to display the complete author object.
        ?>

    
        <div class="grid-item blog-grid-item" data-category="transition">

            <div class="blog-grid-item-wrap">
                <a href="<?php echo get_author_posts_url($author->ID); ?>" class="author" style="width: 25%; margin: 10px;">
            <img class="rsp-img" src="<?php the_field( 'headshot', $author ); ?>" />
                <p><?php echo $author->display_name; ?></p>
            <p><?php the_field( 'job_title', $author); ?></p>
        </a>
            </div>
    </div>

        
        <?php
    }
} 
?> </div>