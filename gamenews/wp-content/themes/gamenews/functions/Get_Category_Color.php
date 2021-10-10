<?php

function get_category_color($category): string
{
    $current_cat_name = $category->name;

    switch ($current_cat_name) {
        case "Новости":
            $color = "blue";
            break;
        case "Статьи":
            $color = "red";
            break;
        case "Железо":
            $color = "yellow";
            break;
        case "Кино":
            $color = "green";
            break;
        case "Видео":
            $color = "purple";
            break;
        default: $color = "";
    }
    return $color;
}
