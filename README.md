![Packagist version](https://flat.badgen.net/packagist/v/jacksleight/laravel-blade-snip)
![License](https://flat.badgen.net/github/license/jacksleight/laravel-blade-snip)

# Blade Snip

Blade Snip allows you to extract and reuse parts of a blade template within a single file. Snips are basically inline partials:

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

I created this to use when prototyping page layouts. It's often convenient to have reusable blocks, but I don’t want to jump between multiple files, or don’t know exactly how those files should be structured yet.

This is primarily intended as a development tool, it’s usually best to break things down into actual partials or components once you’re done prototyping. That being said, there could be other use cases.

## Installation

Run the following command from your project root:

```bash
composer require jacksleight/laravel-blade-snip
```

## Usage

Check the examples above.

Snips have their own variable scope, but variables defined in the template are included.
