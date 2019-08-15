<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipment".
 *
 * @property int $id
 * @property string $code
 * @property int $type
 * @property string $name
 * @property string $model_number
 * @property string $serial_number
 * @property string $specification
 * @property string $accessory
 * @property string $remarks
 * @property string $buy_date
 * @property int $payment_amount
 *
 * @property LendingHistory[] $lendingHistories
 */
class Equipment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'payment_amount'], 'default', 'value' => null],
            [['type', 'payment_amount'], 'integer'],
            [['accessory', 'remarks'], 'string'],
            [['buy_date'], 'safe'],
            [['code', 'name', 'model_number', 'serial_number', 'specification'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'type' => Yii::t('app', 'Type'),
            'name' => Yii::t('app', 'Name'),
            'model_number' => Yii::t('app', 'Model Number'),
            'serial_number' => Yii::t('app', 'Serial Number'),
            'specification' => Yii::t('app', 'Specification'),
            'accessory' => Yii::t('app', 'Accessory'),
            'remarks' => Yii::t('app', 'Remarks'),
            'buy_date' => Yii::t('app', 'Buy Date'),
            'payment_amount' => Yii::t('app', 'Payment Amount'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLendingHistories()
    {
        return $this->hasMany(LendingHistory::className(), ['equipment_id' => 'id']);
    }
}
