<div class="row">
    <div class="col-xs-3">
        <div class="sf_el">
            <div class="myLabel">Я хочу</div>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default active">
                    <input type="radio" name="options" id="option1" autocomplete="off" checked> Купить
                </label>
                <label class="btn btn-default">
                    <input type="radio" name="options" id="option2" autocomplete="off"> Снять
                </label>
            </div>
        </div>
        <div class="sf_el">
            <div class="myLabel">Тип квартиры</div>
            <?= BsHtml::dropDownList('type_0', '', array(
                '1'=>'Гостинка',
                '2'=>'Индивидуальная',
                '3'=>'Комната',
                '4'=>'Кухня-прихожая',
                '5'=>'Ленинградская',
                '6'=>'Малосемейка',
                '7'=>'Малоэтажка',
                '8'=>'Новая',
                '9'=>'Общежитие',
                '10'=>'Полногабаритная',
                '11'=>'Секция',
                '12'=>'Сталинка',
                '13'=>'Старый фонд',
                '14'=>'Студия',
                '15'=>'Типовая',
                '16'=>'Улучшенной планировки',
                '17'=>'Хрущевка',
                '18'=>'Элитная',
            ), array(
                'multiple'=>'multiple',
                'class'=>'multiselect',
            )) ?>
        </div>

    </div>
    <div class="col-xs-3">
        <div class="sf_el">
            <div class="myLabel">Район</div>
            <?= BsHtml::dropDownList('area', '', array(
                '1'=>'Район 1',
                '2'=>'Район 2',
                '3'=>'Район 3',
                '4'=>'Район 4',
                '5'=>'Район 5',
                '6'=>'Район 6',
            ), array(
                'multiple'=>'multiple',
                'class'=>'multiselect',
            )) ?>
        </div>
        <div class="sf_el">
            <div class="row">
                <div class="col-xs-8">
                    <div class="myLabel">Улица</div>
                    <?= BsHtml::textField('street_id', '', array(
                        'placeHolder'=>'Любая',
                    )) ?>
                </div>
                <div class="col-xs-4">
                    <div class="myLabel">Дом</div>
                    <?= BsHtml::textField('house', '', array(
                        'placeHolder'=>'№',
                    )) ?>
                </div>
            </div>
        </div>
        <div class="sf_el">
            <div class="myLabel">Комнат</div>
            <div class="btn-group" data-toggle="buttons">
                <label class="btn btn-default">
                    <input type="checkbox" autocomplete="off"> 1
                </label>
                <label class="btn btn-default">
                    <input type="checkbox" autocomplete="off"> 2
                </label>
                <label class="btn btn-default">
                    <input type="checkbox" autocomplete="off"> 3
                </label>
                <label class="btn btn-default">
                    <input type="checkbox" autocomplete="off"> 4
                </label>
                <label class="btn btn-default">
                    <input type="checkbox" autocomplete="off"> 5
                </label>
                <label class="btn btn-default">
                    <input type="checkbox" autocomplete="off"> 6+
                </label>
            </div>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="sf_el">
            <div class="myLabel">Общая площадь, кв. м.</div>
            <?= BsHtml::textField('space_total_from', '', array(
                'class'=>'w40p inline',
            )) ?>
            <div class="text-center inline w16p">&#8211;</div>
            <?= BsHtml::textField('space_total_to', '', array(
                'class'=>'w40p inline',
            )) ?>
        </div>
        <div class="sf_el">
            <div class="myLabel">Планировка</div>
            <?= BsHtml::dropDownList('layout_id', '', array(
                '1'=>'Планировка 1',
                '2'=>'Планировка 2',
                '3'=>'Планировка 3',
                '4'=>'Планировка 4',
                '5'=>'Планировка 5',
                '6'=>'Планировка 6',
            ), array(
                'multiple'=>'multiple',
                'class'=>'multiselect',
            )) ?>
        </div>
        <div class="sf_el">
            <div class="myLabel">Цена, руб</div>
            <?= BsHtml::textField('price_from', '', array(
                'class'=>'w40p inline',
            )) ?>
            <div class="text-center inline w16p">&#8211;</div>
            <?= BsHtml::textField('price_to', '', array(
                'class'=>'w40p inline',
            )) ?>
        </div>
    </div>
    <div class="col-xs-3">
        <div class="sf_el">
            <div class="myLabel">Дополнительно</div>
            <div class="row">
                <div class="col-xs-6">
                    <div class="checkbox aw_check">
                        <input type="checkbox" id="hasHypothec" name="hasHypothec">
                        <label for="hasHypothec">
                            Ипотека
                        </label>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="checkbox aw_check">
                        <input type="checkbox" id="hasPhoto" name="hasPhoto">
                        <label for="hasPhoto">
                            С фото
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="sf_el">

        </div>
        <!--div class="sf_el text-right">
            <?= BsHtml::link('Подробный поиск', '#', array('onclick'=>'return false;')) ?>
        </div-->
    </div>
</div>

<?= BsHtml::linkButton('Найти', array(
    'color'=>BsHtml::BUTTON_COLOR_SUCCESS,
    //'size'=>BsHtml::BUTTON_SIZE_LARGE,
    'block'=>true,
    'icon'=>BsHtml::GLYPHICON_SEARCH,
    'url'=>'#',
    'onclick'=>'return false;',
    'id'=>'sa_submit',
)) ?>

<div class="add_search_area">
    <?= BsHtml::link('Подробный поиск', '#', array('onclick'=>'return false;')) ?>
</div>