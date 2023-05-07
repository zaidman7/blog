<x-layout :products="$products">
    <section class="product-large">
    <a class="button" href="/">
        &lt BACK
    </a>
        <main style="padding-top: 5px;">
            <article>
                <div>
                    <div class="img-container" style="position: relative; overflow: hidden; float: left;">
                        @if($product->file)
                            <img src="{{ $product->file->file_path }}" alt="Blog Post illustration" class="product-img-large">
                        @else
                            <img src="/images/illustration-2.png" alt="Blog Post illustration" class="product-img-large">
                        @endif
                        <x-add-to-cart-button :product="$product" />
                        <x-rate-button :product="$product"/>
                    </div>
                </div>

                <div class="product-details">
                    <div class="rating-and-rate-button">
                        <div class="rating-div-large">
                            @if($product->ratings->count())
                                <img src="/images/{{ round(2 * $ratings->avg('rating'))/2 }}-stars.png" alt="rating" class="rating-img-large">
                            @else
                                <p>Product not rated yet</p>
                            @endif
                        </div>
                    </div>

                    <div class="product-name-div">
                        <h1>
                            {{ $product->name }}
                        </h1>
                    </div>

                    <div class="description-div">
                        {{ $product->description }}
                    </div>
                </div>
            </article>
            <div class="ratings">
            <h1>Comments</h1>
                @if($ratings->count())
                    @foreach($ratings as $rating)
                        @include('rating',
                            ['rating' => $rating]
                        )
                    @endforeach
                @endif
            </div>
        </main>
    </section>

    <div class="hidden">
        @include('all-product-cards',
            ['products' => $products]
        )
    </div>
</x-layout>