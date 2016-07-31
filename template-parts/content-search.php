<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TorlanGame
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("post"); ?>>

	<header>
		<div class="title">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php
		if ( 'post' === get_post_type() ) : ?>
		</div>
		<div class="meta">
			<?php torlangame_posted_on(); ?>
		</div>
		<?php
		endif; ?>
	</header>
	<?php if ( is_single() ) { ?>
		<a href="#" data-featherlight="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full', true)[0] ?>" class="image featured" rel="bookmark"><?php the_post_thumbnail( 'torlangame-article-thumb' ); ?></a>
	<?php } else { ?>
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="image featured" rel="bookmark"><?php the_post_thumbnail( 'torlangame-article-thumb' ); ?></a>
	<?php } ?>
	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php torlangame_entry_footer(); ?>
	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
