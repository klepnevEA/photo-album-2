@extends('_template')

@section('title', 'Файл index.blade.php')

@section('main')

    <div class="wrapper">
        <header class="page__header">
            @include('blocks.block-header-search')
        </header>
        <div class="page__main">
            <div class="container">
                <div class="container__photo-title">По запросу «Природа» найдено 6 результатов</div>
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
            </div>
        </div>
        <footer class="page__footer">
            @include('blocks.block-footer')
        </footer>
    </div>

@stop