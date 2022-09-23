<style>
    .clinician-card-name {
        hyphens: none
    }
    
    .cpage-btn {
       margin-top: 10px; 
        width: 100%;
    }
    
</style>
<?php /**
 * Setup query to show the ‘services’ post type with ‘8’ posts.
 * Output the title with an excerpt.
 */
  // Get your terms and put them into an array
  $issue_terms = get_terms([
    'taxonomy' => 'clinician-color',
    'hide_empty' => false,
  ]);?>

<div class="section-content">
    <div class="grid">

        <?php

  // Run foreach over each term to setup query and display for posts
  foreach ($issue_terms as $issue_term) {
    $the_query = new WP_Query( array(
      'post_type' => 'clinician',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'name',
        'order' => 'ASC',
      'tax_query' => array(
        array(
          'taxonomy' => 'clinician-color',
          'field' => 'slug',
          'terms' => array( $issue_term->slug ),
          'operator' => 'IN'
        )
      )
    ) ); 
      
      while($the_query->have_posts()) : $the_query->the_post(); ?>

        <div class="grid-item 
                    <?php $terms = wp_get_post_terms(get_the_id(), 'clinician-location');  foreach ($terms as $term) { echo $term->slug.' ';} ?>
                    <?php $terms = wp_get_post_terms(get_the_id(), 'clinician-services');  foreach ($terms as $term) { echo $term->slug.' ';} ?> 
                    <?php $terms = wp_get_post_terms(get_the_id(), 'clinician-insurance');  foreach ($terms as $term) { echo $term->slug.' ';} ?>" data-category="transition">

            <div class="clinician-card-container">
                <img src="<?php the_field( 'clinician-headshot' ); ?>" alt="<?php the_title( ); ?> Headshot" class="clinician-card-image">
                <div class="clinician-card-overlay">
                    <div class="clinician-card-info">
                        <a class="clinician-card-name" href="<?php the_permalink(); ?>"><?php the_title(); ?>,
                            <?php $license = wp_get_post_terms($post->ID, 'clinician-licensure');
      
                                if ($license) { $out = array(); foreach ($license as $license) {
                                    $out[] = '' .$license->name .'';
                                }
                                echo join( ', ',$out ); } ?>
                        </a>
                        <a class="clinician-card-link" href="<?php the_permalink(); ?>">View Full Bio →</a>
                        
                    </div>
                </div>
            </div>
            <a class="btn cpage-btn <?php $terms = wp_get_post_terms(get_the_id(), 'clinician-color');  foreach ($terms as $term) { echo $term->slug.' ';} ?>" href="<?php the_field( 'clinician-book_now_link' ); ?>" target="_blank">
                            <?php the_field( 'clinician_button_label', 'option' ); ?>
                        </a>
        </div>

        <?php endwhile; } ?>

    </div>
</div>

<script>
//Isotopes ->Clinicians Page
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

// store filter for each group
$('.filters').on('change', function (event) {
    var $select = $(event.target);
    // get group key
    var filterGroup = $select.attr('value-group');
    // set filter for group
    buttonFilters[filterGroup] = event.target.value;
    // combine filters
    buttonFilter = concatValues(buttonFilters);
    console.log(buttonFilter);
    // set filter for Isotope
    $grid.isotope();
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