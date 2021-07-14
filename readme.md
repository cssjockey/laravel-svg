# Laravel Svg

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

This package enables a directive @svg(..) which renders the svg code from given path or public url.
This package includes, all free SVG icons from [feathericons](https://feathericons.com/) and [heroicons](https://heroicons.com/). However, you can add any SVG icons in your project, see below for details.

## Installation

Via Composer

``` bash
$ composer require cssjockey/laravel-svg
```
__Optional:__ The service provider will automatically get registered. Or you may manually add the service provider in your config/app.php file:
```
'providers' => [
    // ...
    CSSJockey\LaravelSvg\LaravelSvgServiceProvider::class,
];
```
## Configuration
You can publish the config file `config/laravel-svg.php` to add or manage the local paths this package looks for SVG icons. 
``` bash
$ php artisan vendor:publish --provider="CSSJockey\LaravelSvg\LaravelSvgServiceProvider"
```

## Usage
Embeding svg source from a public url in your blade template.
```
@svg('https://cssjockey.com/public/test.svg')
```

Loading svg source from a local path in your blade template.
```
@svg('feather/activity')
```
```
@svg('hero/wifi')
```
This will look for all the paths listed in `config/laravel-svg.php` file and the default package path.

#### Controlling width and height.
The svgs are loaded with full width and height, you can wrap the directive in a div to control the dimensions with a class or style attribute.

Example using tailwind width class:
```
<div class="w-6">
    @svg('hero/wifi')
</div>
```

Example using style attribute:
```
<div style="width:24px">
    @svg('hero/wifi')
</div>
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Todo:
- Include more free icons in the package.
- Create CLI tool to optimize the SVGs code with artisan command.

## Contributing

Please see [contributing](contributing.md) for details.

## Security

If you discover any security related issues, please email admin@cssjockey.com instead of using the issue tracker.

## Credits

- [Mohit Aneja](https://github.com/cssjockey)
- [All Contributors](https://github.com/cssjockey/docker-local-dev/graphs/contributors)

## License

__MIT__ Please see the [license](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/cssjockey/laravel-svg.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/cssjockey/laravel-svg.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/cssjockey/laravel-svg/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/cssjockey/laravel-svg
[link-downloads]: https://packagist.org/packages/cssjockey/laravel-svg
[link-travis]: https://travis-ci.org/cssjockey/laravel-svg
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/cssjockey
[link-contributors]: ../../contributors
