<?php

use app\models\Equipment;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EquipmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Equipments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Equipment'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code',
            [
                'attribute' => 'category_id',
                'filter' => Equipment::categoryOptionArr(),
                'value' => 'categoryStr',
            ],
            'name',
            'model_number',
            'serial_number',
            'specification',
            'accessory:ntext',
            'remarks:ntext',
            'buy_date',
            'payment_amount:currency',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
