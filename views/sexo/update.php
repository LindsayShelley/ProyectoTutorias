<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sexo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Sexo',
]) . $model->sexo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Sexos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sexo, 'url' => ['view', 'id' => $model->sexo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="sexo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
