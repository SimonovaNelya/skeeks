<?php
use skeeks\cms\mail\helpers\Html;

/* @var $this yii\web\View */
/* @var $model \v3toys\skeeks\models\V3toysOrder */
$url = \yii\helpers\Url::to(['/shop/order/view', 'id' => $model->id], true);
$model->refresh();
?>

<?= Html::beginTag('h1'); ?>
    <?= \Yii::t('skeeks/shop/app', 'New order'); ?> #<?= $model->id; ?> <?= \Yii::t('skeeks/shop/app', 'in site'); ?> <?= \Yii::$app->cms->appName ?>
<?= Html::endTag('h1'); ?>

<?= Html::beginTag('p'); ?>
    <?= \Yii::t('skeeks/shop/app', 'The order #{order_id} created successfully', ['order_id' => $model->id]); ?>.<br>
    К оплате: <b><?= Html::tag('b', \Yii::$app->money->intlFormatter()->format($model->shopOrder->money)); ?></b>
<?= Html::endTag('p'); ?>

<hr />
<?= Html::beginTag('h2'); ?>
    Заказ:
<?= Html::endTag('h2'); ?>
<?= Html::beginTag('p'); ?>
    <?=
        \yii\grid\GridView::widget([
            'dataProvider'    => new \yii\data\ArrayDataProvider([
                'allModels' => $model->shopOrder->shopBaskets
            ]),
            'layout' => "{items}",
            'columns'   =>
            [
                /*[
                    'class' => \yii\grid\SerialColumn::className()
                ],*/

                [
                    'class'     => \yii\grid\DataColumn::className(),
                    'format'    => 'raw',
                    'value'     => function(\skeeks\cms\shop\models\ShopBasket $shopBasket)
                    {
                        if ($shopBasket->image)
                        {
                            return Html::img($shopBasket->image->absoluteSrc, ['width' => 80]);
                        }
                    }
                ],
                [
                    'class' => \yii\grid\DataColumn::className(),
                    'attribute' => 'name',
                    'format' => 'raw',
                    'value' => function(\skeeks\cms\shop\models\ShopBasket $shopBasket)
                    {
                        if ($shopBasket->url)
                        {
                            return Html::a($shopBasket->name, $shopBasket->url, [
                                'target' => '_blank',
                                'titla' => "Смотреть на сайте",
                                'data-pjax' => 0
                            ]);
                        } else
                        {
                            return $shopBasket->name;
                        }

                    }
                ],

                [
                    'class' => \yii\grid\DataColumn::className(),
                    'attribute' => 'quantity',
                    'value' => function(\skeeks\cms\shop\models\ShopBasket $shopBasket)
                    {
                        return $shopBasket->quantity . " " . $shopBasket->measure_name;
                    }
                ],

                [
                    'class' => \yii\grid\DataColumn::className(),
                    'label' => \Yii::t('skeeks/shop/app', 'Price'),
                    'attribute' => 'price',
                    'format' => 'raw',
                    'value' => function(\skeeks\cms\shop\models\ShopBasket $shopBasket)
                    {
                        if ($shopBasket->discount_value)
                        {
                            return "<span style='text-decoration: line-through;'>" . \Yii::$app->money->intlFormatter()->format($shopBasket->moneyOriginal) . "</span><br />". Html::tag('small', $shopBasket->notes) . "<br />" . \Yii::$app->money->intlFormatter()->format($shopBasket->money) . "<br />" . Html::tag('small', \Yii::t('skeeks/shop/app', 'Discount').": " . $shopBasket->discount_value);
                        } else
                        {
                            return \Yii::$app->money->intlFormatter()->format($shopBasket->money) . "<br />" . Html::tag('small', $shopBasket->notes);
                        }

                    }
                ],
                [
                    'class' => \yii\grid\DataColumn::className(),
                    'label' => \Yii::t('skeeks/shop/app', 'Sum'),
                    'attribute' => 'price',
                    'format' => 'raw',
                    'value' => function(\skeeks\cms\shop\models\ShopBasket $shopBasket)
                    {
                        return \Yii::$app->money->intlFormatter()->format($shopBasket->money->multiply($shopBasket->quantity));
                    }
                ],
            ]
        ])
    ?>
<?= Html::endTag('p'); ?>

<?= Html::beginTag('h2'); ?>
    Покупатель:
<?= Html::endTag('h2'); ?>
<?=
    \yii\widgets\DetailView::widget([
        'model'         => $model->shopOrder->buyer->relatedPropertiesModel,
        'attributes'    => $model->shopOrder->buyer->relatedPropertiesModel->attributes()
    ]);
?>

<?= Html::beginTag('p'); ?>
    <?= \Yii::t('skeeks/shop/app', 'The details of the order, you can track on the page'); ?>: <?= Html::a($url, $url); ?>
<?= Html::endTag('p'); ?>