/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	
	
	
	
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo'  ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
 		{ name: 'insert' },
		'/',
		{ name: 'forms' },
		{ name: 'tliyoutube' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others'  },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' },
		{ name: 'strinsert' },
		{ name: 'wenzgmap' },
 		 
 	];

 	config.extraPlugins = 'strinsert,wenzgmap,tliyoutube';
	
	//config.extraPlugins = 'wenzgmap';     /* extra*/
	//config.extraPlugins = 'tliyoutube';
	
	 
	
	
	 
	
	config.strinsert_button_label = 'Content Block';
    config.strinsert_button_title = config.strinsert_button_voice = 'Insert Content Block';
	
	
	//config.filebrowserImageBrowseUrl = baseUrl+'/admin/index/browse';
	//config.filebrowserUploadUrl = baseUrl+'/admin/index/upload';
	
 	
	
};

CKEDITOR.config.allowedContent = true;
CKEDITOR.config.protectedSource.push(/<i[^>]*><\/i>/g);


 