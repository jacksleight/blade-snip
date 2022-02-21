<?php

namespace JackSleight\LaravelBladeSnip;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        Blade::directive('snip', function ($expression) {
            $name = $expression;
            $name = trim($name, '\'" ');

            return '<?php $__snip_'.$name.' = function($__data) { extract($__data); ?>';
        });
        Blade::directive('endsnip', function () {
            return '<?php }; ?>';
        });
        Blade::directive('stick', function ($expression) {
            list($name, $data) = explode(',', $expression, 2) + [null, '[]'];
            $name = trim($name, '\'" ');

            return '<?php $__snip_'.$name.'(array_merge(\Illuminate\Support\Arr::except(get_defined_vars(), ["__data"]),'.$data.')) ?>';
        });
    }
}
