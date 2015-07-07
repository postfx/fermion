$(document).ready(function(){

//    $('.changeLanguage').click(function(){
//        $.cookie('language', $(this).attr('language'), { expires: 30, path: '/' });
//        //$(this).parent().parent().parent().blur();
//        location = location;
//        return false;
//    });
    
//    $('.editable').editable({
//        validate: function(value) {
//            if ( $(this).hasClass('editable-required') && $.trim(value) == '' ) {
//                return 'Поле не может быть пустым.';
//            }
//        }
//    });
    
    //$('.selectpicker').selectpicker();
    
    footerToBot();
    
//    $("#checkbox_rubric").bootstrapSwitch({
//        'onText': 'Купить',
//        'offText': 'Снять'
//    });
    
    /* multiselect */
//    $('.multiselect').multiselect({
//        buttonWidth: '100%',
//        maxHeight: 300,
//        nonSelectedText: 'Выберите...',
//        nSelectedText: ' выбрано',
//        allSelectedText: 'Выбраны все',
//        numberDisplayed: 3,
//        includeSelectAllOption: true,
//        selectAllText: 'Выбрать все'
//    });
    /**/

//    $('#productSlider').anythingSlider({
//        hashTags: false,
//        buildStartStop: false
//    });
//    $('#blogSlider').anythingSlider({
//        hashTags: false,
//        buildStartStop: false,
//        buildNavigation: false
//    });
    
    //$('.fancybox').fancybox();
    
    $('[data-toggle="tooltip"]').tooltip({
        html: true,
        container: 'body'
    });
    
    $('[data-toggle="popover"]').popover({
        html: true,
        container: 'body'
    });
    
    //set_timeClientDiff();
    
});

$(window).resize(function(){
    
    footerToBot();
    
});

$(document).scroll(function(){
    
    //checkMiniHeader();
    
});

//function checkMiniHeader()
//{
//    if ( $(document).scrollTop()>=170 ) {
//        $('#miniHeader').slideDown(300);
//    } else {
//        $('#miniHeader').slideUp(300);
//    }
//}

function footerToBot()
{
    var bodyHeight = $('#content').height() + $('#footer').height()+91;
    if ( bodyHeight<$(window).height() ) {
        $('#footer').css('margin-top', $(window).height()-bodyHeight);
    } else {
        $('#footer').css('margin-top', 0);
    }
    //console.log(bodyHeight, $(window).height());
}

function set_timeClientDiff()
{
    $('.timeClientDiff').each(function(){

        var date = new Date();
        var getTime = date.getTime();

        var _diff = getTime-$(this).text()*1000;
        var diff = new Date(_diff);
        var c_date = diff.getDate();
        if ( c_date<10 ) {
            c_date = '0'+c_date;
        }
        var c_month = diff.getMonth()+1;
        if ( c_month<10 ) {
            c_month = '0'+c_month;
        }
        var c_hours = diff.getHours();
        if ( c_hours<10 ) {
            c_hours = '0'+c_hours;
        }
        var c_minutes = diff.getMinutes();
        if ( c_minutes<10 ) {
            c_minutes = '0'+c_minutes;
        }
        var temp = '';
        if ( date.getDate()==diff.getDate() && date.getMonth()==diff.getMonth() ) {
            temp = 'сегодня';
        } else {
            temp = 'вчера';
        }
        $(this).text( /*c_date + '.' + c_month*/temp + ' в ' + c_hours + ':' + c_minutes );

    });
}