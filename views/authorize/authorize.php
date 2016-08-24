<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\authclient\widgets\AuthChoice;

$this->title = ucfirst($client->display_name);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
          <div class="authorize">
          <h1 class="text-center"><?= Html::encode($this->title) ?></h1>
          <div class="body text-center">
            <small style="padding:5px;color:gray;">
            The app  <strong><?= Html::encode($this->title) ?></strong> would like the abllity to access your basic information.<i class="glyphicon glyphicon-info"></i>
            </small>
            <h4>Allow <?= Html::encode($this->title) ?> Access?</h4>
          </div>


            <?php $form = ActiveForm::begin(['id' => 'authorized-form']); ?>
                <div  class="text-center" style="margin-bottom:5px;">
                    <?= Html::submitButton('Cancel', ['class' => 'btn btn-default', 'name' => 'authorized-button', 'value'=>'no']) ?>
                    <?= Html::submitButton('Accept', ['class' => 'btn btn-primary', 'name' => 'authorized-button', 'value'=>'yes']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
        </div>
    </div>
</div>
