<?php
/*
Template Name: Категория
*/
?>

<?php get_header(); ?>

<?php
    require_once __DIR__ . '/functions/Get_Category_Color.php';
    require_once __DIR__ . '/functions/Get_Child_Categories.php';
    require_once __DIR__ . '/functions/Get_Posts_From_Category.php';
    require_once __DIR__ . '/functions/Get_Webp_Link.php';


    $category = get_queried_object();
    $current_cat_id = $category->term_id;
    $parent_category_id = get_ancestors( $current_cat_id, 'category' )[0];
    $parent_category = get_category($parent_category_id);
    $color = get_category_color($parent_category);
    $child_categories = get_child_categories($parent_category);

?>

<main class="wrapper">
    <div class="cage cont">
        <div class="cage-mainbar">
            <article class="category">
                <h1 class='<?php echo "category__caption caption caption_white-${color}" ?>'><?php echo $parent_category->name; ?></h1>
                <ul class="category__header-list">
                    <?php foreach ($child_categories as $child_category): ?>
                        <?php if ($child_category->term_id == $current_cat_id): ?>
                            <li class="category__header-item">
                                <span class='<?php echo "category__header-item-btn button_category button_category-${color} button_category-${color}-active"; ?>'>
                                    <?php echo $child_category -> name?>
                                </span>
                            </li>
                        <?php else: ?>
                            <li class="category__header-item">
                                <a href="<?php echo get_category_link($child_category->term_id) ?>" class='<?php echo "category__header-item-btn button_category button_category-${color}"; ?>'>
                                    <?php echo $child_category -> name?>
                                </a>
                            </li>
                        <?php endif ?>

                    <?php endforeach ?>
                </ul>
                <div class="category__tile">
                    <?php
                        $params = array(
                            'posts_per_page' => 10,
                            'cat' => $category->term_id,
                            'paged' => get_query_var('paged') ?: 1
                        );

                        $posts = new WP_Query($params);
                    ?>
                    <?php while ($posts->have_posts()): ?>
                        <?php $posts->the_post() ?>
                        <?php $id = get_the_ID() ?>
                        <div class="category__tile-box category__tile-box_blue">
                            <picture class="category__tile-picture">
                                <source srcset='<?php $img1x = get_the_post_thumbnail_url( $id, "thumb-330" ); $img2x = get_the_post_thumbnail_url( $id, "thumb-660" ); echo getWebpLink($img1x) . " 1x, " . getWebpLink($img2x) . " 2x" ?>' type="image/webp" media="(max-width: 520px)">
                                <source srcset='<?php $link = get_the_post_thumbnail_url( $id, "thumb-470" ); echo getWebpLink($link) ?>' type="image/webp" media="(max-width: 700px)">
                                <source srcset='<?php $link = get_the_post_thumbnail_url( $id, "thumb-288" ); echo getWebpLink($link) ?>' type="image/webp" media="(max-width: 1240px)">
                                <source srcset='<?php $link = get_the_post_thumbnail_url( $id, "thumb-300" ); echo getWebpLink($link) ?>' type="image/webp">
                                <source srcset='<?php $img1x = get_the_post_thumbnail_url( $id, "thumb-330" ); $img2x = get_the_post_thumbnail_url( $id, "thumb-660" ); echo $img1x . " 1x, " . $img2x . " 2x" ?>' media="(max-width: 520px)">
                                <source srcset='<?php echo get_the_post_thumbnail_url( $id, "thumb-470" ); ?>' media="(max-width: 700px)">
                                <source srcset='<?php echo get_the_post_thumbnail_url( $id, "thumb-288" ); ?>' media="(max-width: 1240px)">
                                <img class="category__tile-image" src='<?php echo get_the_post_thumbnail_url( $id, "thumb-300" ); ?>'></picture>
                            <div class="category__tile-wrapper">
                                <div class="category__tile-inner"><h2 class="category__tile-title title"><?php echo $post->post_title; ?></h2>
                                    <p class="category__tile-text"><?php echo get_the_excerpt($post->ID) ?></p>
                                    <a class='<?php echo "category__tile-read button_read button_read-${color}"?>' href='<?php echo get_permalink($post)?>'>ЧИТАТЬ ДАЛЕЕ</a></div>
                                <div class="category__tile-info">
                                    <div class="category__tile-info-box">
                                        <div class="category__tile-time"><?php echo get_post_time('j F Y', false, $post, true) ?></div>
                                        <div class="category__tile-author"><?php the_author_meta('display_name',$post->post_author) ?></div>
                                    </div>
                                    <div class="category__tile-type"><?php echo get_the_category($post->ID)[0]->name ?></div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php the_posts_pagination(array('prev_text'=>__('<'),'next_text'=>__('>'))) ?>
                </div>
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
