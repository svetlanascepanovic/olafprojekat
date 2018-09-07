<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ispit".
 *
 * @property integer $id_ispit
 * @property integer $id_predmet
 * @property integer $id_dijete
 * @property string $datum
 * @property string $ocjena
 *
 * @property Predmet $idPredmet
 */
class Ispit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ispit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_predmet', 'id_dijete'], 'required'],
            [['id_predmet', 'id_dijete'], 'integer'],
            [['datum'], 'safe'],
            [['ocjena'], 'string', 'max' => 1],
            [['id_predmet'], 'exist', 'skipOnError' => true, 'targetClass' => Predmet::className(), 'targetAttribute' => ['id_predmet' => 'id_predmet']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ispit' => 'Id Ispit',
            'id_predmet' => 'Id Predmet',
            'id_dijete' => 'Id Dijete',
            'datum' => 'Datum',
            'ocjena' => 'Ocjena',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPredmet()
    {
        return $this->hasOne(Predmet::className(), ['id_predmet' => 'id_predmet']);
    }
}
