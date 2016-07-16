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
			if ( 'downloads' === get_post_type() ) : ?>
			</div>
			<div class="meta">
				<?php torlangame_posted_on(); ?>
			</div>
			<?php
			endif; ?>
		</header>
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

			<?php if ( is_single() ) { ?>
			<div class="download-box row">
				<div class="game-download col-md-8 col-xs-12">
					<?php 
					if (rwmb_meta( 'magnet_link' )[0] != '') { 
						$value = rwmb_meta( "magnet_link" )[0];

						// Get magnet size
						if (rwmb_meta( 'magnet_link_size' ) != '') { 
							$size = rwmb_meta( "magnet_link_size" );
							echo '<p><a href="' . $value . '"><i class="fa fa-magnet" aria-hidden="true"></i> دانلود با تورنت</a> <a href="http://torlangame.com/%d8%a2%d9%85%d9%88%d8%b2%d8%b4-%d8%af%d8%a7%d9%86%d9%84%d9%88%d8%af-%d8%a8%d9%87-%da%a9%d9%85%da%a9-%d8%aa%d9%88%d8%b1%d9%86%d8%aa-%d8%af%d8%b1-%da%a9%d9%85%d8%aa%d8%b1-%d8%a7%d8%b2-3-%d8%af%d9%82/" title="راهنمای استفاده از تورنت"><i class="fa fa-question-circle" aria-hidden="true"></i></a> - ' . $size . '</p>';
						} else {
							echo '<p><a href="' . $value . '"><i class="fa fa-magnet" aria-hidden="true"></i> دانلود با تورنت</a> <a href="http://torlangame.com/%d8%a2%d9%85%d9%88%d8%b2%d8%b4-%d8%af%d8%a7%d9%86%d9%84%d9%88%d8%af-%d8%a8%d9%87-%da%a9%d9%85%da%a9-%d8%aa%d9%88%d8%b1%d9%86%d8%aa-%d8%af%d8%b1-%da%a9%d9%85%d8%aa%d8%b1-%d8%a7%d8%b2-3-%d8%af%d9%82/" title="راهنمای استفاده از تورنت"><i class="fa fa-question-circle" aria-hidden="true"></i></a></p>';
						}
					} 
					$value = get_post_meta( get_the_ID(), 'direct_link', true );
					if ( !empty( $value ) ) {
						if (rwmb_meta( 'direct_link_size' ) != '') {
							$size = rwmb_meta( "direct_link_size" );
							echo '<p><i class="fa fa-cloud-download" aria-hidden="true"></i> دانلود با لینک مستقیم - ' . $size . '</p>';
						} else {
							echo '<p><i class="fa fa-cloud-download" aria-hidden="true"></i> دانلود با لینک مستقیم</p>';
						}
						$torlangame_section = 0;
						$torlangame_count = count($value);
						if ($torlangame_count == 1) {
							foreach ( $value as $subvalue ) {
								$i++;
							    echo '<p><a href="$subvalue">' . $subvalue . '</a></p>';
							}
						} else {
							foreach ( $value as $subvalue ) {
								$torlangame_section++;
							    echo '<p>' . 'بخش ' . $torlangame_section . ': ' . '<a href="$subvalue">' . $subvalue . '</a></p>';
							}
						}
					}
					$game_thumbnail = rwmb_meta( 'game_thumbnail' );
					?>
				</div>
				<div class="game-cover col-md-4 col-xs-12">
					<?php 
					foreach ($game_thumbnail as $gt) {
						echo '<img src="' . $gt["full_url"] . '" data-featherlight="' . $gt["full_url"] . '" />';
						break;
					}
					?>
				</div>
			</div>
			<?php } ?>
		</div><!-- .entry-content -->
		<footer class="entry-footer">
			<?php torlangame_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</article>
