<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DiagnosticoGrupal */

$this->title = Yii::t('app', 'Create Diagnostico Grupal');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Diagnostico Grupals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnostico-grupal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
