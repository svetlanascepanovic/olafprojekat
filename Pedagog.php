<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pedagog".
 *
 * @property integer $id
 * @property string $Ime
 * @property string $Prezime
 */
class Pedagog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedagog';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Ime', 'Prezime'], 'required'],
            [['Ime', 'Prezime'], 'string', 'max' => 111],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Ime' => 'Ime',
            'Prezime' => 'Prezime',
        ];
    }
}
