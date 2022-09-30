<div class="section" style="width: 40%;">
    <div class="section-content align-center">
        <div class="">
            <h1 class="section-title"><?php the_field( 'news_section_title' ); ?></h1>

            <div>
                <?php if ( have_rows( 'article' ) ) : ?>
                <?php while ( have_rows( 'article' ) ) : the_row(); ?>
                <?php $article = get_sub_field( 'article' ); ?>
                <?php if ( $article ) : ?>
                <?php $post = $article; ?>

                <div class="article-grid" data-category="transition">
                    <div class="article-grid-item-wrap">

                        <h4><?php $category = get_the_category(); echo $category[0]->cat_name; ?></h4>
                        <a href="<?php the_permalink(); ?>">
                            <h4 class="news-title"><?php the_title() ?></h4>
                        </a>
                        <p class="news-date"><?php echo get_the_date( 'F j, Y' ); ?></p>
                        <p class=""><?php the_field( 'single_excerpt_summary' ); ?> <a class="read-more" href="<?php the_permalink(); ?>">[READ MORE]</a></p>

                    </div>
                </div>

                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                <?php endwhile; ?>
                <?php else : ?>
                <?php // No rows found ?>
                <?php endif; ?>

            </div>

        </div>
    </div>
</div>