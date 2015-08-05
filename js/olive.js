//$(document).ready(function(){
//    OS.initPage();
//    OS.trainingsPage();
//    OS.trainingIndex();
//    OS.resourcesPage();
//    OS.resourcesIndex();
//    OS.initSlideShow();
//
//    var hash = location.hash;
//    if(hash){
//
//        OS.loadHash(hash);
//    }
//
//    $(window).bind( 'hashchange', function(e) {
//        OS.loadHash(location.hash);
//    });
//});

var OS = {

    loadHash : function(hash){
        var hashparam = hash.split("#"),
            ampParam = hashparam[1].split("="),
            contentId = ampParam[1];
        if(ampParam[0]=='training'){
            OS.showContent(contentId);
            OS.loadTraining(contentId);
            location.hash = '';
        }else if(ampParam[0]=='resource'){
            OS.showContent(contentId);
            OS.loadResource(contentId);
            location.hash = '';
        }else if(ampParam[0]=='training_type'){
            OS.showThumbs(contentId);
            OS.loadTrainingThumbs(contentId);
            location.hash = '';
        }else if(ampParam[0]=='resource_type'){
            OS.showResourceThumbs(contentId);
            //OS.loadResourceThumbs(contentId);
            location.hash = '';
        }
    },

    initPage : function() {

    },

    resourcesIndex : function() {

        if( $('.r-cat-item')){
            var thumbList = $('.r-cat-item');
            thumbList.click(function(){
                var dataId = $(this).attr('data-id');
                location.hash = 'resource_type='+dataId;
            });
            $('.r-cat-item').first().click();
        }
    },

    trainingIndex : function() {
        if( $('.thumbnail-list-cat') && $('.tooltip-container')){

            var thumbList = $('.thumbnail-list-cat');
            thumbList.click(function(){
                var dataId = $(this).attr('data-id');
                location.hash = 'training_type='+dataId;

            });
        }
    },


    trainingsPage : function() {

        if( $('.thumbnail-list') && $('.tooltip-container')){

            var thumbList = $('.thumbnail-list');

            thumbList
                .click(function(){
                    var dataId = $(this).attr('data-id');
                    location.hash = 'training='+dataId;
                    OS.loadTraining(dataId);
                })
                .mouseenter(function(){
                    var rThumb = $('.training-thumb', this),
                        objContainer = $('.training-object-container', this);
                    objContainer.css('border-color','#A2CA00');
                    rThumb.css('border-color','#A2CA00');
                    if($(this).find('.actions')) {
                        $(this).find('.actions').show();
                    }
                })
                .mouseleave(function(){
                    var rThumb = $('.training-thumb', this),
                        objContainer = $('.training-object-container', this);
                    objContainer.css('border-color','#CDD3AF');
                    rThumb.css('border-color','#CDD3AF');
                    if($(this).find('.actions')) {
                        $(this).find('.actions').hide();
                    }
                });
            OS.setMenu();
        }
    },

    setMenu : function() {
        if($('#main-heading')) {
            $('#main-heading').click(function() {
                $('#'+$(this).attr('data-hide')).hide();
                $('#'+$(this).attr('data-show')).show();
                $(this).removeClass('selected');
                $('.breadcrumb').html('');
                $("#trainings-container").fadeIn('1000');

            });
            $('#active-training-cat').click(function(){
                var dataId = $(this).attr('data-id');
                location.hash = 'training_type='+dataId;
                $('#active-training').html(''); // all next or closest breadcrumb set-blank-html
            });
        }
    },

    loadTrainingThumbs : function(dataId) {
        var trainingCatTitle = $('#li-training-cat-'+dataId).find('.title').html();
        $( "#details-container" ).hide();
        $('#thumbnail-wrapper').hide();
        $('#active-training-cat').attr("data-id",dataId);
        $('#active-training-cat').html(" > "+trainingCatTitle);
        $('#main-heading').addClass('selected');
        $( "#trainings-container" ).fadeIn('1000');
        $( "#trainings-wrapper" ).show();

        OS.setMenu();
    },


    loadTraining : function(dataId) {
        var trainingTitle = $('#li-training-'+dataId).find('.title').html();
        $('#trainings-container').hide();
        $('#active-training').html(" > "+trainingTitle);
        $('#main-heading').addClass('selected');
        $( "#details-container" ).fadeIn('1000');

//        if($('#trainings-container').hasClass('is-second')) {
//            $('#selected-training-img').find('.training-thumb').addClass('selected');
//        }
    },

    initSlideShow : function(){
        if($('#slides').height() !== null){
            $('#slides').slides({
                preload: true,
                preloadImage: 'images/slide/loading.gif',
                play: 5000,
                pause: 2500,
                hoverPause: true,
                animationStart: function(current){
                    $('.caption').animate({
                        bottom:-35
                    },100);
                    if (window.console && console.log) {
                        // example return of current slide number
                        console.log('animationStart on slide: ', current);
                    };
                },
                animationComplete: function(current){
                    $('.caption').animate({
                        bottom:0
                    },200);
                    if (window.console && console.log) {
                        // example return of current slide number
                        console.log('animationComplete on slide: ', current);
                    };
                },
                slidesLoaded: function() {
                    $('.caption').animate({
                        bottom:0
                    },200);
                }
            });
            OS.initFeaturedTrainings();
        }
    },

    initFeaturedTrainings : function(){

        if($('.index-container2')){
            $('.fl', '#tkm').mouseenter(function(){
                $('.training-flyout').hide();
                $('.training-flyout', this).animate({
                    width: 'show'
                }, 300);

            }).mouseleave(function(){
                    $('.training-flyout', this).hide();
                });

            $('.resource-item', '#resource-item-container').mouseenter(function(){
                $('.training-flyout').hide();
                $('.training-flyout', this).show();

            }).mouseleave(function(){
                    $('.training-flyout', this).hide();
                });

        }

    },

    loadResource : function(dataId) {
        var resourceCatTitle = $('#li-resource-'+dataId).attr('data-type'),
            resourceTitle = $('#li-resource-'+dataId).find('.r-title').html();
        $('#resources-container').hide();
        //cloneImg.appendTo($('#selected-training-img'));
        $('#active-training-cat').html(" > "+resourceCatTitle);
//        $('#training-title').html(resourceCatTitle);
        $('#active-training').html(" > "+resourceTitle);
        $('#main-heading').addClass('selected');
        $( "#details-container" ).fadeIn('1000');

        if($('#trainings-container').hasClass('is-second')) {
            $('#selected-training-img').find('.training-thumb').addClass('selected');
        }
    },

    resourcesPage : function(){

        if($('#resources-container')){
            var listItmes = $('#resources-holder').find('.r-item');
            listItmes
                .mouseenter(function(){
                    var rThumb = $('.r-thumb', this);
                    $(this).css('border-color','#A2CA00');
                    rThumb.css('border-color','#A2CA00');
                })
                .mouseleave(function(){
                    var rThumb = $('.r-thumb', this);
                    $(this).css('border-color','#CDD3AF');
                    rThumb.css('border-color','#CDD3AF');
                })
                .click(function(){
                    var dataID = $(this).attr('data-id');
                    OS.loadResource(dataID);
                    location.hash = "resource="+dataID;
                });

            if($('#main-heading')) {
                $('#main-heading').click(function() {
                    $('#details-container').hide();
                    //$('#selected-training-img').html('');
                    $('#training-title').html('');
                    $('#active-training').html('');
                    $('#main-heading').removeClass('selected');
                    $( "#resources-container" ).fadeIn('1000');

                });
            }
        }
    },

    // -------- first level category for trainings page ------

    showThumbs : function(idtype) {

        var data='idtype='+idtype;

        $.ajax({
            type: 'POST',
            url: 'thumbajax',
            //url: '<?php echo Yii::app()->createAbsoluteUrl("site/ajax"); ?>',
            data:data,
            success:function(data){
                jQuery('#trainings-wrapper').html(data);
                OS.trainingsPage();
            },
            error: function(data) { // if error occured
                //alert("Error occured.please try again");
                //alert(data);
            },

            dataType:'html'
        });
    },
    // -------- first level category for resources page ------

    showResourceThumbs : function(idtype) {

        var data='idtype='+idtype;

        $.ajax({
            type: 'POST',
            url: 'resourceajax',
            //url: '<?php echo Yii::app()->createAbsoluteUrl("site/ajax"); ?>',
            data:data,
            success:function(data){
                jQuery('#resources-holder').html(data);
                $('.r-cat-item').removeClass('selected');
                $('#li-resource-cat-'+idtype).addClass('selected');
                OS.resourcesPage();
            },
            error: function(data) { // if error occured
                //alert("Error occured.please try again");
                //alert(data);
            },

            dataType:'html'
        });
    },

    showContent : function(id) {

        var data='id='+id;

        $.ajax({
            type: 'POST',
            url: 'ajax',
            //url: '<?php echo Yii::app()->createAbsoluteUrl("site/ajax"); ?>',
            data:data,
            success:function(data){
                jQuery('#details-container').html(data);
                $('hidden-header').html().clone().appendTo('#training-bc-holder');
                $('hidden-header').remove();
                //console.log($('hidden-header').html());
            },
            error: function(data) { // if error occured
                //alert("Error occured.please try again");
                //alert(data);
            },

            dataType:'html'
        });
    }
}
