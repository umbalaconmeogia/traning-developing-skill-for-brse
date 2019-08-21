<?php

use app\models\BaseAppModel;
use app\models\SystemUser;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SystemUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'System Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="system-user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create System User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'email:email',
            [
                'attribute' => 'data_status',
                'filter' => BaseAppModel::dataStatusOptionArr(),
                'value' => 'dataStatusStr',
            ],
            [
                'attribute' => 'privileges',
                'filter' => SystemUser::privilegesOptionArr(),
                'value' => 'privilegeStr',
            ],
  
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
