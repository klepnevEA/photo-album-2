<!doctype html>
<html lang="ru" ng-app="app">
<head>
    <title ng-bind="pageName"></title>
    @include('_head')
    @include('_scripts')
</head>
<body>
<div class="wrapper">
    <div class="loader loader_page js-loader-page">
        <img src="img/loader.svg" alt="Загрузка" class="loader__image">
    </div>
    <div class="page__header" ui-view="header"></div>
    <div class="page__main" ui-view="main"></div>
    <div class="page__footer" ui-view="footer"></div>
</div>
</body>
</html>
