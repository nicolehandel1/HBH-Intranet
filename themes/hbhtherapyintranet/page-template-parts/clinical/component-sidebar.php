<?php 
// Updates
?>

<p class="clinician-subtitle" style="margin-top: 0px;"><?php the_field( 'director_section_title' ); ?></p>
<hr>

<?php 
    $author = get_field( 'employee' ); 
?>

<?php if ( $author ) : ?>

    <div class="hdshot-wrap" style="background-image: url('<?php the_field( 'headshot', $author ); ?>')"></div>
    <a class="author" href="<?php echo get_author_posts_url($author->ID); ?>" ><?php echo $author->display_name; ?></a>
    <p class="job-title"><?php the_field( 'job_title', $author); ?></p>
    <a class="user-email" href="" ><?php echo $author->user_email; ?></a>

<?php endif; ?>

<?php 
// Buttons
?>

<p class="clinician-subtitle"><?php the_field( 'benefits_section_title' ); ?></p>
<hr>

<?php if ( have_rows( 'button' ) ): ?>
	<?php while ( have_rows( 'button' ) ) : the_row(); ?>

		<?php if ( get_row_layout() == 'internal_button' ) : ?>
			<?php if ( have_rows( 'internal_page_link' ) ) : ?>
				<?php while ( have_rows( 'internal_page_link' ) ) : the_row(); ?>
					<?php $ip_link = get_sub_field( 'ip_link' ); ?>
					<?php if ( $ip_link ) : ?>
                        <a class="hr-btn btn" href="<?php echo esc_url( $ip_link); ?>" target="_self"><?php the_sub_field( 'label' ); ?></a>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>

		<?php elseif ( get_row_layout() == 'pdf_button' ) : ?>
			<?php if ( have_rows( 'pdf_link' ) ) : ?>
				<?php while ( have_rows( 'pdf_link' ) ) : the_row(); ?>
                    <a class="hr-btn btn" href="<?php the_sub_field( 'pdf_link' ); ?>" target="_blank"><?php the_sub_field( 'pdf_label' ); ?></a>
				<?php endwhile; ?>
			<?php endif; ?>

		<?php elseif ( get_row_layout() == 'ext_button' ) : ?>
			<?php if ( have_rows( 'external_link' ) ) : ?>
				<?php while ( have_rows( 'external_link' ) ) : the_row(); ?>
                    <a class="hr-btn btn" href="<?php the_sub_field( 'ext_link' ); ?>" target="_blank"><?php the_sub_field( 'ext_label' ); ?></a>
				<?php endwhile; ?>
			<?php endif; ?>
            
        <?php elseif ( get_row_layout() == 'logo_button' ) : ?>
			<?php if ( have_rows( 'logo_link' ) ) : ?>
				<?php while ( have_rows( 'logo_link' ) ) : the_row(); ?>
					<?php if ( get_sub_field( 'logo' ) ) : ?>
                    <a class="hr-btn btn logo-btn" href="<?php the_sub_field( 'logo_link' ); ?>" target="_blank"><img src="<?php the_sub_field( 'logo' ); ?>" /></a>
					<?php endif ?>
				<?php endwhile; ?>
			<?php endif; ?>
                        
		<?php endif; ?>
	<?php endwhile; ?>
<?php else: ?>
	<?php // No layouts found ?>
<?php endif; ?>


<p class="clinician-subtitle"><?php the_field( 'training_section_title' ); ?></p>
<hr>

<?php if ( have_rows( 'training_button' ) ): ?>
	<?php while ( have_rows( 'training_button' ) ) : the_row(); ?>
		<?php if ( get_row_layout() == 'internal_button' ) : ?>
			<?php if ( have_rows( 'internal_page_link' ) ) : ?>
				<?php while ( have_rows( 'internal_page_link' ) ) : the_row(); ?>
					<?php $ip_link = get_sub_field( 'ip_link' ); ?>
					<?php if ( $ip_link ) : ?>
						<a class="hr-btn btn" href="<?php echo esc_url( $ip_link); ?>" target="_self"><?php the_sub_field( 'label' ); ?></a>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		<?php elseif ( get_row_layout() == 'pdf_button' ) : ?>
			<?php if ( have_rows( 'pdf_link' ) ) : ?>
				<?php while ( have_rows( 'pdf_link' ) ) : the_row(); ?>
					<?php if ( get_sub_field( 'pdf_link' ) ) : ?>
						<a class="hr-btn btn" href="<?php the_sub_field( 'pdf_link' ); ?>" target="_blank"><?php the_sub_field( 'pdf_label' ); ?></a>
					<?php endif ?>
				<?php endwhile; ?>
			<?php endif; ?>
		<?php elseif ( get_row_layout() == 'ext_button' ) : ?>
			<?php if ( have_rows( 'external_link' ) ) : ?>
				<?php while ( have_rows( 'external_link' ) ) : the_row(); ?>
					<a class="hr-btn btn" href="<?php the_sub_field( 'ext_link' ); ?>" target="_blank"><?php the_sub_field( 'ext_label' ); ?></a>
				<?php endwhile; ?>
			<?php endif; ?>
		<?php endif; ?>
	<?php endwhile; ?>
<?php else: ?>
	<?php // No layouts found ?>
<?php endif; ?>