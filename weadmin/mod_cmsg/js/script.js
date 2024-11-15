$('input[name="inputTypeC"]').on('click', function(){
    let value = $(this).val();
    if (value == 1) {
        $('.TypeDetail').show();
        $('.TypeDownload').show();
        $('.TypeLink').hide();
    }else if(value == 2){
        $('.TypeDetail').hide();
        $('.TypeDownload').show();
        $('.TypeLink').hide();
    }else{
        $('.TypeDetail').hide();
        $('.TypeDownload').hide();
        $('.TypeLink').show();
    }
});
$('input[name="inputTypePic"]').on('click', function(){
    let value = $(this).val();
    if (value == 1) {
        $('.PicDefault').show();
        $('.PicUpload').hide();
    }else{
        $('.PicDefault').hide();
        $('.PicUpload').show();
    }
});