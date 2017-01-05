@extends('_template')

@section('title', 'Файл index.blade.php')

@section('main')

    <div class="wrapper">
        <header class="page__header">
            @include('blocks.block-header')
        </header>
        <div class="page__main">
            <div class="new-photo-list">

                <div class="container">
                    <div class="new-photo-list__title">Новое в мире</div>

                    <div class="grid grid_var1">
                        <div class="grid__item">
                            @include('blocks.block-photo-card')
                        </div>
                        <div class="grid__item">
                            @include('blocks.block-photo-card')
                        </div>
                        <div class="grid__item">
                            @include('blocks.block-photo-card')
                        </div>
                        <div class="grid__item">
                            @include('blocks.block-photo-card')
                        </div>
                        <div class="grid__item">
                            @include('blocks.block-photo-card')
                        </div>
                        <div class="grid__item">
                            @include('blocks.block-photo-card')
                        </div>
                        <div class="grid__item">
                            @include('blocks.block-photo-card')
                        </div>
                        <div class="grid__item">
                            @include('blocks.block-photo-card')
                        </div>
                        <div class="grid__item">
                            @include('blocks.block-photo-card')
                        </div>
                        <div class="grid__item">
                            @include('blocks.block-photo-card')
                        </div>
                        <div class="grid__item">
                            @include('blocks.block-photo-card')
                        </div>
                    </div>
                    <div class="new-photo-list__button">
                        <button class="button button__showMore">Показать еще</button>
                    </div>
                </div>
            </div>
            <div class="album-list">
                <div class="album-list__button">
                    <button class="button button__add">
                        <svg class="button__add-svg">
                            <use xlink:href="img/sprite.svg#add"></use>
                        </svg>
                        <div class="button__add-text">Добавить</div>
                    </button>
                </div>
                <div class="container">
                    <div class="album-list__title">Мои альбомы</div>

                    <div class="grid grid_var2">
                        <div class="grid__item">
                            @include('blocks.block-album-card')
                        </div>
                        <div class="grid__item">
                            @include('blocks.block-album-card')
                        </div>
                        <div class="grid__item">
                            @include('blocks.block-album-card')
                        </div>
                        <div class="grid__item">
                            @include('blocks.block-album-card')
                        </div>
                        <div class="grid__item">
                            @include('blocks.block-album-card')
                        </div>
                        <div class="grid__item">
                            @include('blocks.block-album-card')
                        </div>
                        <div class="grid__item">
                            @include('blocks.block-album-card')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="page__footer">
            @include('blocks.block-footer')
        </footer>
    </div>

@stop