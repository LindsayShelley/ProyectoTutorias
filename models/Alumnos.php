<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumnos".
 *
 * @property string $id
 * @property string $nombre
 * @property string $paterno
 * @property string $materno
 * @property string $matricula
 * @property string $direccion
 * @property string $telefono
 * @property string $email
 * @property string $sexo
 * @property integer $edad
 * @property string $nu_carrera
 *
 * @property Carreras $nuCarrera
 * @property DiagnosticoGrupal[] $diagnosticoGrupals
 */
class Alumnos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alumnos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'paterno', 'matricula', 'sexo', 'edad', 'nu_carrera'], 'required'],
            [['nombre', 'paterno', 'materno', 'matricula', 'direccion', 'telefono', 'email', 'sexo'], 'string'],
            [['edad', 'nu_carrera'], 'integer'],
            [['nu_carrera'], 'exist', 'skipOnError' => true, 'targetClass' => Carreras::className(), 'targetAttribute' => ['nu_carrera' => 'id']],
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
            'paterno' => Yii::t('app', 'Paterno'),
            'materno' => Yii::t('app', 'Materno'),
            'matricula' => Yii::t('app', 'Matricula'),
            'direccion' => Yii::t('app', 'Direccion'),
            'telefono' => Yii::t('app', 'Telefono'),
            'email' => Yii::t('app', 'Email'),
            'sexo' => Yii::t('app', 'Sexo'),
            'edad' => Yii::t('app', 'Edad'),
            'nu_carrera' => Yii::t('app', 'Nu Carrera'),
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
    public function getDiagnosticoGrupals()
    {
        return $this->hasMany(DiagnosticoGrupal::className(), ['nu_alumnos' => 'id']);
    }
}
