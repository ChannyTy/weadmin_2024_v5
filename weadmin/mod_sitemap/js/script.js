// JavaScript Document
async function openSelectSub(fileAc, target) {
	jQuery.blockUI({
		message: jQuery('#tallContent'),
		css: { border: 'none',padding: '35px',backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
		}
	});

	var TYPE="POST";
	var URL=fileAc;

	var dataSet= jQuery("#myForm").serialize();
		await jQuery.ajax({type:TYPE,url:URL,data:dataSet,
		success:function(html){
			jQuery(target).show();
			jQuery(target).html(html);
			setTimeout(jQuery.unblockUI, 200);
		}
	}); 
}

// ####################################### End Product ################################################# //
