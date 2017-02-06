<?php
/**
 * Template Name: Research Blog
 *
 * @package TeddyMcr
 */

$cat = get_category(get_query_var('cat'));
$cat_name = get_category(get_query_var('cat'))->name;

$params = array(
  'term_id' => null,
  'size' => 'full'
);
$src = category_image_src( $params , $display );

get_header(); ?>

<?php if (!$src[0]) { ?>
<section class="title-banner title-banner noimage">
<?php } else { ?>
<section id="title-banner" class="title-banner" style="background: url(<?php echo $src; ?> ), linear-gradient(to bottom, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.7) 100%);">
<?php } ?>
    <div class="container">
		<div class="row">
			<div class="col-md-12 title">
			<h2><?php echo $cat_name ?></h2>
			</div>
		</div>
    </div>
</section>

<!-- Main -->
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <?php if ( have_posts() ) : ?>

<h3 class="archive-title"><?php single_cat_title( '', false ); ?></h3>


<?php
echo do_shortcode('[wp_custom_image_category onlysrc="false" size="full" term_id="123" alt="alt :)"]');

 if ( category_description() ) : ?>
<div class="archive-meta"><?php echo category_description(); ?></div>
<?php endif; ?>
</header>

<?php

while ( have_posts() ) : the_post(); ?>

<article class="post">
    <span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo get_the_date(); ?></span>
    <h4><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h4>
    <?php the_post_thumbnail(); ?>
    <?php the_excerpt(); ?>
</article>

<?php endwhile; 

else: ?>
<p>Sorry, no posts matched your criteria.</p>
<?php endif; ?>
        </div>
        <div class="col-md-3">
            <article class="side-block">
        </div>
    </div>
</div>
<!-- /Main -->
        
<?php get_footer(); ?>
