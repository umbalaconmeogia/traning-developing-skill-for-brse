<?php

use app\models\Equipment;
use app\models\LendingHistory;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Equipment */
/* @var $form yii\widgets\ActiveForm */

$lendingHistory = new LendingHistory();
?>
<h3>貸出</h3>

<?php $form = ActiveForm::begin(); ?>

<div class="row">
    <div class="col-md-6">
        <?= $form->field($lendingHistory, 'employee_id')->dropDownList([]) ?>

        <?= $form->field($lendingHistory, 'borrower_name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($lendingHistory, 'lending_date')->textInput(['type' => 'date']) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($lendingHistory, 'remarks')->textarea(['rows' => 6]) ?>
    </div>
</div>

<div class="form-group">
    <?= Html::submitButton(Yii::t('app', 'Lend'), ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
