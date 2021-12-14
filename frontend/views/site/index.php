<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'My Yii Application';
use yii\helpers\Url;

$asset = frontend\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;
?>



  
  
         
  <section class="py-5">
    <div class="container">
      <div class="row">
        <div class="row text-center my-sm-5 mt-5">
          <div class="col-lg-6 mx-auto">
            <h2 class="text-primary text-gradient mb-0">Valoramos tu tiempo</h2>
            <h2 class="">Al Instante</h2>
            <p class="lead">Estamos en el negocio para mejorar vidas <br />  </p>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-8">
          <div class="row mt-4">
            <div class="col-md-6">
             
                <div class="card move-on-hover">
                  <img class="w-100" src="https://www.admin-dashboards.com/content/images/2021/06/now-ui-design-system-pro-about-us.jpg" alt="">
                </div>
                <div class="mt-2 ms-2">
                <a href="#"><h6 class="mb-0">Establecimientos</h6></a>
                </div>
              
            </div>
            <div class="col-md-6 mt-md-0 mt-5">
              
                <div class="card move-on-hover">
                  <img class="w-100" src="https://i.ytimg.com/vi/1X2rvHKoqH4/maxresdefault.jpg" alt="">
                </div>
                <div class="mt-2 ms-2">
                <a href="#"> <h6 class="mb-0">Pedidos</h6> </a>
                </div>
             
            </div>
            <div class="col-md-6 mt-md-0 mt-6">
             
              
                <div class="card move-on-hover">
                  <img class="w-100" src= <?php echo Url::to('@web/archivos/about.png',true); ?> alt="">
                </div>
                <div class="mt-2 ms-2">
                <h6>
                  <?php echo Html::a('Nosotros', ['site/about'], ['class' => 'mb-0']);?>
                </div>
                </h6>

           
            </div>
            <div class="col-md-6 mt-md-0 mt-6">
             
                <div class="card move-on-hover">
                  <img class="w-100" src= <?php echo Url::to('@web/archivos/contact.png',true); ?> alt="">
                </div>
                <div class="mt-2 ms-2">
                <h6>
                  <?php echo Html::a('Contactanos', ['site/contact'], ['class' => 'mb-0']);?>
               
                </h6>
                </div>
            
            </div>
          </div>
        </div>
        <div class="col-md-3 mx-auto mt-md-0 mt-5">
          <div class="position-sticky" style="top:100px !important">
            <h4 class="">Páginas de presentación </h4>
            <h6 class="text-secondary">Éstas son solo una pequeña selección de las múltiples posibilidades que encontraras.</h6>
          </div>
        </div>
      </div>
  </section>
  
 
 
  <!-- -------   START PRE-FOOTER 2 - simple social line w/ title & 3 buttons    -------- -->
  <div class="pt-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 ms-auto">
          <h4 class="mb-1">Thank you for your support!</h4>
          <p class="lead mb-0">Encontraras los mejores productos de Valladolid </p>
        </div>
        <div class="col-lg-5 me-lg-auto my-lg-auto text-lg-end mt-5">
          <a href="https://twitter.com" class="btn btn-info mb-0 me-2" target="_blank">
            <i class="fab fa-twitter me-1"></i> Tweet
          </a>
          <a href="https://www.facebook.com" class="btn btn-primary mb-0 me-2" target="_blank">
            <i class="fab fa-facebook-square me-1"></i> Share
          </a>
          <a href="https://www.pinterest.com" class="btn btn-dark mb-0 me-2" target="_blank">
            <i class="fab fa-pinterest me-1"></i> Pin it
          </a>
        </div>
      </div>
    </div>
  </div>