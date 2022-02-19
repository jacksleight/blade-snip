![Packagist version](https://flat.badgen.net/packagist/v/jacksleight/laravel-blade-snipit)
![License](https://flat.badgen.net/github/license/jacksleight/laravel-blade-snipit)

# Blade Snipit 

Blade Snipit allows you to use parts of a blade template multiple times and in multiple places in the same file. Basically inline partials:

```blade
<div class="products">
    @snip('product')
        <div class="product">
            @if ($image)
                <img src="{{ $image }}">
            @endif
            <h1>Lorem Ipsum Dolor</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            <span>£{{ number_format($price ?? rand(10, 100)) }}</span>
            <button>Add to Basket</button>
        </div>
    @endsnip
    @snipit('product', ['image' => 'potato.jpg'])
    @snipit('product', ['image' => 'cheese.jpg'])
    @snipit('product', ['image' => 'pasta.jpg', 'price' => 120])
</div>
```

```blade
@snip('content')
    <x-figure caption="Lorem ipsum dolor sit amet">
        <img src="photo.jpg">
    </x-figure>
@endsnip
@if ($link)
    <a href="{{ $link }}">@snipit('content')</a>
@else
    @snipit('content')
@endif
```

## Why?

I created this to use when prototyping page layouts. I often need reusable blocks but don’t want to jump between multiple files, or don’t know exactly how those files should be structured yet.

This is primarily intended as a development tool, it’s usually best to break things down into actual partials or components once you’re done prototyping. That being said, there could be other use cases.

## Installation

Run the following command from your project root:

```bash
composer require jacksleight/laravel-blade-snipit
```

## Usage

Check the examples above. All variables defined in the template scope are also avaliable in the partials.
