# Laravel Svg

This package enables a directive __@svg(..)__ which renders the SVG code from a given path or public URL.

This package includes, all free SVG icons from [feathericons](https://feathericons.com/) and [heroicons](https://heroicons.com/). However, you can add any SVG icons to your project from multiple local paths. See below for details.

## Installation

You can install the package via composer:

```bash
$ composer require cssjockey/laravel-svg
```
__Optional:__ The service provider will automatically get registered. Or you may manually add the service provider in your config/app.php file:
```php
'providers' => [
    // ...
    CSSJockey\LaravelSvg\LaravelSvgServiceProvider::class,
];
```
## Configuration
You can publish the config file `config/laravel-svg.php` to add or manage the local paths this package looks for SVG icons. 
```bash
$ php artisan vendor:publish --provider="CSSJockey\LaravelSvg\LaravelSvgServiceProvider"
```

## Usage
Embedding SVG source from a public URL in your blade template.
```html
@svg('https://cssjockey.com/public/test.svg')
```

Loading SVG source from a local path in your blade template.
```html
@svg('feather/activity')
```
```html
@svg('hero/wifi')
```
This will look for all the paths listed in the `config/laravel-svg.php` file and the default package path.

#### Controlling width and height.
The SVG files are loaded with full width and height. You can wrap the directive in a div to control the dimensions with a class or style attribute.

__Example using tailwind width class:__
```html
<div class="w-6">
    @svg('hero/wifi')
</div>
```

__Example using style attribute:__
```html
<div style="width:24px">
    @svg('hero/wifi')
</div>
```

__IMPORTANT:__ If you wish to use `<span>` or any other non-block tag, then you must apply `style="display: inline-block"` to the that element.

## Changelog
Please see the changelog for more information on what has changed recently.
## Todo:
- Add more free icons to the package.
- Create an artisan command to optimize all the SVG files.
## Contributing
Please see contributing for details.
## Security
If you discover any security-related issues, please email admin@cssjockey.com instead of using the issue tracker.
## Credits
Mohit Aneja
All Contributors
## License
MIT Please see the license for more information.
