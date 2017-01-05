
<div id="album-popup" class="block_popup-album white-popup mfp-hide">
    <div class="block__popup-header">
        <div class="add-album__text">Добавить альбом</div>
        <button class="add-album__close popup-close">
            <svg class="add-album__icon-close">
                <use xlink:href="img/sprite.svg#close"></use>
            </svg>
        </button>
    </div>
    <div class="block__album-desc">
        <form action="" class="popup-album-description">
            <label for="title" class="edit__label" data-text="Название">
                <input type="text" name="title" class="title__input" id="title" placeholder="Мой альбом">
            </label>
            <label for="desc" class="edit__label" data-text="Описание">
                <textarea name="desc" class="desc__input" id="desc" rows="5" placeholder="Как я провёл лето. Чтобы было красиво описание должно быть на несколько строк. Убедитесь сами!"></textarea>
            </label>
            <div class="album-desc__load">
                <div class="photo-card-fon__wrapper">
                    <div class="photo-card__fon">
                        <img src="/img/fon1.jpg" alt="" class="fon-img">
                    </div>
                </div>
                <div class="warning__wrapper">
                    <button class="button__load">Загрузить обложку</button>
                    <span class="load__warning">(файл должен быть размером не более <b>1024 КБ</b>)</span>
                </div>
            </div>
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