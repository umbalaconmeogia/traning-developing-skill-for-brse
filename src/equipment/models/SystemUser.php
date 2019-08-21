<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "system_user".
 *
 * @property int $id
 * @property string $username
 * @property string $password_hash
 * @property string $email
 * @property string $auth_key
 * @property int $data_status
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
            [['data_status'], 'default', 'value' => null],
            [['data_status'], 'integer'],
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
            'data_status' => Yii::t('app', 'Data Status'),
            'password' => Yii::t('app', 'Password'),
        ];
    }
}
