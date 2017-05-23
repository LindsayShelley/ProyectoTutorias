<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "semestres".
 *
 * @property string $id
 * @property string $nombre
 *
 * @property Grupos[] $grupos
 * @property Periodossemestral[] $periodossemestrals
 */
class Semestres extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'semestres';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupos()
    {
        return $this->hasMany(Grupos::className(), ['nu_semestre' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodossemestrals()
    {
        return $this->hasMany(Periodossemestral::className(), ['nu_semestre' => 'id']);
    }
}
