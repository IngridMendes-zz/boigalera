<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Elemento */

?>
<html><head>
    <meta name="description" content="Vamos fazer um teste">
    <title>teste</title>
    <meta charset="utf-8">
     <!-- Google +-->

  <meta name="google-signin-scope" content="profile email">
  <meta name="google-signin-client_id" content="803971195659-8j2nbjn8af6h972f9kjiei5kteimt3he.apps.googleusercontent.com">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="TelaLogin.css" rel="stylesheet" type="text/css">
     <link href="telahome.css" rel="stylesheet" type="text/css">
     <link rel="canonical" href="http://google.com" />
<style>
body{
  background-color: white;
}
</style>
 </head>    
<div class="elemento-view">
  </br>
  </br>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idelemento',
            'nome',
            //'tempo',
            'descricao:ntext',
            //'tipo_idtipo',
        ],
    ]) ?>
<div class="fb-comments" data-href="https://developers.facebook.com/docs/plugins/comments#configurator" data-width="100%" data-numposts="5"></div>
<html>
<head>
    <title></title>
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6&appId=768684826600234";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>
<body>

</body>
</html>
