

	<!-- TiniMce -->
	<script src="<?= base_url() ?>plugins/tinymce/tinymce.min.js"></script>
	<script>
		tinymce.init({
			selector: "#konten",theme: "modern",height: 360,
			plugins: [
				"advlist autolink link image lists charmap print preview hr anchor pagebreak",
				"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
				"table contextmenu directionality emoticons paste textcolor"
		],
		toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
		toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
		image_advtab: true ,
		external_filemanager_path:"<?= base_url() ?>plugins/filemanager/",
		filemanager_title:"Responsive Filemanager" ,
		external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
		});
	</script>

	<!-- select2 plugin -->
	<script src="<?= base_url() ?>assets/_admins/assets/libs/select2/js/select2.min.js"></script>
	<script>

		$(function () {
			//Initialize Select2 Elements
			$('.select2').select2()

		})

		$(function () {
			//Initialize Select2 Elements
			get_kategori();
		})

		// Tampil data kategori
		function get_kategori(id){
			var url  = "<?= base_url($uri_segment) ?>getCategory";
			let get = $.get(url);
			get.done(function(respon){
				var html = '';
				for (var i = 0; i < respon.length; i++) {
					var selected = '';
					if(id == respon[i].id){
						selected = 'selected';
					}
					html += '<option value="' + respon[i].id + '" '+selected+'>' + respon[i].nama.toUpperCase() + '</option>';
				}
				$('#kategori_id').html(html);
			});
			get.fail(function(respon){
				toastr.error('Gagal!, Terjadi kesalahan.');
			});
		}

		function readURL(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader()
                reader.onload = function(e) {
                    $('#show-cover').attr('src', e.target.result)
                }
                reader.readAsDataURL(input.files[0])
            }
        }
	</script>