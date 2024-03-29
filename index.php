<?php get_header();  ?>

<main id="index-page">
	<section class="px-4 py-5 my-5 text-center">
		<img class="d-block mx-auto mb-4" src="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png" alt="">
		<h1 class="display-5 fw-bold text-body-emphasis">Centered hero</h1>
		<div class="col-lg-6 mx-auto">
			<p class="lead mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
			<div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
				<button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
				<button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
			</div>
		</div>
	</section>
	<section class="container px-4 py-5">
		<h2 class="pb-2 border-bottom">Features with title</h2>

		<div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
			<div class="col d-flex flex-column align-items-start gap-2">
				<h2 class="fw-bold text-body-emphasis">Left-aligned title explaining these awesome features</h2>
				<p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
				<a href="#" class="btn btn-primary btn-lg">Primary button</a>
			</div>

			<div class="col">
				<div class="row row-cols-1 row-cols-sm-2 g-4">
					<div class="col d-flex flex-column gap-2">
						<div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
							<i class="bi bi-yin-yang"></i>
						</div>
						<h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
						<p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.</p>
					</div>

					<div class="col d-flex flex-column gap-2">
						<div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
							<i class="bi bi-wordpress"></i>
						</div>
						<h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
						<p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.</p>
					</div>

					<div class="col d-flex flex-column gap-2">
						<div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
							<i class="bi bi-universal-access"></i>
						</div>
						<h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
						<p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.</p>
					</div>

					<div class="col d-flex flex-column gap-2">
						<div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
							<i class="bi bi-trophy-fill"></i>
						</div>
						<h4 class="fw-semibold mb-0 text-body-emphasis">Featured title</h4>
						<p class="text-body-secondary">Paragraph of text beneath the heading to explain the heading.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
</main>

<?php get_footer(); ?>