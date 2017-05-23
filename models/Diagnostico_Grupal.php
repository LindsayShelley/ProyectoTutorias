<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diagnostico_grupal".
 *
 * @property string $id
 * @property string $descripcion_general
 * @property string $nu_alumnos
 * @property string $nu_docentes
 * @property string $sesion
 *
 * @property Alumnos $nuAlumnos
 * @property Docentes $nuDocentes
 */
class Diagnostico_Grupal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diagnostico_grupal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion_general', 'nu_alumnos', 'nu_docentes', 'sesion'], 'required'],
            [['descripcion_general', 'sesion'], 'string'],
            [['nu_alumnos', 'nu_docentes'], 'integer'],
            [['nu_alumnos'], 'exist', 'skipOnError' => true, 'targetClass' => Alumnos::className(), 'targetAttribute' => ['nu_alumnos' => 'id']],
            [['nu_docentes'], 'exist', 'skipOnError' => true, 'targetClass' => Docentes::className(), 'targetAttribute' => ['nu_docentes' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'descripcion_general' => Yii::t('app', 'Descripcion General'),
            'nu_alumnos' => Yii::t('app', 'Nu Alumnos'),
            'nu_docentes' => Yii::t('app', 'Nu Docentes'),
            'sesion' => Yii::t('app', 'Sesion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNuAlumnos()
    {
        return $this->hasOne(Alumnos::className(), ['id' => 'nu_alumnos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNuDocentes()
    {
        return $this->hasOne(Docentes::className(), ['id' => 'nu_docentes']);
    }
}
