<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 23.09.2016
 */
/* @var $this yii\web\View */
/* @var $widget \v3toys\skeeks\widgets\delivery\V3toysDeliveryWidget */
$widget = $this->context;
?>

<section>
    <header class="title-lined">
        <h2><?= $widget->label; ?></h2>
    </header>
    <div class="form-inner">
        <div class="order-delivery--region">
            <div class="city">
                <span class="lbl">Укажите адрес:</span>
                <span class="link"><a href="#" data-toggle="modal" data-target="#regionModal" >
                        <?= \Yii::$app->dadataSuggest->address ? \Yii::$app->dadataSuggest->address->unrestrictedValue : "Выбрать город"; ?>
                </a></span>
            </div>
            <div class="date"><strong>Ближайшая доставка:</strong>  Вторник, 05 апреля 2016</div>
        </div>
        <div class="order-delivery--radios col-md-12">
            <div class="radio with-icon">
                <input type="radio" name="radioDelivery" id="delivery-self" value="SELF" checked/>
                <label for="delivery-self">
                    <span class="icon"><img src="<?= \v3toys\skeeks\widgets\delivery\assets\V3toysDeliveryWidgetAsset::getAssetUrl('img/people-self.jpg'); ?>" alt=""></span>
                    Самовывоз <span class="small">- 250 руб.</span>
                </label>
            </div>
            <? if (\yii\helpers\ArrayHelper::getValue(\Yii::$app->v3toysSettings->currentShippingData, 'post')) : ?>
                <div class="radio with-icon">
                    <input type="radio" name="radioDelivery" id="delivery-post" value="POST"/>
                    <label for="delivery-post">
                        <span class="icon"><img src="<?= \v3toys\skeeks\widgets\delivery\assets\V3toysDeliveryWidgetAsset::getAssetUrl('img/delivery-post.png'); ?>" alt=""></span>
                        Почта России <span class="small">- <?= \yii\helpers\ArrayHelper::getValue(\Yii::$app->v3toysSettings->currentShippingData, 'post.guiding_realize_price'); ?> руб.</span>
                    </label>
                </div>
            <? endif; ?>
            <? if (\yii\helpers\ArrayHelper::getValue(\Yii::$app->v3toysSettings->currentShippingData, 'courier')) : ?>
                <div class="radio with-icon">
                    <input type="radio" name="radioDelivery" id="delivery-courier" value="COURIER"/>
                    <label for="delivery-courier">
                        <span class="icon"><img src="<?= \v3toys\skeeks\widgets\delivery\assets\V3toysDeliveryWidgetAsset::getAssetUrl('img/people-courier.png'); ?>" alt=""></span>
                        Курьерская доставка <span class="small">- <?= \yii\helpers\ArrayHelper::getValue(\Yii::$app->v3toysSettings->currentShippingData, 'courier.guiding_realize_price'); ?> руб.</span>
                    </label>
                </div>
            <? endif; ?>
        </div>
    </div><!--.form-inner-->
</section>

