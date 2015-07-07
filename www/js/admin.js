$(document).ready(function(){
    
//    if ( $('ul[role="menu"] ul[role="menu"] li.active').length>1 ) {
//        $('ul[role="menu"] ul[role="menu"] li.active:first').removeClass('active');
//    }
    
    $('[data-toggle="tooltip"]').tooltip({
        html: true,
        container: 'body'
    });
    
    $('[data-toggle="popover"]').popover({
        html: true,
        container: 'body'
    });
    
    $('.checkbox-switch').bootstrapSwitch({
        onText: 'Да',
        offText: 'Нет'
    });
    
    $(function () {
        $('.button-checkbox').each(function () {

            // Settings
            var $widget = $(this),
                $button = $widget.find('button'),
                $checkbox = $widget.find('input:checkbox'),
                color = $button.data('color'),
                settings = {
                    on: {
                        icon: 'glyphicon glyphicon-check'
                    },
                    off: {
                        icon: 'glyphicon glyphicon-unchecked'
                    }
                };

            // Event Handlers
            $button.on('click', function () {
                $checkbox.prop('checked', !$checkbox.is(':checked'));
                $checkbox.triggerHandler('change');
                updateDisplay();
            });
            $checkbox.on('change', function () {
                updateDisplay();
            });

            // Actions
            function updateDisplay() {
                var isChecked = $checkbox.is(':checked');

                // Set the button's state
                $button.data('state', (isChecked) ? "on" : "off");

                // Set the button's icon
                $button.find('.state-icon')
                    .removeClass('state-icon glyphicon glyphicon-check glyphicon-unchecked')
                    .addClass('state-icon ' + settings[$button.data('state')].icon);

                // Update the button's color
                if (isChecked) {
                    $button
                        .removeClass('btn-default')
                        .addClass('btn-' + color + ' active');
                }
                else {
                    $button
                        .removeClass('btn-' + color + ' active')
                        .addClass('btn-default');
                }
            }

            // Initialization
            function init() {

                updateDisplay();

                // Inject the icon if applicable
                if ($button.find('.state-icon').length == 0) {
                    $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
                }
            }
            init();
        });
    });
    
    $('.goToggle').change(function(){
        if ( $(this).prop('checked') ) {
            $.cookie($(this).attr('data-cookie'), '1', { path: '/', expires: 30 });
        } else {
            $.cookie($(this).attr('data-cookie'), '0', { path: '/', expires: 30 });
        }
        if ( $(this).attr('data-grid')!==undefined ) {
            $('#'+$(this).attr('data-grid')).yiiGridView('update');
        }
    });
    
//    $('#Review_date_create, #Order_date_want').datetimepicker({
//        locale: 'ru'
//    });
    
});

//function updateGrid_news()
//{
//    Holder.run();
//}

//function updateGrid_category()
//{
//    /*$('#branch-grid [data-toggle="tooltip"]').tooltip({
//        html: true,
//        container: 'body'
//    });*/
//    
//    $('.editable').editable({
//        //disabled: $.cookie('name')===null,
//        /*source: [
//            {value: '-1', text: 'Нет статуса'},
//            {value: '0', text: 'Отказ'},
//            {value: '1', text: 'Перезвонить в ближайшее время'},
//            {value: '2', text: 'Перезвонить в течение месяца'},
//            {value: '3', text: 'Перезвонить не раньше, чем через месяц'},
//            {value: '5', text: 'Отправлено КП'},
//            {value: '4', text: 'Заказ принят'}
//        ],*/
//        success: function() {
//            $('#category-grid').yiiGridView('update');
//        }
//    });
//    //Holder.run();
//}

//function contactsAdd(_this)
//{
//    //console.log(_this.attr('onclick'));
//    _this.before('<div class="row mb5">'+_this.prev().html()+'</div>');
//    _this.prev().find('input').val('');
//}

//function contactsRemove(_this)
//{
//    if ( _this.parent().parent().parent().find('.row').length==1 ) {
//        _this.parent().parent().find('input').val('');
//        _this.parent().parent().hide();
//    } else {
//        _this.parent().parent().remove();
//    }
//}