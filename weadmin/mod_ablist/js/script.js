// JavaScript Document
// ####################################### Start Product ################################################# //


function checkCodeMem(fileAc) {
	
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});


	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxCheckMemPro").show();
			jQuery("#boxCheckMemPro").html(html);
			setTimeout(jQuery.unblockUI, 200);
        	
		}
	}); 
}



function emailGWait(fileAc) {
	

	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxEmailGWait").show();
			jQuery("#boxEmailGWait").html(html);
        	
		}
	}); 
}


function searcgEmailGWait(fileAc) {
	
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});


	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxEmailGWait").show();
			jQuery("#boxEmailGWait").html(html);
			setTimeout(jQuery.unblockUI, 200);
        	
		}
	}); 
}


function emailGSend(fileAc) {
	

	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxEmailGSend").show();
			jQuery("#boxEmailGSend").html(html);
        	
		}
	}); 
}


function searcgEmailGSend(fileAc) {
	
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});


	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxEmailGSend").show();
			jQuery("#boxEmailGSend").html(html);
			setTimeout(jQuery.unblockUI, 200);
        	
		}
	}); 
}

function insertEmailGSend(fileAc) {
	
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});


	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxEmailGSend").show();
			jQuery("#boxEmailGSend").html(html);
			setTimeout(jQuery.unblockUI, 200);
        	
		}
	}); 
}


function delEmailGSend(fileAc) {
	
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});


	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxEmailGSend").show();
			jQuery("#boxEmailGSend").html(html);
			setTimeout(jQuery.unblockUI, 200);
        	
		}
	}); 
}


function emailWait(fileAc) {
	

	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxEmailWait").show();
			jQuery("#boxEmailWait").html(html);
        	
		}
	}); 
}


function searcgEmailWait(fileAc) {
	
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});


	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxEmailWait").show();
			jQuery("#boxEmailWait").html(html);
			setTimeout(jQuery.unblockUI, 200);
        	
		}
	}); 
}

function emailSend(fileAc) {
	

	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxEmailSend").show();
			jQuery("#boxEmailSend").html(html);
        	
		}
	}); 
}

function searcgEmailSend(fileAc) {
	
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});


	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxEmailSend").show();
			jQuery("#boxEmailSend").html(html);
			setTimeout(jQuery.unblockUI, 200);
        	
		}
	}); 
}

function insertEmailSend(fileAc) {
	
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});


	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxEmailSend").show();
			jQuery("#boxEmailSend").html(html);
			setTimeout(jQuery.unblockUI, 200);
        	
		}
	}); 
}


function delEmailSend(fileAc) {
	
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});


	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxEmailSend").show();
			jQuery("#boxEmailSend").html(html);
			setTimeout(jQuery.unblockUI, 200);
        	
		}
	}); 
}


function selectDocSend(fileAc) {
	
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});


	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#selectdocfinal").show();
			jQuery("#selectdocfinal").html(html);
			setTimeout(jQuery.unblockUI, 200);
        	
		}
	}); 
}

	function selectStyleMail(styleID) {
		jQuery('#imgTop').removeAttr('src');
		jQuery('#imgTop').attr('src','../mod_enews/img/templateT'+styleID+'.png');
	}






function modInsertEmail(fileAc) {
	
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});


	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxMailContact").show();
			jQuery("#boxMailContact").html(html);
			setTimeout(jQuery.unblockUI, 200);
        	
		}
	}); 
}


function modDelEmail(fileAc) {
	
 jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});


	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();

		jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			
			jQuery("#boxMailContact").show();
			jQuery("#boxMailContact").html(html);
			setTimeout(jQuery.unblockUI, 200);
        	
		}
	}); 
}




// ####################################### End Product ################################################# //

