<?php

use Illuminate\Support\Facades\Blade;

Blade::directive('svg', function ($expression) {
    return "<?php echo \\CSSJockey\\LaravelSvg\\LaravelSvg::cjsvg({$expression}); ?>";
});
