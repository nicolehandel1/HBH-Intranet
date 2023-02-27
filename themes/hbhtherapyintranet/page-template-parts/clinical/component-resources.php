<style>
.employee-grid-item {
    width: 25%;
    margin: 3%;
}    
.hb-sbt{
     color: #4D4D4D;   
    }
.hb-cat {
    display: inline;
    max-height: 50px;
    background: #fff;
    color: #76559A;
    border: solid 1px #76559A;
    font-weight: 400;
    font-size: 14px;
    line-height: 18px;
    padding: 4px 7px 2px 7px;
    margin: 0 10px;
    border-radius: 4px;
}
    
    .hb-cat:hover {
    color: #76559A;
    margin: 0 15px;
        box-shadow: -1px 2px 5px -2px #008587;
    -webkit-box-shadow: -1px 2px 5px -2px #008587;
    -moz-box-shadow: -1px 2px 5px -2px #008587;
        transition: ease .5s;
    }  
    
</style>

<?php 
// Updates
?>

<p class="clinician-subtitle" style="color: #76559A;">Clinical Updates <a class="hb-cat" href="/news">Staff Meeting Archives →</a></p>
<hr>
<div>
    <?php if ( have_rows( 'hr_article' ) ) :  while ( have_rows( 'hr_article' ) ) : the_row(); 
		 $article = get_sub_field( 'article' ); if ( $article ) : 
			 $post = $article; 
			 setup_postdata( $post ); ?>

    <div class="article-grid" data-category="transition">
        <div class="article-grid-item-wrap">

            <a href="<?php the_permalink(); ?>">
                <h4 class="news-title"><?php the_title() ?></h4>
            </a>
            <p class="news-date"><?php echo get_the_date( 'F j, Y' ); ?></p>
            <p class=""><?php the_field( 'single_excerpt_summary' ); ?> <a class="read-more" href="<?php the_permalink(); ?>">[READ MORE]</a></p>

        </div>
    </div>

    <?php wp_reset_postdata();  endif;  endwhile;  else : ?>
    <p>You are all up-to-date!</p>
    <?php endif; ?>

</div>

<?php 
// Team
?>

<p class="clinician-subtitle" style="margin-top: 50px;"><?php the_field( 'team_section_title' ); ?></p>
<hr>

<div class="" style="display: flex; flex-wrap: wrap;">

    <?php if ( have_rows( 'team_member' ) ) : ?>
    <?php while ( have_rows( 'team_member' ) ) : the_row(); ?>
    <?php $employee = get_sub_field( 'employee' ); ?>
    <?php if ( $employee ) : ?>
    
    <div class="employee-grid-item">
        <div class="hdshot-wrap" style="background-image: url('<?php the_field( 'headshot', $employee ); ?>')"></div>
        <a class="author" href="<?php echo get_author_posts_url($employee->ID); ?>"><?php echo $employee->display_name; ?></a>
        <p class="job-title"><?php the_field( 'job_title', $employee); ?></p>
        <a class="user-email" href=""><?php echo $employee->user_email; ?></a>
    </div>
    
    <?php endif; ?>
    <?php endwhile; ?>
    <?php else : ?>
    <?php // No rows found ?>
    <?php endif; ?>
</div>

<?php 
// Clinical Resources
?>

<p class="clinician-subtitle" style="margin-top: 50px;"><?php the_field( 'handebook_section_title' ); ?></p>
<hr>

<?php if ( have_rows( 'opening_section' ) ) : while ( have_rows( 'opening_section' ) ) : the_row(); ?>
    <h4><?php the_sub_field( 'subheading' ); ?></h4>
    <p><?php the_sub_field( 'content' ); ?></p>
<?php endwhile; endif; ?>

<p class="search">
    <input type="text" class="quicksearch" placeholder="Search..." />
    <img src="<?php the_field( 'search_icon', 'option' ); ?>" data-rjs="2" alt="search icon" />
</p>

<div class="section-content">
    <div class="list">

<?php 
  $args = array(  
        'post_type' => 'clinical',
        'post_status' => 'publish',
    );
        $loop = new WP_Query( $args ); 
        
    while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <div class="list-item" data-category="transition">
            
            <div class="accordion-title">

                <div style="display: flex;">
                    <?php $terms = wp_get_post_terms(get_the_id(), 'resource-category'); foreach ($terms as $term) if( has_term('', 'resource-category' ) ): ?><p class="hb-cat"><?php { echo $term->name.' ';} ?></p><?php  endif; ?>
                    <p class="handbook-subtitle hb-sbt"><?php the_title(); ?></p>
                
                </div>
                <div class="handbook-subtitle open-caret">⌄</div>
                <div class="handbook-subtitle close-caret">⌃</div>
            </div>
            <hr class="list-hr">
            
            <div class="accordion-content">
                <a href="<?php echo get_permalink(); ?>" target="_blank">Open this section in a new page →</a>
                <?php if( get_field('google_doc_link') ): ?>
                    <iframe src="<?php the_field( 'google_doc_link' ); ?>?embedded=true" width="1500" height="1500"></iframe>
                <?php endif; ?>
                <p><?php the_field( 'section_content' ); ?></p>
            </div>
            

        </div>

        <?php endwhile; wp_reset_postdata();  ?>

    </div>
</div>

<?php if ( have_rows( 'closing_section' ) ) :  while ( have_rows( 'closing_section' ) ) : the_row(); ?>
    <h4><?php the_sub_field( 'subheading' ); ?></h4>
    <p><?php the_sub_field( 'content' ); ?></p>
<?php endwhile;  endif; ?>

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