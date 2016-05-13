<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Elemento */

?>
<html><head>
    <meta name="description" content="Festival Folclórico de Parintins">
    <title>$model->nome</title>
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
<body id="fundo">


<div class="row" style="margin-top: 0px;">  

    <?php 

       

          $connection = \Yii::$app->db;
          $item = $connection->createCommand("SELECT * FROM item WHERE iditem='$model->item_iditem'")->queryAll();

          foreach ($item as $key) {
            $nomeitem = $key['nome'];
            $descricaoitem = $key['descricao'];
            $urlimage = $key['imagem'];
          }

          if($model->item_iditem>0) {
            echo "<div class='col-lg-4' style='margin-left: 20px; margin-right: 20px; margin-bottom:20px; padding: 15px; 
            background-color: #fff; box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);'>";
          }
          else {
            echo "<div class='col-lg-12' style='margin-left: 20px; margin-right: 20px; margin-bottom:20px; padding: 15px; 
            background-color: #fff; box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);'>"; 
          }
    ?>
    <?php

          echo "<p><a style='padding-right: 15px; font-size: 18px; color: #000; font-weight: bold;'>".$model->nome;
          echo "</a> <a class='fb-like' data-href='https://developers.facebook.com/docs/plugins/' 
          data-layout='button' data-action='like' data-show-faces='false' data-share='false'></a></p>
          <span><p style='font-size: 12px; color: #000;'>".$model->descricao; 
          echo "</p>
          <hr style='border: 1px solid #0D47A1; opacity: 0.4;'><div class='fb-comments' 
          data-href='https://developers.facebook.com/docs/plugins/comments#configurator' 
          data-width='100%' data-numposts='1'></div></span></div>"; 

          if ($model->item_iditem>0) {
          echo "<div class='col-lg-7' style='margin-left: 20px; margin-right: 20px; padding: 15px; 
          background-color: #fff; box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);'>";
          echo "<p style='font-size: 18px; color: #000; font-weight: bold;'>Item:</p>";
          }

          if ($model->item_iditem>0){
          echo "<p style='color: #000; margin-bottom: 10px; text-align: justify; max-width: 700px;'>
          <b>".$nomeitem."</b>";
          echo ": ".$descricaoitem;
          echo "</p><p><img style='width: 100%; max-width: 700px;'' id='imagemitem'></p></div>";
        }        
    ?>
</div>

<script>

window.onload = function() {
    var itemPicture = "<?php echo $urlimage ?>";
    document.getElementById('imagemitem').src = itemPicture;
}
</script>
</div>


<script >
  window.___gcfg = {
    lang: 'pt-BR',
    parsetags: 'onload'
  };
</script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
    




    <div id="fb-root"></div>

    <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6&appId=768684826600234";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
