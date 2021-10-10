<?php get_header(); ?>

<?php the_post(); ?>

<?php
$categoryArray = wp_get_post_categories(get_the_id(), array('fields' => 'all'));
    foreach ($categoryArray as $thisCategory)
        if ($thisCategory->parent == 0)
            $categoryLink = $thisCategory;
        else
            $categorySpan = $thisCategory;
?>

<main class="wrapper">
    <div class="cage cont">
        <div class="cage-mainbar">
            <article class="post" data-element="post">
                <h1 class="post__caption caption"><?php the_title() ?></h1>
                <ul class="post__crumbs">
                    <li class="post__crumbs-item">
                        <a href="/" class="post__crumbs-link text-small">Главная</a>
                    </li>
                    <li class="post__crumbs-item">
                        <a href='<?php echo get_category_link($categorySpan) ?>' class="post__crumbs-link text-small"><?php echo $categoryLink->name ?></a>
                    </li>
                    <li class="post__crumbs-item">
                        <span class="post__crumbs-link text-small"><?php echo $categorySpan->name ?></span>
                    </li>
                </ul>
                <div class="post__info">
                    <div class="post__info-box">
                        <div class="post__info-date text-small"><?php the_date('j m Y в H:i'); ?></div>
                        <div class="post__info-author text-small"><?php the_author() ?></div>
                    </div>
                    <div class="post__info-comment"><span data-element="post__info-comment-count" class="post__info-comment-count text-small"><?php $post_id = get_the_id(); echo get_comments_number($post_id) ?></span></div>
                </div>
                <div class="post__content" data-element="post__content">
                    <p class="post__text"><?php the_content(); ?></p>
                <div class="post__nav">
                    <?php previous_post_link('%link', "Предыдущий пост", true) ?>
                    <?php next_post_link('%link', "Следующий пост", true) ?>
                </div>
                <?php if (is_user_logged_in() && get_user_meta( wp_get_current_user()->ID, 'user_active', true )): ?>
                    <div class="post__comment-line"><h4 class="post__comment-title">Комментарии (<span data-element="post__comment-count"><?php $post_id = get_the_id(); echo get_comments_number($post_id) ?></span>)</h4>
                        <button class="post__comment-link button_read button_read-blue" type="button"
                                data-element="post__comment-link">Оставить комментарий
                        </button>
                    </div>
                    <form action="<?= admin_url('admin-post.php'); ?>" id="post__comment-form-main" data-form-type="comment" data-role="validation__form" data-element="post__comment-form-main" class="post__comment-form-main">
                        <?php $current_user = wp_get_current_user(); ?>
                        <input type="hidden" name="action" value="comment_user" />
                        <input type="hidden" name="post_id" value="<?php echo get_the_id(); ?>" />
                        <input type="hidden" name="comment_parent" value="0" />
                        <input type="hidden" name="user_id" value="<?= $current_user->ID ?>" />
                        <input type="hidden" name="user_author" value="<?= $current_user->user_login ?>" />
                        <input type="hidden" name="user_email" value="<?= $current_user->user_email ?>" />
                        <textarea class="post__comment-textarea-main" name="comment-text" data-role="form-input" data-element="post__comment-textarea-main" required></textarea>
                        <button class="post__comment-submit button_read button_read-blue" data-role="form-button">Отправить</button>
                    </form>
                <?php else: ?>
                    <h2 class="post__title">Чтобы оставлять комментарии, пожалуйста <a href="/registration/" class="post__link link_white-blue link_white-color">зарегистрируйтесь</a> или <a href="/login/" class="post__link link_white-blue link_white-color">Войдите</a></h2>
                <?php endif ?>
                <?php
                    $comments = get_comments(array(
                        'post_id' => get_the_id(),
                        'status' => 'approve' // комментарии прошедшие модерацию
                    ));
                ?>
                    <div class="post__comment post__comment_hidden" data-element="post__comment-layout">
                        <picture class="post__comment-picture">
                            <img class="post__comment-image" src="<?php echo get_avatar_url(wp_get_current_user()->ID, ["size"=>"50"]); ?>" alt="" loading="lazy">
                        </picture>
                        <div class="post__comment-inner">
                            <div class="post__comment-info" data-element="post__comment-info"><h4 class="post__comment-name text-small" data-element="post__comment-name">Author</h4><span
                                        class="post__comment-time text-small" data-element="post__comment-time">comment-date</span></div>
                            <div class="post__comment-text" data-element="post__comment-text">текст коммента</div>
                            <button class="post__comment-answer button_read button_read-blue" type="button"
                                    data-element="post__comment-answer">Ответить
                            </button>
                            <form class="post__comment-form" data-form-type="comment" action="<?= admin_url('admin-post.php'); ?>" data-role="validation__form">
                                <?php $current_user = wp_get_current_user(); ?>
                                <input type="hidden" name="action" value="comment_user" />
                                <input type="hidden" name="post_id" value="<?php echo get_the_id(); ?>" />
                                <input type="hidden" name="comment_parent" data-element="comment_parent" value="id родительского коммента" />
                                <input type="hidden" name="user_id" value="<?= $current_user->ID ?>" />
                                <input type="hidden" name="user_author" value="<?= $current_user->user_login ?>" />
                                <input type="hidden" name="user_email" value="<?= $current_user->user_email ?>" />
                                <textarea class="post__comment-textarea" name="comment-text" data-role="form-input" required></textarea>
                                <button class="post__comment-submit button_read button_read-blue" data-role="form-button">Отправить</button>
                            </form>
                        </div>
                    </div>
                <?php foreach ($comments as $comment): ?>
                    <div class="post__comment">
                        <picture class="post__comment-picture">
                            <img class="post__comment-image" src="<?php echo get_avatar_url(wp_get_current_user()->ID, ["size"=>"50"]); ?>" alt="" loading="lazy">
                        </picture>
                        <div class="post__comment-inner">
                            <div class="post__comment-info"><h4 class="post__comment-name text-small"><?php echo $comment->comment_author ?></h4><span
                                    class="post__comment-time text-small"><?php comment_date('j m Y в H:i', $comment->comment_ID) ?></span></div>
                            <?php if ($comment -> comment_parent != 0): ?>
                                <div class="post__comment-text post__comment-text_answer">
                                    <?php $parent_comment = get_comments(array('comment__in' => $comment->comment_parent))[0];
                                        echo $parent_comment->comment_author . ' писал: "' . $parent_comment->comment_content . '"' ;
                                    ?>
                                </div>
                            <?php endif ?>
                            <div class="post__comment-text"><?php echo $comment->comment_content ?>
                            </div>
                            <?php if (is_user_logged_in() && get_user_meta( wp_get_current_user()->ID, 'user_active', true )): ?>
                                <button class="post__comment-answer button_read button_read-blue" type="button"
                                        data-element="post__comment-answer">Ответить
                                </button>
                            <?php endif ?>
                            <form class="post__comment-form" data-form-type="comment" action="<?= admin_url('admin-post.php'); ?>" data-role="validation__form">
                                <?php $current_user = wp_get_current_user(); ?>
                                <input type="hidden" name="action" value="comment_user" />
                                <input type="hidden" name="post_id" value="<?php echo get_the_id(); ?>" />
                                <input type="hidden" name="comment_parent" value="<?php echo $comment->comment_ID ?>" />
                                <input type="hidden" name="user_id" value="<?= $current_user->ID ?>" />
                                <input type="hidden" name="user_author" value="<?= $current_user->user_login ?>" />
                                <input type="hidden" name="user_email" value="<?= $current_user->user_email ?>" />
                                <textarea class="post__comment-textarea" name="comment-text" data-role="form-input" required></textarea>
                                <button class="post__comment-submit button_read button_read-blue" data-role="form-button">Отправить</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </article>
        </div>

        <div class="cage-sidebar">
            <div class="cage-sidebar__box"><h3>Сайдбар</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum consequat laoreet quam in
                    vehicula. Curabitur tempus turpis ut odio lobortis vestibulum. Curabitur quis sapien eu magna
                    tincidunt consequat. Suspendisse eget eros vitae tellus imperdiet elementum. Vestibulum maximus
                    felis a sem iaculis fringilla. Aenean metus nulla, cursus ac elementum ut, tristique sed nibh. Morbi
                    purus diam, ultrices nec efficitur at, convallis ac neque. Vivamus dictum nisl ac libero pretium
                    pellentesque. In at eros elit.</p>
                <p>Suspendisse ultrices est mi, sed vehicula ligula pellentesque a. Nullam ac risus sem. Sed posuere
                    lacinia pellentesque. Donec tempus arcu at dictum ornare. Proin nec aliquet arcu. Praesent sem ante,
                    congue quis eros nec, iaculis luctus arcu. Sed sagittis ac felis in aliquam. Duis sed malesuada
                    nibh, vel blandit tellus. Nam rutrum, elit non commodo vulputate, felis dolor vestibulum metus,
                    vitae mollis magna tortor eget orci.</p></div>
        </div>
    </div>
</main>

<?php get_footer(); ?>