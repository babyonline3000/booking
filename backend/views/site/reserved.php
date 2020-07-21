<?php
use common\helpers\StringHelper;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Список забронированных номеров';
$str_lenght = 110;

?>
<div class="site-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['width' => '5%'],
            ],
            [
                'attribute' => 'rooms_id',
                'label' => 'Название номера',
                'value' => function (\common\models\ReservedRoom $model) {
                        return $model->room->name;
                    },
            ],
            'username',
            'phone',
            'date_to_reserved',
            'date_out_reserved',
            'created_at',
            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '1px'],
            ],

        ],
    ]); ?>
</div>
