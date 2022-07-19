
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0"><?= $page_title ?></h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Post</li>
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

                <h4 class="card-title">List Post</h4>

                <br>
                <button class="btn btn-sm btn-success btn-add">Create</button>
                <hr>

                <table id="datatable" class="table table-bordered table-data" data-url="<?= $uri_segment.'getData' ?>" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
					<thead>
						<tr>
							<th width="5%">#</th>
							<th>Judul</th>
							<th>Kontent</th>
							<th>Status</th>
							<th>Kategori</th>
							<th style="text-align:center">Action</th>
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
