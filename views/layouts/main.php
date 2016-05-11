<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="telahome.css" rel="stylesheet" type="text/css">
    <link href="TelaLogin.css" rel="stylesheet" type="text/css">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>


 <style>
 .fb-login-button{
    background-color: #3a5795;
    border-color: #3a5795;
 }
 .g-signin2{
    background-color: #3a5795;
    border-color: #3a5795

 }

 </style>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'IFESTIVAL',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
  echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right',],
       
        'items' => array(
            
            '
             <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                            
               <button type=""  class="fb-login-button" scope="public_profile,email" onlogin="checkLoginState();" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="true">Login</button>
            
                <button type="" class="g-signin2" data-onsuccess="onSignIn" id="loginGoogle"  data-theme="dark" data-callback="signinCallback"data-scope="https://www.googleapis.com/auth/plus.login">Google+</button>
            
            </div> '


        ),

    ]);
    
    NavBar::end();
    
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer" style="color: #000; text-align: center;">
    <div class="container">
        <p >&copy; IComp - UFAM <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
