<?php
/**
 * Template Name: registration-activation
 */
?>

<?php

$success = false;
if ($_GET['hash']) {
    $args = array(
        'meta_query' => array(
            array(
                'key' => 'user_hash',
                'value' => $_GET['hash'],
                'compare' => '=='
            )
        )
    );
    $user = get_users($args)[0];
    if ($user) {
        update_user_meta( $user->ID, 'user_active', 'true', '' );
        $success = true;
    }
}
?>

<?php get_header(); ?>

<main class="wrapper">
    <article class="info-page">
        <div class="info-page__cont cont">
            <?php if($success): ?>
                <h1 class="info-page__caption caption">Аккаунт подтверждён</h1>
                <p class="info-page__text"><a href="/" class="registration__link link_white-blue link_white-color">На главную</a></p>
            <?php else: ?>
                <h1 class="info-page__caption caption">Что-то пошло не так</h1>
            <?php endif ?>
        </div>
    </article>
</main>

<?php get_footer(); ?>
