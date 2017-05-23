<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grupos".
 *
 * @property string $id
 * @property string $nombre
 * @property string $nu_carrera
 * @property string $nu_semestre
 *
 * @property Carreras $nuCarrera
 * @property Semestres $nuSemestre
 * @property Periodossemestral[] $periodossemestrals
 */
class Grupos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grupos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'nu_carrera', 'nu_semestre'], 'required'],
            [['nombre'], 'string'],
            [['nu_carrera', 'nu_semestre'], 'integer'],
            [['nu_carrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carreras::className(), 'targetAttribute' => ['nu_carrera' => 'id']],
            [['nu_semestre'], 'exist', 'skipOnError' => true, 'targetClass' => Semestres::className(), 'targetAttribute' => ['nu_semestre' => 'id']],
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
            'nu_carrera' => Yii::t('app', 'Nu Carrera'),
            'nu_semestre' => Yii::t('app', 'Nu Semestre'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNuCarrera()
    {
        return $this->hasOne(Carreras::className(), ['id' => 'nu_carrera']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNuSemestre()
    {
        return $this->hasOne(Semestres::className(), ['id' => 'nu_semestre']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPeriodossemestrals()
    {
        return $this->hasMany(Periodossemestral::className(), ['nu_grupo' => 'id']);
    }
}
