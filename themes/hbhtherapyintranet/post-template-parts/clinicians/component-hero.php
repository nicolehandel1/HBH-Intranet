<?php 
$author = get_queried_object();
?>

<div class="section clinician-hero-section hero-wrap">
    <div class="section-content single-hero-content">

        <div class="single-clinician-heroimg">
            <div class="hdshot-wrap" style="background-image: url('<?php the_field( 'headshot', $author ); ?>')"></div>
        </div>

        <div class="single-hero-info">
            <h1 class="blog-title"><?php echo $author->display_name; ?></h1>
            <p class="clinician-subtitle"><?php the_field( 'job_title', $author ); ?></p>
        </div>

    </div>
</div>