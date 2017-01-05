@extends('_template')

@section('title', 'Файл index.blade.php')

@section('main')

    <div class="wrapper">
        <div class="page__header">
           @include('blocks.block-header-user')
        </div>
        <div class="page__user">
            <div class="container">
                <div class="container__album-title_user">Альбомы</div>
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
                </div>
            </div>
        </div>
        <footer class="page__footer">
            @include('blocks.block-footer')
        </footer>
    </div>

@stop