<?php

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Str;

Blade::directive('svg', function ($expression) {
    $expression = cjlsvgStripQuotes($expression);
    $expression = str_replace('.svg', '', $expression);
    $expression = "{$expression}.svg";
    $filesystem = new Filesystem();
    if (Str::contains($expression, 'http')) {
        return file_get_contents($expression);
    }

    // check if resources path

    $svg_paths = config('laravel-svg.svg_paths');
    $svg_paths[] = __DIR__.'/../resources/svg';

    foreach ($svg_paths as $key => $path) {
        $file_path = str_replace('//', '/', "{$path}/{$expression}");
        if (file_exists($file_path)) {
            $svg_content = $filesystem->get($file_path);
            $svg_content = str_replace('<svg ', '<svg style="min-width: 100%;"', $svg_content);
            return '<span style="display:inline-block;min-width:100%">'.$svg_content.'</span>';
            //return str_replace('<svg ', '<svg style="min-width: 100%;"', $svg_content);
        }
    }

    return '';
});
