@extends('_template')

@section('title', 'Файл index.blade.php')

@section('main')
    <div class="demonstration">
        <section class="demonstration__section">
            <span class="demonstration__heading">Все кнопки</span>
            @include('blocks.block-buttons')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Шапка</span>
            @include('blocks.block-header')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Шапка альбома</span>
            @include('blocks.block-header-album')
        </section>
         <section class="demonstration__section">
            <span class="demonstration__heading">Шапка юзера</span>
            @include('blocks.block-header-user')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Шапка фиксированная</span>
            @include('blocks.block-header-fixed')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Шапка в режиме редактирования</span>
            @include('blocks.block-header-edit')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Профайл малый</span>
            @include('blocks.block-header-profile_small')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Профайл малый вариация</span>
            @include('blocks.block-header-profile_small_1')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Шапка на странице поиска</span>
            @include('blocks.block-header-search')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Поле поиска</span>
            @include('blocks.block-search')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Социальные кнопки</span>
            @include('blocks.block-socials')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Подвал</span>
            @include('blocks.block-footer')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Блок авторизации</span>
            @include('blocks.block-login')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Блок регистрации</span>
            @include('blocks.block-registration')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Блок восстановления пароля</span>
            @include('blocks.block-forget')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Карточка фото</span>
            @include('blocks.block-photo-card')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Карточка фото 2 модификация</span>
            @include('blocks.block-photo-card-2')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Карточка альбома</span>
            @include('blocks.block-album-card')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Попап нотификации</span>
            @include('blocks.block-popup-notification')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Попап редактирования социальных сетей</span>
            @include('blocks.block-social-popup')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Попап добавления альбома</span>
            @include('blocks.block-popup-album')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Попап добавления фото</span>
            @include('blocks.block-popup-photo-add')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Попап добавления фото пустой</span>
            @include('blocks.block-popup-photo-add-empty')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Попап добавления фото ошибка</span>
            @include('blocks.block-popup-photo-add-error')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Попап редактирования фото</span>
            @include('blocks.block-popup-photo-edit')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Попап удаления фото</span>
            @include('blocks.block-popup-photo-delete')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Попап редактирования профиля</span>
            @include('blocks.block-popup-profile-edit')
        </section>
        <section class="demonstration__section">
            <span class="demonstration__heading">Попап большой слайдер</span>
            @include('blocks.block-popup-big')
        </section>
        <section class="demonstration__section" ng-app="app">
            <span class="demonstration__heading">Директива логина</span>
            <login></login>
        </section>
    </div>
@stop