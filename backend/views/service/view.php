<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use lajax\translatemanager\helpers\Language as Lx;
$lang = Yii::$app->language;

/* @var $this yii\web\View */
/* @var $model common\models\Service */

$this->title = $model->{"name_$lang"};
$this->params['breadcrumbs'][] = ['label' => Lx::t('backend', 'Services'), 'url' => ['index']];
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
                            'attribute' => 'department_id',
                            'value' => function($model){
                                $lang = Yii::$app->language;
                                return $model->department->{"name_$lang"};
                            }
                        ],
                        'parent_id',
                        'name_uz',
                        'name_ru',
                        'name_en',
                        'description_uz:ntext',
                        'description_ru:ntext',
                        'description_en:ntext',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
