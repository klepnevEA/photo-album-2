<header class="header__search">
    <div class="header__search-section">
        <div class="header__search-title">Исследуй мир</div>
    
        <section class="header__btn_search">
            <div class="header__btn-wrapper_search">
                <button class="button button__home">
                    <svg class="button__home-svg">
                        <use xlink:href="img/sprite.svg#home"></use>
                    </svg>
                    <div class="button__home-text">На главную</div>
                </button>
            </div>
        </section>
    </div>
    
    <div class="header__bar_user-wrapper">
        <div class="header__bar">
            <section class="header__search-bar">
                <section class="header__search-wrapper">
                    @include('blocks/block-header-profile_small_1')
                </section>
                <section class="header__search-wrapper1">
                    <div class="button__search">
                        <form action="" class="button__search-form">
                            <label for="" class="button__search-label">
                                <button class="button__search-btn">
                                    <svg class="button__search-svg">
                                        <use xlink:href="img/sprite.svg#search"></use>
                                    </svg>
                                </button>
                                <input type="text" class="button__search-input" placeholder="Исследовать мир">
                            </label>
                        </form>
                    </div>
                    <a href="#" class="header__search-link">Показать новые</a>
                </section>
                <div class="header__bar_fixed">
                    @include('blocks.block-header-fixed-search')
                </div>
            </section>
        </div>
    </div>

</header>