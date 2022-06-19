(function($) {
	"use strict";

	var checkboxes = $('input[type="checkbox"]');
	var selectMenu = $('.menu-select');
	var selectMenuVal = selectMenu.val();
	var nestableMenuPanel = $('#nestable');
	var nestableMenuOutput = $('#nestable-output');
	var nestablePagesPanel = $('#nestable2');
	var nestedPagesOutput = $('#nestable2-output');

	init();

	$("#sidebarToggle").on("click", function(e) {
		e.preventDefault();
		$("body").toggleClass("sb-sidenav-toggled");
	});

	checkboxes.on('change', function(){
		var self = $(this);
		self.val(self.is(':checked') ? 1 : 0);
	});
	
	$('#additional_script').on('keydown', function(event){
		if(event.keyCode === 9){
			var val = this.value,
				selectionStart = this.selectionStart,
				selectionEnd = this.selectionEnd;

			this.value = val.substring(0, selectionStart) + '\t' + val.substring(selectionEnd);
			this.selectionStart = this.selectionEnd = selectionStart + 1;

			return false;
		}
	});


	selectMenu.on('change', function(){
		var self = $(this);

		if(selectMenuVal != self.val()){
			window.location.href = $('[data-base-url]').data('base-url') + 'menu/edit/' + self.val();
		}
		
	});

	$('.menu-shortcode-custom').on('input', function(){
		var shortcodeKey = $(this).val().replace(/[^a-zA-Z0-9]/g,'_').toLowerCase();
		$('.menu-shortcode span').text(shortcodeKey);
	});

	$('.add-menu-item').on('click', addMenuItem);

	$(document).on('click', '.add-custom-menu', addCustomMenu);

	$(document).on('click', '.edit-custom-menu', editCustomMenu);

	$(document).on('click', '.remove-menu', removeCustomMenu);

	$(document).on('click', function(e){
		var target = $(e.target);
		var itemMenu = target.closest('.dd-item');
		
		if(!itemMenu.find('.menu-action').length){
			//itemMenu.find('.edit-menu-fields').show();
			$('.edit-menu-fields').hide();
		}else{
			
		}

	});

	$(document).on('input', '.edit-custom-title', function(){
		var self = $(this);
		var itemMenu = self.closest('.dd-item');
		var val = self.val() ? self.val() : 'Custom Menu';

		itemMenu.find('> .dd-handle .dd-handle-text').text(val);
		itemMenu.data('title', val);

		updateMenuOutput(nestableMenuPanel.data('output', nestableMenuOutput));
		updateMenuOutput(nestablePagesPanel.data('output', nestedPagesOutput));
	});

	$(document).on('input', '.edit-custom-link', function(){
		var self = $(this);
		var itemMenu = self.closest('.dd-item');

		itemMenu.data('slug', self.val());

		updateMenuOutput(nestableMenuPanel.data('output', nestableMenuOutput));
		updateMenuOutput(nestablePagesPanel.data('output', nestedPagesOutput));
	});

	$(document).on('drag:start', function(){
		$('.edit-menu-fields').hide();
	});
	

	/***********End Menu**************/


	/***********Image**************/

    $(document).on('change blur', '.custom-file-input', function(){
		previewUpload(this);
	});

	$('.file-reset-btn').on('click', function(){
		var self = $(this);
		var inputFileContainer = self.closest('.input-file-con');
		var inputCurrentImage = inputFileContainer.find('.current-image');
		
		self.parent().find('.custom-file-reset').val(1);
		inputFileContainer.find('.image-output').addClass('default-img');
		inputFileContainer.find('.image-name').text('No image chosen.');
		inputCurrentImage.val(inputCurrentImage.data('image'));
	});

	/*********** End Image**************/

	/*********** Gallery**************/

	$('.add-gallery').each(function(i, v){

		var self = $(this);
		var lastElement = self.closest('.form-group').find('.gallery-input-wrap').find('.input-gallery-con').last();
		self.on('click', function(){
			appendGalleryBlock(this, lastElement);
		});
	});

	$(document).on('click', '.gallery-delete-btn:not(".disabled")', function(){
		var self = $(this);
		var index = self.data('index');
		var currentImage = self.closest('.form-group').find('.current-image-' + index);

		currentImage.val(currentImage.data('image'));
		self.closest('.input-gallery-con').remove();
	});

	/*********** End Gallery**************/

	function init(){
		var navLink = $("#layoutSidenav_nav .sb-sidenav a.nav-link");

		navLink.each(function() {
			var self = $(this);
			if (this.href === window.location.href) {
				self.addClass("active").closest('.collapse').show();
			}
		});

		if($('#dataTable').length){
			$('#dataTable').DataTable();
		}

		/***********Menu**************/

		if(nestableMenuPanel.length){

			nestableMenuPanel.nestable({
				group: 1
			}).on('change', updateMenuOutput);

			nestablePagesPanel.nestable({
				group: 1
			}).on('change', updateMenuOutput);

			updateMenuOutput(nestableMenuPanel.data('output', nestableMenuOutput));
			updateMenuOutput(nestablePagesPanel.data('output', nestedPagesOutput));
		}

	}

	function updateMenuOutput(e){
		var list   = e.length ? e : $(e.target),
			output = list.data('output');

			if(output){
				output.val(JSON.stringify(list.nestable('serialize')));
			}
	}

	function customMenu(){
		return '<li class="dd-item custom-menu-item" data-type="custom" data-id="0" data-name="default" data-title="Custom Menu" data-slug="#"><div class="dd-handle"><div class="dd-handle-text">Custom Menu</div></div><div class="menu-action"><i class="fa fa-pencil-square-o edit-custom-menu" aria-hidden="true"></i><span class="remove-menu">X</span><div class="edit-menu-fields"><input type="text" class="edit-custom-title" placeholder="Title"><input type="text" class="edit-custom-link" placeholder="Type link here..."></div></div></li>';
	}

	function addCustomMenu(e){
		var menuList = $('#nestable2 > .dd-list');

		if(!nestablePagesPanel.find('.dd-item').length){
			nestablePagesPanel.html('<ol class="dd-list">'+ customMenu() +'</div>');
		}else{
			menuList.prepend(customMenu);
		}

		updateMenuOutput(nestableMenuPanel.data('output', nestableMenuOutput));
		updateMenuOutput(nestablePagesPanel.data('output', nestedPagesOutput));
		
		e.preventDefault();
	}

	function editCustomMenu(e){

		var target = $(e.target);
		var itemMenu = target.closest('.dd-item');
		var parent = target.parent();
		var editMenuFields = parent.find('.edit-menu-fields');
		var editMenuTitle = parent.find('.edit-custom-title');
		var editLinkField = parent.find('.edit-custom-link');

		$('.edit-menu-fields').hide();
		editMenuFields.show();

		editMenuTitle.val(itemMenu.data('title'));
		editLinkField.val(itemMenu.data('slug'));

		updateMenuOutput(nestableMenuPanel.data('output', nestableMenuOutput));
		updateMenuOutput(nestablePagesPanel.data('output', nestedPagesOutput));

	}

	function removeCustomMenu(e){

		var self = $(this);
		var menuWrap = self.closest('.dd');
		var ddList = self.closest('.dd-list');
		var ddItem = self.closest('.dd-item');

		if(!ddItem.siblings('.dd-item').length){
			ddList.siblings('button').remove();
			ddList.remove();
		}else{
			ddItem.remove();
		}

		if(!menuWrap.find('.dd-item').length){
			menuWrap.find('.dd-list').html('<div class="dd-empty"></div>');
		}

		updateMenuOutput(nestableMenuPanel.data('output', nestableMenuOutput));
		updateMenuOutput(nestablePagesPanel.data('output', nestedPagesOutput));

	}

	function addMenuItem(e){
		return '<li class="dd-item custom-menu-item" data-type="custom" data-id="0" data-name="default" data-title="Custom Menu" data-slug="#"><i class="fa fa-pencil-square-o edit-menu" aria-hidden="true"></i><div class="dd-handle"><div class="dd-handle-text">Custom Menu</div></div><span class="remove-menu">X</span><input type="text" class="edit-custom-field"></li>';
	}

	function previewUpload(input){
        var file = $(input).get(0).files[0];

        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){

            	var fileInputContainer = $(input).closest('.input-file-con');
            	var dataIndex = fileInputContainer.find('[data-index]').data('index');
            	var currentImage = fileInputContainer.closest('.form-group').find('.current-image');
            	var currentGalleryImage = fileInputContainer.closest('.form-group').find('.current-image-' + dataIndex);
                
                fileInputContainer
					.find('.image-output')
					.removeClass('default-img')
					.css('background-image', 'url(' + reader.result + ')');

				fileInputContainer
					.find('.custom-file-reset')
					.val(0);

				fileInputContainer
					.find('.image-name')
					.text(file.name);

				fileInputContainer
					.find('.gallery-current-image')
					.val(fileInputContainer.find('.gallery-current-image').data('image'));

				currentImage.val(currentImage.data('image'));

				currentGalleryImage.val(currentGalleryImage.data('image'));
            }
 
            reader.readAsDataURL(file);
        }
    }

	function appendGalleryBlock(el, existingElement){

		var self = $(el);
		var parent = self.closest('.form-group').find('.gallery-input-wrap');
		var galleryCon = 'input-gallery-con';
		var galleryKeyName = parent.data('gallery');
		var galleryLastChild = parent.find('.' + galleryCon).last();
		var index = galleryLastChild.index() + 1;
		var gallery = galleryLastChild
			.find('.gallery-title-input')
			.closest('.input-gallery-con')
			.prop('outerHTML');
		var updateInput = function(){
			var lastChild = parent.find('.' + galleryCon).last();

			lastChild
				.find('.gallery-title-input')
				.attr('name', galleryKeyName + '_title[' + (parseInt(index)) + ']')
				.val('');

			lastChild
				.find('.gallery-file-input')
				.attr('name', galleryKeyName + '_image_' + (parseInt(index)));
			
			lastChild
				.find('.gallery-delete-btn')
				.data('index', (parseInt(index)))

			lastChild
				.find('.image-output')
				.css('background-image', 'url(assets/admin/images/image.jpg)');

			lastChild
				.find('.gallery-current-image')
				.remove();
		};

		parent.append(galleryLastChild.length ? gallery : existingElement);

		self.parent().find('.save-note').show();

		updateInput();
	}

	/*var x = [];
	var children = [];
	function wee(el){

		el = el.find('> li').length ? el.find('> li') : el.find('> ul');

		el.each(function(i){
			var self = $(this);
			var children = self.find('> ul li');
			var data = self.data();

			if(children.length){
				data.children = [];
			}

			if(children.length){

				self.find('> ul li').each(function(){
					var _self = $(this);
					
					data.children.push(_self.data());

					wee($(this));

				});
			}

			x.push(data);
		});
		
	}
	wee($('.test'));

	console.log(x);
	console.log(children);*/

	/*function serialize(){
        var data,
            depth = 0,
            list  = this;

            step  = function(level, depth)
            {
                var array = [ ],
                    items = level.children('li');

                items.each(function()
                {
                    var li   = $(this),
                        item = $.extend({}, li.data()),
                        sub  = li.children('ul');
                    if (sub.length) {
                        item.children = step(sub, depth + 1);
                    }
                    array.push(item);
                });
                return array;
            };
        data = step($('.wee ul').first(), depth);
        return data;
    }

    console.log(serialize());*/


})(jQuery);