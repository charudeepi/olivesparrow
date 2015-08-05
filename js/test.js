$(document).ready(function(){

        var tinyShare = $('.tiny-share-btn', this),
            shareContainer = $('.share-container', this);


        //tinyShare.click(function(){
        //    shareContainer.toggle();
        //});

    $('.share-holder').mouseover(function(){
        $('.share-container', this).show();
    }).mouseout(function(){
        $('.share-container', this).hide();
    });



    $('.share-item').click(function(evt){
        evt.preventDefault();

        var gotoPage = this.href;
        shareContainer.toggle();

        window.open(gotoPage);


    });


//        var title = hgQuery('.hgwidget-real-title', this).text(),
//                        clickToWatch = hgQuery('.hgwidget-click-to-watch', this);
//    });


//    $(document).click(function (e) {
//                var clicked = $(e.target);
//                if (!clicked.hasClass('tiny-share-btn')) {
//                    $('.share-container').show();
//                }else {
//                    $('.share-container').hide();
//                }
//            });

});