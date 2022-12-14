<?php

/** @var yii\web\View $this */

use common\widgets\Banner;
use common\widgets\Consult;
use common\widgets\Affiliation;
use yii\helpers\Html;
use yii\helpers\Url;
use lajax\translatemanager\helpers\Language as Lx;

$this->title = Yii::t('frontend', "ZARMED PRATIKSHA")." | ". Yii::t('frontend', 'Job Portal');
?>
<?= Banner::widget(['title' => $this->title]) ?>
    <section class="blog-main blg-listings">
        <div class="container">
            <div class="sc-title-two text-center">
                <h4 class="cl-green text-uppercase"><?= Lx::t('frontend', 'Job Vacancies') ?></h4>
                <h2><?= Lx::t('frontend', 'We Have Open Vacancies') ?></h2>
            </div>
            <div class="blog-wrap mb-xs-3">
                <div class="row align-items-stretch">
                    <?php foreach ($jobs as $job) { ?>
                        <div class="col-md-4 col-sm-6 col-xs-12 mb-3">
                            <div class="article-list bg-sfgrey-2 h-100">
                                <div class="at-thumbnail card-image">
                                    <?= Html::a('<img src="' . $job->img . '" alt=" ' . $job->title . ' "/>', Url::to(['job-info', 'id' => $job->id])) ?>
                                </div>
                                <div class="article-content">
                                    <div class="artl-detail">
                                        <h4>
                                            <?= Html::a($job->title, ['job-info', 'id' => $job->id]) ?>
                                        </h4>
                                        <p><?= $job->trimDescription ?><h4 style="color: #283779;"><?=Yii::t('frontend', 'To make an appointment for an interview and for questions, call');?>:<br>+998 97 390 01 04</h4></p>
                                    </div>
                                </div>
                                <div class="article-footer">
                                    <ul>
                                        <li class="cl-lgrey2 pr-2"><h4 style="color: #283779;"><?= $job->publishedDate ?></h4></li>
                                        <li class="cl-lgrey2 pr-2">
                                            <div>
                                                <a href="https://forms.gle/GbpTiFEmfyvfP98DA" target="_blank" class="btn-sm bg-blue btn"><?= Lx::t('frontend', 'Apply Now') ?></a>
                                            </div>
                                        </li>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

<?= Consult::widget(['social' => $this->params['social']]) ?>