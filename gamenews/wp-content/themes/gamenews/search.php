<?php get_header(); ?>

<?php
    $s = get_search_query();
    $args = array(
        's' => $s
    );
    $the_query = new WP_Query( $args );
?>

<main class="wrapper">
    <article class="search">
        <div class="search__cont cont">
            <h1 class="search__caption caption caption_white-blue">Результаты поиска</h1>

            <?php if ( $the_query->have_posts() ): ?>
                <?php while ( $the_query->have_posts() ):  ?>
                    <?php $the_query->the_post(); ?>
                    <div class="search__tile">
                        <div class="search__tile-box search__tile-box_blue">
                            <picture class="search__tile-picture">
                                <source srcset='<?php $img1x = get_the_post_thumbnail_url( get_the_ID(), "thumb-330" ); $img2x = get_the_post_thumbnail_url( get_the_ID(), "thumb-660" ); echo getWebpLink($img1x) . " 1x, " . getWebpLink($img2x) . " 2x" ?>' type="image/webp" media="(max-width: 520px)">
                                <source srcset='<?php $link = get_the_post_thumbnail_url( get_the_ID(), "thumb-470" ); echo getWebpLink($link) ?>' type="image/webp" media="(max-width: 700px)">
                                <source srcset='<?php $link = get_the_post_thumbnail_url( get_the_ID(), "thumb-288" ); echo getWebpLink($link) ?>' type="image/webp" media="(max-width: 1240px)">
                                <source srcset='<?php $link = get_the_post_thumbnail_url( get_the_ID(), "thumb-300" ); echo getWebpLink($link) ?>' type="image/webp">
                                <source srcset='<?php $img1x = get_the_post_thumbnail_url( get_the_ID(), "thumb-330" ); $img2x = get_the_post_thumbnail_url( get_the_ID(), "thumb-660" ); echo $img1x . " 1x, " . $img2x . " 2x" ?>' media="(max-width: 520px)">
                                <source srcset='<?php echo get_the_post_thumbnail_url( get_the_ID(), "thumb-470" ); ?>' media="(max-width: 700px)">
                                <source srcset='<?php echo get_the_post_thumbnail_url( get_the_ID(), "thumb-288" ); ?>' media="(max-width: 1240px)">
                                <img class="search__tile-image" src='<?php echo get_the_post_thumbnail_url( get_the_ID(), "thumb-300" ); ?>'></picture>
                            <div class="search__tile-wrapper">
                                <div class="search__tile-inner"><h2 class="search__tile-title title"><?php the_title(); ?></h2>
                                    <p class="search__tile-text"><?php echo get_the_excerpt() ?></p><a
                                            class="search__tile-read button_read button_read-blue" href="<?php the_permalink(); ?>">ЧИТАТЬ ДАЛЕЕ</a></div>
                                <div class="search__tile-info">
                                    <div class="search__tile-info-box">
                                        <div class="search__tile-time"><?php the_time('j m Y'); ?></div>
                                        <div class="search__tile-author"><?php the_author(); ?></div>
                                    </div>
                                    <div class="search__tile-type"><?php echo get_the_category(get_the_ID())[0]->name ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile ?>
            <?php else: ?>
            <h1>Результатов нет</h1>

            <?php endif ?>

        </div>
    </article>
</main>

<?php get_footer(); ?>
