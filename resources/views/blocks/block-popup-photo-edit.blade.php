<div id="edit-photo" class="block_popup-photo-delete white-popup">
    <div class="block__popup-header">
        <div class="add-album__text">Редактировать фотографию</div>
        <button class="add-album__close popup-close">
            <svg class="add-album__icon-close">
                <use xlink:href="img/sprite.svg#close"></use>
            </svg>
        </button>
    </div>

    <div class="block__photo-edit">
        <form action="URL" method="" class="photo-edit-description__form">
            <label for="name" class="edit__label" data-text="Название">
                <input type="text" name="name" class="edit__input" id="name" placeholder="Домик в лесу">
            </label>
            <label for="about" class="edit__label" data-text="Описание">
                <textarea name="about" class="about__input" id="about" rows="5" placeholder="Описание фотографии может быть с #хештегами.Чтобы было красиво описание должно быть на несколько строк.Убедитесь сами!"></textarea>
            </label>
        </form>
    </div>

    <div class="block__popup-save">
        <div class="popup-save__wrapper">
            <button class="popup-save__button-save">Сохранить</button>
            <button class="button__cansel">Отменить</button>
        </div>
        <div class="popup-save__button-delete">
            <button class="button button__delete">
                <svg class="button__delete-svg">
                    <use xlink:href="img/sprite.svg#delete">
                </svg>
                <div class="button__delete-text">Удалить</div>
            </button>
        </div>
    </div>
</div>