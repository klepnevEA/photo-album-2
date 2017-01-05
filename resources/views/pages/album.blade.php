@extends('_template')

@section('title', 'Файл index.blade.php')

@section('main')
    <div class="wrapper_page-album">
        @include('blocks.block-header-album')
        <div class="page-album__my-album">
            <div class="wrapper">

                <div class="page__main">
                    <div class="album-list">
                        <div class="album-list__button button_position-top">
                            <button class="button button__add">
                                <svg class="button__add-svg">
                                    <use xlink:href="img/sprite.svg#add"></use>
                                </svg>
                                <div class="button__add-text">Добавить</div>
                            </button>
                        </div>
                        <div class="container container_padding-top">


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