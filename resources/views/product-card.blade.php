<!-- single product -->
<article class="product">
    <div class="img-container">
        <a href="products/{{ $product->id }}">
            <img src="/images/illustration-2.png" alt="product" class="product-img">
        </a>
        <x-add-to-cart-button :product="$product" />
    </div>
    <div class="rating-div">
        <img src="/images/{{ round(2 * $product->ratings->avg('rating'))/2 }}-stars.png" alt="rating" class="rating-img">
    </div>
    <h3><a href="products/{{ $product->id }}" class="product-name-link">{{ $product->name }}</a></h3>
    <h4 class="price" data-id="{{ $product->id }}">€{{ number_format($product->price, 2, '.', '') }}</h4>
</article>
<!-- end of single product -->