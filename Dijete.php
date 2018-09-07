<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dijete".
 *
 * @property integer $id_dijete
 * @property string $ime
 * @property string $prezime
 * @property integer $evidencioniBroj
 * @property integer $godinaUpisa
 */
class Dijete extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dijete';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ime', 'prezime', 'evidencioniBroj', 'godinaUpisa'], 'required'],
            [['evidencioniBroj', 'godinaUpisa'], 'integer'],
            [['ime', 'prezime'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_dijete' => 'Id Dijete',
            'ime' => 'Ime',
            'prezime' => 'Prezime',
            'evidencioniBroj' => 'Evidencioni Broj',
            'godinaUpisa' => 'Godina Upisa',
        ];
    }
}
