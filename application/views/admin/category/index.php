
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?= $page_title ?></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Category</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">List Category</h4>

                <br>
                <button class="btn btn-sm btn-success add-button">Create</button>
                <hr>

                <table id="datatable" class="table table-bordered table-data" data-url="<?= $uri_segment.'get_data_table' ?>" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">#</th>
                            <th class="align-middle">name</th>
                            <th class="align-middle">description</th>
                            <th class="align-middle">active</th>
                            <th class="text-center align-middle">
                                action
							</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div>
<!-- end row -->

<!-- sample modal content -->
<div id="modal-form" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-create" action="<?= base_url($uri_segment.'store') ?>" method="POST">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title form-title">Create Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

				<div class="form-group" hidden>
					<label>id</label>
					<input type="text" class="form-control" id="id" name="id">
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input type="text" class="form-control" id="nama" name="nama">
					<p id='error_nama'></p>
				</div>
				<div class="form-group">
					<label>Deskripsi</label>
					<textarea class="form-control" rows="3" placeholder="" id="deskripsi" name="deskripsi"></textarea>
					<p id='error_deskripsi'></p>
				</div>
				<div class="form-group">
					<label>Status</label>
					<div class="form-check mb-3">
						<input id="formRadios1" class="form-check-input" type="radio" name="aktif"
							value="1" checked>
						<label class="form-check-label" for="formRadios1">
							Tampilkan
						</label>
					</div>
					<div class="form-check mb-3">
						<input id="formRadios2" class="form-check-input" type="radio" name="aktif"
							value="0">
						<label class="form-check-label" for="formRadios2">
							Sembunyikan
						</label>
					</div>
				</div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
            </div>
        </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
