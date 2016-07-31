<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package TorlanGame
 */

?>

<!-- Post -->
	<article id="post-<?php the_ID(); ?>" <?php post_class("post"); ?>>
		<header>
			<div class="title">
			<?php
				if ( is_single() ) {
					the_title( '<h2 class="entry-title">', '</h2>' );
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}
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
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'torlangame' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'torlangame' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<footer class="entry-footer">
			<?php torlangame_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article>
