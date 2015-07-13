
//var oTable;
$(document).ready(function(){
    
    /* mainMenu fix */
        $('#mainMenu .submenu').each(function(){
            var submenu = $(this).find('.submenu-block').html();
            $(this).find('.submenu-block').remove();
            $(this).append('<div class="submenu-block"><ul>'+submenu+'</ul></div>');
        });
    /**/
    
    $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
    
    $('.optionIsLink').styler({
        onSelectClosed: function() {
            if ( $(this).hasClass('optionIsLink') ) {
                location = $('#user').val();
            }
        }
    });
    
    /* fa TOP */

    if($('#calendar').length){
        function renderCalendar() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'today prev,next',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: '2015-04-01',
                lang: 'ru',
                buttonText: {
                    prev: '<',
                    next: '>'
                },
                buttonIcons: true, // show the prev/next text
                weekNumbers: false,
                editable: false,
                eventLimit: true, // allow "more" link when too many events
                events: [
                    {
                        title: 'Новые устройства серии Фрегат',
                        start: '2015-04-01',
                        color: '#96b4d2',
                        url: 'javascript:void(0)'
                    },
                    {
                        title: 'Пункт выдачи в г.Тольятти переехал!',
                        start: '2015-04-04',
                        color: '#96b4d2',
                        url: 'javascript:void(0)'
                    },
                    {
                        title: 'вебинар для проф. консультантов с Бородулиной',
                        start: '2015-04-09',
                        color: '#6fbe44',
                        url: 'javascript:void(0)'
                    },
                    {
                        title: 'семинар “Технологии увеличения объема продаж”',
                        start: '2015-04-09',
                        color: '#6fbe44',
                        url: 'javascript:void(0)'
                    },
                    {
                        title: 'опрос слушателей вебинара для проф.',
                        start: '2015-04-09T18:30:00',
                        color: '#deaf52',
                        url: 'javascript:void(0)'
                    },
                    {
                        title: 'опрос слушателей вебинара для проф.',
                        start: '2015-04-09T12:30:00',
                        color: '#deaf52',
                        url: 'javascript:void(0)'
                    },
                    {
                        title: 'Внимание акция! Распродажа остатков коллекции сезононой продукции.',
                        start: '2015-04-23',
                        end: '2015-04-26',
                        color: '#ee3a68',
                        url: 'javascript:void(0)'
                    },
                    {
                        title: 'Опрос: хватает ли пунктов выдачи в Эстонии?',
                        start: '2015-04-26',
                        color: '#deaf52',
                        url: 'javascript:void(0)'
                    }
                ]

            });
        }
        renderCalendar();
    }

    if($('.changes-list-wrap').length){
        $('.changes-list-wrap').scrollbar();
    }

    if($('#unit-time-start').length){
        $('#unit-time-start').timepicker();
        $('#unit-time-start').on('changeTime', function() {

        });

        $('#unit-time-end').timepicker();
        $('#unit-time-end').on('changeTime', function() {

        });
    }

    $('.list-link').on('click', function(){
        $(this).siblings('.changes-log').toggleClass('active');
    });

    if($('.option-radio-wrap').length){
        $('.option-radio-wrap input').styler();

        $('.option-radio-wrap input.option-radio[type="radio"]').each(function(){
            if($(this).parents('.jq-radio').hasClass('checked')){
                $(this).parents('.jq-radio.checked').parents('.option-radio-wrap').addClass('active');
            }
        });


        $('body').on("change", '.option-radio-wrap input.option-radio[type="radio"]', function(){
             $(this).parents('.function-options-section').find('.option-radio-wrap').removeClass('active');
             $(this).parents('.jq-radio.checked').parents('.option-radio-wrap').addClass('active');
        });

        $('.option-radio-wrap input.option-radio[type="checkbox"]').each(function(){
            if($(this).parents('.jq-checkbox').hasClass('checked')){
                $(this).parents('.jq-checkbox.checked').parents('.option-radio-wrap').addClass('active');
            }
        });


        $('body').on("change", '.option-radio-wrap input.option-radio[type="checkbox"]', function(){
            if($(this).parents('.jq-checkbox').hasClass('checked')){
                $(this).parents('.jq-checkbox.checked').parents('.option-radio-wrap').addClass('active');
            }else{
                $(this).parents('.jq-checkbox').parents('.option-radio-wrap').removeClass('active');
            }


        });
    }



