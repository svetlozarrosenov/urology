<section class="section-base section-updates">
	<header class="section__head">
		<div class="shell">
			<nav class="nav-links">
				<ul>
					<li>
						<a href="#newsletters">Newsletters</a>
					</li>

					<li>
						<a href="#in-the-news">In the News</a>
					</li>

					<li>
						<a href="#press-releases">Press Releases</a>
					</li>
				</ul>
			</nav><!-- /.nav -->
		</div><!-- /.shell -->
	</header><!-- /.section__head -->

	<div class="section__content">
		<?php 
		crb_render_fragment( 'about/newsletters', [
			'posts_per_page' => $section['newsletters_per_page'],
		] ); 
		?>

		<?php 
		crb_render_fragment( 'about/news', [
			'posts_per_page' => $section['news_per_page']
		] ); 
		?>

		<?php 
		crb_render_fragment( 'about/presses', [
			'posts_per_page' => $section['presses_per_page']
		] ); 
		?>
	</div><!-- /.section__content -->
</section><!-- /.section-base section-updates -->