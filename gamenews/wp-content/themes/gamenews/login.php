<?php
/**
 * Template Name: login
 */
?>

<?php get_header(); ?>

<main class="wrapper">
    <article class="login">
        <div class="login__cont cont"><h1 class="login__caption caption">
                <span>В</span><span>х</span><span>о</span><span>д</span></h1>
            <p class="login__text">Нет аккаунта? <a class="login__link link_white-blue link_white-color" href="/registration/">Зарегистрироваться</a>
            </p>
            <p class="login__error form-error caption_white-red" data-element="form-error"></p>
            <form action="<?= admin_url('admin-post.php'); ?>" data-redirect="/" class="login__form" data-role="validation__form">
                <input type="hidden" name="action" value="login_user" />
                <label class="login__label form-label"><input
                            class="login__input form-input" name="email" type="email" required
                            data-role="form-input"><span class="login__name form-name">Почта</span></label><label
                        class="login__label form-label"><input class="login__input form-input" name="password"
                                                               type="password" required data-role="form-input"
                                                               minlength="8" maxlength="20"
                                                               placeholder="от 8 до 20 символов"><span
                            class="login__name form-name">Пароль</span></label>
                <button class="login__button button_read button_read-blue form-button" disabled="disabled"
                        data-role="form-button">Войти
                </button>
            </form>
            <p class="login__forgot-text">Забыли пароль? <a class="login__forgot-link link_white-blue link_white-color"
                                                            href="/forgot-password/">Восстановить</a></p></div>
    </article>
</main>

<?php get_footer(); ?>