<section class="delivery-form delivery-page--text-block" id="delivery-form-SELF">
    <div class="text-block text-block-14">
        <p>Текст для самовывоза</p>
    </div>

    <!--<script type="text/javascript">
        ymaps.ready(init);
        var myMap,
                myPlacemark;

        function init(){
            myMap = new ymaps.Map("map", {
                center: [55.76, 37.64],
                zoom: 13
            });

            myPlacemark = new ymaps.Placemark([55.76, 37.64], {
                hintContent: 'Москва!',
                balloonContent: 'Столица России'
            });

            myMap.geoObjects.add(myPlacemark);
        }
    </script>-->
    <div class="order-delivery--map">
        <div class="order-delivery--map--list">

            <div class="form-group">
                <input type="text" id="search-address" class="form-control" placeholder="Поиск по улице, метро, названию"/>
            </div>
            <ul class="scroll-list" id="search-address-list">
                <li>
                    <a href="#" class="address-item">
                        <span class="metro purple">M</span><strong class="color-purple">Сходненская</strong> - <strong>бесплатно</strong><br/>
                        м. Пушкинское, ул. Сергея Есенина д115
                    </a>
                </li>
                <li>
                    <a href="#" class="address-item">
                        <span class="metro green">M</span><strong class="color-green">Маяковская</strong> - <strong>бесплатно</strong><br/>
                        м. Пушкинское, ул. Ленина д115
                    </a>
                </li>
                <li>
                    <a href="#" class="address-item">
                        <span class="metro green">M</span><strong class="color-green">Маяковская</strong> - <strong>бесплатно</strong><br/>
                        м. Пушкинское, ул. 50 лет Октября д115
                    </a>
                </li>
                <li>
                    <a href="#" class="address-item">
                        <span class="metro purple">M</span><strong class="color-purple">Сходненская</strong> - <strong>бесплатно</strong><br/>
                        м. Пушкинское, ул. Сергея Есенина д115
                    </a>
                </li>
                <li>
                    <a href="#" class="address-item">
                        <span class="metro green">M</span><strong class="color-green">Маяковская</strong> - <strong>бесплатно</strong><br/>
                        м. Пушкинское, ул. Сергея Есенина д115
                    </a>
                </li>
                <li>
                    <a href="#" class="address-item">
                        <span class="metro green">M</span><strong class="color-green">Маяковская</strong> - <strong>бесплатно</strong><br/>
                        м. Пушкинское, ул. Сергея Есенина д115
                    </a>
                </li>
                <li>
                    <a href="#" class="address-item">
                        <span class="metro purple">M</span><strong class="color-purple">Сходненская</strong> - <strong>бесплатно</strong><br/>
                        м. Пушкинское, ул. Сергея Есенина д115
                    </a>
                </li>
                <li>
                    <a href="#" class="address-item">
                        <span class="metro green">M</span><strong class="color-green">Маяковская</strong> - <strong>бесплатно</strong><br/>
                        м. Пушкинское, ул. Сергея Есенина д115
                    </a>
                </li>
                <li>
                    <a href="#" class="address-item">
                        <span class="metro green">M</span><strong class="color-green">Маяковская</strong> - <strong>бесплатно</strong><br/>
                        м. Пушкинское, ул. Сергея Есенина д115
                    </a>
                </li>
            </ul>
        </div>
        <div class="order-delivery--map--yandex">
            <div class="order-delivery--map--yandex--in">
                <div class="yandex-map" id="map"></div>
            </div>
        </div>
    </div><!--.order-delivery--map-->
</section>

