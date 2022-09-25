<style>

</style>
<p class="clinician-subtitle">HR Director</p>
<hr>

<?php $author = get_field( 'employee' ); ?>
<?php if ( $author ) : ?>

<img class="rsp-img" src="<?php the_field( 'headshot', $author ); ?>" />

<a href="<?php echo get_author_posts_url($author->ID); ?>" class="author">
    <?php echo $author->display_name; ?></a>
<p><?php the_field( 'job_title', $author); ?></p>

<?php endif; ?>



<p class="clinician-subtitle">Benefits & Payrole</p>
<hr>

<p class="clinician-subtitle">HR Training</p>
<hr>