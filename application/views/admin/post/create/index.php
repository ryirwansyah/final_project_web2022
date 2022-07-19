
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-sm-flex align-items-center justify-content-between">
				<h4 class="mb-sm-0">Post</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item">Dashboard</li>
						<li class="breadcrumb-item">Post</li>
						<li class="breadcrumb-item active">Create</li>
					</ol>
				</div>

			</div>
		</div>
	</div>

	<?php
	if (isset($msg)){
	?>
		<div class="alert alert-danger mb-2" role="alert">
			<strong>Info!</strong> <?= $msg ?>
		</div>
	<?php
	}
	?>

	<div class="row">
		<div class="col-12">

			<form method="POST" action="<?= base_url('admin/post/store') ?>" enctype="multipart/form-data">        <div class="card">
				<div class="card-body">

					<h4 class="card-title">Create Form</h4>
					<p class="card-title-desc">Silahkan cek dan lengkapi data terlebih dahulu.</p>

					<div class="row">
						<div class="col-md-8">

							<div class="mb-3">
								<label for="validationCustom01" class="form-label">Title</label>
								<input type="text" name="judul" class="form-control" required/>
								<div class="valid-feedback">
								</div>
							</div>

							<div class="mb-3">
								<label for="validationCustom01" class="form-label">Content</label>
								<textarea id="konten" name="konten" placeholder="Place some text here" style="width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
								<div class="valid-feedback">
								</div>
							</div>

						</div>
						<div class="col-md-4">

							<div class="mb-3">

								<label for="validationCustom02" class="form-label">Category</label>
								<div class="float-right">
								</div>

								<div class="row">
									<div class="col-md-12">
										<select name="kategori_id" id="kategori_id" class="form-control select2" style="width: 100%;" required>
											<option value=""></option>
										</select>
										<div class="valid-feedback">
										</div>
									</div>
								</div>

							</div>

							<div class="mb-3">
								<label for="validationCustom02" class="form-label">Image</label>
								<div class="row">
									<div class="input-group">
										<input type="file" id="file" name="file" class="form-control custom-file-input" onchange="readURL(this);">
									</div>
									<div class="valid-feedback">
									</div>
								</div>
							</div>

							<div class="mb-3">
								<div class="row">
									<div class="input-group">
										<img id="show-cover" class="img-thumbnail" alt="200x200" width="100%" src="<?= base_url() ?>assets/_admins/assets/images/small/img-3.jpg" data-holder-rendered="true">
									</div>
								</div>
							</div>

							<div class="mb-3">
								<label for="validationCustom02" class="form-label">Date Publish</label>
								<div class="row">
									<div class="input-group">
										<input type="date" id="date_publish" class="form-control" name="tanggal_publish"
										value="" />
									</div>
									<div class="valid-feedback">
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<button type="submit" class="btn btn-primary float-right"> Submit </button>
						</div>
					</div>

				</div>
			</div>
			</form>

		</div> <!-- end col -->
	</div>
	<!-- end row -->