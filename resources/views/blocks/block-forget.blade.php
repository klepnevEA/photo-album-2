<!--блок восстановление пароля -->
<div class="block_auth " id="block_forget_parol"><!--id нужен только для скрытия блоков JS-->
    <span class="text_forgot text_forgot_title">Забыли пароль? </span>
    <span class="text_forgot text_forgot_text">Ничего страшного, введите свой e-mail, и мы вышлем вам инструкции по востановлению пароля</span>
    <label for="input_email" class="label hover_email marg_bot">
        <input type="text" name="email" class="input " id="input_email" placeholder="Электронная почта">
        <svg class="envelope_svg">
            <use xlink:href="img/sprite.svg#envelope"></use>
        </svg>
    </label>
    <button class="button_enter hide_button">Войти</button>
    <button class="button_enter">Восстановление пароля</button>
    <span class="text_registration ">Вспомнили пароль? <a href="#" class="link_registration">Войти</a></span>
</div>