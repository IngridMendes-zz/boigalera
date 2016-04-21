
<?php
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\ElementoSearch;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Elemento;



//use frontend\models\Triagem;
use yii\db\QueryInterface;
use yii\base\Configurable;
use yii\db\ActiveRecord;
use yii\db\Command;
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
    
  </head>
  
  <body>
    <div class="cover">
      <div class="navbar navbar-default">
        <div class="container">
        </div>
      </div>

      <div class="cover-image"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center" id = "areaLogin">
            <h1>iFestival Bem-Vindo!</h1>
            <p>Login&nbsp;</p>
            <br>
            <br>
            
            <div class="g-signin2" data-onsuccess="onSignIn" id="loginGoogle" style="margin-left: 85px; margin-top: 15px;" data-theme="dark" ></div>

          </br>
                  
            <div class="fb-login-button" scope="public_profile,email" onlogin="checkLoginState();" data-max-rows="1" data-size="xlarge" data-show-faces="false" data-auto-logout-link="false"></div>
       
            </div>
            <div class="col-md-12 text-center" id = "areaLista" style="display:none">
            <div class="elemento-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
$query = Elemento::find()
        ->join('INNER JOIN', 'parte_contem_elemento','elemento_idelemento = idelemento ')
        ->where('ocorreu=1');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
    ?>


    <?= GridView::widget([
        'dataProvider' =>  $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'idelemento',
            'nome',
            //'tempo',
            //'descricao:ntext',
            //'tipo_idtipo',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{curtir} {comentar} {maisum}',
                'buttons' => [
                    'curtir' => function($url,$model) {
                                return Html::a(
                                    //'<span>Curtir</span>',
                                    '<div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" 
                                    data-layout="button" 
                                    data-action="like" data-show-faces="false" data-share="false"></div>',
                                    ['view', 'idelemento' => $model->idelemento],
                                    [
                                        //'class' => 'btn btn-default',
                                        'title' => 'Curtir',
                                        'data-pjax' => '0',
                                    ]
                                );
                            },
                        'maisum' => function($url,$model) {
                                return Html::a(
                                    //'<span>Curtir</span>',
                                    '<div class="g-plusone" data-annotation="none" data-width="300"></div>',
                                    ['view', 'idelemento' => $model->idelemento],
                                    [
                                        //'class' => 'btn btn-default',
                                        'title' => '+1',
                                        'data-pjax' => '0',
                                    ]
                                );
                            },
                    /*'comentar' => function($url,$model) {
                                return Html::a(
                                    //'<span>Curtir</span>',
                                    '<div class="fb-comments" 
                                    data-href=
                                    "https://developers.facebook.com/docs/plugins/comments#configurator" 
                                    data-numposts="1"></div>',
                                    ['view', 'idelemento' => $model->idelemento],
                                    [
                                        //'class' => 'btn btn-default',
                                        'title' => 'Comentar',
                                        'data-pjax' => '0',
                                    ]
                                );
                            },*/
                ],
            ],

        ],
    ]); ?>

</div>

</div>
       
          </div>

<div id="status" style="margin: 1rem 1rem 1rem 1rem; padding: 1rem; color: #000; text-align: justify; font-family: 'Trebuchet MS', Helvetica, sans-serif;">
</div>

<div id="statusGoogle" style="margin: 1rem 1rem 1rem 1rem; padding: 1rem; color: #000; text-align: justify; font-family: 'Trebuchet MS', Helvetica, sans-serif;"></div>
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
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
     

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

        document.getElementById("areaLogin").style.display= "none";
        document.getElementById('statusGoogle').innerHTML =
        'Parabéns ' + profile.getName() + '! Em breve você poderá mostrar todo seu sentimento pelas atrações do festival. AGUARDE.';
      };
</script>
</body></html>