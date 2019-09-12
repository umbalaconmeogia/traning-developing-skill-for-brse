<?php

namespace app\models;

use Exception;
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
class SystemUser extends BaseAppModel implements \yii\web\IdentityInterface
{
    const PRIVILEGES_ADMIN = 1;
    const PRIVILEGES_NORMAL = 2;

    public $plainPassword;

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
            [['password'], 'safe'],
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

    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new Exception('findIdentityByAccessToken() not supported');
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Store the hashed password.
     * @param string $password
     */
    public function setPassword($password)
    {
        if ($password) {
            $this->plainPassword = $password;
            $this->password_hash = \Yii::$app->security->generatePasswordHash($password);
        }
    }

    public function getPassword()
    {
        return $this->plainPassword;
    }

    /**
     * Check if a password is correct comparing to saved one.
     * @param string $password
     * @return boolean
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $this->password_hash);
    }

    /**
     * Generate auth_key for new record.
     * {@inheritDoc}
     * @see \yii\db\BaseActiveRecord::beforeSave()
     */
    public function beforeSave($insert)
    {
        \Yii::trace('LoginUserTrait#beforeSave()');
        $result = parent::beforeSave($insert);
        if ($result && $this->isNewRecord) {
            // Set auth_key
            $this->auth_key = \Yii::$app->security->generateRandomString();
        }
        return $result;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }
}
