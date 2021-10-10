<?php
/**
* Template Name: registration
*

*/
?>

<?php get_header(); ?>

<main class="wrapper">
    <article class="registration">
        <div class="registration__cont cont"><h1 class="registration__caption caption">
                <span>Р</span><span>е</span><span>г</span><span>и</span><span>с</span><span>т</span><span>р</span><span>а</span><span>ц</span><span>и</span><span>я</span>
            </h1>
            <p class="registration__text">Уже зарегистрированы? <a
                    class="registration__link link_white-blue link_white-color" href="/login/">Войти</a></p>
            <p class="registration__error form-error caption_white-red" data-element="form-error"></p>
            <form action="<?= admin_url('admin-post.php'); ?>" method="post" data-redirect="/registration-thanks" class="registration__form" data-role="validation__form">
                <input type="hidden" name="action" value="registration_user" />
                <label class="registration__label form-label"><input
                        class="registration__input form-input" name="name" type="text" data-role="form-input" required
                        max-length="10" placeholder="не более 10 символов"><span
                        class="registration__name form-name">Логин</span></label><label
                    class="registration__label form-label"><input class="registration__input form-input" name="email"
                                                                  type="email" data-role="form-input" required><span
                        class="registration__name form-name">Почта</span></label><label
                    class="registration__label form-label"><input class="registration__input form-input" name="password"
                                                                  data-element="password" data-role="form-input"
                                                                  placeholder="от 8 до 20 символов" type="password"
                                                                  required minlength="8" maxlength="20"><span
                        class="registration__name form-name">Пароль</span></label><label
                    class="registration__label form-label"><input class="registration__input form-input"
                                                                  name="password2" data-element="password2"
                                                                  data-role="form-input"
                                                                  placeholder="от 8 до 20 символов" type="password"
                                                                  required minlength="8" maxlength="20"><span
                        class="registration__name form-name">Повторите пароль</span></label>
                <button class="registration__button button_read button_read-blue form-button" disabled="disabled"
                        data-role="form-button">Зарегистрироваться
                </button>
            </form>
        </div>
    </article>
</main>

<?php get_footer(); ?>