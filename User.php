<?php
namespace app\models;

//app\models\gii\Users is the model generated using Gii from users table


use yii\db\ActiveRecord;

class User extends ActiveRecord implements \yii\web\IdentityInterface {

    public static function tableName(){
        return 'users';
    }

/**
* @inheritdoc
*/
public static function findIdentity($id) {
    $dbUser = self::find()->where(["id" => $id])->one();
    if (!count($dbUser)) {
        return null;
    }
    return new static($dbUser);
}

/**
* @inheritdoc
*/
public static function findIdentityByAccessToken($token, $userType = null) {

    $dbUser = self::find()->where(["accessToken", $token])->one();
    if (!count($dbUser)) {
        return null;
    }
    return new static($dbUser);
}

/**
* Finds user by username
*
* @param  string      $username
* @return static|null
*/
public static function findByUsername($username) {
    $dbUser = self::find()->where(["username" => $username])->one();
    if (!count($dbUser)) {
        return null;
    }
    return new static($dbUser);
}

/**
* @inheritdoc
*/
public function getId() {
    return $this->id;
}

/**
* @inheritdoc
*/
public function getAuthKey() {
    return $this->authKey;
}

/**
* @inheritdoc
*/
public function validateAuthKey($authKey) {
    return $this->authKey === $authKey;
}

/**
* Validates password
*
* @param  string  $password password to validate
* @return boolean if password provided is valid for current user
*/
public function validatePassword($password) {
    return $this->password === $password;
}

}