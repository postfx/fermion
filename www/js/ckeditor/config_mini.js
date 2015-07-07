/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
        config.toolbar = [
            { name: 'document', items : [ 'Source','-','NewPage','Preview' ] },
            { name: 'clipboard', items : [ 'Undo','Redo' ] },
            { name: 'editing', items : [ 'Find','Replace' ] },
            { name: 'tools', items : [ 'Maximize' ] },
            '/',
            { name: 'basicstyles', items : [ 'TextColor','BGColor','-','Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
            { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock' ] },
            { name: 'links', items : [ 'Link','Unlink' ] },
        ];
        config.filebrowserUploadUrl = '/js/ckeditor/upload.php';
};
