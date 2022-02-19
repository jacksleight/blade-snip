<?php

namespace JackSleight\LaravelBladeSnipit;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        Blade::directive('snip', function ($expression) {
            eval('$args = ['.$expression.'];');

            return '<?php $snip_'.$args[0].' = function($__data) { extract($__data); ?>';
        });
        Blade::directive('endsnip', function () {
            return '<?php }; ?>';
        });
        Blade::directive('snipit', function ($expression) {
            eval('$args = ['.$expression.'];');

            return '<?php $snip_'.$args[0].'(\Illuminate\Support\Arr::except(get_defined_vars(), ["__data"]) + '.var_export($args[1] ?? [], true).') ?>';
        });
    }
}
