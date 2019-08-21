<?php

use app\models\BaseAppModel;
use app\models\SystemUser;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SystemUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="system-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->textInput(['type' => 'password']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'privileges')->radioList(SystemUser::privilegesOptionArr()) ?>

    <?= $form->field($model, 'data_status')->radioList(BaseAppModel::dataStatusOptionArr()) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