<section class="delivery-form delivery-page--text-block" id="delivery-form-POST">
    <div class="text-block text-block-14">
        <p>Стоимость доставки Почтой России зависит от региона. Подробнее с тарифами можно ознакомиться в следующей таблице:</p>
    </div>
    <div class="table-container">
        <table>
            <tr>
                <th width="150">Магистральный пояс</th>
                <th width="150">Стоимость доставки, для габаритного заказа</th>
                <th>Регионы России</th>
            </tr>
            <tr>
                <td width="150" nowrap>
                    Первый<br/>
                    до 600 км
                </td>
                <td width="150" nowrap>300 р.</td>
                <td>Москва, Московская область, Брянская область, Владимирская область, Вологодская область, Воронежская область, Ивановская область, Калужская область, Костромская область, Курская область, Липецкая область, Нижегородская область, Орловская область, Рязанская область, Смоленская область, Тамбовская область, Тверская область, Тульская область, Ярославская область</td>
            </tr>
            <tr>
                <td width="150" nowrap>
                    Второй<br/>
                    от 601 км<br/>
                    до 2000 км
                </td>
                <td width="150" nowrap>450 р.</td>
                <td>Санкт-Петербург, Ленинградская область, республика Адыгея, Архангельская область, Астраханская область, республика Башкортостан, Белгородская область, Волгоградская область, республика Ингушетия, Кабардино-балкарская республика, Калининградская область, республика Калмыкия, Карачаево-черкесская республика, республика Карелия, Кировская область, республика Коми, АР Крым, Коми-Пермяцкий округ, Пермский край, Краснодарский край, республика Марий-Эл, республика Мордовия, Мурманская область, Ненецкий АО(кроме г.Нарьян-Мар), Архангельская область, Новгородская область, Оренбургская область, Пензенская область, Пермский край, Псковская область, Ростовская область, Самарская область, Саратовская область, Свердловская область, республика Северная Осетия-Алания, Ставропольский край, республика Татарстан, Удмуртская республика, Ульяновская область, Челябинская область, Чеченская республика, Чувашская республика</td>
            </tr>
            <tr>
                <td width="150" nowrap>
                    Третий<br/>
                    от 2001 км<br/>
                    до 5000 км
                </td>
                <td width="150" nowrap>600 р.</td>
                <td>республика Алтай, Алтайский край, республика Дагестан , анклав Байконур, Кемеровская область, Красноярский край(кроме г.Норильск, г.Талнах), Курганская область, Новосибирская область, Омская область, Таймырский (Долгано-Ненецкий) АО(кроме г.Дудинка), Томская область, республика Тыва, Тюменская область, республика Хакасия, Ханты-Мансийский (Югра) АО, Тюменская область, Эвенский АО, Ямало-Ненецкий АО, Тюменская область</td>
            </tr>
            <tr>
                <td width="150" nowrap>
                    Четвертый<br/>
                    от 5001 км<br/>
                    до 8000 км
                </td>
                <td width="150" nowrap>750 р.</td>
                <td>Агинский Бурятский округ, Забайкальский край, Амурская область, республика Бурятия, Иркутская область, Усть-Ордынский Бурятский округ</td>
            </tr>
            <tr>
                <td width="150" nowrap>
                    Пятый<br/>
                    от 8001 км
                </td>
                <td width="150" nowrap>950р.</td>
                <td>Еврейская АО, Корякский АО, Приморский край, Хабаровский край</td>
            </tr>
            <tr>
                <td width="150" nowrap>
                    Только<br/>
                    авиадоставка
                </td>
                <td width="150">стоимость рассчитывается индивидуально</td>
                <td>Красноярский край (г.Норильск, г.Талнах), Камчатский край, Магаданская область, Ненецкий АО (г.Нарьян-Мар), республика Саха (Якутия), Таймырский (Долгано-Ненецкий) АО (г.Дудинка), Чукотский АО</td>
            </tr>
        </table>
    </div>
    <br/>
    <div class="text-block text-block-14">
        <p>Пожалуйста, обратите внимание:</p>
        <p>
            Стоимость доставки Почтой России может существенно меняться для крупногабаритных заказов!<br/>
            В этом случае с вами свяжется наш менеджер и уточнит стоимость доставки, исходя из размеров и веса вашей посылки.<br/>
            Стоимость доставки не зависит от суммы заказа.<br/>
            При получении заказа на Почте к стоимости заказа добавляется почтовый сбор за наложенный платеж согласно тарифам Почты России.
        </p>
    </div>
    <div class="table-container">
        <table>
            <tr>
                <th width="50%">Размер суммы заказа</th>
                <th width="50%">Сбор «Почты России»</th>
            </tr>
            <tr>
                <td>до 1 000 руб. включительно</td>
                <td>40 руб. + 5% от суммы заказа</td>
            </tr>
            <tr>
                <td>свыше 1 000 до 5 000 руб. включительно</td>
                <td>50 руб. + 4% от суммы заказа</td>
            </tr>
            <tr>
                <td>свыше 5 000 руб. до 20 000 руб. включительно</td>
                <td>150 руб. + 2% от суммы заказа</td>
            </tr>
            <tr>
                <td>свыше 20 000 руб. до 500 000 руб. включительно</td>
                <td>250 руб. + 1,5% от суммы заказа</td>
            </tr>
        </table>
    </div>
    <div class="text-block text-block-14">
        <p>Указанная стоимость доставки может превышать стоимость выдаваемую почтовым калькулятором, т. к. при отправке посылки Почта России добавляет обязательные услуги (маркировка посылки, оклейка коробки фирменным скотчем, оформление наложенного платежа, стоимость самой коробки), без которых не принимает почтовое отправление.</p>
    </div>
</section>

<section class="delivery-form delivery-page--text-block" id="delivery-form-COURIER">
    <div class="text-block text-block-14">
        <p>В случае доставки курьером покупатели могут оплатить заказ как наличным, так и безналичным способом. Мы постоянно совершенствуем нашу службу доставки для того, чтобы сделать ее максимально удобной. Чтобы быть к Вам как можно ближе мы регулярно открываем новые пункты самовывоза.</p>
        <p>Время доставки.</p>
        <ol>
            <li>Доставить ваш заказ мы сможем в течение 1-3 дней.</li>
            <li>Дневная доставка осуществляется с 10:00 до 18:00 в любой день недели.</li>
            <li>Вечерняя доставка осуществляется с 18:00 до 21:00 с понедельника по пятницу.</li>
            <li>Время доставки можно выбрать в интервале трех часов, во все дни, кроме субботы и воскресенья.</li>
        </ol>
        <br/>
        <p>Оплата:</p>
        <p>- наличные,</p>
        <p>- банковские карты.</p>
        <br/>
        <p>О возможных изменениях в работе курьерской службы в праздничные дни мы будем оповещать вас в <a href="#">новостях</a> на сайте!</p>
        <p>Не забудьте ознакомиться с <a href="#">правилами курьерской доставки</a></p>
    </div>
</section>
</form>
