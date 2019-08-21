<?php

use app\models\LendingHistory;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Equipments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="equipment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'code',
            'categoryStr',
            'name',
            'model_number',
            'serial_number',
            'specification',
            'accessory:ntext',
            'remarks:ntext',
            'buy_date',
            'payment_amount:currency',
        ],
    ]) ?>

    <?php if (!$model->isNewRecord) {
        if ($model->id % 2 == 0) {
            echo $this->render('_lending', ['model' => $model]);
        } else {
            echo $this->render('_return', ['model' => $model]);
        }
    } ?>
</div>
