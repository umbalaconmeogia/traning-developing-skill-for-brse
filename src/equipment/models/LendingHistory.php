<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lending_history".
 *
 * @property int $id
 * @property int $employee_id
 * @property int $equipment_id
 * @property string $lending_date
 * @property string $return_date
 * @property string $remarks
 * @property int $lending_status
 *
 * @property Employee $employee
 * @property Equipment $equipment
 */
class LendingHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lending_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['employee_id', 'equipment_id', 'lending_status'], 'default', 'value' => null],
            [['employee_id', 'equipment_id', 'lending_status'], 'integer'],
            [['lending_date', 'return_date'], 'safe'],
            [['remarks'], 'string'],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
            [['equipment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipment::className(), 'targetAttribute' => ['equipment_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'employee_id' => Yii::t('app', 'Employee ID'),
            'equipment_id' => Yii::t('app', 'Equipment ID'),
            'lending_date' => Yii::t('app', 'Lending Date'),
            'return_date' => Yii::t('app', 'Return Date'),
            'remarks' => Yii::t('app', 'Remarks'),
            'lending_status' => Yii::t('app', 'Lending Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasOne(Equipment::className(), ['id' => 'equipment_id']);
    }
}
