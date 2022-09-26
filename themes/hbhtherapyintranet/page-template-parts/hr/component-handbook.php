<style>
    
.list-item {
width: 100%;
margin: 10px;
cursor:pointer;
/*background: grey;*/
}

.accordion-title {
display: flex;
justify-content: space-between;
}

.handbook-subtitle {
    color: #008587;
font-weight: 700;
margin: 0 10px;
}

.handbook-subtitle:hover {
color: #F7931E;
}

.is-accordion-open .handbook-subtitle {
color: #F7931E;
}

    .close-caret {
        display: none;
    }   
    
    .is-accordion-open .close-caret {
        display: block;
    } 
    
    .is-accordion-open .open-caret {
        display: none;
    } 
    
.list-hr {
margin-bottom: 10px;
}

.is-accordion-open {
background: #fff;
z-index: 100;
}

.accordion-content {
display: none;
}

</style>

<p class="clinician-subtitle">Employee Handbook</p>
<hr>

<h4>Welcome to HBH!</h4>

<p>We’re excited to have you on our team. You were hired because we believe you share our vision and can help us change mental health counseling and coaching for the better.

Thriveworks is committed to unparalleled clinical quality and client service. As part of the team, we hope you’ll discover that the pursuit of excellence is a rewarding aspect of your career with us. It’s our goal to recruit the best possible team members (like you) and then provide them opportunities for advancement and professional growth that will compel them to stay employed with us for life.
</p>

<p class="search">
    <input type="text" class="quicksearch" placeholder="Search..." />
    <img src="<?php the_field( 'search_icon', 'option' ); ?>" data-rjs="2" alt="search icon" />
</p>


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
    <div class="list">

        <?php

  // Run foreach over each term to setup query and display for posts
  foreach ($issue_terms as $issue_term) {
    $the_query = new WP_Query( array(
      'post_type' => 'handbook',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'name',
        'order' => 'ASC',
    ) ); 
      
      while($the_query->have_posts()) : $the_query->the_post(); ?>

        <div class="list-item" data-category="transition">
            
            <div class="accordion-title">
                <p class="handbook-subtitle"><?php the_title(); ?></p>
                <div class="handbook-subtitle open-caret">⌄</div>
                <div class="handbook-subtitle close-caret">⌃</div>
            </div>
            <hr class="list-hr">
            
            <div class="accordion-content"><p><?php the_field( 'section_content' ); ?></p></div>
            

        </div>

        <?php endwhile; } ?>

    </div>
</div>

<script>

//Isotopes ->Handbook Page
var buttonFilters = {};
var buttonFilter;
// quick search regex
var qsRegex;

// init Isotope    
var $grid = $('.list').isotope({
    // options
    itemSelector: '.list-item',
    layoutMode: 'vertical',
    filter: function () {
        var $this = $(this);
        var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
        var buttonResult = buttonFilter ? $this.is(buttonFilter) : true;
        return searchResult && buttonResult;
    },
});

// Accordian 
    
$grid.on( 'click', '.accordion-title', function( event ) {
  var $title = $( event.currentTarget );
  var $listItem = $title.parents('.list-item');
  var isOpen = $listItem.hasClass('is-accordion-open');
  // close other accordion
  $grid.find('.is-accordion-open').removeClass('is-accordion-open')
    .find('.accordion-content').slideUp( 'normal', layoutIsotope );
  if ( !isOpen ) {
    $listItem.addClass('is-accordion-open')
      .find('.accordion-content').slideDown( 'normal', layoutIsotope );
  }
});

function layoutIsotope() {
  $grid.isotope('layout');
}

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