
<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ElementoSearch;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Elemento;
use yii\db\QueryInterface;
use yii\base\Configurable;
use yii\db\ActiveRecord;
use yii\db\Command;
?>
<html><head>
    <title>iFestival</title>
    <meta name="description" content="Festival Folclórico de Parintins">
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

 <style type="text/css">

    .box {
        display:none; 
        min-width: 82px;      
    }
    .plus {
        display:none;
        min-width: 82px;
    }

    .span{
      color: white;
    }

    .nome-elemento{

    }

     h1,h2,h3{
      color: #3a5795;
    }
    p{
      color: #3a5795;
    }

    #logo{
      margin-left: 8%;
    }


    </style>   
  </head>
  
  <body id="fundo1">
      <div class="cover">


      <div class="cover-image"></div>
      <div class="container">

        <div class="row">
          <div class="col-sm-1.col-sm-offset-2">
            <a id="statusGoogle" 
            style="display:none; margin-top: 30px; color: #000; text-align: right;"></a>            
            <div id="status" 
            style="display:none; margin-top: 30px; color: #000; text-align: right;"></div>
          </div>
          <div class="col-sm-1.col-sm-offset-2" style="text-align: right;">
             <img id="fotoPerfil" width="50px">
          </div>

          <div class="col-md-12 text-center" id = "areaLogin" style="margin-top: 10px"> 
          <img style="margin-top: 35px" src="10.jpg" class="img-responsive"/>
           <div class="row">
          <div class="col-md-12">
            <h2 class="text-center">GALERIA DE FOTOS</h2>
          </div>
        </div>
            
        <div class="row">
          <div class="col-md-4">
            <a><img src="boi.jpg" class="img-responsive"></a>
            <h3>BOI-BUMBÁ (EVOLUÇÃO)</h3>
            
          </div>
          <div class="col-md-4">
            <a><img src="rainha.jpg" class="img-responsive"></a>
            <h3>RAINHA DO FOLCLORE</h3>
            
          </div>
          <div class="col-md-4">
            <a><img src="cunhã.jpg" class="img-responsive"></a>
            <h3>CUNHÃ-PORANGA</h3>
           
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <a><img src="pagé.jpg" class="img-responsive"></a>
            <h3>PAJÉ</h3>
            
          </div>
          <div class="col-md-4">
            <a><img src="cantor.jpg" class="img-responsive"></a>
            <h3>LEVANTADOR DE TOADAS</h3>
            
          </div>
          <div class="col-md-4">
            <a><img src="galera.jpg" class="img-responsive"></a>
            <h3>GALERA</h3>
          </div>
        </div>
       

    
    </br>
      <img id="logo"src="logo.png" class="img-responsive"/>  

    </br>  
     </div>    

          <div class="col-md-12 text-center" id = "areaLogin" style="margin-top: 35px">           
            
           
            <div class="col-lg-4 col-sm-12 col-lg-offset-4 text-center" id = "areaLista" style="display:none">
            <div class="elem777ento-index">

        
              <?php 

                $query = Elemento::find()
                  ->join('INNER JOIN', 'item','item_iditem = iditem ')
                  ->where("status='c' ");


                  $dataProvider = new ActiveDataProvider([
                      'query' => $query,
                  ]);
              ?>

              <?= GridView::widget([
                  'dataProvider' =>  $dataProvider,        
                  'columns' => [
                      [
                        'attribute' => 'nome',
                        'value' => function ($model) {
                          return $model->nome;
                        },
                        'contentOptions'=>['style'=>'font-weight: bold; font-size: 18px; text-align: justify;'],
                      ],
                      [
                          'class' => 'yii\grid\ActionColumn',
                          'template' => '{curtir} {comentar} {maisum}',
                          'buttons' => [
                                       'maisum' => function($url,$model) {
                                          return Html::a(
                                              '<span style="background-color: #0D47A1; padding-right: 5px; 
                                              padding-left: 5px;                                   
                                              padding-bottom: 2px;
                                              padding-top: 0px; border-radius: 2px;
                                              color: #fff; cursor: pointer;">+</span>',
                                              ['elemento/update', 'id' => $model->idelemento],
                                              [
                                                  'class' => 'plus',
                                                  'title' => 'Ver Mais',
                                                  'data-pjax' => '0',
                                              ]
                                          );
                                      },
                              'comentar' => function($url,$model) {
                                          return Html::a(
                                              '<span style="background-color: #0D47A1; padding-right: 5px; 
                                              padding-left: 5px;                                    
                                              padding-bottom: 2px;
                                              padding-top: 0px; border-radius: 2px;
                                              color: #fff; cursor: pointer;">+</span>',
                                              ['elemento/view', 'id' => $model->idelemento],
                                              [
                                                  'class' => 'box',
                                                  'title' => 'Ver Mais',
                                                  'data-pjax' => '0',
                                              ]
                                          );
                                      },
                          ],  
                      ],

                  ],
              ]); ?>

</div>

</div>
       
          </div>
        </div>
      </div>
    </div>
    <div class="cover">
      <div class="cover-image"></div>
    </div>
<script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '{768684826600234}',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.2' // use version 2.2
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.



  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/pt_BR/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    
    document.getElementById("areaLogin").style.display= "none";

    document.getElementById("areaLista").style.display= "block";

    document.getElementById("status").style.display= "block";
    
    var elems = document.getElementsByClassName('box');
    for(var i = 0; i < elems.length; i++) {
      elems[i].style.display = 'block';
       //console.log("Elemento: " + i);
    }
    console.log('Welcome!  Fetching your information.... ');

    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      console.log('Username: ' + response.username);
      console.log('Gênero: ' + response.gender);
      console.log('ID: ' + response.ID);
        document.getElementById('status').innerHTML =
        response.name;
        document.getElementById('status').innerHTML =
        response.name;
       
       });


  }


</script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '768684826600234',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/pt_BR/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

</script>

<script src="https://apis.google.com/js/platform.js" async defer></script>
<!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

  <script>
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());



        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);
        var userPicture = profile.getImageUrl();

        document.getElementById("areaLogin").style.display= "none";
        
        document.getElementById('fotoPerfil').src = userPicture;
        document.getElementById('statusGoogle').innerHTML =
        profile.getName();
        document.getElementById("statusGoogle").style.display= "block";
        document.getElementById("areaLista").style.display= "block";
         var elems = document.getElementsByClassName('plus');
    for(var i = 0; i < elems.length; i++) {
      elems[i].style.display = 'block';
       //console.log("Elemento: " + i);
    }
      };

</script>

<script >
  window.___gcfg = {
    lang: 'pt-BR',
    parsetags: 'onload'
  };
</script>
<script src="https://apis.google.com/js/platform.js" async defer></script>


</body ></html>