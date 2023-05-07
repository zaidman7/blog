@if($products->count())
    @foreach($products as $product)
        @include('product-card',
            ['product' => $product]
        )
    @endforeach
@endif