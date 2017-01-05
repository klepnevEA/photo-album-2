<!--блок входа в аккаунт -->
<div class="block_auth" id="block_enter"><!--id нужен только для скрытия блоков для JS, его не использую для стилей-->
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
    <a href="" class="text_forget">Забыли пароль?</a>
    <div class="error_login">Email или пароль не верен</div>
    <button class="button_enter">Войти</button>
    <span class="text_registration">Нет аккаунта? <a href="#" class="link_registration">Зарегестрироваться</a></span>
</div>