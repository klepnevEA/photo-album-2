
<div id="edit-profile" class="block_popup-profile-edit white-popup mfp-hide">
    <div class="block__popup-header">
        <div class="header-popup__text">Редактировать профиль</div>
        <button class="header-popup__close popup-close">
            <svg class="header-popup__icon-close">
                <use xlink:href="img/sprite.svg#close"></use>
            </svg>
        </button>
    </div>
    <form action="URL" method="">

        <div class="block__profile-desc">
            <label for="name" class="__label" data-text="Имя">
                <input type="text" name="name" class="name__input" id="name" placeholder="Антон">
                <input type="text" name="lastname" class="name__input" id="lastname" placeholder="Черепов">
            </label>
            <label for="about" class="__label" data-text="О себе">
                <textarea name="about" class="about__input" id="about" rows="5" placeholder="Я веб разработчик. Мне 24 года. Люблю путешествия, кодинг,фриланс и активный отдых."></textarea>
            </label>
            <div class="album-desc__load">
                <div class="photo-card__wrapper">
                    <div class="photo-card">
                        <img src="/img/author.jpg" alt="" class="avatar-img">
                    </div>
                </div>
                <div class="warning__wrapper">
                    <button class="button__load-photo">Загрузить фотографию</button>
                    <span class="load__warning">(файл должен быть <br>размером не более <b>512 КБ</b>)</span>
                </div>
            </div>
            <div class="album-desc__load">
                <div class="photo-card__wrapper">
                    <div class="photo-card">
                        <img src="/img/fon1.jpg" alt="" class="fon-img">
                    </div>
                </div>
                <div class="warning__wrapper">
                    <button class="button__load-fon">Загрузить фон</button>
                    <span class="load__warning">(файл должен быть <br>размером не более <b>1024 КБ</b>)</span>
                </div>

            </div>
        </div>

        <div class="block__profile-socials">
            <label for="title" class="socials__label" data-text="Вконтакте">
                <input type="text" name="vk" class="socials__input" id="title" placeholder="https://vk.com/bmpage">
            </label>
            <label for="title" class="socials__label" data-text="Facebook">
                <input type="text" name="title" class="socials__input" id="title" placeholder="https://www.facebook.com/">
            </label>
            <label for="title" class="socials__label" data-text="Email">
                <input type="text" name="title" class="socials__input" id="title" placeholder="info@loftschool.com">
            </label>
            <label for="title" class="socials__label" data-text="Twitter">
                <input type="text" name="title" class="socials__input" id="title" placeholder="https://twitter.com/loftschol">
            </label>
        </div>
    </form>
    <div class="block__popup-save">
        <div class="popup-save__wrapper">
            <button class="popup-save__button-save">Сохранить</button>
            <button class="button__cansel">Отменить</button>
        </div>
    </div>
</div>