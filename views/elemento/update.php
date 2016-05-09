<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\filters\AccessControl;

/* @var $this yii\web\View */
/* @var $model app\models\Elemento */

?>
<html>
<head>
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
    <script src="https://apis.google.com/js/platform.js" async defer></script>
<style>
body{
  background-color: white;
}
</style>
 </head>    
<body id="fundo">

<div class="row" style="margin-top: 40px;">

  <div class="col-lg-4" style="margin: 10px; 
  padding: 10px; 
  background-color: #fff; box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">
    <p>
      <a style="font-size: 18px; color: #000; font-weight: bold; padding-right: 15px; "><?php  echo $model->nome; ?> </a>
      <a class="g-plusone" data-annotation="none" data-width="300" ></a>
    </p>
    <span >
      <p style="font-size: 12px; color: #000; text-align: justify;">  <?php  echo $model->descricao; ?> </p>
       <!--<hr style="border: 1px solid #0D47A1; opacity: 0.4;">-->
    </span>
  </div>
  <div class="col-lg-7" style="margin: 10px; padding: 10px; 
  background-color: #fff; box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);">
    <p style="font-size: 18px; color: #000; font-weight: bold;">
      <?php  
        if ($model->item_iditem>0) echo "Item:";

      ?> 
    </p>
    
          <?php  

          $connection = \Yii::$app->db;
          $item = $connection->createCommand("SELECT * FROM item WHERE iditem='$model->item_iditem'")->queryAll();

          foreach ($item as $key) {
            $nomeitem = $key['nome'];
            $descricaoitem = $key['descricao'];
            $urlimage = $key['imagem'];
          }       

      ?>
      
      <p style="color: #000; margin-bottom: 10px; text-align: justify; max-width: 700px;">
        <b> 

      <?php  if ($model->item_iditem>0) echo $nomeitem;?>
        </b>
        <?php if ($model->item_iditem>0) echo ": ".$descricaoitem?>
      </p>
      <p>
        <img style="width: 100%; max-width: 700px;" id="imagemitem">
      </p>
    
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
</body>
</html>
