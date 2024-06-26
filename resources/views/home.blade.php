<x-layout :products="$products">
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
            @include('all-product-cards',
                ['products' => $products]
            )
        </div>
    </section>
    <!-- end of products -->
</x-layout>