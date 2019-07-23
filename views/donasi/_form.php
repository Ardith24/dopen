<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Jenis;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Donasi */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donasi-form">
    <?php
    $data_jenis = ArrayHelper::map(Jenis::find()->asArray()->all(),'id','nama');
    ?>
    
    <?php $form = ActiveForm::begin(); ?>

    <!-- < ?= $form->field($model, 'id')->textInput() ?> -->

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah')->textInput(['maxlength' => true]) ?>

    <!-- < ?= $form->field($model, 'jenis_id')->textInput() ?> -->
    <?= $form->field($model, 'jenis_id')->widget(Select2::classname(), [
        'language' => 'id',
        'data' => $data_jenis,
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ]);
    ?>

    <!-- < ?= $form->field($model, 'create_at')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
