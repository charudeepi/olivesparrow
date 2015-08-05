$(document).ready(function(){

    $('.btn-sparrow')
        .mouseover(function(){
            $(this).find('.inner-bubble').show();
        })
        .mouseout(function(){
            $(this).find('.inner-bubble').hide();
        });

});