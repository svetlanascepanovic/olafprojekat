<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "predmet".
 *
 * @property integer $id_predmet
 * @property string $naziv
 * @property integer $brojKredita
 * @property integer $id_pedagog
 *
 * @property Ispit[] $ispits
 */
class Predmet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'predmet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['naziv', 'brojKredita', 'id_pedagog'], 'required'],
            [['brojKredita', 'id_pedagog'], 'integer'],
            [['naziv'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_predmet' => 'Id Predmet',
            'naziv' => 'Naziv',
            'brojKredita' => 'Broj Kredita',
            'id_pedagog' => 'Id Pedagog',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIspits()
    {
        return $this->hasMany(Ispit::className(), ['id_predmet' => 'id_predmet']);
    }
}
