<!--блок регистрации пароля -->
<div class="block_auth " id="block_registration"> <!--id нужен только для скрытия блоков JS-->
    <label for="input_name" class="label hover_email">
        <input type="text" name="email" class="input " id="input_name" placeholder="Имя">
        <svg class="name_svg">
            <use xlink:href="img/sprite.svg#name"></use>
        </svg>
    </label>
    <label for="input_email" class="label hover_email">
        <input type="text" name="email" class="input " id="input_email" placeholder="Электронная почта">
        <svg class="envelope_svg">
            <use xlink:href="img/sprite.svg#envelope"></use>
        </svg>
    </label>
    <label for="input_email" class="label hover_password">
        <input type="password" name="password" class="input " id="input_password" placeholder="Пароль">
        <svg class="password_svg">
            <use xlink:href="img/sprite.svg#password"></use>
        </svg>
    </label>
    <span class="registration_text">Ваши данные остаются строго конфеденциальны</span>
    <button class="button_enter">Создать аккаунт</button>
    <span class="text_registration text_registration_width">Уже зарегестрированы? <a href="#" class="link_registration">Войти</a></span>
</div>