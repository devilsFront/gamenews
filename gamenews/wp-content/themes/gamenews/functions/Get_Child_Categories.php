<?php

function get_child_categories($category): array
{
    $current_cat_id = $category->term_id;

    $child_categories = get_categories( [
        'child_of' => $current_cat_id,
        'hide_empty' => 0,
    ] );
    return $child_categories;
}