<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>&ltWebsite Name&gt</title>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Alex+Brush&family=Montserrat&family=Ubuntu&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/be5a4db825.js" crossorigin="anonymous"></script>
        <!-- jQuery -->
        <script
            src="https://code.jquery.com/jquery-3.6.4.js"
            integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
            crossorigin="anonymous"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="/styles.css">
        <link rel="shortcut icon" href="#">
    </head>

    <body>
        <!-- navbar -->
        <nav class="navbar">
            <div class="navbar-center">
            <span class="nav-icon bars-icon">
                <i class="fas fa-bars"></i>
            </span>
            <div class="navbar-brand"><a class="navbar-brand" href="/">&lt W e b s i t e &emsp; N a m e &gt</a></div>
                <div class="cart-btn">
                    <span class="nav-icon">
                        <i class="fas fa-cart-plus"></i>
                    </span>
                    <div class="cart-items">0</div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- end of nabar -->
    
        {{ $slot }}

        <!-- cart -->
        <div class="cart-overlay">
            <div class="cart">
                <span class="close-cart">
                    <i class="fas fa-window-close"></i>
                </span>
                <h2>your cart</h2>
                <div class="cart-content">
                    @if($products->count())
                        @foreach($products as $product)
                            @include('cart-item',
                                ['product' => $product]
                            )
                        @endforeach
                    @endif
                </div>
                <div class="cart-footer">
                    <h3>your total : € <span class="cart-total">0</span></h3>
                    <button class="clear-cart banner-btn">clear cart</button>
                </div>
            </div>
        </div>
        <!-- end of cart -->

        <!-- app js -->
        <script src="/app.js"></script>
    </body>

</html>
