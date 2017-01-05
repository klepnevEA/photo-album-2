# Онлайн сервис "Фотоальбом"
Разработка онлайн сервиса для обмена, поиска и обсуждения фотографий

\>>> [Демо](http://photoalbum.oarth.ru/) <<<

## Оглавление
* [Команда разработчиков](#collaborators)
* [Особенности проекта](#features)
* [Задействованные технологии и инструменты](#tech-and-tools)
* [Что реализовано](#done)
* [Что можно посмотреть](#to-look)
* [Зависимости](#dependence)
* [Инициализация](#init)
  * [Установка зависимостей](#install-dependencies)
  * [Создание общедоступной ссылки на хранилище загружаемых файлов](#link-to-storage)
  * [Настройка MySQL сервера. Создание таблиц](#mysql)
  * [Общие рекомендации](#common)
* [Запуск](#run)

## <a name="collaborators"></a> Команда разработчиков
* Собакарь Александр ([Xaosaki](https://github.com/Xaosaki)) - гуру проекта, джедай ларавеля, ангуляра и борьбы с фильтрами smtp серверов
* Орлов Артур ([cosmobrother](https://github.com/cosmobrother)) - тим лид, php, js
* Аксютин Иван ([Ivanopalas](https://github.com/Ivanopalas)) - верстка, js
* Войтович Татьяна ([rodinka7](https://github.com/rodinka7)) - верстка, js
* Малахов Александр ([malahovaleksandr](https://github.com/malahovaleksandr)) - верстка, js
* Мельник Юлия ([juliemeln](https://github.com/juliemeln)) - верстка, js

## <a name="tech-and-tools"></a> Задействованные технологии и инструменты
* laravel
* angular
* browserify
* gulp
* sass
* svg спрайты
* flexbox
* bem
* npm
* composer
* и многое другое :)

## <a name="features"></a> Особенности проекта
Сборщик составлен таким образом, чтобы с ним могли одновременно работать как frontend, так и backend 
специалисты. Установка и запуск проекта для разработки выполняется двумя командами.

Верстка разделена на множество мелких модулей, что делает её легко переносимой и расширяемой. Изначально
верстались мельчайшие блоки, потом соединялись в блоки покрупнее, затем в целые страницы.

## <a name="done"></a> Что реализовано
* Адаптивная верстка всех элементов (ветка **development** по пути /development)
* Весь бэкенд, кроме поиска и хэштегов
* Полностью
  * Регистрация, активация, аутентификация, получение, редактирование и выход пользователей
  * Добавление, получение, удаление и редактирование альбомов
  * Добавление, получение, удаление и редактирование фотографий
  * Работа с комментариями
  * Работа с лайками
  * Хэштеги
  * Поиск

## <a name="to-look"></a> Что можно посмотреть
* [Страница авторизации](http://photoalbum.oart.ga/login)
  * Регистрация
  * Активация
  * Вход
  * Параллакс
* [Главная страница](http://photoalbum.oart.ga/)
  * Фон шапки и подвала привязаны к пользователю
  * Редактирование пользователя в шапке
    * Имя
    * Обо мне
    * Аватарка
    * Фон
  * Выход
  * Новое в мире
  * Функционал альбомов
  * Попап показа фото с авторезайзом под его высоту, слайдером, лайками и комментариями
  * Поиск
* [Страница альбома](http://photoalbum.oart.ga/#/album/2)
  * Фон шапки и подвала привязаны к альбому
  * Редактироване альбома через шапку
  * Подсчет статистики по альбому
  * Распределение прав
  * Функционал фото
  * Добавление фото drag&drop с миниатюрами
* [Страница пользователя](http://photoalbum.oart.ga/#/user/2)
  * Аналогично предыдущим пунктам
  * Еще не завершена
* [Страница поиска](http://photoalbum.oart.ga/#/search/Кот)
  * [Поиск по заголовкам и описаниям фото](http://photoalbum.oart.ga/#/search/Кот)
  * [Поиск по хэштегу](http://photoalbum.oart.ga/#/search/#котоллекция)

## <a name="dependence"></a> Зависимости
- node & npm
- php & composer, пути должны быть прописаны в переменную окружения PATH
- gulp-cli
- mysql

## <a name="init"></a> Инициализация
### <a name="install-dependencies"></a> 1. Установка зависимостей
`npm i`

Поэтапно:
1. `npm install`
2. `composer install`
3. `cp .env.example .env`
4. `php artisan key:generate`

### <a name="link-to-storage"></a> 2. Создание общедоступной ссылки на хранилище загружаемых файлов
#### Для пользователей windows
Находясь в папке проекта

`mklink /j public\storage storage\app\public`

#### Для пользователей Unix подобных систем
Находясь в папке проекта

`ln -sr storage/app/public public/storage`

### <a name="mysql"></a> 3. Настройка MySQL сервера. Создание таблиц
1. Заполнить настройки с префиксом DB_ в файле **.env**
2. Выполнить `php artisan migrate` в корневом каталоге проекта

### <a name="common"></a> 4. Общие рекомендации
* Добавить права запись каталогу storage/logs

## <a name="start"></a> Запуск
`npm start`

# photo-album-2
