<?php

use Buglinjo\LaravelWebp\Webp;

use Intervention\Image\Facades\Image;

function resizeImage($url, $width = null, $height = null, $fit = 'max', $format = null): string
{

    $url = $url . '?' . (($width) ? 'w=' . $width . '&' : "");
    $url .= ($height) ? 'h=' . $height . "&" : "";
    $url .= ($format) ? 'fm=' . $format . "&" : "";
    $url .= 'fit=' . $fit;
    $url = cloudfront($url);
    return str_replace("https://d1rjxhevrfxjk0.cloudfront.net", "https://imgsrv.rotana.net", $url);
}