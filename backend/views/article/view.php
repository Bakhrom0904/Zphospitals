<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use lajax\translatemanager\helpers\Language as Lx;
$lang = Yii::$app->language;

/* @var $this yii\web\View */
/* @var $model common\models\Articles */

$this->title = $model->{"title_$lang"};
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="col-xl-12">
    <div class="ms-panel">
        <div class="ms-panel-header  ms-panel-custome">
            <h6><?= Html::encode($this->title) ?></h6>
            <div>
                <?=  Html::a("<i class='fas fa-pencil-alt'></i> ".Lx::t('backend', 'Edit'), ['update', 'id' => $model->id], ['class' => 'ms-text-primary pr-3']) ?>
                <?=  Html::a("<i class='fas fa-trash-alt'></i> ".Lx::t('backend', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'ms-text-danger',
                    'data' => [
                        'confirm' => Lx::t('backend', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
        <div class="ms-panel-body">
            <div class="table-responsive">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                    [
                        'attribute' => 'img',
                        'format'    =>  'raw',
                        'value'     =>  function($model){
                            return  "<img src='$model->img' class='img-fluid' width='200px'>";
                        }
                    ],
                    [
                        'attribute' => 'doctor_id',
                        'value'     => function($model){
                            $lang = Yii::$app->language;
                            return $model->doctor->{"first_name_$lang"}." ".$model->doctor->{"last_name_$lang"}." ".$model->doctor->{"middle_name_$lang"};
                        }
                    ],
                    [
                        'attribute' => 'service_id',
                        'value'     => function($model){
                            $lang = Yii::$app->language;
                            return $model->service->{"name_$lang"};
                        }
                    ],
                    
                    'title_uz',
                    'title_ru',
                    'title_en',
                
                    [
                        'attribute' => 'description_uz',
                        'format'    =>  'raw',
                        'value'     =>  function($model){
                            return  $model->description_uz;
                        }
                    ],
                    [
                        'attribute' => 'description_ru',
                        'format'    =>  'raw',
                        'value'     =>  function($model){
                            return  $model->description_ru;
                        }
                    ],
                    [
                        'attribute' => 'description_en',
                        'format'    =>  'raw',
                        'value'     =>  function($model){
                            return  $model->description_en;
                        }
                    ],
                    'published_at',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
