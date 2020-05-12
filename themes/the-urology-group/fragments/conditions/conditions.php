<?php
$conditions = crb_get_conditions();

if ( empty( $conditions ) ) {
	return;
}
?>
<section class="section-base section-accordion">
	<div class="shell">
		<header class="section__head entry">
			<div class="form form-live-search">
				<form action="?" method="post">
					<div class="form__body">
						<div class="form__row">
							<label for="field-live-search" class="form__label screen-reader-text">live-search</label>

							<div class="form__controls">
								<input type="text" class="field" name="field-live-search" id="field-live-search" value="" placeholder="Search">
							</div><!-- /.form__controls -->
						</div><!-- /.form__row -->
					</div><!-- /.form__body -->

					<div class="form__actions">
						<input type="submit" value="Submit" class="form__btn screen-reader-text">
					</div><!-- /.form__actions -->
				</form>
			</div><!-- /.form -->

			<div class="nav-filter">
				<div class="nav-filter__wrapper">
					<ul>
						<?php foreach ( crb_get_letters( $conditions ) as $letter ) : ?>
							<li class="<?php echo isset( $letter['class'] ) ? $letter['class'] : ''; ?>">
								<a href="<?php echo $letter['letter']; ?>"><?php echo $letter['letter']; ?></a>
							</li>
						<?php endforeach; ?>

						<li>
							<a href="#"><?php _e( 'View All', 'crb' ); ?></a>
						</li>
					</ul>
				</div><!-- /.nav-filter__wrapper -->
			</div><!-- /.nav-filter -->
		</header><!-- /.section__head -->

		<div class="section__content entry">
			<?php sort($conditions); ?>
			<div class="accordion accordion-conditions">
				<?php foreach ( $conditions as $condition ) : ?>
					<div class="accordion__section" data-filter="<?php echo esc_html( $condition['title'] ); ?>" data-excerpt="<?php echo esc_html( $condition['excerpt'] ); ?>">
						<?php if ( ! empty( $condition['title'] ) ) : ?>  
							<div class="accordion__head">
								<h3><?php echo esc_html( $condition['title'] ); ?></h3>
							</div><!-- /.accordion__head -->
						<?php endif; ?>
			
						<div class="accordion__body">
							<?php if ( ! empty( $condition['excerpt'] ) ) : ?>
								<p>
									<?php echo esc_html( $condition['excerpt'] ); ?>
								</p>
							<?php endif; ?>

							<a href="<?php echo esc_url( $condition['permalink'] ); ?>" class="links-all">
								<?php _e( 'Learn More', 'crb' ); ?>
							</a>
						</div><!-- /.accordion__body -->
					</div><!-- /.accordion__section -->
				<?php endforeach; ?>
			</div><!-- /.accordion -->
		</div><!-- /.section__content -->
	</div><!-- /.shell -->
</section><!-- /.section-conditions -->