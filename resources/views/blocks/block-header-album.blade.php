<!--album header-->
<header class="header">
 <div class="header-bg">
    <section class="header__album">
        <section class="header__album-wrapper">
            @include('blocks/block-header-profile_small')
        </section>

        <section class="header__album-info">
            <div class="header__album-textName">
                Лесные прогулки
            </div>
            <div class="header__album-text">
                Фотографии природы леса, енотов и оленей. Как прекрасно сойти на дальней дистанции и пройтись по полю
                босиком. И чтобы никто не беспокоил бродить влюбленым в тишине. Запах меда, лесных оленей и енотов
                будоражит нутро.
            </div>
        </section>
    </section>

    <section class="header__btn_album">
        <div class="header__btn-wrapper">
            <button class="button button__home">
                <svg class="button__home-svg">
                    <use xlink:href="img/sprite.svg#home"></use>
                </svg>
                <div class="button__home-text">На главную</div>
            </button>
            <button class="button button__edit">
                <svg class="button__edit-svg">
                    <use xlink:href="img/sprite.svg#edit"></use>
                </svg>
                <div class="button__edit-text">Редактировать</div>
            </button>
        </div>
    </section>
 </div>

 <div class="header__bar_user-wrapper">
     <section class="header__bar">
        <div class="header__bar-wrapper_album">
            <svg class="header__bar-svg">
                <use xlink:href="img/sprite.svg#cam"></use>
            </svg>
            <span class="header__bar-number">18</span>
            <span class="header__bar-text">фотографий</span>
            <svg class="header__bar-svg">
                <use xlink:href="img/sprite.svg#like"></use>
            </svg>
            <span class="header__bar-number">12</span>
            <span class="header__bar-text">лайков</span>
            <svg class="header__bar-svg">
                <use xlink:href="img/sprite.svg#comments"></use>
            </svg>
            <span class="header__bar-number">4</span>
            <span class="header__bar-text">комментария</span>
        </div>
        <div class="header__bar_fixed">
            @include('blocks.block-header-fixed')
        </div>
    </section>
 </div>
</header>