//    if($('#table-logs').length){
//        oTable = $('#table-logs').dataTable({
//            "oLanguage":
//            {
//                "sSearch": "Search all columns:",
//                "oPaginate":
//                {
//                    "sNext": '›',
//                    "sLast": '»',
//                    "sFirst": '«',
//                    "sPrevious": '‹'
//                }
//            },
//            "aoColumnDefs": [
//                { 'bSortable': false, 'aTargets': [ 2, 3, 4, 5, 6, 7, 8, 9 ] }
//            ]
//        });
//
//    }


//    if($('#user-list').length){
//        $.fn.dataTableExt.afnFiltering.push(function(oSettings, aData, iDataIndex) {
//            var checked = $('input[name="user-role"]').is(':checked');
//
//            if (checked && aData[0] === $('input[name="user-role"]:checked').val()) {
//                return true;
//            }
//
//            if(!checked){
//                return true;
//            }
//
//            return false;
//        });
//
//        var oUserTable = $('#user-list').dataTable({
//
//            "oLanguage":
//            {
//                "processing": "Подождите...",
//                "search": "Поиск:",
//                "lengthMenu": "Показать _MENU_ записей",
//                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
//                "infoEmpty": "Записи с 0 до 0 из 0 записей",
//                "infoFiltered": "(отфильтровано из _MAX_ записей)",
//                "infoPostFix": "",
//                "loadingRecords": "Загрузка записей...",
//                "zeroRecords": "Записи отсутствуют.",
//                "emptyTable": "В таблице отсутствуют данные",
//                "sZeroRecords": "Не найдено ни одной записи",
//                "oPaginate":
//                {
//                    "sNext": '›',
//                    "sLast": '»',
//                    "sFirst": '«',
//                    "sPrevious": '‹'
//                }
//            },
//            "aoColumnDefs": [
//                { 'bSortable': false, 'aTargets': [ 0, 2, 3, 4, 5, 6, 7 ] },
//                {
//                    "targets": [ 0 ],
//                    "visible": false
//                }
//            ]
//        });
//
//        $('input[name="user-role"]').on("change", function(e) {
//
//            oUserTable.fnDraw();
//        });
//
//    }

    if($('#table-products-inactive').length){
        $.fn.dataTableExt.afnFiltering.push(function(oSettings, aData, iDataIndex) {
            return true;
        });

        var oProductsInactive = $('#table-products-inactive').dataTable({

            "oLanguage":
            {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                "infoEmpty": "Записи с 0 до 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Записи отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "sZeroRecords": "Не найдено ни одной записи",
                "oPaginate":
                {
                    "sNext": '›',
                    "sLast": '»',
                    "sFirst": '«',
                    "sPrevious": '‹'
                }
            },
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 2, 3, 4, 5, 6, 7, 8 ] }
            ]
        });

    }

    if($('#table-messages').length){
        $.fn.dataTableExt.afnFiltering.push(function(oSettings, aData, iDataIndex) {
            return true;
        });

        var oMessTable = $('#table-messages').dataTable({

            "oLanguage":
            {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                "infoEmpty": "Записи с 0 до 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Записи отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "sZeroRecords": "Не найдено ни одной записи",
                "oPaginate":
                {
                    "sNext": '›',
                    "sLast": '»',
                    "sFirst": '«',
                    "sPrevious": '‹'
                }
            },
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 2, 3, 4, 5, 6, 7 ] }
            ]
        });

    }


    if($("#slider-price-range").length){
        $( "#slider-price-range" ).slider({
            range: true,
            min: 0,
            max: 25000,
            values: [ 0, 2500 ],
            create: function( event, ui ) {
                $('input[name="price-from"]').val(0);
                $('input[name="price-till"]').val(2500);

            },
            slide: function( event, ui ) {
                $('input[name="price-from"]').val(ui.values[ 0 ]);
                $('input[name="price-till"]').val(ui.values[ 1 ]);
            }
        });

        $('input[name="price-from"]').keyup(function(){
            $( "#slider-price-range" ).slider("values" , 0, $(this).val())
        });

        $('input[name="price-till"]').keyup(function(){
            $( "#slider-price-range" ).slider("values" , 1, $(this).val())
        });

       /* $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
        " - $" + $( "#slider-range" ).slider( "values", 1 ) );*/
    }


    if($('#table-products-logs').length){
        $.fn.dataTableExt.afnFiltering.push(function(oSettings, aData, iDataIndex) {

            return true;
        });

        var oProductTable = $('#table-products-logs').dataTable({

            "oLanguage":
            {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                "infoEmpty": "Записи с 0 до 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Записи отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "sZeroRecords": "Не найдено ни одной записи",
                "oPaginate":
                {
                    "sNext": '›',
                    "sLast": '»',
                    "sFirst": '«',
                    "sPrevious": '‹'
                }
            },
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 2, 3, 4, 5, 6, 7, 8, 9 ] }
            ]
        });



    }


    if($('#all-events-list').length){
        $.fn.dataTableExt.afnFiltering.push(function(oSettings, aData, iDataIndex) {
            var checked = $('input[name="event-category"]').is(':checked');

            if (checked && aData[0] === $('input[name="event-category"]:checked').val()) {
                return true;
            }

            if(!checked){
                return true;
            }

            return false;
        });

        var oAllEventsTable = $('#all-events-list').dataTable({

            "oLanguage":
            {
                "processing": "Подождите...",
                "search": "Поиск:",
                "lengthMenu": "Показать _MENU_ записей",
                "info": "Записи с _START_ до _END_ из _TOTAL_ записей",
                "infoEmpty": "Записи с 0 до 0 из 0 записей",
                "infoFiltered": "(отфильтровано из _MAX_ записей)",
                "infoPostFix": "",
                "loadingRecords": "Загрузка записей...",
                "zeroRecords": "Записи отсутствуют.",
                "emptyTable": "В таблице отсутствуют данные",
                "sZeroRecords": "Не найдено ни одной записи",
                "oPaginate":
                {
                    "sNext": '›',
                    "sLast": '»',
                    "sFirst": '«',
                    "sPrevious": '‹'
                }
            },
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 0, 1, 2, 3] },
                {
                    "targets": [ 0 ],
                    "visible": false
                }
            ]
        });

        $('input[name="event-category"]').on("change", function(e) {

            oAllEventsTable.fnDraw();
        });

    }

    if($('#table-order-logs').length){
        $('#table-order-logs').dataTable({
            "oLanguage":
            {
                "sSearch": "Search all columns:",
                "oPaginate":
                {
                    "sNext": '›',
                    "sLast": '»',
                    "sFirst": '«',
                    "sPrevious": '‹'
                }
            },
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 0, 1, 2, 3, 4, 5] }
            ]
        });
    }

    if($('.admin-page #table-cat-products-logs').length){
        $('.admin-page #table-cat-products-logs').dataTable({
            "oLanguage":
            {
                "sSearch": "Search all columns:",
                "oPaginate":
                {
                    "sNext": '›',
                    "sLast": '»',
                    "sFirst": '«',
                    "sPrevious": '‹'
                }
            },
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 2, 3, 4, 5] }
            ]
        });
    }

    if($('.moder-page #table-cat-products-logs').length){
        $('.moder-page #table-cat-products-logs').dataTable({
            "oLanguage":
            {
                "sSearch": "Search all columns:",
                "oPaginate":
                {
                    "sNext": '›',
                    "sLast": '»',
                    "sFirst": '«',
                    "sPrevious": '‹'
                }
            },
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 2, 3, 4, 5] },
                {
                    "targets": [ 5 ],
                    "visible": false
                }
            ]
        });
    }

    if($('.admin-page #table-cat-logs').length){
        $('.admin-page #table-cat-logs').dataTable({
            "bSort": false,
            "oLanguage":
            {
                "sSearch": "Search all columns:",
                "oPaginate":
                {
                    "sNext": '›',
                    "sLast": '»',
                    "sFirst": '«',
                    "sPrevious": '‹'
                }
            },
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 0, 1, 2, 3, 4] }
            ]
        });
    }

    if($('.moder-page #table-cat-logs').length){
        $('.moder-page #table-cat-logs').dataTable({
            "bSort": false,
            "oLanguage":
            {
                "sSearch": "Search all columns:",
                "oPaginate":
                {
                    "sNext": '›',
                    "sLast": '»',
                    "sFirst": '«',
                    "sPrevious": '‹'
                }
            },
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 0, 1, 2, 3, 4] },
                {
                    "targets": [ 4 ],
                    "visible": false
                }
            ]
        });
    }

    if($('#table-unit-logs').length){
        $('#table-unit-logs').dataTable({
            "oLanguage":
            {
                "sSearch": "Search all columns:",
                "oPaginate":
                {
                    "sNext": '›',
                    "sLast": '»',
                    "sFirst": '«',
                    "sPrevious": '‹'
                }
            },
            "aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [ 1, 2, 3, 4, 5] }
            ]
        });
    }


    $('body').on('change', '.filter-use-wrap input[name="use-filter"]', function(){
        if($(this).parents('div').hasClass('checked')){
            $('.hide-filter-wrap').show();
        }else{
            $('.hide-filter-wrap').hide();
        }
    });

    $('body').on('change', 'input[name="all_check"]', function(){
        if($(this).parents('.jq-checkbox').hasClass('checked')){
            $('.table-scroll tbody input[type="checkbox"]').toggleChecked().trigger('refresh');
        }else{
            $('.table-scroll tbody input[type="checkbox"]').toggleUnChecked().trigger('refresh');
        }
    });

    $.fn.toggleChecked = function() {
        return this.each(function() {
            this.checked = true;
        });
    };

    $.fn.toggleUnChecked = function() {
        return this.each(function() {
            this.checked = false;
        });
    };

    if($("#showPaletteOnly").length){
        $("#showPaletteOnly").spectrum({
            showPaletteOnly: true,
            showPalette:true,
            color: '#444',
            palette: [
                ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
                ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
                ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
                ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
                ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
                ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
                ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
                ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
            ]
        });
    }



    $("#showPaletteOnly").on('show.spectrum', function(e, tinycolor) {
        $('.sp-container').addClass('custom');
    });

    $("#showPaletteOnly").on('hide.spectrum', function(e, tinycolor) {
        $('.sp-container').removeClass('custom');
    });

    if($('.textarea-scrollbar').length){
        $('.textarea-scrollbar').scrollbar();
    }

    $('.show-inside-table').on('click', function () {
        $(this).parents('.table-item').next('.table-after-item').toggleClass('active');
        $(this).hide();
        $(this).siblings('.hide-inside-table').show();
    });

    $('.hide-inside-table').on('click', function () {
        $(this).parents('.table-item').next('.table-after-item').toggleClass('active');
        $(this).hide();
        $(this).siblings('.show-inside-table').show();
    });

  /*  if($('.table-scroll').length){
        jQuery('.table-scroll').scrollbar();
    }*/

    if($('.history-filter').length){

        $( "#history-start" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 2,
            onClose: function( selectedDate ) {
                $("#history-end").datepicker("option", "minDate", selectedDate);
            }
        });

        $( "#history-end" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 2,
            onClose: function( selectedDate ) {
                $( "#history-start" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
    }

    /*if($('#datepicker-birth').length){
        $( "#datepicker-birth" ).datepicker({
            minDate: new Date(1920, 1 - 1, 1),
            changeMonth: true,
            changeYear: true
        });
    }*/

    if($('#datepicker-pass').length){
        $( "#datepicker-pass" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    }

    if($('#datepicker-price-action').length){
        $( "#datepicker-price-action" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    }

    if($('#datepicker-price-date').length){
        $( "#datepicker-price-date" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    }

    



    if($('#datepicker-start-create').length){
        $( "#datepicker-start-create" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 2,
            onClose: function( selectedDate ) {
                $("#datepicker-end-create").datepicker("option", "minDate", selectedDate);
            }
        });
    }

    if($('#datepicker-end-create').length){
        $( "#datepicker-end-create" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 2,
            onClose: function( selectedDate ) {
                $( "#datepicker-start-create" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
    }

    if($('#datepicker-start-change').length){
        $( "#datepicker-start-change" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 2,
            onClose: function( selectedDate ) {
                $("#datepicker-end-change").datepicker("option", "minDate", selectedDate);
            }
        });
    }

    if($('#datepicker-end-change').length){
        $( "#datepicker-end-change" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 2,
            onClose: function( selectedDate ) {
                $( "#datepicker-start-change" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
    }

    if($('.tiny-field').length){
        tinymce.init({
            selector: "textarea.tiny-field",
            skin: 'light'
        });
    }




    $('ul.tabs li').css('cursor', 'pointer');

    $('ul.tabs li').click(function(){
        var index = $(this).index();
        $('.tab-content').hide();

        $('.tabs-container').find('.tab-content').eq(index).show();

        $('ul.tabs li').removeClass('tab-current');
        $(this).addClass('tab-current');
    });

   /* $('ul.tabs li').click(function(){
        var index = this.index();
        $('.tabs-container').find('.tab-content').hide();
        $('.tabs-container').find('.tab-content').eq(index).show();
        $('ul.tabs li').removeClass('tab-current');
        $(this).addClass('tab-current');
    });*/



    count_sum();

    $('.counts .minus').on('click', function(){
        var current = $(this).siblings('.count').val();
        if(current != 1){
            current--;
            $(this).siblings('.count').val(current);
        }else{
            $(this).siblings('.count').val(current);
        }

        count_sum();
    });

    $('.counts .plus').on('click', function(){
        var current = $(this).siblings('.count').val();
        if(current != 1000){
            current++;
            $(this).siblings('.count').val(current);
        }else{
            $(this).siblings('.count').val(current);
        }
        count_sum();
    });



    $('.faq-item-link').on('click', function(){
        $(this).parents('.faq-item').addClass('current');
        $('.faq-item').each(function(){
            if($(this).hasClass('active') && !$(this).hasClass('current')){
                $('.faq-answer', $(this)).slideToggle();
                $(this).removeClass('active');
            }
        });
        $(this).siblings('.faq-answer').slideToggle();
        $(this).parents('.faq-item').toggleClass('active');
        $(this).parents('.faq-item').removeClass('current');
    });

    $('.order-view-filter a').on('click', function () {

        if(!$(this).hasClass('active')){
            $('.order-view-filter a').removeClass('active');
            if($(this).hasClass('quick-order-link')){
                $('.products-list').addClass('quick-order');
                $('.product-catalogue-item .add-basket').text('В корзину');
            }else{
                $('.products-list').removeClass('quick-order');
                $('.product-catalogue-item .add-basket').text('Добавить в корзину');
            }
            $(this).addClass('active');
        }
    });

    /*$('.checkout-step').on('click', function () {
        if($(this).hasClass('enable-nav')){
            $('.checkout-step').removeClass('active');
            $(this).addClass('active');
        }
    });*/

    $('body').on('click', '.checkout-store-item', function(){
        $('.checkout-store-item').removeClass('active');
        $(this).addClass('active');
    });


    $("body").mouseup(function(e)
    {
        var link = $(".quick-nav");
        if(!link.has(e.target).length)
        {
            var content = $(".quick-nav-hide");
            if(!content.has(e.target).length)
            {
                $('.quick-nav-link').removeClass('active');
                $('.quick-nav-hide').removeClass('active');
            }
        }

        var list_price_link = $(".list-link");
        if(!list_price_link.has(e.target).length)
        {
            var hide_price_block = $(".changes-log");
            if(!hide_price_block.has(e.target).length)
            {
                hide_price_block.removeClass('active');
            }
        }





    });

    $('.quick-nav-link').on('click', function(e){
        $(this).toggleClass('active');
        $('.quick-nav-hide').toggleClass('active');
    });

    if($('.main-slider').length) {
        $('.main-slider').bxSlider({
            mode: 'fade',
            speed: 900,
            prevText: '',
            nextText: '',
            pager: true,
            pagerSelector: '.slider .slider-nav',
            infiniteLoop: true,
            adaptiveHeight: true,
            moveSlides: 1,
            easing: 'swing',
            auto: true,
            pause: 7000
        });
    }

    if($('.reviews-slider').length) {
        $('.reviews-slider').bxSlider({
            mode: 'horizontal',
            prevText: '',
            nextText: '',
            pager: true,
            pagerSelector: '.review-slide-nav',
            infiniteLoop: true,
            adaptiveHeight: true,
            moveSlides: 1,
            easing: 'swing',
            auto: false,
            pause: 7000
        });
    }


    if($('.checkbox-wrap input[type="checkbox"]').length){
        $('.checkbox-wrap input[type="checkbox"]').styler();
    }


    if($('.list-filter-item').length){
        $('.list-filter-item input[type="radio"]').styler();
    }

    $('input[name="user-role"]').on('change', function(){
         $('.list-filter-item').removeClass('active');
        $('.list-filter-item .jq-radio.checked').parents('.list-filter-item').addClass('active');
    });

    $('input[name="event-category"]').on('change', function(){
        $('.list-filter-item').removeClass('active');
        $('.list-filter-item .jq-radio.checked').parents('.list-filter-item').addClass('active');
    });

    $('.select-wrap select').styler();

    if($('.input-file-wrap').length){
        $('.input-file-wrap input').styler();
    }

    if($('.radio-wrap').length){
        $('.radio-wrap input[type="radio"]').styler();
    }

    $(".scroll-top").on('click', function (){
        var pos = $('.top').position().top;
        $("html, body").animate({scrollTop: pos }, 1500);
        return false;
    });

    if($('input[name="bonus-val"]').length){
        $('input[name="bonus-val"]').numeric();
    }

    if($('.numb-only').length){
        $('.numb-only').numeric();
    }


    $('.step-btn-get-end').on('click', function(){
        $('.checkout-get-detail-item.active').find('.overlayer').addClass('hidden');
    });

    $('input[name="radio_get"]').on('change', function(){
        $('.overlayer').removeClass('hidden');
        $('.checkout-get-detail-item').removeClass('active');
        $('.checkout-get-detail-item[data-parent="' + $(this).val() + '"]').addClass('active');
    });

    $('.step-next-btn').on('click', function(){
        $('.checkout-steps-content.active').hide();
        $('.checkout-steps-content').removeClass('active');
        $('.checkout-steps-content.step-' + $(this).data('step') + '').addClass('active').show();
        $('.checkout-step.active').addClass('full-step').removeClass('active');
        $('.checkout-step[data-step="' + $(this).data('step') + '"]').addClass('active enable-nav');
    });

    $('.close-message').on('click', function(){
        $(this).parents('.error-message').hide();
    });

    $('.modal-open').fancybox({
        autoSize: true,
        type: 'inline',
        closeBtn: false,
        padding: 0,
        scrolling: 'no',
        beforeShow: function() {
            $(".fancybox-skin").css("background-color", "transparent");
        },
        afterClose: function() {

        }
    }).click(function() {
        if (typeof($(this).data('from')) !== 'undefined') {

        }
    });

    $('.modal-close, .modal-content .close-btn').click(function() {
        $.fancybox.close();
        return false;
    });

    /* from extend */
    if($('.datepicker-birth').length){
        $( ".datepicker-birth" ).datepicker({
            minDate: new Date(1920, 1 - 1, 1),
            changeMonth: true,
            changeYear: true
        });
    }

    if($('.datepicker-pass').length){
        $( ".datepicker-pass" ).datepicker({
            changeMonth: true,
            changeYear: true
        });
    }

    $("#RegisterFormStep2_country_id").change(function(){
    	var v = $(this).val();
    	if (parseInt(v) > 0)
	    	$.get('/geo/regions', { country_id : v}, function(data){

	    		var $select = $("#RegisterFormStep2_region_id"); 
				$select.find('option').remove();
				$("#RegisterFormStep2_city_id").find('option').remove();

				$.each(data,function(key, value) {
					$select.append('<option value=' + key + '>' + value + '</option>');
				});

				setTimeout(function(){
					$("#RegisterFormStep2_region_id").trigger('refresh');
				}, 400);

	    	}, 'json');
    });

    $("#RegisterFormStep2_region_id").change(function(){
    	var v = $(this).val();
    	if (parseInt(v) > 0)
	    	$.get('/geo/cities', { region_id : v}, function(data){

	    		var $select = $("#RegisterFormStep2_city_id"); 
				$select.find('option').remove();

				$.each(data,function(key, value) {
					$select.append('<option value=' + key + '>' + value + '</option>');
				});

				setTimeout(function(){
					$("#RegisterFormStep2_city_id").trigger('refresh');
				}, 400);

	    	}, 'json');
    });

});

$(window).load(function(){

});

$(window).resize(function(){

});

$(window).scroll(function(){
    if ( $(this).scrollTop() > 52){
        $('.top-wrap').addClass('fixed');

    } else {
        $('.top-wrap').removeClass('fixed');
    }
});

function count_sum(){

    if($('.basket-table-wrap').length){
        $('.product-td-price').each(function(){
            console.log(1);
            var count = $(this).siblings('td').find('input[name="count"]').val();
            var price = $('span', $(this)).text();
            $(this).siblings('.product-td-price-rez').find('span').text(count * price);
        });

    }

}

ymaps.ready(init);

var myMap,
    myPlacemark;

function init(){
    myMap = new ymaps.Map("map", {
        center: [50.2591,28.6544],
        zoom: 14,
        controls: []
    });

    myPlacemark_1 = new ymaps.Placemark([50.2591,28.6544], { balloonContent: 'Тестовый пункт выдачи.' });

    myMap.geoObjects.add(myPlacemark_1);
    myMap.behaviors.disable("scrollZoom");
    myMap.controls.add('zoomControl');
}


