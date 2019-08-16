<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $name
 * @property int $data_status
 * @property string $dataStatusStr
 *
 * @property LendingHistory[] $lendingHistories
 */
class Employee extends \yii\db\ActiveRecord
{
    const DATA_STATUS_NORMAL = 1;
    const DATA_STATUS_DELETED = 9;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employee';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_status'], 'default', 'value' => null],
            [['data_status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'data_status' => 'Data Status',
            'dataStatusStr' => 'Data Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLendingHistories()
    {
        return $this->hasMany(LendingHistory::className(), ['employee_id' => 'id']);
    }

    public static function dataStatusOptionArr()
    {
      return [
        self::DATA_STATUS_NORMAL => '通常',
        self::DATA_STATUS_DELETED => '削除',
      ];
    }
    
    public function getDataStatusStr()
    {
      return ArrayHelper::getValue(self::dataStatusOptionArr(), $this->data_status);
    }
}
