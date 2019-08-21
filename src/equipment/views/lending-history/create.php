<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LendingHistory */

$this->title = Yii::t('app', 'Create Lending History');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Lending Histories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lending-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
