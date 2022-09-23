<?php

$args = array( 
	'post_type'   => 'post',
	'post_status' => 'publish',
    'posts_per_pag' => '-1',
    'orderby' => 'date',
    'order' => 'DESC',
);
$posts = new WP_Query( $args );

?>

<div class="section-content hero-wrap">
    <h1 class="pg-title"><?php the_field( 'page_title' ); ?></h1>
</div>

<div class="section-content blogpg-section-content">
    <div class="filters-content">
        <div class="filter-wrap">
            <div class="filters">

                <p class="search">
                    <input type="text" class="quicksearch" placeholder="Search..." />
                    <img src="<?php the_field( 'search_icon', 'option' ); ?>" data-rjs="2" alt="search icon" />
                </p>

            </div>
        </div>
    </div>
</div>

<div class="section-content">
    <div class="grid">

        <?php if ( $posts->have_posts() ) :  while( $posts->have_posts() ) : $posts->the_post() ;
            $imageID = get_field('blog_header_image');
            $image = wp_get_attachment_image_src( $imageID, 'full' ); 
            $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
            $date = get_the_date('F j, Y', $post->ID);
            ?>

        <div class="grid-item blog-grid-item" data-category="transition">

            <div class="blog-grid-item-wrap">

                <a class="" href="<?php the_permalink(); ?>">

                    <img class="clinician-single-headshot" src="<?php echo $image[0]; ?>" data-rjs="2" alt="<?php echo $alt_text; ?>" />

                    <h3><?php the_title() ?></h3>

                    <?php if ( have_rows( 'blog_author' ) ): ?>
                    <?php while ( have_rows( 'blog_author' ) ) : the_row(); ?>
                    <?php if ( get_row_layout() == 'clinician' ) : ?>
                    <?php $blog_authot_clincician = get_sub_field( 'blog_authot_clincician' ); ?>
                    <?php if ( $blog_authot_clincician ) : ?>
                    <?php $post = $blog_authot_clincician; ?>
                    <?php setup_postdata( $post ); ?>

                    <p class="blog-author"><?php the_title( ); ?>,
                        <?php $license = wp_get_post_terms($post->ID, 'clinician-licensure'); if ($license) { $out = array(); foreach ($license as $license) {
                                        $out[] = '' .$license->name .'';
                                    }
                                    echo join( ', ',$out ); } ?></p>

                    <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                    <?php elseif ( get_row_layout() == 'other' ) : ?>
                    <?php $blog_author_other = get_sub_field( 'blog_author_other' ); ?>
                    <?php if ( $blog_author_other ) : ?>
                    <?php $post = $blog_author_other; ?>
                    <?php setup_postdata( $post ); ?>

                    <p class="blog-author"><?php the_title(); ?></p>
                    <?php wp_reset_postdata(); ?>

                    <?php endif; ?>
                    <?php endif; ?>
                    <?php endwhile; ?>
                    <?php else: ?>
                    <?php // No layouts found ?>
                    <?php endif; ?>

                    <p class="blog-date"><?php echo $date; ?></p>

                </a>
            </div>

        </div>

        <?php endwhile; ?>

        <?php endif; ?>

    </div>
</div>

<script>
//Isotopes ->Blog Page
var buttonFilters = {};
var buttonFilter;
// quick search regex
var qsRegex;

// init Isotope    
var $grid = $('.grid').isotope({
    // options
    itemSelector: '.grid-item',
    layoutMode: 'fitRows',
    filter: function () {
        var $this = $(this);
        var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
        var buttonResult = buttonFilter ? $this.is(buttonFilter) : true;
        return searchResult && buttonResult;
    },
});

// layout Isotope after each image loads
$grid.imagesLoaded().progress( function() {
  $grid.isotope('layout');
});

// flatten object by concatting values
function concatValues(obj) {
    var value = '';
    for (var prop in obj) {
        value += obj[prop];
    }
    return value;
}

var $quicksearch = $('.quicksearch').keyup(debounce(function () {
    qsRegex = new RegExp($quicksearch.val(), 'gi');
    console.log(qsRegex);
    $grid.isotope();
}));

// flatten object by concatting values
function concatValues(obj) {
    var value = '';
    for (var prop in obj) {
        value += obj[prop];
    }
    console.log(value);
    return value;
}

// debounce so filtering doesn't happen every millisecond
function debounce(fn, threshold) {
    var timeout;
    threshold = threshold || 100;
    return function debounced() {
        clearTimeout(timeout);
        var args = arguments;
        var _this = this;

        function delayed() {
            fn.apply(_this, args);
        }
        timeout = setTimeout(delayed, threshold);
    };
}
</script>