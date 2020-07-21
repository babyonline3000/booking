<?php
use kartik\date\DatePicker;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Забронировать номер';
?>
<div class="site-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php $form = ActiveForm::begin([
        'id' => 'form',
        'method' => 'POST',
        'action' => ['site/add'],
    ]); ?>
    <?= $form->field($model, 'rooms_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Rooms::find()->select(['id', 'name'])->asArray()->all(), 'id', 'name'))->label('Номер') ?>
    <?= $form->field($model, 'username')->Input([]); ?>
    <?= $form->field($model, 'phone')->widget('yii\widgets\MaskedInput', [
        'mask' => '+7(999)999-99-99',
    ]) ?>
    <?= $form->field($model, 'date_to_reserved')->widget(DatePicker::className(),[
        'name' => 'dp_1',
        'type' => DatePicker::TYPE_INPUT,
//        'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose'=>true,
            'weekStart'=>1,
            'startDate' => date('Y-m-d',strtotime(date('Y-m-d'). " + 1 day")),
        ]
    ]); ?>
    <?= $form->field($model, 'date_out_reserved')->widget(DatePicker::className(),[
        'name' => 'dp_2',
        'type' => DatePicker::TYPE_INPUT,
//        'convertFormat' => true,
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'autoclose'=>true,
            'weekStart'=>1,
            'startDate' => date('Y-m-d',strtotime(date('Y-m-d'). " + 2 day")),
        ]
    ]); ?>

    <?= Html::submitButton('Забронировать', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>

</div>
