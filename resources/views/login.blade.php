<!doctype html>
<html lang="ru" ng-app="appLogin">
<head>
    <title ng-bind="pageName"></title>
    @include('_head')
    @include('_scripts')
</head>
<body>
<div class="page-login">
    <div class="page-login__wrapper-parallax">
        <img src="../img/background.jpg" alt="background" class="wrapper-wparallax__layer js_wrapper-wparallax__layer">
        <img src="../img/layer4.png" alt="background" class="wrapper-wparallax__layer js_wrapper-wparallax__layer">
        <img src="../img/layer3.png" alt="background" class="wrapper-wparallax__layer js_wrapper-wparallax__layer">
        <img src="../img/layer2.png" alt="background" class="wrapper-wparallax__layer js_wrapper-wparallax__layer">
        <img src="../img/dust.png" alt="background" class="wrapper-wparallax__layer js_wrapper-wparallax__layer">
        <img src="../img/layer1.png" alt="background" class="wrapper-wparallax__layer js_wrapper-wparallax__layer">
        <img src="../img/background-max-768.jpg" alt="background" class="wrapper-wparallax__layer768">
    </div>
    <div class="page-login__wrapper-blocks" ui-view>
    </div>
</div>
</body>
</html>
