<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DonasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Detail Donasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donasi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Donasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nama',
            'jumlah',
            // 'jenis_id',
            [
                'label' => 'jenis',
                'attribute' => 'jenis.nama',
            ],
            'create_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
