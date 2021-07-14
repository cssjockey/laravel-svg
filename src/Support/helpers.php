<?php

if (!function_exists('cjlsvgStripQuotes')) {
    function cjlsvgStripQuotes($expression)
    {
        return str_replace(["'", '"'], '', $expression);
    }
}

if (!function_exists('cjlsvgMultipleArgs')) {
    function cjlsvgMultipleArgs($expression, $separator = '|')
    {
        return collect(explode($separator, $expression))->map(function ($item) {
            return trim($item);
        });
    }
}
