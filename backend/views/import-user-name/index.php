<?php
use yii\widgets\ActiveForm;

/**
 * @var \backend\models\UploadUserNamesForm $model
 * @var \yii\web\View $this
 */
?>

<?php
/**
Да да я знаю что так делать нельзя, просто в лень ковырять css
 */
    $css = '.alert-success {
        position: relative;
        top: 56px;
    }';
    $this->registerCss($css);
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<div class="container">
    <div class="row">
        <div class="col-md-3 col-xl-3 col-sm-3">
            <?= $form->field($model, 'file')->fileInput() ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 col-xl-3 col-sm-3">
            <button>Submit</button>
        </div>
    </div>
</div>

<?php ActiveForm::end() ?>




