<?php

namespace app\models;

use Exception;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "employee".
 *
 * @property int $data_status
 *
 * @property string $dataStatusStr
 */
class BaseAppModel extends \yii\db\ActiveRecord
{
    const DATA_STATUS_NORMAL = 1;
    const DATA_STATUS_DELETED = 9;

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
    
    /**
     * Get all errors on this model.
     * @param string $attribute attribute name. Use null to retrieve errors for all attributes.
     * @return array errors for all attributes or the specified attribute. Empty array is returned if no error.
     */
    public function getErrorMessages($attribute = NULL)
    {
        if ($attribute === NULL) {
            $attribute = $this->attributes();
        }
        if (!is_array($attribute)) {
            $attribute = array($attribute);
        }
        $errors = array();
        foreach ($attribute as $attr) {
            if ($this->hasErrors($attr)) {
                $errors = array_merge($errors, array_values($this->getErrors($attr)));
            }
        }
        return $errors;
    }

    public static function findOneCreateNew($condition, $saveDb = FALSE)
    {
        $result = static::findOne($condition);
        if (!$result) {
            $result = \Yii::createObject(static::className());
            \Yii::configure($result, $condition);
            if ($saveDb) {
              $result->saveThrowError();
            }
        }
        return $result;
    }

    public function saveThrowError()
    {
      if (!$this->save()) {
        throw new Exception("Error saving " . join("\n", $this->getErrorMessages()));
      }
    }
}
