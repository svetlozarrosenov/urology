<?php
/**
 * Template Name: Individual Physician
 * Static: Yes # Remove this line once the template is integrated with the CMS
 */
?>

<?php get_header(); ?>

<section class="section-banner section-banner--alt">
	<div class="slider-banner">
		<div class="slider__clip swiper-container">
			<div class="slider__slides swiper-wrapper">
				<div class="slider__slide swiper-slide" style="background-image: url(<?php bloginfo('stylesheet_directory'); ?>/resources/images/temp/banner10.jpg);"></div><!-- /.slider__slide -->
			</div><!-- /.slider__slides -->

			<div class="swiper-button-prev"></div><!-- /.swiper-button-prev -->
			<div class="swiper-button-next"></div><!-- /.swiper-button-next -->
		</div><!-- /.slider__clip -->
	</div><!-- /.slider -->

	<div class="swiper-pagination"></div><!-- /.swiper-pagination -->

	<div class="section__container">
		<div class="shell">
			<div class="section__content entry">
				<h1>Michael Dusing, M.D.</h1>

				<h2>Current Openings</h2>

				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
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
					<a href="#">Our Physicians</a>
				</li>

				<li>
					Michael Dusing, M.D.
				</li>
			</ul>
		</div><!-- /.shell -->
	</nav><!-- /.breadcrumbs -->
</section><!-- /.section-banner -->

<section class="section-base section-single">
	<div class="shell">
		<div class="section__container">
			<div class="section__content entry">
				<h5>About Dr. Dusing </h5>

				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc facilisis erat porta luctus tempus. Nunc in mauris ex. Nam eu condimentum ipsum. Praesent blandit purus eu magna congue ultricies. Donec egestas felis eros, nec accumsan magna condimentum at. Phasellus velit odio, facilisis vitae magna et, semper porta dui.
				</p>

				<p>
					Cras tortor urna, scelerisque et mauris in, euismod tempus erat. Ut fermentum porttitor turpisLorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc facilisis erat porta luctus tempus. Nunc in mauris ex. Nam eu condimentum ipsum.
				</p>

				<h5>
					Certifications and Memberships
				</h5>

				<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc facilisis erat porta luctus tempus. Nunc in mauris ex. Nam eu condimentum ipsum. Praesent blandit purus eu magna congue ultricies. Donec egestas felis eros, nec accumsan magna
				</p>

				<h5>
					Meet Dr. Dusing
				</h5>

				<div class="video-holder">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/ScMzIvxBSi4?controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div><!-- /.video-holder -->
			</div><!-- /.section__content -->

			<aside class="section__aside entry">
				<div class="profile">
					<div class="profile__image">
						<img src="<?php bloginfo('stylesheet_directory'); ?>/resources/images/temp/profile-image.png" alt="" />
					</div><!-- /.profile__image -->

					<div class="profile__actions">
						<a href="#" class="btn btn-block">Request an Appointment</a>

						<a href="#" class="btn btn--outline btn-block">Say Thank You!</a>
					</div><!-- /.profile__actions -->

					<div class="profile__content">
						<div class="list-bio">
							<h5>Specialties</h5>

							<ul>
								<li>Scrotal Masses</li>

								<li>Male Infertility</li>

								<li>Prostatitis</li>

								<li>Penile Prosthesis</li>
							</ul>
						</div><!-- /.list-info -->

						<div class="list-bio">
							<h5>Board Certified</h5>

							<ul>
								<li>Urology</li>
							</ul>
						</div><!-- /.list-info -->
					</div><!-- /.profile__content -->
				</div><!-- /.profile -->
			</aside><!-- /.section__aside -->
		</div><!-- /.section__container -->

		<div class="section__inner">
			<h5>Office Locations</h5>

			<div class="locations">
				<div class="locations__body">
					<div class="locations__aside">
						<ul class="locations__list">
							<li class="location__list-item">
								<p>
									<a href="#" data-name="test1">
									Norwood Campus
									2000 Joseph E. Sanker Blvd.
									Cincinnati, OH 45212
									</a> <br>

									<a href="tel:513-841-7500">513-841-7500</a>
								</p>

								<p>
									Hours: M - F 7:30am - 5:00pm
								</p>

								<p>
									<a href="#" class="links-all">
										Get Directions
									</a>
								</p>
							</li>

							<li class="location__list-item">
								<p>
									<a href="#" data-name="test2">
									Blue Ash
									10220 Alliance Rd.
									Cincinnati, OH 45242
									</a> <br>

									<a href="tel:513-841-7800">513-841-7800</a>
								</p>

								<p>
									Hours: M - F 7:30am - 5:00pm
								</p>

								<p>
									<a href="#" class="links-all">
										Get Directions
									</a>
								</p>
							</li>
						</ul><!-- /.locations__list -->
					</div><!-- /.locations__aside -->

					<div class="locations__content">
						<div class="locations__map"></div><!-- /.locations__map -->
					</div><!-- /.locations__content -->
				</div><!-- /.locations__body -->
			</div><!-- /.locations -->
		</div><!-- /.section__inner -->
	</div><!-- /.shell -->
</section><!-- /.section-base -->


<?php get_footer(); ?>
