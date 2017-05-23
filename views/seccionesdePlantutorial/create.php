<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SeccionesDePlanTutorial */

$this->title = Yii::t('app', 'Create Secciones De Plan Tutorial');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Secciones De Plan Tutorials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="secciones-de-plan-tutorial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
