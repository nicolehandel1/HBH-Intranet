<?php
$args = array(
    'meta_key' => 'last_name',
    'orderby' => 'meta_value',
    'order' => 'ASC'
);

$user_query = new WP_User_Query( $args ); ?> 

<div class="grid" style="display: flex; flex-wrap: wrap;">

<?php if ( ! empty( $user_query->results ) ) {
    foreach ( $user_query->results as $author ) {
        // Line below display the author data. 
        // Use print_r($author); to display the complete author object.
        ?>

    
        <div class="grid-item blog-grid-item" data-category="transition">

            <div class="blog-grid-item-wrap">
                


    <div class="hdshot-wrap" style="background-image: url('<?php the_field( 'headshot', $author ); ?>')"></div>
    <a class="author" href="<?php echo get_author_posts_url($author->ID); ?>" ><?php echo $author->display_name; ?></a>
    <p class="job-title"><?php the_field( 'job_title', $author); ?></p>
    <a class="user-email" href="mailto:<?php echo $author->user_email; ?>" ><?php echo $author->user_email; ?></a>

            </div>
    </div>

        
        <?php
    }
} 
?> </div>

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