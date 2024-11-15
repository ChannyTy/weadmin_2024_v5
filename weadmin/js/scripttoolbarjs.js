// JavaScript Document
$(function() {
	$('.buttonEdit').toolbar({
		  content: '#toolbar-options',
		  position: 'bottom',
		  style: 'warning',
		  event: 'click',
		  hideOnClick: true
	});
	
	$('.btnview').toolbar({
		  content: '#toolbar-view',
		  position: 'bottom',
		  style: 'warning',
		  event: 'click',
		  hideOnClick: true
	});
	
});