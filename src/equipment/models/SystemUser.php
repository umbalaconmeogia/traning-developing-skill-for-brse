<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "system_user".
 *
 * @property int $id
 * @property string $username
 * @property string $password_hash
 * @property string $email
 * @property string $auth_key
 * @property int $privileges
 * @property int $data_status
 * 
 * @property string $privilegeStr
 */
class SystemUser extends BaseAppModel
{
    const PRIVILEGES_ADMIN = 1;
    const PRIVILEGES_NORMAL = 2;
    
    public $password;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['privileges', 'data_status'], 'default', 'value' => null],
            [['privileges', 'data_status'], 'integer'],
            [['username', 'password_hash', 'email', 'auth_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'email' => Yii::t('app', 'Email'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'privileges' => Yii::t('app', 'Privileges'),
            'data_status' => Yii::t('app', 'Data Status'),
            'password' => Yii::t('app', 'Password'),
        ];
    }

    public static function privilegesOptionArr()
    {
        return [
            self::PRIVILEGES_ADMIN => '管理者',
            self::PRIVILEGES_NORMAL => '一般ユーザ',
        ];
    }

    public function getPrivilegeStr()
    {
        return ArrayHelper::getValue(self::privilegesOptionArr(), $this->privileges);
    }
}
