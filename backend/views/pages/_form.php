<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap4\ActiveForm;
use mihaildev\elfinder\InputFile;
use unclead\multipleinput\MultipleInput;

use kartik\tabs\TabsX;
use kartik\select2\Select2;
use kartik\time\TimePicker;

use lajax\translatemanager\helpers\Language as Lx;
$lang = Yii::$app->language;


/* @var $this yii\web\View */
/* @var $model common\models\Pages */
/* @var $form yii\bootstrap4\ActiveForm */
?>
<div class="ms-panel-body">
    <?php $form = ActiveForm::begin(); ?>

<?php 
    $items = [
        [
            'label'=>Lx::t('backend', 'Русский'),
            'content'=> $this->render("_content", ['lang'=>'ru', 'model'=>$model, 'form'=>$form]),
            'active'=>true
        ],
        [
            'label'=>Lx::t('backend', 'Узбекский'),
            'content'=> $this->render("_content", ['lang'=>'uz', 'model'=>$model, 'form'=>$form]),
        ],
        [
            'label'=>Lx::t('backend', 'Англиский'),
            'content'=> $this->render("_content", ['lang'=>'en', 'model'=>$model, 'form'=>$form]),
        ],
    ];
?>
    <div class="col-md-12 mt-3">
        <?= $form->field($model, 'slug'); ?>
    </div>
    <div class="col-md-12">
        <?= $form->field($model, 'meta')->widget(MultipleInput::className(), [
            'min' => 1,
            'max' => 3,
            'iconSource' => 'fa',
            'addButtonPosition' => MultipleInput::POS_HEADER,
            'addButtonOptions' => ['class' => 'btn btn-primary', "style"=>"margin-top: 0; min-width: 40px;"],
            'removeButtonOptions' => ['class' => 'btn btn-danger', 'style' => 'margin-top: 0 !important;'],
            'columns' => [
                [
                    'name'  => 'lang',
                    'title' => Lx::t('backend', 'Language'),
                    'type' => Select2::className(),
                    'options' => [
                        'data' => ['uz'=>"O'zbekcha",'ru'=>'Русский','en'=>'English'],
                        'class' => 'form-control'
                    ],
                ],
                [
                    'name'  => 'meta',
                    'title' => Lx::t('backend', 'Meta'),
                    'type' => "textArea",
                    'options' => [
                        'rows' => 5,
                        'class' => 'form-control'
                    ],
                ],
                
                
            ]
        ])?>
    </div>
    <?=TabsX::widget([
        'items'=>$items,
        'position'=>TabsX::POS_LEFT,
        'bordered'=>true,
        'sideways'=>true,
        'encodeLabels'=>false,
        'tabContentOptions' => ['style' => 'width: 100%']
    ]);?>
    <?= Html::submitButton(Lx::t('backend', $model->isNewRecord ? 'Create' : 'Save'), ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end(); ?>
</div>

<style>
    .js-input-plus, .js-input-remove {
        margin-top: 0;
        min-width: 40px;
        padding: 8px 0;
        height: 35px;
    }
    .fa-plus, .fa-times  {
        margin: 0 !important;
    }
    .multiple-input-list__item td {
        padding-top: 0;
        padding-bottom: 0;
    }
</style>
