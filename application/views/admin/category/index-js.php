<script>
    let mainTable;
	let tabel;

		$(document).ready(function(){
			load_table();
		});

		function load_table(){
			tabel = $('#datatable').DataTable({
				processing: true,
				serverSide: true,
				pageLength: 10,
				paging: true,
				lengthChange: true,
				searching: true,
				ordering: true,
				info: true,
				autoWidth: false,
				lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
				order: [],
				ajax: {
					url: "<?= base_url('admin/category/get_data_table')?>",
					type: "POST",
					dataType: "json"
				},
				columnDefs: [
					{
						targets: [ 0,1,4,],
						orderable: false
					},
					{
						targets: [0,3,4],
						className: 'text-center'
					},
				],
			});
		}

        $(() => {

            $('.add-button').on('click', function () {
                $('#id').val('');
                $('#modal-form').modal('show')
                $('#nama').val('')
                $('#deskripsi').html('')
                $('.form-title').html('Create Form')

            })

            $('.table-data').on('click', '.btn-edit', function () {
				let id = $(this).data('id')
                let row = tabel.row($(this).closest('tr')).data()
                $('#modal-form').modal('show')
                $('.form-title').html('Edit Form')
                $('#id').val(id);
                $('#nama').val(row[1]);
                $('textarea#deskripsi').html(row[2])
                $('textarea#deskripsi').val(row[2])
            })

            $('.table-data').on('click', '.btn-change', function () {
                let id   = $(this).attr('data');
				let url  = "<?= base_url($uri_segment)?>changeStatus";
				let data = {id: id};

				// ajax delete data to database
				Swal.fire({
					title: 'Apakah Anda Yakin?',
					text: "Ingin Mengubah Status Data!",
					icon: "warning",
					icon:"warning",
					showCancelButton: true,
					confirmButtonColor: '#1cbb8c',
					cancelButtonColor:"#f32f53",
					confirmButtonText: '<i class="fa fa-check"></i>',
					cancelButtonText: '<i class="fa fa-times"></i>',
					html: false,
					preConfirm: function() {
						return new Promise(function (resolve) {
							setTimeout(function () {
								resolve();
							}, 50);
						});
					}
				}).then(function(result){
					if (result.value) {
						$.post(url, data).done((res) => {
							tabel.ajax.reload();
							toastr["success"]('Status berhasil diubah!')
						})
					}
				});

            })

            $('.table-data').on('click', '.btn-delete', function () {
                let id = $(this).data('id');
				let url = '<?= base_url('admin/category/destroy')?>'

                Swal.fire({
                    text: 'Delete this data',
                    type: 'warning',
                    icon:"warning",
                    showCancelButton: true,
                    confirmButtonColor: '#1cbb8c',
                    cancelButtonColor:"#f32f53",
                    confirmButtonText: '<i class="fa fa-check"></i>',
                    cancelButtonText: '<i class="fa fa-times"></i>',
                    html: false,
                    preConfirm: function() {
                        return new Promise(function (resolve) {
                            setTimeout(function () {
                                resolve();
                            }, 50);
                        });
                    }
                }).then(function(result){
                    if (result.value) {
                        $.post(url, {
                            id: id,
                            _method: 'delete'
                        }).done((res) => {
                            if (res.status) {
                                toastr["success"](res.mssg)
                                tabel.ajax.reload();
                            } else {
                                Swal.fire({
                                    type: 'error',
                                    text: res.mssg
                                });
                                tabel.ajax.reload();
                            }
                        })
                    }
                });
            })

            $('#form-edit-status').submit(function(e) {
                e.preventDefault()

                let data = new FormData(this)

                let post  = $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: data,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                })

                post.done(function(respon){
                    tabel.ajax.reload();
                    if(respon.status == true){
                        $('#modal-active').modal('hide')
                        toastr["success"](res.mssg)
                    }else{
                        toastr.error( 'Periksa kembali inputan nda', 'Gagal', { timeOut: 2000, fadeOut: 2000 });
                    }
                })

                post.fail(function(respon){
                    toastr.error( 'Ada inputan yang belum terisi', 'Gagal', { timeOut: 2000, fadeOut: 2000 });
                    tabel.ajax.reload();
                })

            });

            $('#form-create').submit(function(e) {
                e.preventDefault()

                let data = new FormData(this)

                let post  = $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: data,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                })

                post.done(function(res){
                    tabel.ajax.reload()
                    if(res.status == true){
                        $('#modal-form').modal('hide')
                        toastr["success"](res.mssg)
                    }else{
                        toastr.error( 'Request time out', 'Gagal', { timeOut: 2000, fadeOut: 2000 });
                    }
                })

                post.fail(function(respon){
                    toastr.error( 'Ada inputan yang belum terisi', 'Gagal', { timeOut: 2000, fadeOut: 2000 });
                    tabel.ajax.reload();
                })

            });


        })


</script>