<?php
/**
 * Template Name: cabinet
 *
 */
?>

<?php get_header(); ?>

<main class="wrapper">
    <article class="home">
        <div class="home__cont cont"><h2 class="home__caption caption">Добро пожаловать в личный кабинет <?php echo wp_get_current_user() -> user_login; ?>!</h2>
            <form class="home__form">
                <a href="<?php echo wp_logout_url("/"); ?>" class="home__button title button_read button_read-blue">Выход</a>
            </form>
        </div>
    </article>
</main>

<?php get_footer(); ?>