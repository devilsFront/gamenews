<?php

add_action( 'wp_enqueue_scripts', 'my_scripts_method');

function my_scripts_method() {
    wp_enqueue_style( 'style-name', get_template_directory_uri() . '/statics/style7977838.css');
    wp_enqueue_script('newscript', get_template_directory_uri() . '/statics/app7977838.js','', '',true);
}

add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );
add_theme_support( 'post-formats', array( 'aside', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video', 'audio' ) );
add_theme_support( 'post-thumbnails' );

function webp_upload_mimes( $existing_mimes ) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}

add_filter( 'mime_types', 'webp_upload_mimes' );

add_action('admin_post_registration_user', 'post_register');
add_action('admin_post_nopriv_registration_user', 'post_register');

function post_register() {
    $user_hash = MD5($_POST['email']);

    if (!empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['email'])) {
        $userdata = array();
        $userdata['user_login'] = $_POST['email'];
        $userdata['user_password'] = $_POST['password'];
        $userdata['remember'] = true;
        $user_id = wp_create_user($_POST['name'], $_POST['password'], $_POST['email']);
        if (is_wp_error($user_id)) {
            if (array_key_exists("existing_user_email", $user_id->errors)) {
                echo "email-registered";
            } else if (array_key_exists("existing_user_login", $user_id->errors)) {
                echo "login-registered";
            }
        } else {
            add_user_meta( $user_id, "user_active", false, true );
            add_user_meta( $user_id, "user_hash", $user_hash, true );
            $link = "http://n92293ly.beget.tech/registration-activation?hash=" . $user_hash;
            wp_mail( $_POST['email'], 'Подтверждение регистрации', "<p>The <em>HTML</em> message</p><div><a href=" . $link . ">Подтвердить аккаунт</a></div>");
            wp_signon($userdata);
            echo "success";
        }
    }
}

remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
add_filter('wp_mail_content_type', 'my_set_html_content_type');
function my_set_html_content_type() {
    return 'text/html';
}

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
    return '
	<nav class="pagination__area %1$s" role="navigation">
		<ul class="pagination__list">%3$s</ul>
	</nav>
	';
}

add_filter('show_admin_bar', 'hide_admin_bar');
function hide_admin_bar() {
    if ( !current_user_can( 'publish_posts' ) ) {
        show_admin_bar( false );
    } else {
        show_admin_bar( true );
    }
}

add_action('admin_post_login_user', 'post_login');
add_action('admin_post_nopriv_login_user', 'post_login');

function post_login($params) {
    if (!empty($_POST['password']) && !empty($_POST['email'])) {
        $userdata = array();
        $userdata['user_login'] = $_POST['email'];
        $userdata['user_password'] = $_POST['password'];
        $userdata['remember'] = true;

        $user = get_user_by( 'email', $_POST['email'] );
        if ($user) {
            $login = wp_signon( $userdata, false );
            if ( is_wp_error($login) ) {
                if (array_key_exists("incorrect_password", $login->errors)) {
                    echo "password-login";
                }
            } else {
                wp_set_current_user( $user->ID, $user->user_login );
                wp_set_auth_cookie( $user->ID );
                echo "success";
            }
        } else {
            echo "email-login";
        }
    }
}

add_action('admin_post_comment_user', 'post_comment');
add_action('admin_post_nopriv_comment_user', 'post_comment');

function post_comment() {
    $data = [
        'comment_post_ID'      => $_POST['post_id'],
        'comment_author'       => $_POST['user_author'],
        'comment_author_email' => $_POST['user_email'],
        'comment_author_url'   => '',
        'comment_content'      => $_POST['comment-text'],
        'comment_type'         => 'comment',
        'comment_parent'       => $_POST['comment_parent'],
        'user_id'              => $_POST['user_id'],
        'comment_author_IP'    => '',
        'comment_agent'        => '',
        'comment_date'         => null, // получим current_time('mysql')
        'comment_approved'     => 1,
    ];
    $comment_id = wp_insert_comment( $data );
    if ($comment_id) {
        $count = get_comments_number($_POST['post_id']);
        $args = array(
            'post_id' => $_POST['post_id'],
            'orderby' => array('comment_date'),
            'order' => 'DESC',
            'number' => 1
        );
        $comment = get_comments( $args )[0];
        $response = array(
            "count" => $count,
            "comment" => $comment,
            "comment_parent_object" => get_comments(array('comment__in' => $comment->comment_parent))[0]
        );
        echo json_encode( $response );
    }

}

