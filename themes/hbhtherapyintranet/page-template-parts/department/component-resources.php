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
    max-height: 30px;
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
    
</style>
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
        
        <?php if ( have_rows( 'office_hours', $employee ) ) : ?>
                <p class="clinician-subtitle offhours">Office Hours</p>
                <hr class="user-email">
                <?php while ( have_rows( 'office_hours', $employee ) ) : the_row(); ?>

                <p class="user-email"><strong><?php the_sub_field( 'location' ); ?></strong><br>
                <?php the_sub_field( 'hours' ); ?></p>

                <?php endwhile; ?>
            <?php else : ?>
                <?php // No rows found ?>
            <?php endif; ?>
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

<?php if ( have_rows( 'closing_section' ) ) :  while ( have_rows( 'closing_section' ) ) : the_row(); ?>
    <h4><?php the_sub_field( 'subheading' ); ?></h4>
    <p><?php the_sub_field( 'content' ); ?></p>
<?php endwhile;  endif; ?>

<?php 
// Updates
?>

<p class="clinician-subtitle" style="color: #76559A;"><?php the_field( 'updates_title' ); ?></p>
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