<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SeccionesDePlanTutorial */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Secciones De Plan Tutorial',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Secciones De Plan Tutorials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="secciones-de-plan-tutorial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
