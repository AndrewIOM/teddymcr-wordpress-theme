<?php get_header(); ?>

<section class="title-banner title-banner noimage">
    <div class="container">
		<div class="row">
			<div class="col-md-12 title">
            <h6><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date(); ?></h6>
				<?php the_title( '<h2 class="title-header">', '</h2>' ); ?>
			</div>
		</div>
    </div>
</section>

<div class="container" style="padding-bottom:5em;">
    <?php while ( have_posts() ) : the_post(); ?>
<br/>
    <div class="row">
        <div class="col-md-8">
        <div class="post-image">
                <?php the_post_thumbnail(); echo get_post(get_post_thumbnail_id())->post_content; ?>
                <hr/>
        </div>
            <?php the_content(); ?>
            <hr/>
            <nav id="nav-single">
                <span class="nav-previous"><?php previous_post_link( '%link', __( '<span class="meta-nav">&laquo;</span> Previous news item', 'twentyeleven' ) ); ?></span>
                <span class="nav-next"><?php next_post_link( '%link', __( 'Next item <span class="meta-nav">&raquo;</span>', 'twentyeleven' ) ); ?></span>
            </nav>

        </div>
        <div class="col-md-4">
                <article class="news-block side-block">
                    <h3>Recent Research Highlights</h3>
                    <?php
                        $recentPosts = new WP_Query();
                        $recentPosts->query('category_name=research-spotlight&post_status=publish&showposts=5orderby=date');
                    while ($recentPosts->have_posts()) : $recentPosts->the_post();?>
                        <section class="news-post">
                            <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date(); ?></span>
                            <h4><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <?php the_post_thumbnail(); ?>
                            <?php the_excerpt(); ?>
                        </section>
                    <?php endwhile;  ?>
                    <?php wp_reset_query(); ?>
                </article>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
</div>
 
<?php get_footer(); ?>