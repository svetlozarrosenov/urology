<?php
/**
 * Template Name: Your Opinion Matters
 * Static: Yes # Remove this line once the template is integrated with the CMS
 */
?>

<?php get_header(); ?>


<section class="section-banner section-banner--alt">
	<div class="slider-banner">
		<div class="slider__clip swiper-container">
			<div class="slider__slides swiper-wrapper">
				<div class="slider__slide swiper-slide" style="background-image: url(<?php bloginfo('stylesheet_directory'); ?>/resources/images/temp/banner3.jpg);"></div><!-- /.slider__slide -->
			</div><!-- /.slider__slides -->

			<div class="swiper-button-prev"></div><!-- /.swiper-button-prev -->
			<div class="swiper-button-next"></div><!-- /.swiper-button-next -->
		</div><!-- /.slider__clip -->
	</div><!-- /.slider -->

	<div class="swiper-pagination"></div><!-- /.swiper-pagination -->

	<div class="section__container">
		<div class="shell">
			<div class="section__content entry">
				<h1>Your Opinion Matters </h1>

				<h2>Lorem ipsum</h2>

				<p>Have you had a superior experience with a member of The Urology Group team? Let them know!</p>
			</div><!-- /.section__content -->
		</div><!-- /.shell -->
	</div><!-- /.section__container -->

	<nav class="breadcrumbs">
		<div class="shell">
			<ul>
				<li>
					<a href="#">Home</a>
				</li>

				<li>
					<a href="#">Physicians</a>
				</li>

				<li>
					Your Opinion Matters
				</li>
			</ul>
		</div><!-- /.shell -->
	</nav><!-- /.breadcrumbs -->
</section><!-- /.section-banner -->

<section class="section-text section-base">
	<div class="shell">
		<div class="section__content entry">
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc facilisis erat porta luctus tempus. Nunc in mauris ex. Nam eu condimentum ipsum. Praesent blandit purus eu magna congue ultricies. Donec egestas felis eros, nec accumsan magna condimentum at. Phasellus velit odio, facilisis vitae magna et, semper porta dui. Cras tortor urna, scelerisque et mauris in, euismod tempus erat. Ut fermentum porttitor turpisLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc facilisis erat porta luctus tempus. Nunc in mauris ex. Nam eu condimentum ipsum. Praesent blandit purus eu magna congue ultricies. Donec egestas felis eros, nec accumsan magna condimentum at. Phasellus velit odio, facilisis vitae magna et, semper porta dui. Cras tortor urna, scelerisque et mauris in, euismod tempus erat. Ut fermentum porttitor turpis
			</p>

			<?php crb_render_gform(3,true) ?>
		</div><!-- /.section__content -->
	</div><!-- /.shell -->
</section><!-- /.section-text -->

<?php get_footer(); ?>