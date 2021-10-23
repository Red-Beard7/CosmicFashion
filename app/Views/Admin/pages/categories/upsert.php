<?= $this->extend('Admin/layouts/master') ?>
<?= $this->section('content') ?>

	<div class="card mb-3">
		<div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../../assets/img/icons/spot-illustrations/corner-4.png);"></div>
		<!--/.bg-holder-->
		<div class="card-body position-relative">
			<div class="row">
				<div class="col-lg-8">
					<h3>Validation</h3>
					<p class="mb-0">Provide valuable, actionable feedback to your users with HTML5 form validation, via browser default behaviors or
						custom styles and JavaScript.</p>
					<a class="btn btn-link btn-sm ps-0 mt-2" href="https://getbootstrap.com/docs/5.1/forms/validation" target="_blank">
						Validation on Bootstrap<span class="fas fa-chevron-right ms-1 fs--2"></span>
					</a>
				</div>
			</div>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="col-7 mb-3">
			<div class="d-flex mb-4"><span class="fa-stack me-2 ms-n1"><i class="fas fa-circle fa-stack-2x text-300"></i><i
							class="fa-inverse fa-stack-1x text-primary fas fa-check-double"></i></span>
				<div class="col">
					<h5 class="mb-0 text-primary position-relative"><span class="bg-200 dark__bg-1100 pe-3">Create Product</span><span
								class="border position-absolute top-50 translate-middle-y w-100 start-0 z-index--1"></span></h5>
					<p class="mb-0">You can easily show your stats content by using these cards.</p>
				</div>
			</div>

			<div class="card">
				<div class="card-header">
					<div class="row">
						<div class="col-auto">
							<h5 class="mb-0" data-anchor="data-anchor">Create Category</h5>
						</div>
					</div>
				</div>

                <?= view('App\auth\_message_block') ?>

				<div class="card-body bg-light">
					<form class="row g-3 needs-validation" action="<?= route_to('admin.category.store') ?>" method="POST" novalidate="">
                        <?= csrf_field() ?>
						<div class="col-12">
							<label class="form-label" for="name">Title *</label>
							<input class="form-control" id="name" type="text" name="name" placeholder="Category title" value="<?= old('name') ?>"
							       required=""/>
							<div class="valid-feedback">Looks good!</div>
							<div class="invalid-feedback">This title is required.</div>
						</div>
						<div class="col-12">
							<label class="form-label" for="description">Description</label>
							<textarea class="form-control" id="description" name="description"
							          placeholder="Categories description..."><?= old('description') ?></textarea>
							<div class="invalid-feedback">Please provide a valid city.</div>
						</div>
						<div class="col-12 text-end">
							<button class="btn btn-sm btn-primary" type="submit">Create</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<?= $this->endSection() ?>