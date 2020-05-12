<section class="section-base section-article default-page">
	<div class="shell">
		<nav class="breadcrumbs">
			<?php Carbon_Breadcrumb_Trail::output(); ?>
		</nav><!-- /.breadcrumbs -->
		
		<div class="section__container">
			<div class="section__content entry">
				<h1 class="default-page__title">
					<?php the_title(); ?>
				</h1>
				
				<?php if ( ! is_singular('crb_team_member') && ! is_singular('crb_event') ) : ?>
					<p class="default-page__meta">
						<?php
						$meta = get_the_time( 'F d, Y ' );
						$author = [
							'name' => esc_html( carbon_get_the_post_meta( 'crb_post_author' ) ),
							'link' => esc_url( carbon_get_the_post_meta( 'crb_post_author_link' ) ) 
						];	 

						if ( ! empty( $author['link'] ) && ! empty( $author['name'] ) ) {
							$meta .= ' | <a href="' . $author['link'] . '">By: ' . $author['name'] . '</a>';
						}

						echo $meta;
						?>
					</p>
				<?php endif; ?>
			</div><!-- /.section__content -->
		</div><!-- /.section__container -->

		<div class="section__content entry">
			<?php the_content(); ?>
		</div><!-- /.section__content -->

		<footer class="section__foot">
			<nav class="socials-share">
				<div class="btn-share">
					<span style="background-image: url(<?php bloginfo('stylesheet_directory'); ?>/resources/images/ico-share-alt.svg);"></span>

					<?php _e( 'Share This', 'crb' ); ?>
				</div>

				<ul>
					<li class="link-facebook">
						<a target="_blank" href="http://www.facebook.com/sharer.php?t=&u=<?php the_permalink(); ?>">
							<i class="fa fa-facebook" aria-hidden="true"></i>
							<?php _e( 'Share', 'crb' ); ?>
						</a>
					</li>

					<li class="link-twitter">
						<a target="_blank" href="https://twitter.com/intent/tweet/?text=&url=<?php the_permalink(); ?>">
							<i class="fa fa-twitter" aria-hidden="true"></i>
							<?php _e( 'Tweet', 'crb' ); ?>
						</a>
					</li>

					<li class="link-linkedin">
						<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php get_the_title(); ?>&summary=">
							<i class="fa fa-linkedin-square" aria-hidden="true"></i>
							<?php _e( 'Share', 'crb' ); ?>
						</a>
					</li>

					<li class="link-mail">
						<?php
						$subject = rawurlencode('See this interesting blog post from The Urology Group');
						$email_url = "mailto:?subject={$subject}&body=" . rawurlencode(get_the_permalink()) . ""
						?>
						<a href="<?php echo $email_url; ?>">
							<i class="fa fa-envelope-o" aria-hidden="true"></i>
						</a>
					</li>
				</ul>
			</nav><!-- /.nav -->
		</footer><!-- /.section__foot -->
	</div><!-- /.shell -->
</section><!-- /.section-base -->

<?php
if ( is_singular( 'crb_team_member' ) ) {
	return;
}

$post_type = 'post';
$title = 'Recent Featured Blog Posts';
$btn = [
	'label' => 'View All Blog Posts',
	'link' => get_permalink( get_option( 'page_for_posts' ) )
];


if ( is_singular( 'crb_newsletter' ) ) {
	$title = 'Recent Featured Newsletters';
    $post_type = 'crb_newsletter';
    $btn = [
		'label' => 'View All Newsletters',
		'link' => get_page_url_by_template( 'newsletters' )
	];
}

if ( is_singular( 'crb_news' ) ) {
	$title = 'Recent Featured News';
    $post_type = 'crb_news';
    $btn = [
		'label' => 'View All News',
		'link' => get_page_url_by_template( 'news' )
	];
}

if ( is_singular( 'crb_press' ) ) {
	$title = 'Recent Featured Presses';
    $post_type = 'crb_press';
    $btn = [
		'label' => 'View All Presses',
		'link' => get_page_url_by_template( 'presses' )
	];
}

if ( is_singular( 'crb_event' ) ) {
	$title = 'Recent Featured Events';
    $post_type = 'crb_event';
    $btn = [
		'label' => 'View All Events',
		'link' => get_page_url_by_template( 'events' )
	];
}

$three_recent_posts_loop = new WP_Query( array(
	'post_type' => $post_type,
	'posts_per_page' => 3
) );
?>
<?php if ( $three_recent_posts_loop->have_posts() ) : ?>
	<section class="section-base section-updates">
		<div class="section__content">
			<div class="section__group">
				<div class="shell">
					<h2><?php _e( $title, 'crb' ); ?></h2>

					<div class="articles-stories">
						<ol>
							<?php while ( $three_recent_posts_loop->have_posts() ) : $three_recent_posts_loop->the_post(); ?>
								<li><?php crb_render_fragment('common/article-story--blog') ?></li>
							<?php endwhile; ?>
							
							<?php wp_reset_postdata(); ?>
						</ol>
					</div><!-- /.articles-stories -->
				</div><!-- /.shell -->
			</div><!-- /.section__group -->
		</div><!-- /.section__content -->

		<footer class="section__foot">
			<div class="shell">
				<a href="<?php echo $btn['link']; ?>" class="btn">
					<?php echo esc_html( $btn['label'] ); ?>
				</a>
			</div><!-- /.shell -->
		</footer><!-- /.section__foot -->
	</section><!-- /.section-base section-updates -->
<?php endif; ?>