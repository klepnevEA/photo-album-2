<!-- profile header -->
<header class="header">
    <div class="header-bg">
        <section class="header__btn-screen">
            <div class="header__btn-wrapper_screen">
                <button class="button button__off">
                    <svg class="button__off-svg">
                        <use xlink:href="img/sprite.svg#off"></use>
                    </svg>
                    <div class="button__off-text">Выйти</div>
                </button>
            </div>
        </section>
        <section class="header__profile">
            <div class="header__profile-avatar">
                <img src="img/photo.jpg" alt="photo" class="header__profile_img">
            </div>
            <section class="header__profile-info">
                <div class="header__profile-name">
                    Антон Черепов
                </div>
                <div class="header__profile-text">
                    Я веб разработчик. Мне 24 года. Люблю путешествия, кодинг, фриланс и активный отдых.
                </div>
                <div class="header__socials">
                    <ul class="social__list">
                        <li class="social__item">
                            <a href="https://new.vk.com/" class="social">
                                <svg class="social__svg">
                                    <use xlink:href="img/sprite.svg#soc_vk"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="social__item">
                            <a href="https://www.facebook.com/" class="social soc-fb">
                                <svg class="social__svg soc-fb__svg">
                                    <use xlink:href="img/sprite.svg#soc_fb"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="social__item">
                            <a href="https://twitter.com/?lang=ru" class="social soc-twitter">
                                <svg class="social__svg soc-twitter__svg">
                                    <use xlink:href="img/sprite.svg#soc_twitter"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="social__item">
                            <a href="https://www.google.com.ua/" class="social soc-google">
                                <svg class="social__svg soc-google__svg">
                                    <use xlink:href="img/sprite.svg#soc_google"></use>
                                </svg>
                            </a>
                        </li>
                        <li class="social__item">
                            <a href="#" class="social soc-email">
                                <svg class="social__svg soc-email__svg">
                                    <use xlink:href="img/sprite.svg#soc_email"></use>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
        </section>

        <section class="header__btn">
            <div class="header__btn-wrapper">
                <button class="button button__edit">
                    <svg class="button__edit-svg">
                        <use xlink:href="img/sprite.svg#edit"></use>
                    </svg>
                    <div class="button__edit-text">Редактировать</div>
                </button>
                <button class="button button__off_profile">
                    <svg class="button__off-svg">
                        <use xlink:href="img/sprite.svg#off"></use>
                    </svg>
                    <div class="button__off-text">Выйти</div>
                </button>
            </div>
        </section>
    </div>
    
    <div class="header__bar_user-wrapper">
        <section class="header__bar">
            <div class="header__bar-wrapper">
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
            </div>
            <div class="header__bar_fixed">
                @include('blocks.block-header-fixed-main')
            </div>
        </section>    
    </div>
</header>

