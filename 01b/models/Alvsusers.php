<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\helpers\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "alvs_users".
 *
 * @property int $id
 * @property string $f_name
 * @property string $s_name
 * @property string $email
 * @property string $location
 * @property string $phone
 * @property string $password
 * @property string $auth_key
 * @property string $role
 * @property string $hash
 * @property string $gender
 */
class Alvsusers extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'alvs_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['f_name', 's_name', 'email', 'phone', 'password', 'hash'], 'required'],
            [['hash'], 'string'],
            [['f_name', 's_name', 'email', 'location', 'phone', 'password', 'auth_key', 'role','gender'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'f_name' => 'First name',
            's_name' => 'Second name',
            'email' => 'Email',
            'location' => 'Location',
            'phone' => 'Phone',
            'password' => 'Password',
            'auth_key' => 'Auth Key',
            'role' => 'Role',
            'hash' => 'Hash',
            'gender' => 'Gender',
        ];
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
        // return static::findOne(['access_token' => $token]);
        throw new \yii\base\NotSupportedException();
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }


    public static function getName()
    {
        return $this->f_name;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        throw new \yii\base\NotSupportedException();
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
         throw new \yii\base\NotSupportedException();
    }

    public static function findByUsername($username){
        return self::findOne(['email'=>$username]);
    }

    public function validatePassword($password,$hash){
        // return $this->password ===$password;
        // check the hased password to the provided password
        if (Yii::$app->getSecurity()->validatePassword($password, $hash)) {
            // all good, logging user in
            return true;
        } else {
            // wrong password
            return false;
        }
    }

    
} // end class
