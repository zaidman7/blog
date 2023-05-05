<div class="cart-item" data-id="{{ $product->id }}">
    <img src="/images/illustration-2.png" alt="product">
    <div>
        <h4>{{ $product->name }}</h4>
        <h5 data-id="{{ $product->id }}">€{{ number_format($product->price, 2, '.', '') }}</h5>
        <span class="remove-item" data-id="{{ $product->id }}">remove</span>
    </div>
    <div>
        <i class="fas fa-chevron-up" data-id="{{ $product->id }}"></i>
        <p class="item-amount" data-id="{{ $product->id }}"></p>
        <i class="fas fa-chevron-down"data-id="{{ $product->id }}"></i>
    </div>
</div>