<?php get_header(); ?>

<?php
    $categories = get_categories( [
        'hide_empty' => 0,
        'include' => '14, 17, 5, 11, 2',
        'orderby' => 'include'
    ] );
    require_once __DIR__ . '/functions/Get_Category_Color.php';
    require_once __DIR__ . '/functions/Get_Child_Categories.php';
    require_once __DIR__ . '/functions/Get_Posts_From_Category.php';
    require_once __DIR__ . '/functions/Get_Webp_Link.php';

?>

<main class="wrapper">
    <article class="index-banners" data-element="index-banners">
        <div class="index-banners__cont cont">
            <button class="index-banners__button index-banners__button_prev"
                    data-element="index-banners__button_prev"></button>
            <button class="index-banners__button index-banners__button_next"
                    data-element="index-banners__button_next"></button>
            <div class="index-banners__wrapper">
                <?php $posts = get_posts(array('numberposts' => 18)); $arr = array(0, 6, 12, 18); ?>
                <?php for ($j = 1; $j < count($arr); $j++): ?>
                    <div class='<?php echo "index-banners__area "; if ($arr[$j] == 6) echo "index-banners__area_active" ?>' data-element="index-banners__area">
                        <div class="index-banners__box">
                            <?php for ($i = $arr[$j - 1]; $i < $arr[$j]; $i++): ?>
                                <?php $id = $posts[$i]->ID?>
                                    <a class='<?php
                                        $categoryArray = get_the_category($id);
                                        foreach ($categoryArray as $thisCategory)
                                            if ($thisCategory->parent == 0) $category = $thisCategory;
                                        $color = get_category_color($category);
                                        echo "index-banners__item index-banners__item_${color}"
                                    ?>'
                                       href='<?php echo get_post_permalink($id) ?>'>
                                        <span class="index-banners__tag">
                                            <?php echo $category->name; ?>
                                        </span>
                                        <?php if ($category->name != "Видео"): ?>
                                            <div class="index-banners__info">
                                                <p class="index-banners__title"><?php echo get_the_title($id) ?></p>
                                            </div>
                                        <?php endif ?>
                                        <picture class="index-banners__picture">
                                            <source srcset='<?php $img1x = get_the_post_thumbnail_url( $id, "thumb-275" ); $img2x = get_the_post_thumbnail_url( $id, "thumb-550" ); echo getWebpLink($img1x) . " 1x, " . getWebpLink($img2x) . " 2x" ?>' media="(max-width: 1240px)">
                                            <source srcset='<?php $link = get_the_post_thumbnail_url( $id, "thumb-366" ); echo getWebpLink($link) ?>'>
                                            <source srcset='<?php $img1x = get_the_post_thumbnail_url( $id, "thumb-275" ); $img2x = get_the_post_thumbnail_url( $id, "thumb-550" ); echo $img1x . " 1x, " . $img2x . " 2x" ?>' media="(max-width: 1240px)">
                                            <img class="index-banners__image" src='<?php echo get_the_post_thumbnail_url( $id, "thumb-366" ); ?>' alt="" loading="lazy">
                                        </picture>
                                    </a>
                            <?php endfor ?>
                        </div>
                    </div>
                <?php endfor ?>
                <div class="index-banners__nav">
                    <button class="index-banners__nav-button index-banners__nav-item_active"
                            data-element="index-banners__nav-button" data-index="0">
                        <div class="index-banners__nav-point"></div>
                    </button>
                    <button class="index-banners__nav-button" data-element="index-banners__nav-button" data-index="1">
                        <div class="index-banners__nav-point"></div>
                    </button>
                    <button class="index-banners__nav-button" data-element="index-banners__nav-button" data-index="2">
                        <div class="index-banners__nav-point"></div>
                    </button>
                </div>
            </div>
        </div>
    </article>
    <?php
        $categories = get_categories( [
            'hide_empty' => 0,
            'include' => '14, 17, 5, 11, 2',
            'orderby' => 'include'
        ] );
    ?>
    <div class="cage cont">
        <div class="cage-mainbar">
            <?php foreach ($categories as $category): ?>
                <?php
                    $color = get_category_color($category);
                    $child_categories = get_child_categories($category);
                    $current_cat_id = $category->term_id;
                ?>
                <article class="category-tile" data-element="category-tile">
                    <h2 class="category-tile__title title">
                        <a class='<?php echo "link_white-color link_white-${color}" ?>' href='<?php echo get_category_link($child_categories[0]->term_id)?>'><?php echo $category -> name ?></a>
                    </h2>
                    <ul class="category-tile__header-list">
                        <li class="category-tile__header-item">
                            <button data-index="0" data-color="<?php echo $color ?>" data-element="category-tile__header-item-btn" class='<?php echo "category-tile__header-item-btn button_category button_category-${color} button_category-${color}-active" ?>'
                                    type="button">Все
                            </button>
                        </li>
                        <?php foreach ($child_categories as $key => $child_category): ?>
                            <li class="category-tile__header-item">
                                <button data-index="<? echo $key + 1?>" data-color="<?php echo $color ?>" data-element="category-tile__header-item-btn" class='<?php echo "category-tile__header-item-btn button_category button_category-${color}" ?>'
                                        type="button"><?php echo $child_category -> name?>
                                </button>
                            </li>
                        <?php endforeach ?>
                    </ul>
                    <div class="category-tile__tile category-tile__tile_active" data-element="category-tile__tile">
                        <?php $my_posts = get_posts_from_category($current_cat_id); ?>

                        <?php foreach ($my_posts as $my_post): ?>
                            <?php $id = $my_post->ID ?>
                            <a class='<?php echo "category-tile__tile-item category-tile__tile-item_${color}" ?>' href='<?php echo get_permalink($my_post)?>'>
                                <picture class="category-tile__tile-picture">
                                    <source srcset='<?php $img1x = get_the_post_thumbnail_url( $id, "thumb-330" ); $img2x = get_the_post_thumbnail_url( $id, "thumb-660" ); echo getWebpLink($img1x) . " 1x, " . getWebpLink($img2x) . " 2x" ?>' type="image/webp" media="(max-width: 520px)">
                                    <source srcset='<?php $link = get_the_post_thumbnail_url( $id, "thumb-470" ); echo getWebpLink($link) ?>' type="image/webp" media="(max-width: 700px)">
                                    <source srcset='<?php $link = get_the_post_thumbnail_url( $id, "thumb-320" ); echo getWebpLink($link) ?>' type="image/webp" media="(max-width: 950px)">
                                    <source srcset='<?php $link = get_the_post_thumbnail_url( $id, "thumb-278" ); echo getWebpLink($link) ?>' type="image/webp" media="(max-width: 1240px)">
                                    <source srcset='<?php $link = get_the_post_thumbnail_url( $id, "thumb-260" ); echo getWebpLink($link) ?>' type="image/webp">
                                    <source srcset='<?php $img1x = get_the_post_thumbnail_url( $id, "thumb-330" ); $img2x = get_the_post_thumbnail_url( $id, "thumb-660" ); echo $img1x . " 1x, " . $img2x . " 2x" ?>' media="(max-width: 520px)">
                                    <source srcset='<?php echo get_the_post_thumbnail_url( $id, "thumb-470" ); ?>' media="(max-width: 700px)">
                                    <source srcset='<?php echo get_the_post_thumbnail_url( $id, "thumb-320" ); ?>' media="(max-width: 950px)">
                                    <source srcset='<?php echo get_the_post_thumbnail_url( $id, "thumb-278" ); ?>' media="(max-width: 1240px)">
                                    <img class="category-tile__tile-image" src='<?php echo get_the_post_thumbnail_url( $id, "thumb-260" ); ?>' alt=""
                                         loading="lazy"></picture>
                                <p class="category-tile__tile-text"><?php echo $my_post->post_title; ?></p>
                                <div class="category-tile__info"><span class="category-tile__date"><?php echo get_post_time('j F Y', false, $my_post, true) ?></span><span
                                        class="category-tile__comment"><?php echo get_comments_number($id) ?></span></div>
                            </a>
                        <?php endforeach ?>
                    </div>
                    <?php foreach ($child_categories as $child_category): ?>
                        <div class="category-tile__tile" data-element="category-tile__tile">
                            <?php $my_posts = get_posts_from_category($child_category->term_id); ?>
                            <?php foreach ($my_posts as $my_post): ?>
                                <?php $id = $my_post->ID ?>
                                <a class='<?php echo "category-tile__tile-item category-tile__tile-item_${color}" ?>' href='<?php echo get_permalink($my_post)?>'>
                                    <picture class="category-tile__tile-picture">
                                        <source srcset='<?php $img1x = get_the_post_thumbnail_url( $id, "thumb-330" ); $img2x = get_the_post_thumbnail_url( $id, "thumb-660" ); echo getWebpLink($img1x) . " 1x, " . getWebpLink($img2x) . " 2x" ?>' type="image/webp" media="(max-width: 520px)">
                                        <source srcset='<?php $link = get_the_post_thumbnail_url( $id, "thumb-470" ); echo getWebpLink($link) ?>' type="image/webp" media="(max-width: 700px)">
                                        <source srcset='<?php $link = get_the_post_thumbnail_url( $id, "thumb-320" ); echo getWebpLink($link) ?>' type="image/webp" media="(max-width: 950px)">
                                        <source srcset='<?php $link = get_the_post_thumbnail_url( $id, "thumb-278" ); echo getWebpLink($link) ?>' type="image/webp" media="(max-width: 1240px)">
                                        <source srcset='<?php $link = get_the_post_thumbnail_url( $id, "thumb-260" ); echo getWebpLink($link) ?>' type="image/webp">
                                        <source srcset='<?php $img1x = get_the_post_thumbnail_url( $id, "thumb-330" ); $img2x = get_the_post_thumbnail_url( $id, "thumb-660" ); echo $img1x . " 1x, " . $img2x . " 2x" ?>' media="(max-width: 520px)">
                                        <source srcset='<?php echo get_the_post_thumbnail_url( $id, "thumb-470" ); ?>' media="(max-width: 700px)">
                                        <source srcset='<?php echo get_the_post_thumbnail_url( $id, "thumb-320" ); ?>' media="(max-width: 950px)">
                                        <source srcset='<?php echo get_the_post_thumbnail_url( $id, "thumb-278" ); ?>' media="(max-width: 1240px)">
                                        <img class="category-tile__tile-image" src='<?php echo get_the_post_thumbnail_url( $id, "thumb-260" ); ?>' alt=""
                                             loading="lazy"></picture>
                                    <p class="category-tile__tile-text"><?php echo $my_post->post_title; ?></p>
                                    <div class="category-tile__info"><span class="category-tile__date"><?php echo get_post_time('j F Y', false, $my_post, true) ?></span><span
                                                class="category-tile__comment"><?php echo get_comments_number($id) ?></span></div>
                                </a>
                            <?php endforeach ?>
                        </div>
                    <?php endforeach ?>
                    <div class="category-tile__more-box">
                        <a href='<?php echo get_category_link($child_categories[0]->term_id)?>' class='<?php echo "category-tile__more-btn button_more button_more-${color}" ?>' type="button">Смотреть все
                        </a>
                    </div>
                </article>
            <?php endforeach ?>
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
