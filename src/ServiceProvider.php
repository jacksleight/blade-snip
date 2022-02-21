<?php

namespace JackSleight\LaravelBladeSnip;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        Blade::directive('snip', function ($expression) {
            list($name, $defaults) = explode(',', $expression, 2) + [null, '[]'];
            $name = trim($name, '\'" ');

            return '<?php $__snip_'.$name.' = function($__parent, $__data) { extract(array_merge($__parent, '.$defaults.', $__data)); ?>';
        });
        Blade::directive('endsnip', function () {
            return '<?php }; ?>';
        });
        Blade::directive('stick', function ($expression) {
            list($name, $data) = explode(',', $expression, 2) + [null, '[]'];
            $name = trim($name, '\'" ');

            return '<?php $__snip_'.$name.'(\Illuminate\Support\Arr::except(get_defined_vars(), ["__parent", "__data"]), '.$data.') ?>';
        });
    }
}
