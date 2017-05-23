<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "periodossemestral".
 *
 * @property string $id
 * @property string $nu_carrera
 * @property string $nu_grupo
 * @property string $nu_semestre
 * @property string $periodo
 *
 * @property Grupos $nuGrupo
 * @property Semestres $nuSemestre
 */
class PeriodoSemestral extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'periodossemestral';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nu_carrera', 'nu_grupo', 'nu_semestre', 'periodo'], 'required'],
            [['nu_carrera', 'nu_grupo', 'nu_semestre'], 'integer'],
            [['periodo'], 'string'],
            [['nu_grupo'], 'exist', 'skipOnError' => true, 'targetClass' => Grupos::className(), 'targetAttribute' => ['nu_grupo' => 'id']],
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
            'nu_carrera' => Yii::t('app', 'Nu Carrera'),
            'nu_grupo' => Yii::t('app', 'Nu Grupo'),
            'nu_semestre' => Yii::t('app', 'Nu Semestre'),
            'periodo' => Yii::t('app', 'Periodo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNuGrupo()
    {
        return $this->hasOne(Grupos::className(), ['id' => 'nu_grupo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNuSemestre()
    {
        return $this->hasOne(Semestres::className(), ['id' => 'nu_semestre']);
    }
}
