<?php

/* @var $this \yii\web\View */
/* @var $content string */
use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use backend\assets\FontAwesomeAsset;

use common\models\PermisosHelpers;

AppAsset::register($this);

FontAwesomeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>

    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>



    
<header >
    <?php
     if (!Yii::$app->user->isGuest){
  
        $es_admin = PermisosHelpers::requerirMinimoRol('Admin');
   
    NavBar::begin([
        'brandLabel' => 'FF-MANAGEMENT <i class="fa fa-bolt" aria-hidden="true"></i>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
} else {
    NavBar::begin([
        'brandLabel' => 'FF-MANAGEMENT <i class="fa fa-bolt" aria-hidden="true"></i>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home ', 'url' => ['/site/index']],
    ];
}
if (!Yii::$app->user->isGuest && $es_admin) { 
    
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']]
       ];
 
    $menuItems[] = [
        'label' => 'Usuarios', 'url' => ['site/index'],
        'options' =>['class' =>'dropdown'],
        'template'=>'<a href="{url}" class="href_class">{label}</a>',
        'items' =>[
            ['label' => 'Usuarios', 'url' => ['user/index']],
            ['label' => 'Perfiles', 'url' => ['perfil/index']],
        ],
                 
    ];
    $menuItems[] = [
    'label' => 'Control de acceso', 'url' => ['site/index'],
    'options' =>['class' =>'dropdown'],
    'template'=>'<a href="{url}" class="href_class">{label}</a>',
    'items' =>[
        ['label' => 'Roles', 'url' => ['rol/index']],
        ['label' => 'Tipos de Usuario', 'url' => ['tipo-usuario/index']],
        ['label' => 'Estados', 'url' => ['estado/index']],
    ],
             
];
         

}

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        

        
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

</header >
                 
      
        
      
<div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>

    <footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>
   
        
         
        

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
