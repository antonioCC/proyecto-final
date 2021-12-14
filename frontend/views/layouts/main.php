<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use backend\assets\FontAwesomeAsset;

$asset = frontend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;

FontAwesomeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="about-us">
<?php $this->beginBody() ?>

<!-- Navbar -->
<!-- Navbar Transparent -->
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
    <div class="container">
      <a class="navbar-brand  text-white " href="https://demos.creative-tim.com/soft-ui-design-system/presentation.html" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
        FF MANAGEMENT
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
        <ul class="navbar-nav navbar-nav-hover w-100">
              <?php
     
     
     echo '<li class="nav-item"> '
     .Html::a("<i class=\"fa fa-icon\"></i> "
     .Yii::t('app','Home <i class="fa fa-home" aria-hidden="true"></i>
     '), 
           ['/site/index'],
           ['class'=>'pull-right', 'style' => 'padding-right:10px;'])
           . '</li>';

      
      
      

      if (Yii::$app->user->isGuest) {

          echo '<li class="nav-item"> '
          .Html::a("<i class=\"fa fa-icon\"></i> "
          .Yii::t('app','Registrate'), 
                ['/site/signup'],
                ['class'=>'pull-right', 'style' => 'padding-right:10px;'])
                . '</li>';
          
          
                echo '<li class="nav-item">'
                
                . Html::beginForm(['/site/login'], 'post')
                . Html::submitButton(
                    'Iniciar sesion',
                  
                    ['class'=>'btn btn-primary', 'style' => 'padding-top:5px;']
                )
                . Html::endForm()
                . '</li>';
     
          
      
      } else {
          
          echo '<li class="nav-item"> '
          .Html::a("<i class=\"fa fa-icon\"></i> "
          .Yii::t('app','Usuario (' . Yii::$app->user->identity->username . ' <i class="fa fa-user-circle-o" aria-hidden="true"></i>
          )'), 
                ['/perfil/view'],
                ['class'=>'pull-right', 'style' => 'padding-right:10px;'])
                . '</li>';

                echo '<li class="nav-item">'
                
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Cerrar sesion <i class="fa fa-sign-in" aria-hidden="true"></i>
                    ',
                  
                    ['class'=>'btn btn-primary', 'style' => 'padding-top:5px;']
                )
                . Html::endForm()
                . '</li>';


         
      }
      ?>
               
               </ul>      
                  
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>

  <header class="bg-gradient-dark">
    <div class="page-header min-vh-75" style="background-image: url('<?= $baseUrl 
?>./assets/img/office-dark.jpg');">
      <span class="mask bg-gradient-info opacity-8"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8 text-center mx-auto my-auto">
            <h1 class="text-white">FF MANAGEMNET</h1>
            <p class="lead mb-4 text-white opacity-8">Un lugar donde realizar tus pedidos facil y rapido</p>
            
           <?php
echo Html::a('Comienza Ahora', ['/site/index'], ['class' => 'btn bg-white text-dark']);
              ?>
            <h6 class="text-white mb-2 mt-5">Encuentranos en</h6>
            <div class="d-flex justify-content-center">
              <a href="javascript:;"><i class="fab fa-facebook text-lg text-white me-4"></i></a>
              <a href="javascript:;"><i class="fab fa-instagram text-lg text-white me-4"></i></a>
              <a href="javascript:;"><i class="fab fa-twitter text-lg text-white me-4"></i></a>
              <a href="javascript:;"><i class="fab fa-google-plus text-lg text-white"></i></a>
             
            </div>
          </div>
        </div>
      </div>
      <div class="position-absolute w-100 z-index-1 bottom-0">
        <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
          <defs>
            <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
          </defs>
          <g class="moving-waves">
            <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
            <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
            <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
            <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
            <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
            <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,1" />
          </g>
        </svg>
      </div>
    </div>
  </header>
  <div class="container">
 <?= $content ?>
 </div>
</section>

  <!-- -------   END PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->
  <footer class="footer pt-5 mt-5">
    <hr class="horizontal dark mb-5">
    <div class="container">
      <div class=" row">
        <div class="col-md-3 mb-4 ms-auto">
          <div>
            <h6 class="text-gradient text-primary font-weight-bolder">FF MANAGEMENT</h6>
          </div>
          <div>
            <h6 class="mt-3 mb-2 opacity-8">Social</h6>
            <ul class="d-flex flex-row ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link pe-1" href="#" >
                  <i class="fab fa-facebook text-lg opacity-8"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pe-1" href="#" >
                  <i class="fab fa-twitter text-lg opacity-8"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pe-1" href="#" >
                  <i class="fab fa-dribbble text-lg opacity-8"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pe-1" href="#">
                  <i class="fab fa-github text-lg opacity-8"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link pe-1" href="#" >
                  <i class="fab fa-youtube text-lg opacity-8"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 col-sm-6 col-6 mb-4">
          <div>
            <h6 class="text-gradient text-primary text-sm">Company</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  About Us
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" >
                  Freebies
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" >
                  Premium Tools
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" >
                  Blog
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 col-sm-6 col-6 mb-4">
          <div>
            <h6 class="text-gradient text-primary text-sm">Resources</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link" href="#" >
                  Illustrations
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" >
                  Bits & Snippets
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" >
                  Affiliate Program
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 col-sm-6 col-6 mb-4">
          <div>
            <h6 class="text-gradient text-primary text-sm">Help & Support</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link" href="#" >
                  Contact Us
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" >
                  Knowledge Center
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" >
                  Custom Development
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="" >
                  Sponsorships
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">
          <div>
            <h6 class="text-gradient text-primary text-sm">Legal</h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link" href="#" >
                  Terms & Conditions
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="" >
                  Privacy Policy
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" >
                  Licenses (EULA)
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-12">
          <div class="text-center">
            <p class="my-4 text-sm">
            Reservados todos los derechos. Copyright © <script>
                document.write(new Date().getFullYear())
              </script> FF MANAGEMENT  <a href="#" ></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script type="text/javascript">
    if (document.getElementById('state1')) {
      const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
      if (!countUp.error) {
        countUp.start();
      } else {
        console.error(countUp.error);
      }
    }
    if (document.getElementById('state2')) {
      const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
      if (!countUp1.error) {
        countUp1.start();
      } else {
        console.error(countUp1.error);
      }
    }
    if (document.getElementById('state3')) {
      const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
      if (!countUp2.error) {
        countUp2.start();
      } else {
        console.error(countUp2.error);
      };
    }
  </script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
