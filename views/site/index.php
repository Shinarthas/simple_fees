<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <?php if (Yii::$app->session->hasFlash('fees')): ?>

                <div class="alert alert-success">
                    Введенное значение <?php echo number_format(Yii::$app->session['fees']['original'],2); ?>
                </div>

                <p>
                    <p>Размер НДС - <?php echo number_format(Yii::$app->session['fees']['vat'],2); ?> грн</p>
                    <p>Размер курортного сбора - <?php echo number_format(Yii::$app->session['fees']['tourist_fee'],2); ?> грн</p>
                    <p>Сумма без НДС и курортного сбора - <?php echo number_format(Yii::$app->session['fees']['rest'],2); ?> грн</p>
                </p>

            <?php else: ?>
                <?php if (Yii::$app->session->hasFlash('validation_error')){ ?>
                    <div class="alert alert-danger"><?php echo Yii::$app->session['validation_error']; ?></div>
                <?php } ?>

                <p>
                    Вводите в поле сумму с включенными налогами
                </p>

                <div class="row">
                    <div class="col-lg-5">

                        <?php $form = \yii\widgets\ActiveForm::begin(['id' => 'fees-form']); ?>



                        <?= $form->field($model, 'amount')->label("Сумма") ?>


                        <div class="form-group">
                            <?= \yii\helpers\Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'fees-button']) ?>
                        </div>

                        <?php \yii\widgets\ActiveForm::end(); ?>

                    </div>
                </div>

            <?php endif; ?>
        </div>

    </div>
</div>
