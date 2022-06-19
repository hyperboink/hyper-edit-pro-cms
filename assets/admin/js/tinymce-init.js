tinymce.init({
		selector: '.mce-input',
		height: 250,
		/*plugins: [
			'advlist autolink lists link charmap print preview anchor',
			'searchreplace visualblocks code fullscreen',
			'insertdatetime media table contextmenu paste code'
		],
		 toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',*/
		 plugins: [
			'advlist autolink lists link textcolor colorpicker',
			'table code',
			'contextmenu'
		],
		toolbar: 'fontsizeselect | insertfile undo redo | forecolor | bold italic | alignment | bullist numlist | link | table | tools  | code',
		menubar: '',
		fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
		extended_valid_elements: "span[class|align|style]",
		setup: function (editor) {

			editor.on('change', function () {
				editor.save();
			});

			editor.on('init', function (ed) {
				this.getDoc().body.style.fontSize = '15px';
				this.getDoc().body.style.textAlign = 'left';
				this.getDoc().body.style.fontColor = '#495057';
				this.getDoc().body.style.padding = '0 5px';
				this.getDoc().body.style.lineHeight = '25px';
				this.getDoc().body.style.fontFamily = '"Segoe UI", "Arial", sans-serif';
			});

			editor.addButton('alignment', {
				type: 'listbox',
				icon: 'alignleft',
				onselect: function(e) {
					tinyMCE.execCommand(this.value());
				},
				values: [
					{icon: 'alignleft', value: 'JustifyLeft'},
					{icon: 'alignright', value: 'JustifyRight'},
					{icon: 'aligncenter', value: 'JustifyCenter'},
					{icon: 'alignjustify', value: 'JustifyFull'},
				],
				onPostRender: function() {
					this.value('JustifyLeft');
				}
			});
		},
		branding: false,
		content_style: "body { font-size: 40px; font-family: Arial; }"
	});