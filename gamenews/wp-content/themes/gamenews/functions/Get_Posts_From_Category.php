<?php

function get_posts_from_category($id)
{
    $my_posts = get_posts(array(
        'numberposts' => 6,
        'category' => $id,
    ));
    return $my_posts;
}