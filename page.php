<?php
/**
 * @package TeddyMCR
 */

get_header(); ?>

<?php global $post; ?>
<?php
$first_parent = get_page($parent[0])->ID; 
if (has_post_thumbnail($post->ID)) {
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' );
} else {
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($first_parent), array( 5600,1000 ), false, '' );
}
?>

<?php if (!$src[0]) { ?>
<section class="title-banner title-banner noimage">
<?php } else { ?>
<section id="title-banner" class="title-banner" style="background: url(<?php echo $src[0]; ?> ), linear-gradient(to bottom, rgba(255,255,255,0.7) 0%,rgba(255,255,255,0.7) 100%);">
<?php } ?>
    <div class="container">
		<div class="row">
			<div class="col-md-12 title">
			<h6><?php echo empty( $post->post_parent ) ? null : get_the_title( $post->post_parent ); ?></h6>
				<?php the_title( '<h2 class="title-header">', '</h2>' ); ?>
			</div>
		</div>
    </div>
</section>

<div class="container main-content">
	<div class="row">
		<div class="col-md-3">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div>
		<div class="col-md-9">
		<div class="meta">
				<span><i class="fa fa-calendar" aria-hidden="true"></i> Content Last Reviewed <?php echo the_modified_date( $d, $before, $after, $echo ); ?></span>
		</div>
		<hr/>
		<?php while ( have_posts() ) : the_post(); ?>
		<?php
		the_content();
		wp_link_pages( array(
			'before' => '<p class="pages"><strong>' . __( 'Pages:', 'academica' ) . '</strong>',
			'after' => '</p>',
			'next_or_number' => 'number'
		) ); ?>
				<?php endwhile; ?>
		</div>
	</div>

</div>

<?php get_footer(); ?>