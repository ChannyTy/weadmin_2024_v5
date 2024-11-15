// JavaScript Document
// ####################################### Start Product ################################################# //
$(document).on('click', '.is-happen', function () {
   var id = $(this).data('id');
   var is_happen = $(this).is(':checked');
   console.log(id, is_happen);
   $.ajax({
      type: 'POST',
      url: "update_timeline.php",
      data: {
         id: id,
         is_happen: is_happen,
         lang: $("#inputLt").val()
      },
      success: function (data) {
//         load_timeline();
      },
      error: function (jqXHR, textStatus, errorThrown) {
         console.log(jqXHR, textStatus, errorThrown);
      }
   });
});
$(document).on('click', '.del-timeline', function () {
   var id = $(this).data('id');
   if (confirm("ลบข้อมูลนี้?") == true) {
      $.ajax({
         type: 'POST',
         url: "delete_timeline.php",
         data: {
            id: id,
            lang: $("#inputLt").val()
         },
         success: function (data) {
            load_timeline();
         },
         error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
         }
      });
   }

   return false;
});

$(document).on('change', '.inputTimelineType', function () {
   var type = $('.inputTimelineType:checked').val();
   console.log(type);
   if (type == 2) {
      $("#inputTextLabel").closest('tr').show();
      setTimeout(function () {
         $("#inputTextLabel").attr('disabled', false).focus();
      }, 1);
   } else {
      $("#inputTextLabel").closest('tr').hide();
      setTimeout(function () {
         $("#inputTextLabel").attr('disabled', true).val('');
      }, 1);
   }
});

function load_timeline() {
   var dataSet = jQuery("#myForm").serialize();
   $.ajax({
      type: 'POST',
      url: "load_timeline.php",
      data: dataSet,
      dataType: 'html',
      success: function (data) {
         $(".write-timeline").html(data);
      },
      error: function (jqXHR, textStatus, errorThrown) {
         console.log(jqXHR, textStatus, errorThrown);
      }
   });
}

function addtimeline() {
   // console.log('55555');
   with (document.myForm) {

      if (inputGroupID.value == 0) {
         inputGroupID.focus();
         jQuery("#inputGroupID").addClass("formInputContantTbAlertY");
         return false;
      } else {
         jQuery("#inputGroupID").removeClass("formInputContantTbAlertY");
      }


      if (!$(".inputTimelineType").is(":checked")) {
         alert("เลือกการแสดงช่วงเวลา");
         return false;
      } else {
         var type = $(".inputTimelineType:checked").val();
         if (type == 2) {
            if (inputTextLabel.value == '') {
               inputTextLabel.focus();
               jQuery("#inputTextLabel").addClass("formInputContantTbAlertY");
               return false;
            } else {
               jQuery("#inputTextLabel").removeClass("formInputContantTbAlertY");
            }
         } else {
            jQuery("#inputTextLabel").removeClass("formInputContantTbAlertY");
         }
      }

      if (inputPublicDate.value == '') {
         inputPublicDate.focus();
         jQuery("#inputPublicDate").addClass("formInputContantTbAlertY");
         return false;
      } else {
         jQuery("#inputPublicDate").removeClass("formInputContantTbAlertY");
      }

      if (sdateInputTimeLine.value == '') {
         sdateInputTimeLine.focus();
         jQuery("#sdateInputTimeLine").addClass("formInputContantTbAlertY");
         return false;
      } else {
         jQuery("#sdateInputTimeLine").removeClass("formInputContantTbAlertY");
      }

      if (sHourInput.value == 'xx') {
         sHourInput.focus();
         jQuery("#sHourInput").addClass("formInputContantTbAlertY");
         return false;
      } else {
         jQuery("#sHourInput").removeClass("formInputContantTbAlertY");
      }
      if (sMinInput.value == 'xx') {
         sMinInput.focus();
         jQuery("#sMinInput").addClass("formInputContantTbAlertY");
         return false;
      } else {
         jQuery("#sMinInput").removeClass("formInputContantTbAlertY");
      }

      if (edateInputTimeLine.value == '') {
         edateInputTimeLine.focus();
         jQuery("#edateInputTimeLine").addClass("formInputContantTbAlertY");
         return false;
      } else {
         jQuery("#edateInputTimeLine").removeClass("formInputContantTbAlertY");
      }

      if (eHourInput.value == 'xx') {
         eHourInput.focus();
         jQuery("#eHourInput").addClass("formInputContantTbAlertY");
         return false;
      } else {
         jQuery("#eHourInput").removeClass("formInputContantTbAlertY");
      }

      if (eMinInput.value == 'xx') {
         eMinInput.focus();
         jQuery("#eMinInput").addClass("formInputContantTbAlertY");
         return false;
      } else {
         jQuery("#eMinInput").removeClass("formInputContantTbAlertY");
      }

      if (inputDescription2.value == '') {
         inputDescription2.focus();
         jQuery("#inputDescription2").addClass("formInputContantTbAlertY");
         return false;
      } else {
         jQuery("#inputDescription2").removeClass("formInputContantTbAlertY");
      }


      var dataSet = jQuery("#myForm").serialize();
      console.log(dataSet);
      $.ajax({
         type: 'POST',
         url: "insert_timeline.php",
         data: dataSet,
         dataType: 'html',
         success: function (data) {
            load_timeline();
         },
         error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR, textStatus, errorThrown);
         }
      }).done(function () {
         $('#basicModal').modal('hide');
      });

   }

}


function checkCodeProduct(fileAc) {

   jQuery.blockUI({
      message: jQuery('#tallContent'),
      css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
      }
   });


   var TYPE = "POST";
   var URL = fileAc;

   var dataSet = jQuery("#myForm").serialize();

   jQuery.ajax({type: TYPE, url: URL, data: dataSet,
      success: function (html) {

         jQuery("#boxCheckCodePro").show();
         jQuery("#boxCheckCodePro").html(html);
         setTimeout(jQuery.unblockUI, 200);

      }
   });
}



function openSelectType(fileAc) {

   jQuery.blockUI({
      message: jQuery('#tallContent'),
      css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
      }
   });


   var TYPE = "POST";
   var URL = fileAc;

   var dataSet = jQuery("#myForm").serialize();

   jQuery.ajax({type: TYPE, url: URL, data: dataSet,
      success: function (html) {

         jQuery("#boxTypeSelect").show();
         jQuery("#boxTypeSelect").html(html);
         setTimeout(jQuery.unblockUI, 200);

      }
   });
}




function openSelectSub(fileAc) {

   jQuery.blockUI({
      message: jQuery('#tallContent'),
      css: {border: 'none', padding: '35px', backgroundColor: '#000', '-webkit-border-radius': '10px', '-moz-border-radius': '10px', opacity: .9, color: '#fff'
      }
   });


   var TYPE = "POST";
   var URL = fileAc;

   var dataSet = jQuery("#myForm").serialize();

   jQuery.ajax({type: TYPE, url: URL, data: dataSet,
      success: function (html) {
         // alert('Test');

         jQuery("#boxSubSelect").show();
         jQuery("#boxSubSelect").html(html);
         setTimeout(jQuery.unblockUI, 200);

      }
   });
}