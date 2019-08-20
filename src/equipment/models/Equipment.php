<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

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
 * @property int $equipment_status
 *
 * @property string $typeStr
 *
 * @property LendingHistory[] $lendingHistories
 */
class Equipment extends \yii\db\ActiveRecord
{
    const TYPE_PC = 1;
    const TYPE_DESKTOP = 2;
    const TYPE_SPEAKER = 3;
    const TYPE_MONITOR = 4;
    const TYPE_MOBILE_PHONE = 5;

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
            [['category_id', 'name'], 'required'],
            [['category_id', 'payment_amount', 'equipment_status'], 'default', 'value' => null],
            [['category_id', 'payment_amount', 'equipment_status'], 'integer'],
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
            'category_id' => Yii::t('app', 'Category ID'),
            'name' => Yii::t('app', 'Name'),
            'model_number' => Yii::t('app', 'Model Number'),
            'serial_number' => Yii::t('app', 'Serial Number'),
            'specification' => Yii::t('app', 'Specification'),
            'accessory' => Yii::t('app', 'Accessory'),
            'remarks' => Yii::t('app', 'Remarks'),
            'buy_date' => Yii::t('app', 'Buy Date'),
            'payment_amount' => Yii::t('app', 'Payment Amount'),
            'equipment_status' => Yii::t('app', 'Equipment Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLendingHistories()
    {
        return $this->hasMany(LendingHistory::className(), ['equipment_id' => 'id']);
    }

    public static function typeOptionArr()
    {
        return [
            self::TYPE_PC => 'ノート型PC',
            self::TYPE_DESKTOP => 'デックストップ',
            self::TYPE_SPEAKER => 'スピーカー',
            self::TYPE_MONITOR => 'モニター',
            self::TYPE_MOBILE_PHONE => '携帯電話',
        ];
    }

    public function getTypeStr()
    {
        return ArrayHelper::getValue(self::typeOptionArr(), $this->category_id);
    }
}
