<div class="section abtsection" id="offices">
    <div class="section-content">
        
        <ul id="map" class="abt-map" style="background-image: url('<?php the_field( 'locations_map' ); ?>');">
            <li id="westSpringfield" class="location-filter" style="top: 50%; left: 28%;"></li>
            <li id="amherst" class="location-filter" style="top: 38%; left: 33%;"></li>
            <li id="wilbraham" class="location-filter" style="top: 50%; left: 35%;"></li>
            <li id="franklin" class="location-filter" style="top: 55%; left: 57%;"></li>
        </ul>

        <div class="locations-wrap">

            <address class="location-card amherst">
                <h3><?php the_field( 'location_name_1' ); ?></h3>
                <a class="phone" href="tel:<?php the_field( 'phone_link_1' ); ?>"><?php the_field( 'phone_label_1' ); ?></a>
                <p class="blog-author"><?php the_field( 'location_address_1' ); ?></p>
                <p><?php the_field( 'location_hours_1' ); ?></p>
                <?php $button_link_1 = get_field( 'button_link_1' ); if ( $button_link_1 ) : ?>
                <a class="btn" href="<?php echo esc_url( $button_link_1); ?>"><?php the_field( 'button_label_1' ); ?></a>
                <?php endif; ?>
            </address>

            <address class="location-card franklin">
                <h3><?php the_field( 'location_name_2' ); ?></h3>
                <a class="phone" href="tel:<?php the_field( 'phone_link_2' ); ?>"><?php the_field( 'phone_label_2' ); ?></a>
                <p class="blog-author"><?php the_field( 'location_address_2' ); ?></p>
                <p><?php the_field( 'location_hours_2' ); ?></p>
                <?php $button_link_2 = get_field( 'button_link_2' ); if ( $button_link_2 ) : ?>
                <a class="btn" href="<?php echo esc_url( $button_link_2); ?>"><?php the_field( 'button_label_2' ); ?></a>
                <?php endif; ?>
            </address>

            <address class="location-card wilbraham">
                <h3><?php the_field( 'location_name_3' ); ?></h3>
                <a class="phone" href="tel:<?php the_field( 'phone_link_3' ); ?>"><?php the_field( 'phone_label_3' ); ?></a>
                <p class="blog-author"><?php the_field( 'location_address_3' ); ?></p>
                <p><?php the_field( 'location_hours_3' ); ?></p>
                <?php $button_link_3 = get_field( 'button_link_3' ); if ( $button_link_3 ) : ?>
                <a class="btn" href="<?php echo esc_url( $button_link_3); ?>"><?php the_field( 'button_label_3' ); ?></a>
                <?php endif; ?>
            </address>

            <address class="location-card westspring">
                <h3><?php the_field( 'location_name_4' ); ?></h3>
                <a class="phone" href="tel:<?php the_field( 'phone_link_4' ); ?>"><?php the_field( 'phone_label_4' ); ?></a>
                <p class="blog-author"><?php the_field( 'location_address_4' ); ?></p>
                <p><?php the_field( 'location_hours_4' ); ?></p>
                <?php $button_link_4 = get_field( 'button_link_4' ); if ( $button_link_4 ) : ?>
                <a class="btn" href="<?php echo esc_url( $button_link_4); ?>"><?php the_field( 'button_label_4' ); ?></a>
                <?php endif; ?>
            </address>
        </div>

    </div>
</div>