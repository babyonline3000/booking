<?php
use common\helpers\StringHelper;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Справочник номеров гостиницы';
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
                'attribute' => 'name',
                'headerOptions' => ['width' => '30%'],
            ],
            [
                'attribute' => 'description',
                'label' => 'Описание',
                'format' => 'raw',
                'value' => function (\common\models\Rooms $model) use ($str_lenght) {
                        $result = $model->description;
                        if (mb_strlen($result) > $str_lenght) {
                            return Html::tag('span', StringHelper::smartTruncate($result, $str_lenght), ['title' => $result]);
                        } else {
                            return $result;
                        }
                    },
            ],
            /*[
                'class' => 'yii\grid\ActionColumn',
            ],*/

        ],
    ]); ?>
</div>