add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'post-image-1920', 800, 9999, false );
    add_image_size( 'post-image-1240', 854, 9999, false );
    add_image_size( 'post-image-950', 650, 9999, false );
    add_image_size( 'post-image-700', 470, 9999, false );
    add_image_size( 'post-image-520', 394, 9999, false );
    add_image_size( 'post-image-520-2x', 788, 9999, false );

    add_image_size( 'thumb-260', 260, 146, false );
    add_image_size( 'thumb-278', 278, 156, false );
    add_image_size( 'thumb-320', 320, 180, false );
    add_image_size( 'thumb-470', 470, 265, false );

    add_image_size( 'thumb-366', 366, 206, false );
    add_image_size( 'thumb-275', 275, 155, false );
    add_image_size( 'thumb-550', 550, 310, false );

    add_image_size( 'thumb-300', 300, 169, false );
    add_image_size( 'thumb-288', 288, 162, false );
    add_image_size( 'thumb-330', 330, 185, false );
    add_image_size( 'thumb-660', 660, 370, false );
}

add_filter( 'image_size_names_choose', 'my_custom_sizes' );
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'post-image-1920' => 'post-image-1920',
        'post-image-1240' => 'post-image-1240',
        'post-image-950' => 'post-image-950',
        'post-image-700' => 'post-image-700',
        'post-image-520' => 'post-image-520',
    ) );
}

add_filter( 'image_send_to_editor', 'filter_function_name_11', 10, 8 );

require_once __DIR__ . '/functions/Get_Webp_Link.php';

function filter_function_name_11( $html, $id, $caption, $title, $align, $url, $size, $alt ){
    $img1920 = image_get_intermediate_size($id, 'post-image-1920');
    $source1920 = '<source srcset=' . $img1920['url'] . ' media="(max-width: 1920px)"' . '>';
    $img1240 = image_get_intermediate_size($id, 'post-image-1240');
    $source1240 = '<source srcset=' . $img1240['url'] . ' media="(max-width: 1240px)"' . '>';
    $img950 = image_get_intermediate_size($id, 'post-image-950');
    $source950 = '<source srcset=' . $img950['url'] . ' media="(max-width: 950px)"' . '>';
    $img700 = image_get_intermediate_size($id, 'post-image-700');
    $source700 = '<source srcset=' . $img700['url'] . ' media="(max-width: 700px)"' . '>';
    $img520_1x = image_get_intermediate_size($id, 'post-image-520');
    $img520_2x = image_get_intermediate_size($id, 'post-image-520-2x');
    $source520 = '<source srcset = "' . $img520_1x['url'] . ' 1x, ' . $img520_2x['url'] . ' 2x"' . ' media="(max-width: 520px)"' . '>';

    $link1920webp = getWebpLink($img1920['url']);
    $source1920webp = '<source srcset= ' . $link1920webp . ' type="image/webp"' . '>';
    $link1240webp = getWebpLink($img1240['url']);
    $source1240webp = '<source srcset=' . $link1240webp . ' media="(max-width: 1240px)"' . 'type="image/webp"' . '>';
    $link950webp = getWebpLink($img950['url']);
    $source950webp = '<source srcset=' . $link950webp . ' media="(max-width: 950px)"' . 'type="image/webp"' . '>';
    $link700webp = getWebpLink($img700['url']);
    $source700webp = '<source srcset=' . $link700webp . ' media="(max-width: 700px)"' . 'type="image/webp"' . '>';
    $img520_1xwebp = getWebpLink($img520_1x['url']);
    $img520_2xwebp = getWebpLink($img520_2x['url']);
    $source520webp = '<source srcset = "' . $img520_1xwebp . ' 1x, ' . $img520_2xwebp . ' 2x"' . ' media="(max-width: 520px)"' . 'type="image/webp"' . '>';

    $newHtml = '<picture>' . $source520webp . $source700webp . $source950webp . $source1240webp . $source1920webp . $source520 . $source700 . $source950 . $source1240 . $html . '</picture>';

    return $newHtml;
}

add_filter( 'wp_calculate_image_srcset_meta', '__return_null' );
add_filter( 'wp_calculate_image_sizes', '__return_false',  99 );
add_filter( 'wp_img_tag_add_srcset_and_sizes_attr', '__return_false' );


add_filter( 'excerpt_length', function(){
    return 20;
} );

add_filter('excerpt_more', function($more) {
    return '...';
});

function posts_link_next_class($format){
    $format = str_replace('href=', 'class="post__nav-link post__nav-link_next button_read button_read-blue" href=', $format);
    return $format;
}
add_filter('next_post_link', 'posts_link_next_class');

function posts_link_prev_class($format) {
    $format = str_replace('href=', 'class="post__nav-link post__nav-link_prev button_read button_read-blue" href=', $format);
    return $format;
}
add_filter('previous_post_link', 'posts_link_prev_class');