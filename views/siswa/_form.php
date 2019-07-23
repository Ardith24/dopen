<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use kartik\date\DatePicker;
use app\models\JenjangPendidikan;

/* @var $this yii\web\View */
/* @var $model app\models\Siswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="siswa-form">
    <?php
    $data_jenjang = ArrayHelper::map(JenjangPendidikan::find()->asArray()->all(),'id','nama');
    ?>

    <?php $form = ActiveForm::begin(); ?>

    <!-- < ?= $form->field($model, 'id')->textInput() ?> -->

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>

    <!-- < ?= $form->field($model, 'tgl_lahir')->textInput() ?> -->
    <?= $form->field($model, 'tgl_lahir')->widget(DatePicker::classname(), [
        'options' => ['placeholder' => 'Masukan Tanggal Lahir ...'],
        'pluginOptions' => [
            'autoclose'=>true
        ]
    ]);
    ?>

    <?= $form->field($model, 'foto')->textInput(['maxlength' => true]) ?>

    <!-- < ?= $form->field($model, 'jenjang_id')->textInput() ?> -->
    <?= $form->field($model, 'jenjang_id')->widget(Select2::classname(), [
        'language' => 'id',
        'data' => $data_jenjang,
        'options' => ['placeholder' => 'Select a state ...'],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
