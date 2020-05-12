<?php get_header(); ?>

<?php
global $wp_query;
?>
<section class="section-base section-article default-page">
	<div class="shell">
		<div class="section__container">
			<div class="section__content entry">
				<h1 class="default-page__title">
					<?php _e( 'Search Results', 'crb' ); ?>
				</h1>
				
				<?php if ( have_posts() ) : ?>
					<?php if ( isset( $_GET['s'] ) ) : ?>
						<h3><?php _e( "Searching for " . '"' . $_GET['s'] . '"' . "", "crb" ); ?></h3>
					<?php endif; ?>
					
					<p><?php _e( "Found {$wp_query->found_posts} results", "crb" ); ?></p>
				<?php else : ?>
					<h3><?php _e( "No Results found for " . '"' . $_GET['s'] . '"' . "", "crb" ); ?></h3>
				<?php endif; ?>
				
				<?php get_search_form(); ?>
			</div><!-- /.section__content -->
		</div><!-- /.section__container -->
	</div><!-- /.shell -->
</section><!-- /.section-base -->

<?php while ( have_posts() ) : the_post(); ?>
	<section class="section-base section-article default-page">
		<div class="shell">
			<div class="section__container">
				<div class="section__content entry default-page__search">
					<h3>
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
				</div><!-- /.section__content -->
			</div><!-- /.section__container -->

			<div class="section__content entry">
				<?php the_excerpt(); ?>
			</div><!-- /.section__content -->
		</div><!-- /.shell -->
	</section><!-- /.section-base -->
<?php endwhile; ?>

<section class="section-base section-article default-page">
	<div class="shell">
		<div class="section__content entry">
			<?php 
			carbon_pagination( 'posts', [
				'prev_html' => '<a href="{URL}" class="paging__prev">' . esc_html__( '<', 'crb' ) . '</a>',
				'next_html' => '<a href="{URL}" class="paging__next">' . esc_html__( '>', 'crb' ) . '</a>',
				'first_html'        => '<a href="{URL}" class="paging__first">«</a>',
				'last_html'         => '<a href="{URL}" class="paging__last">»</a>',
				'limiter_html'      => '<li class="paging__spacer">...</li>',
				'current_page_html' => '<span class="paging__label">Page {CURRENT_PAGE} of {TOTAL_PAGES}</span>',
				'enable_numbers' => true,
				'number_limit' => 3,
				'large_page_number_limit' => 1,
				'enable_first' => true,
				'enable_last' => true,
			] ); 
			?>
		</div><!-- /.section__content -->
	</div><!-- /.shell -->
</section><!-- /.section-base -->

<?php crb_render_fragment( 'common/boxes' ); ?>

<?php
get_footer();