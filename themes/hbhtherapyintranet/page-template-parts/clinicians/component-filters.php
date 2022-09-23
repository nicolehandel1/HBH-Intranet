<?php

$locations = get_terms( array(
                    'taxonomy' => 'clinician-location',
                    'hide_empty' => true,
                    'orderby' => 'name',
                    'order' => 'ASC', ));  

$services = get_terms( array(
                'taxonomy' => 'clinician-services',
                    'hide_empty' => true,
                    'orderby' => 'id',
                    'order' => 'ASC', ));  
?>

<div class="section-content">

    <div class="filters-content">

        <?php //if ( have_rows( 'clinicians_calltoact_button' ) ) :  while ( have_rows( 'clinicians_calltoact_button' ) ) : the_row(); ?>
        <!---<h4><?php //the_sub_field( 'button_heading' ); ?></h4>
        <div class="filter-wrap"><a class="btn" href="<?php the_sub_field( 'button_link' ); ?>" target="_blank"><?php the_sub_field( 'button_label' ); ?></a></div> --->
        <?php //endwhile;  endif; ?>
        
        <div class="filter-wrap">
            <div class="filters">
                <div class="select"><select value-group="locations" class="button-group js-radio-button-group filters-select" data-width="100%">
                    <option title="button is-checked" value="">Locations</option>
                    <option title="button is-checked" value="">View All</option>

                    <?php foreach ($locations as $location) {
                    echo '<option class="button" value=".'.$location->slug.'">'.$location->name.'</option>';
            }?>

                </select></div>

                <div class="select"><select value-group="services" class=" button-groupjs-radio-button-group filters-select" data-width="100%">
                    <option title="button is-checked" value="">Services</option>
                    <option title="button is-checked" value="">View All</option>

                    <?php foreach ($services as $service) {
                    echo '<option class="button" value=".'.$service->slug.'">'.$service->name.'</option>';
            }?>

                    </select></div>
            </div>

            <p class="search">
                <input type="text" class="quicksearch" placeholder="Search..." />
                <img src="<?php the_field( 'search_icon', 'option' ); ?>" data-rjs="2" alt="search icon" />
            </p>

        </div>

    </div>
</div>