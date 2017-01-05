@extends('_template')

@section('title', 'Файл index.blade.php')

@section('main')
    <style>
        .nav {
        }

        .nav li {
            display: inline-block;
            margin-right: 1em;
        }

        .nav li a {
            color: #0072ff;
            font-weight: bold;
        }

        .nav li.active a {
            text-decoration: none;
            color: #000000;
        }

        .nav li a:hover {
            text-decoration: none;
        }
    </style>
    <section ng-app="app">
        <div class="app" ng-controller="TabController">
            <ul class="nav">
                <li ng-class="{ active: isSet(1) }"><a ng-click="setTab(1)">Пользователь</a></li>
                <li ng-class="{ active: isSet(2) }"><a ng-click="setTab(2)">Фото</a></li>
                <li ng-class="{ active: isSet(3) }"><a ng-click="setTab(3)">Альбомы</a></li>
                <li ng-class="{ active: isSet(4) }"><a ng-click="setTab(4)">Сердечки</a></li>
                <li ng-class="{ active: isSet(5) }"><a ng-click="setTab(5)">Комментарии</a></li>
            </ul>
            <section class="tab" ng-show="isSet(1)">
                <h1>Пользователь</h1>
                <section ng-controller="UserController">
                    <h2>Авторизация</h2>
                    <input type="text" ng-model="email" placeholder="email">
                    <input type="password" ng-model="password" placeholder="Пароль">
                    Запомнить <input type="checkbox" ng-model="remember">
                    <button ng-click="auth()">Auth</button>
                    <ul>
                        <li ng-repeat="(key, value) in data">
                        <span class="field">
                            <span class="field__label" ng-bind="key"></span>
                            <span class="field__value" ng-bind="value"></span>
                        </span>
                        </li>
                    </ul>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="UserController">
                    <h2>Создание пользователя</h2>
                    <input type="text" ng-model="name" placeholder="Имя">
                    <input type="text" ng-model="email" placeholder="email">
                    <input type="password" ng-model="password" placeholder="Пароль">
                    <button ng-click="create()">Get</button>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="UserController">
                    <h2>Редактирование пользователя</h2>
                    <input type="text" ng-model="formData.name" placeholder="Имя">
                    <input type="text" ng-model="formData.surname" placeholder="Фамилия">
                    <textarea type="text" ng-model="formData.about" placeholder="Обо мне"></textarea>
                    <input type="text" ng-model="formData.social_vk" placeholder="ВК">
                    <input type="text" ng-model="formData.social_fb" placeholder="facebook">
                    <input type="text" ng-model="formData.social_tw" placeholder="twitter">
                    <input type="text" ng-model="formData.social_g" placeholder="google+">
                    <label>Аватар
                        <input type="file" ngf-select ng-model="formData.avatar">
                    </label>
                    <label>Аватар
                        <input type="file" ngf-select ng-model="formData.background">
                    </label>
                    <button ng-click="edit()">Edit</button>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="UserController">
                    <h2>Получение пользователя</h2>
                    <input type="text" ng-model="id" placeholder="id">
                    <button ng-click="get()">Get</button>
                    <ul>
                        <li ng-repeat="(key, value) in data">
                        <span class="field">
                            <span class="field__label" ng-bind="key"></span>
                            <span class="field__value" ng-bind="value"></span>
                        </span>
                        </li>
                    </ul>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="UserController">
                    <h2>Получение всех альбомов пользователя</h2>
                    <input type="text" ng-model="id" placeholder="id">
                    <button ng-click="getAlbums()">Get</button>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="UserController">
                    <h2>Получение всех фото пользователя</h2>
                    <input type="text" ng-model="id" placeholder="id">
                    <button ng-click="getPhotos()">Get</button>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="UserController">
                    <h2>Выход</h2>
                    <button ng-click="logout()">Logout</button>
                    <span ng-bind="message"></span>
                </section>
            </section>
            <section class="tab" ng-show="isSet(2)">
                <h1>Фотографии</h1>
                <section ng-controller="PhotoController">
                    <h2>Создание фото</h2>
                    <input type="text" ng-model="formData.name" placeholder="Имя">
                    <input type="text" ng-model="formData.description" placeholder="Описание">
                    <input type="text" ng-model="formData.album_id" placeholder="ID альбома">
                    <label>Изображение
                        <input type="file" ngf-select ng-model="formData.image">
                    </label>
                    <button ng-click="create()">Create</button>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="PhotoController">
                    <h2>Редактирование фото</h2>
                    <input type="text" ng-model="formData.id" placeholder="ID">
                    <input type="text" ng-model="formData.name" placeholder="Имя">
                    <input type="text" ng-model="formData.description" placeholder="Описание">
                    <button ng-click="edit()">Edit</button>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="PhotoController">
                    <h2>Получение фото</h2>
                    <input type="text" ng-model="formData.id" placeholder="ID">
                    <input type="text" ng-model="formData.skip" placeholder="skip">
                    <input type="text" ng-model="formData.take" placeholder="take">
                    <button ng-click="get()">Get</button>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="PhotoController">
                    <h2>Получение кол-ва лайков фото</h2>
                    <input type="text" ng-model="formData.id" placeholder="ID">
                    <button ng-click="getLikesCount()">Get</button>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="PhotoController">
                    <h2>Получение комментариев фото</h2>
                    <input type="text" ng-model="formData.id" placeholder="ID">
                    <button ng-click="getComments()">Get</button>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="PhotoController">
                    <h2>Получение кол-ва комментариев фото</h2>
                    <input type="text" ng-model="formData.id" placeholder="ID">
                    <button ng-click="getCommentsCount()">Get</button>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="PhotoController">
                    <h2>Удаление фото</h2>
                    <input type="text" ng-model="formData.id" placeholder="ID">
                    <button ng-click="delete()">Delete</button>
                    <span ng-bind="message"></span>
                </section>
            </section>
            <section class="tab" ng-show="isSet(3)">
                <h1>Альбомы</h1>
                <section ng-controller="AlbumController">
                    <h2>Создание альбома</h2>
                    <input type="text" ng-model="formData.name" placeholder="Имя">
                    <input type="text" ng-model="formData.description" placeholder="Описание">
                    <label>Изображение
                        <input type="file" ngf-select ng-model="formData.image">
                    </label>
                    <button ng-click="create()">Create</button>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="AlbumController">
                    <h2>Редактирование альбома</h2>
                    <input type="text" ng-model="formData.id" placeholder="ID">
                    <input type="text" ng-model="formData.name" placeholder="Имя">
                    <input type="text" ng-model="formData.description" placeholder="Описание">
                    <label>Изображение
                        <input type="file" ngf-select ng-model="formData.image">
                    </label>
                    <button ng-click="edit()">Edit</button>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="AlbumController">
                    <h2>Получение альбома</h2>
                    <input type="text" ng-model="formData.id" placeholder="ID">
                    <button ng-click="get()">Get</button>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="AlbumController">
                    <h2>Удаление альбома</h2>
                    <input type="text" ng-model="formData.id" placeholder="ID">
                    <button ng-click="delete()">Delete</button>
                    <span ng-bind="message"></span>
                </section>
            </section>
            <section class="tab" ng-show="isSet(4)">
                <h1>Сердечки</h1>
                <section ng-controller="LikeController">
                    <h2>Лайк</h2>
                    <input type="text" ng-model="formData.id" placeholder="ID">
                    <button ng-click="like()">Like</button>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="LikeController">
                    <h2>Анлайк</h2>
                    <input type="text" ng-model="formData.id" placeholder="ID">
                    <button ng-click="unlike()">Unlike</button>
                    <span ng-bind="message"></span>
                </section>
            </section>
            <section class="tab" ng-show="isSet(5)">
                <h1>Комментарии</h1>
                <section ng-controller="CommentController">
                    <h2>Создание комментария</h2>
                    <textarea placeholder="Комментарий" ng-model="formData.text"></textarea>
                    <input type="text" ng-model="formData.photo_id" placeholder="ID фото">
                    <button ng-click="create()">Create</button>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="CommentController">
                    <h2>Редактирование комментария</h2>
                    <textarea placeholder="Комментарий" ng-model="formData.text"></textarea>
                    <input type="text" ng-model="formData.id" placeholder="ID фото">
                    <button ng-click="edit()">Edit</button>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="CommentController">
                    <h2>Получение комментария</h2>
                    <input type="text" ng-model="formData.id" placeholder="ID">
                    <button ng-click="get()">Get</button>
                    <span ng-bind="message"></span>
                </section>
                <section ng-controller="CommentController">
                    <h2>Удаление комментария</h2>
                    <input type="text" ng-model="formData.id" placeholder="ID">
                    <button ng-click="delete()">Delete</button>
                    <span ng-bind="message"></span>
                </section>
            </section>

        </div>
    </section>
@stop