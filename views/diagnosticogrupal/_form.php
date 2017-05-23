<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DiagnosticoGrupal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diagnostico-grupal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion_general')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'nu_alumnos')->textInput() ?>

    <?= $form->field($model, 'nu_docentes')->textInput() ?>

    <?= $form->field($model, 'sesion')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
