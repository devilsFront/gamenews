<?php
/**
 * Template Name: forgot-password
 *

 */
?>

<?php get_header(); ?>

<main class="wrapper">
    <article class="forgot-password">
        <div class="forgot-password__cont cont"><h1 class="forgot-password__caption caption">
                <span>В</span><span>о</span><span>с</span><span>с</span><span>т</span><span>а</span><span>н</span><span>о</span><span>в</span><span>л</span><span>е</span><span>н</span><span>и</span><span>е</span>
            </h1>
            <p class="forgot-password__text">На указанную почту придёт письмо для восстановления пароля</p>
            <form class="forgot-password__form" data-role="validation__form"><label class="forgot-password__label form-label"><input
                        class="forgot-password__input form-input" name="mail" type="email" required data-role="form-input"><span
                        class="forgot-password__name form-name">Почта</span></label>
                <button class="forgot-password__button button_read button_read-blue form-button" disabled="disabled"
                        data-role="form-button">Отправить
                </button>
            </form>
        </div>
    </article>
</main>

<?php get_footer(); ?>