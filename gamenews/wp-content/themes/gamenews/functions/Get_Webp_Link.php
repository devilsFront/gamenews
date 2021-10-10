<?php
    function getWebpLink($link): string
    {
        $webpLink = substr($link, 0, -3) . "webp";
        return $webpLink;
    }
