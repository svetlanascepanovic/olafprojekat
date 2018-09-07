<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "korisnici".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $id_korisnika
 * @property integer $tip
 */
class Korisnici extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'korisnici';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'id_korisnika', 'tip'], 'required'],
            [['id_korisnika', 'tip'], 'integer'],
            [['username'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'id_korisnika' => 'Id Korisnika',
            'tip' => 'Tip',
        ];
    }
}
