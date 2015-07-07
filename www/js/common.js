$(document).ready(function(){
    
    /*if ( $('ul[role="menu"] ul[role="menu"] li.active').length>1 ) {
        $('ul[role="menu"] ul[role="menu"] li.active:first').removeClass('active');
    }
    
    $('ul[role="menu"]').each(function(){
        if ( $(this).find('li.active').length>1 ) {
            $(this).find('li.active:not(:last)').removeClass('active');
        }
    });
    
    $('[data-toggle="tooltip"]').tooltip({
        html: true,
        container: 'body'
    });
    
    $('[data-toggle="popover"]').popover({
        html: true,
        container: 'body'
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
    });*/
    
});

$.extend({
    getUrlVars: function() {
        var vars = [], hash;
        var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
        for (var i = 0; i < hashes.length; i++) {
            hash = hashes[i].split('=');
            vars.push(hash[0]);
            vars[hash[0]] = hash[1];
        }
        return vars;
    },
    get: function(name) {
        return $.getUrlVars()[name];
    },
    rand: function(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }
});

//function addZero(i)
//{
//    return (i < 10)? "0" + i: i;
//}

//function prepareSelection(selection)
//{
//    if ( selection.length==0 ) {
//        $('.forSelection').addClass('disabled').blur();
//    } else {
//        $('.forSelection:not(.notEnable)').removeClass('disabled');
//    }
//}

//function updateGridByStatus(grid_id)
//{
//    $('#'+grid_id+' .status').each(function(){
//        switch ($(this).attr('status')) {
//            case '1':
//                //$(this).parent().parent().
//                break;
//            case '2':
//                $(this).parent().parent().addClass('success');
//                break;
//            case '3':
//                $(this).parent().parent().addClass('danger');
//                break;
//        }
//    });
//}