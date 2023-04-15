<x-layout>
    <!-- banner -->
    <header class="banner-header">
        <div class="banner">
            <h1 class="banner-title">our collection</h1>
            <button class="banner-btn start-shopping-btn">start shopping</button>
        </div>
    </header>
    <!-- end of banner -->
    <!-- products -->
    <section class="products">
        <div class="section-title">
            <h2>our products</h2>
        </div>
        <div class="products-center">
            @if($products->count())
                @foreach($products as $product)
                    @include('product-card',
                        ['product' => $product]
                    )
                @endforeach
            @endif
        </div>
    </section>
    <!-- end of products -->
    <!-- cart -->
    <div class="cart-overlay">
        <div class="cart">
            <span class="close-cart">
                <i class="fas fa-window-close"></i>
            </span>
            <h2>your cart</h2>
            <div class="cart-content">
            </div>
            <div class="cart-footer">
                <h3>your total : $ <span class="cart-total">0</span></h3>
                <button class="clear-cart banner-btn">clear cart</button>
            </div>
        </div>
    </div>
    <!-- end of cart -->
</x-layout>