<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "equipment".
 *
 * @property int $id
 * @property string $code
 * @property int $category_id
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
 * @property string $categoryStr
 *
 * @property LendingHistory[] $lendingHistories
 */
class Equipment extends BaseAppModel
{
    const CATEGORY_PC = 1;
    const CATEGORY_DESKTOP = 2;
    const CATEGORY_SPEAKER = 3;
    const CATEGORY_MONITOR = 4;
    const CATEGORY_MOBILE_PHONE = 5;

    const EQUIPMENT_STATUS_NORMAL = 1;
    const EQUIPMENT_STATUS_REPAIR = 2;
    const EQUIPMENT_STATUS_BROKEN = 3;
    
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

    public static function categoryOptionArr()
    {
        return [
            self::CATEGORY_PC => 'ノート型PC',
            self::CATEGORY_DESKTOP => 'デックストップ',
            self::CATEGORY_SPEAKER => 'スピーカー',
            self::CATEGORY_MONITOR => 'モニター',
            self::CATEGORY_MOBILE_PHONE => '携帯電話',
        ];
    }

    public function getCategoryStr()
    {
        return ArrayHelper::getValue(self::categoryOptionArr(), $this->category_id);
    }
}
