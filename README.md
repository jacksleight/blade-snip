![Packagist version](https://flat.badgen.net/packagist/v/jacksleight/laravel-blade-snip)
![License](https://flat.badgen.net/github/license/jacksleight/laravel-blade-snip)

# Blade Snip

Blade Snip lets you use parts of a single blade template multiple times. Basically partials, but inline:

```blade
<div class="products">
    @snip('product', ['price' => rand(10, 100)])
        <div class="product">
            @if ($image)
                <img src="{{ $image }}">
            @endif
            <h1>Lorem Ipsum Dolor echo</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <button>Add to Basket</button> £{{ number_format($price) }}
        </div>
    @endsnip
    @stick('product', ['image' => 'potato.jpg'])
    @stick('product', ['image' => 'cheese.jpg'])
    @stick('product', ['image' => 'pasta.jpg', 'price' => 120])
</div>
```

```blade
@snip('content')
    <x-figure caption="Lorem ipsum dolor sit amet">
        <img src="photo.jpg">
    </x-figure>
@endsnip
@if ($link)
    <a href="{{ $link }}">@stick('content')</a>
@else
    @stick('content')
@endif
```

## Why?

I created this to use when prototyping page layouts. It's useful to have reusable blocks, but I don’t want to jump between multiple files, or don’t know exactly how those files should be structured yet.

This is primarily intended as a development tool, it’s usually best to break things down into actual partials or components once you’re done prototyping. That being said, there could be other use cases.

## Installation

Run the following command from your project root:

```bash
composer require jacksleight/laravel-blade-snip
```

## Usage

Check the examples above.

Directives accept the following arguments:

* `@snip(string $name, ?array $defaults = [])` … `@endsnip`
* `@stick(string $name, ?array $data = [])`

Under the hood the `@snip` and `@endsnip` directives just wrap that code in a closure, and `@stick` calls it. As they're closures they have their own variable scope, but variables defined in the template are included. Names can only contain alpha-numeric characters and underscores.
