<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-site-verification" content="9hXR7-jXSfDI3Mqg_YamgL698QL6SjBcAFYfMlhBltM" />
    <title><?php echo wp_get_document_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>

<?php
    $category = get_queried_object();
    $current_cat_id = $category->term_id;
    $categories = get_categories( [
        'hide_empty' => 0,
        'include' => '14, 17, 5, 11, 2',
        'orderby' => 'include'
    ] );
    require_once __DIR__ . '/functions/Get_Category_Color.php';
    require_once __DIR__ . '/functions/Get_Child_Categories.php';
?>

<header class="header" data-element="header">
    <div class="header__layer" data-element="header__layer"></div>
    <div class="header__layer-search" data-element="header__layer-search"></div>
    <form class="header__search-form cont" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" data-element="header__search-form">
        <input class="header__search-btn header__search-btn_submit" type="submit" id="searchsubmit" value=""/>
        <input type="hidden" value="any" name="post_type" />
        <input class="header__search-input" type="text" value="<?php echo get_search_query(); ?>" name="s" />
        <button class="header__search-btn header__search-btn_close" type="button"
                data-element="header__search-btn_close"></button>
    </form>
    <div class="header__cont cont">
        <?php if (is_front_page()): ?>
            <div class="header__logo">GameNews</div>
        <?php else: ?>
            <a href="/" class="header__logo">GameNews</a>
        <?php endif ?>
        <ul class="header__nav" data-element="header__nav">
            <?php foreach ($categories as $category): ?>
                <?php $color = get_category_color($category); $child_category = get_child_categories($category)[0]; ?>
                <li class="header__nav-item">
                    <?php
                        $child_category_id = $child_category->term_id;
                        $category_parent_id = $category->term_id;
                        $category_link = get_category_link( $child_category_id );
                        $parent_category_by_current = get_ancestors( $current_cat_id, 'category' )[0];
                    ?>
                    <?php if ($category_parent_id == $parent_category_by_current):?>
                        <span class='<?php echo "header__nav-link link_white-color link_white-${color} header__nav-link_${color}" ?>'><?php echo $category->name ?></span>
                    <?php else: ?>
                        <a class='<?php echo "header__nav-link link_white-color link_white-${color} header__nav-link_${color}" ?>' href="<?php echo $category_link; ?>"><?php echo $category->name ?></a>
                    <?php endif ?>
                </li>
            <?php endforeach ?>
        </ul>
        <div class="header__buttons">
            <button class="header__button header__button_search" type="button" data-element="header__button_search">
                <svg class="header__button-svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 512.005 512.005" style="enable-background:new 0 0 512.005 512.005;" xml:space="preserve"><g><g><path d="M505.749,475.587l-145.6-145.6c28.203-34.837,45.184-79.104,45.184-127.317c0-111.744-90.923-202.667-202.667-202.667              S0,90.925,0,202.669s90.923,202.667,202.667,202.667c48.213,0,92.48-16.981,127.317-45.184l145.6,145.6              c4.16,4.16,9.621,6.251,15.083,6.251s10.923-2.091,15.083-6.251C514.091,497.411,514.091,483.928,505.749,475.587z              M202.667,362.669c-88.235,0-160-71.765-160-160s71.765-160,160-160s160,71.765,160,160S290.901,362.669,202.667,362.669z"></path></g></g></svg>
            </button>
            <?php if (is_user_logged_in() && get_user_meta( wp_get_current_user()->ID, 'user_active', true )): ?>
                <a href='/cabinet' class="header__button header__button_home">
                    <svg class="header__button-svg-home" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                        <path d="M30,15a1,1,0,0,1-.58-.19L16,5.23,2.58,14.81a1,1,0,0,1-1.16-1.62l14-10a1,1,0,0,1,1.16,0l14,10A1,1,0,0,1,30,15Z"/>
                        <path d="M5,9A1,1,0,0,1,4,8V4A1,1,0,0,1,5,3H9A1,1,0,0,1,9,5H6V8A1,1,0,0,1,5,9Z"/>
                        <path d="M25,29H20a1,1,0,0,1-1-1V21H13v7a1,1,0,0,1-1,1H7a3,3,0,0,1-3-3V16a1,1,0,0,1,2,0V26a1,1,0,0,0,1,1h4V20a1,1,0,0,1,1-1h8a1,1,0,0,1,1,1v7h4a1,1,0,0,0,1-1V16a1,1,0,0,1,2,0V26A3,3,0,0,1,25,29Z"/>
                    </svg>
                </a>
            <?php else: ?>
                <a href='/registration' class="header__button header__button_sign-in">
                    <svg class="header__button-svg" viewbox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                        <path d="m403.777344 147.917969c0-81.5625-66.359375-147.917969-147.917969-147.917969-81.5625 0-147.917969 66.355469-147.917969 147.917969 0 50.519531 25.464844 95.199219 64.222656 121.894531-36.1875 12.488281-69.359374 33.117188-97.226562 60.984375-48.324219 48.324219-74.9375 112.578125-74.9375 180.917969h39.976562c0-119.035156 96.84375-215.878906 215.882813-215.878906 81.558594 0 147.917969-66.355469 147.917969-147.917969zm-147.917969 107.941406c-59.519531 0-107.941406-48.421875-107.941406-107.941406s48.421875-107.941407 107.941406-107.941407c59.515625 0 107.9375 48.421876 107.9375 107.941407s-48.421875 107.941406-107.9375 107.941406zm256.140625 111.9375-94.089844 94.089844-28.269531-28.269531 46.832031-46.832032h-34.671875c-47.898437 0-86.902343 38.972656-86.941406 86.871094l-.035156 38.074219-39.976563-.03125.03125-38.078125c.058594-69.925782 56.996094-126.816406 126.921875-126.816406h32.671875l-44.832031-44.832032 28.269531-28.265625zm0 0"></path>
                    </svg>
                </a>
            <?php endif ?>
            <button class="header__button header__button_burger" data-element="header__button_burger">
                <div class="header__button_burger-line"></div>
            </button>
        </div>
    </div>
</header>