<!--<article class="col-span-4 transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl"> -->
<!--    <div class="py-6 px-5"> -->
<!--        <div> -->
<!--            <a href="/products/{{ $product->id }}"> -->
<!--                @if($product->file) -->
<!--                    @if(str_contains($class, 'col-span-3')) -->
<!--                        <img src="{{  $product->file->file_path  }}" alt="Blog Post illustration" class="rounded-xl" style="object-fit: cover; width: 530px; height: 415px;"> -->
<!--                    @else -->
<!--                        <img src="{{  $product->file->file_path  }}" alt="Blog Post illustration" class="rounded-xl" style="object-fit: cover; width: 530px; height: 265px;"> -->
<!--                    @endif -->
<!--                @else -->
<!--                    <img src="/images/illustration-1.png" alt="Blog Post illustration" class="rounded-xl"> -->
<!--                @endif -->
<!--            </a> -->
<!--        </div> -->
<!-- -->
<!--        <div class="mt-8 flex flex-col justify-between"> -->
<!--            <header> -->
<!--                <div id="buttons-{{ $product->id }}" class="space-x-2"> -->
<!--                </div> -->
<!-- -->
<!--                <div class="mt-4"> -->
<!--                    <h1 class="text-3xl"> -->
<!--                        <a href="/products/{{ $product->id }}"> -->
<!--                            {{ $product->name }} -->
<!--                        </a> -->
<!--                    </h1> -->
<!--                </div> -->
<!--            </header> -->
<!-- -->
<!--            <div class="update-progress-form-div" id="update-progress-form-div-{{ $product->id }}" data-id="{{ $product->id }}" style="display:none"> -->
<!--            </div> -->
<!-- -->
<!--            <div class="delete-product-form-div" id="delete-product-form-div-{{ $product->id }}" data-id="{{ $product->id }}" style="display:none"> -->
<!--            </div> -->
<!-- -->
<!--            <footer class="flex justify-between items-center mt-8"> -->
<!--                <div class="flex items-center text-sm"> -->
<!--                    <div class="ml-3"> -->
<!--                    </div> -->
<!--                </div> -->
<!-- -->
<!--                <div> -->
<!--                    <a href="/products/{{ $product->id }}" -->
<!--                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8" -->
<!--                    >View</a> -->
<!--                </div> -->
<!--            </footer> -->
<!--        </div> -->
<!--    </div> -->
<!--</article> -->

<!-- single product -->
<article class="product">
    <div class="img-container">
        <a href="products/{{ $product->id }}">
            <img src="/images/illustration-2.png" alt="product" class="product-img">
        </a>
        <button class="add-to-cart-btn" data-id="{{ $product->id }}">
            <i class="fas fa-shopping-cart"></i>
            add to cart
        </button>
    </div>
    <div class="rating-div">
        <img src="/images/{{ round(2 * $product->ratings->avg('rating'))/2 }}-stars.png" alt="rating" class="rating-img">
    </div>
    <h3><a href="products/{{ $product->id }}" class="product-name-link">{{ $product->name }}</a></h3>
    <h4>€{{ number_format($product->price, 2, '.', '') }}</h4>
</article>
<!-- end of single product -->