<?php

use app\models\Equipment;
use app\models\LendingHistory;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */
/* @var $form yii\widgets\ActiveForm */

$lendingHistory = new LendingHistory();
$lendingHistory->borrower_name = 'DangNH';
$lendingHistory->lending_date = '2019/08/18';
?>
<h3>返却</h3>

<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-md-6">
        <?= $form->field($lendingHistory, 'borrower_name')->textInput(['readonly' => true]) ?>

        <?= $form->field($lendingHistory, 'lending_date')->textInput(['readonly' => true]) ?>

        <?= $form->field($lendingHistory, 'return_date')->textInput(['type' => 'date']) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($lendingHistory, 'remarks')->textarea(['rows' => 6]) ?>
    </div>
</div>

<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Return'), ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
